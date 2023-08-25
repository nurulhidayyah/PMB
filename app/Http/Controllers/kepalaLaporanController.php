<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class KepalaLaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = DetailTransaksi::query()->with('transaksi');

        $searchTerm = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Use the relationship to access the tanggal field from the Transaksi model
        if ($startDate && $endDate) {
            $query->whereHas('transaksi', function ($query) use ($startDate, $endDate) {
                $query->whereDate('tanggal', '>=', $startDate)
                    ->whereDate('tanggal', '<=', $endDate);
            });
        }
        $query->when($searchTerm, function ($query) use ($searchTerm) {
            $query->whereHas('transaksi', function ($query) use ($searchTerm) {
                $query->whereHas('pasien', function ($query) use ($searchTerm) {
                    $query->where('nama_pasien', 'LIKE', "%$searchTerm%");
                })
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('nama', 'LIKE', "%$searchTerm%");
                    })
                    ->orWhereHas('penanganan', function ($query) use ($searchTerm) {
                        $query->where('nama_layanan', 'LIKE', "%$searchTerm%");
                    })
                    ->orWhere('pembayaran', 'LIKE', "%$searchTerm%")
                    ->orWhere('kembalian', 'LIKE', "%$searchTerm%")
                    ->orWhere('total_biaya', 'LIKE', "%$searchTerm%");
            })
                ->orWhere('transaksi_id', 'LIKE', "%$searchTerm%")
                ->orWhere('obat_id', 'LIKE', "%$searchTerm%")
                ->orWhere('nama_obat', 'LIKE', "%$searchTerm%")
                ->orWhere('harga', 'LIKE', "%$searchTerm%")
                ->orWhere('quantity', 'LIKE', "%$searchTerm%");
        });

        $transaksis = $query->paginate(5);

        // Jika ada parameter 'print' dalam URL
        if ($request->has('print')) {
            if ($request->input('page')) {
                // Mengatur halaman pagination untuk pencetakan
                $currentPage = $request->input('page');
                $transaksis->withPath(route('laporan.transaksikepala', ['print' => 1, 'page' => $currentPage, 'search' => request('search')]));
            }

            $pdf = PDF::loadView('laporan.transaksikepala', [
                'transaksis' => $transaksis,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream();
        }

        // Jika hanya ingin menampilkan halaman
        return view('kepala.laporan.index', compact('transaksis'));
    }
}
