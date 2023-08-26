<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Import namespace DB
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\Pasien;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil data total biaya keseluruhan dari database
        $totalBiayaKeseluruhan = (int) Transaksi::sum('total_biaya');

        // Mengambil data total biaya per bidan dari database
        $totalBiayaPerBidan = Transaksi::select('user_id', DB::raw('SUM(total_biaya) as total_biaya'))
            ->groupBy('user_id')
            ->get();

        // Mengambil data total biaya mingguan keseluruhan dari database
        $totalBiayaMingguanKeseluruhan = (int) Transaksi::whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('total_biaya');

        // Mengambil data total biaya mingguan per bidan dari database
        $totalBiayaMingguanPerBidan = Transaksi::select('user_id', DB::raw('SUM(total_biaya) as total_biaya_mingguan'))
            ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('user_id')
            ->get();

        // Mengambil data total biaya harian keseluruhan dari database
        $totalBiayaHarianKeseluruhan = (int) Transaksi::whereDate('tanggal', Carbon::now())
            ->sum('total_biaya');

        // Mengambil data total biaya harian per bidan dari database
        $totalBiayaHarianPerBidan = Transaksi::select('user_id', DB::raw('SUM(total_biaya) as total_biaya_harian'))
            ->whereDate('tanggal', Carbon::now())
            ->groupBy('user_id')
            ->get();

        // Hitung jumlah pasien baru hari ini
        $jumlahPasienBaruHariIni = Pasien::whereDate('created_at', Carbon::today())->count();

        // Fetch data for the chart (total transactions per month)
        // Fetch data for the chart (total transactions per month)
        $chartData = Transaksi::select(DB::raw("DATE_FORMAT(tanggal, '%Y-%m') as month"), DB::raw("SUM(total_biaya) as total"))
            ->whereBetween('tanggal', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $chartData->pluck('month')->map(function ($item) {
            return Carbon::createFromFormat('Y-m', $item)->format('F'); // Format to month name
        });

        $values = $chartData->pluck('total');


        return view('admin.index', [
            'totalBiayaKeseluruhan' => $totalBiayaKeseluruhan,
            'totalBiayaPerBidan' => $totalBiayaPerBidan,
            'totalBiayaMingguanKeseluruhan' => $totalBiayaMingguanKeseluruhan,
            'totalBiayaMingguanPerBidan' => $totalBiayaMingguanPerBidan,
            'totalBiayaHarianKeseluruhan' => $totalBiayaHarianKeseluruhan,
            'totalBiayaHarianPerBidan' => $totalBiayaHarianPerBidan,
            'jumlahPasienBaruHariIni' => $jumlahPasienBaruHariIni,
            'labels' => $labels,
            'values' => $values,
        ]);
    }

    public function getTotalBiayaKeseluruhan(Request $request)
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $totalBiayaKeseluruhan = Transaksi::whereBetween('tanggal', [$startDate, $endDate])
            ->sum('total_biaya');

        return response()->json(['total_biaya_keseluruhan' => $totalBiayaKeseluruhan]);
    }

    public function getTotalBiaya(Request $request)
    {
        $tipe = $request->input('tipe');
        $userId = $request->input('userId');

        $startDate = null;
        $endDate = null;

        if ($tipe === 'bulanan') {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        } elseif ($tipe === 'mingguan') {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
        } elseif ($tipe === 'harian') {
            $startDate = Carbon::now()->startOfDay();
            $endDate = Carbon::now()->endOfDay();
        }

        $totalBiaya = Transaksi::where('user_id', $userId)
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->sum('total_biaya');

        return response()->json(['total_biaya' => $totalBiaya]);
    }
}
