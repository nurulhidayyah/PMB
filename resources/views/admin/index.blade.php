@extends('layouts.dashboard')

@section('container')
    <div class="container-fluid">
        <!-- ... -->
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-left-danger center- shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pasien Baru</div>
                        <div class="h1 mb-0 font-weight-bold text-gray-800">
                            <h1>{{ $jumlahPasienBaruHariIni }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Total Biaya Keseluruhan Bulanan -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body bg">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Biaya Keseluruhan Bulanan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-biaya-keseluruhan">
                            Rp {{ Number_format($totalBiayaKeseluruhan, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Bidan -->
            @foreach ($totalBiayaPerBidan as $data)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Transaksi ({{ $data->user->nama }})
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        Rp {{ number_format($data->total_biaya, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <!-- Total Biaya Mingguan -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Biaya Mingguan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($totalBiayaMingguanKeseluruhan, 0, '.', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Bidan Mingguan -->
            @foreach ($totalBiayaMingguanPerBidan as $data)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Transaksi Mingguan ({{ $data->user->nama }})
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        Rp {{ number_format($data->total_biaya_mingguan, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <!-- Total Biaya Harian -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Biaya Harian</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($totalBiayaHarianKeseluruhan, 0, '.', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Bidan Harian -->
            @foreach ($totalBiayaHarianPerBidan as $data)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Transaksi Harian ({{ $data->user->nama }})
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        Rp {{ number_format($data->total_biaya_harian, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Area Chart -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    </div>
                    <div class="card-body">
                        <div class="fa-area-chart">
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var chartElement = document.getElementById(
        'myChart'); // Make sure the ID matches the canvas element's ID
        var ctx = chartElement.getContext('2d');

        if (ctx) {
            console.log('Canvas context successfully obtained:', ctx);

            // Your Chart.js initialization code here
            var data = {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Transaksi',
                    data: @json($values),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: 'origin'
                }]
            };
            var options = {
                plugins: {
                    tooltip: {
                        mode: 'index'
                    }
                },
                interaction: {
                    axis: 'x', // Interact only on the x-axis
                    intersect: false,
                },
                scales: {
                    x: {
                        ticks: {
                            callback: function(value, index, values) {
                                // Convert label value to month name
                                const date = new Date(value);
                                const monthNames = [
                                    "Januari", "Februari", "Maret",
                                    "April", "Mei", "Juni",
                                    "Juli", "Agustus", "September",
                                    "Oktober", "November", "Desember"
                                ];
                                return monthNames[date.getMonth()];
                            }
                        }
                    }
                }
            };
            var myAreaChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        } else {
            console.log('Canvas context could not be obtained. Check if the element exists.');
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Memuat informasi total biaya keseluruhan bulanan
        var totalBiayaKeseluruhan = {{ $totalBiayaKeseluruhan }};
        $('#total-biaya-keseluruhan').text('Rp ' + formatNumber(totalBiayaKeseluruhan, 0));

        // Memuat informasi total biaya per bidan
        @foreach ($totalBiayaPerBidan as $data)
            var totalBiayaBidan{{ $data->user_id }} = {{ $data->total_biaya }};
            $('#total-biaya-bidan-{{ $data->user_id }}').text('Rp ' + formatNumber(
                totalBiayaBidan{{ $data->user_id }}, 0));
        @endforeach

        // Memuat informasi total biaya mingguan keseluruhan
        var totalBiayaMingguan = {{ $totalBiayaMingguanKeseluruhan }};
        $('#total-biaya-mingguan').text('Rp ' + formatNumber(totalBiayaMingguan, 0));

        // Memuat informasi total biaya mingguan per bidan
        @foreach ($totalBiayaMingguanPerBidan as $data)
            var totalBiayaMingguanBidan{{ $data->user_id }} = {{ $data->total_biaya_mingguan }};
            $('#total-biaya-mingguan-bidan-{{ $data->user_id }}').text('Rp ' + formatNumber(
                totalBiayaMingguanBidan{{ $data->user_id }}, 0));
        @endforeach

        // Memuat informasi total biaya harian keseluruhan
        var totalBiayaHarian = {{ $totalBiayaHarianKeseluruhan }};
        $('#total-biaya-harian').text('Rp ' + formatNumber(totalBiayaHarian, 0));

        // Memuat informasi total biaya harian per bidan
        @foreach ($totalBiayaHarianPerBidan as $data)
            var totalBiayaHarianBidan{{ $data->user_id }} = {{ $data->total_biaya_harian }};
            $('#total-biaya-harian-bidan-{{ $data->user_id }}').text('Rp ' + formatNumber(
                totalBiayaHarianBidan{{ $data->user_id }}, 0));
        @endforeach
    });

    // Fungsi untuk memformat angka dengan titik pada setiap 3 digit dan menampilkan 3 digit desimal
    function formatNumber(number, decimalPlaces) {
        return new Intl.NumberFormat('id-ID', {
            minimumFractionDigits: decimalPlaces,
            maximumFractionDigits: decimalPlaces
        }).format(number).replace(/,/g, '.');
    }
</script>
<!-- ... -->
