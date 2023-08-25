@extends('layouts.dashboard')

@section('title')
    PMB | Transaksi
@endsection

@section('container')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang {{ auth()->user()->nama }}</h1>

    <h4 class="h4 mb-4 text-gray-800">Form Transaksi</h4>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('user.transaksi.store') }}" method="post" name="formT">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="pasien_id">NIK Pasien</label>
                    <select name="pasien_id" id="pasien_id" class="form-control @error('berat_badan') is-invalid @enderror"
                        required>
                        <option value="">Masukan NIK Pasien</option>
                        @php
                            // Mengambil data pasien dari database dan mengurutkannya berdasarkan nama pasien dalam urutan abjad
                            $pasiens = App\Models\Pasien::orderBy('nama_pasien')->get();
                        @endphp
                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }} - {{ $pasien->nik }}</option>
                        @endforeach
                    </select>
                    @error('berat_badan')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Transaksi</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal') }}" required placeholder="Masukan Tanggal Transaksi">
                    @error('pembayaran')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penanganan_id">Layanan</label>
                    <select name="penanganan_id" id="penanganan_id"
                        class="form-control @error('penanganan_id') is-invalid @enderror" required>
                        <option for="pasien_id">Masukan Harga Layanan</option>
                        @foreach ($penanganans as $penanganan)
                            <option value="{{ $penanganan->id }}" data-nama-layanan="{{ $penanganan->nama_layanan }}"
                                data-harga="{{ $penanganan->harga }}">
                                {{ $penanganan->nama_layanan }} Rp. {{ number_format($penanganan->harga) }}
                            </option>
                        @endforeach
                    </select>
                    @error('penanganan_id')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md col-12">
                            <div class="form-group">
                                <label for="obat_id">Daftar Obat</label>
                                <select class="form-control" id="obat_id" name="obat_id">
                                    @php
                                        // Mengambil data obat dari database dan mengurutkannya berdasarkan nama obat dalam urutan abjad
                                        $obats = App\Models\Obat::orderBy('nama_obat')->get();
                                    @endphp
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}" data-id="{{ $obat->id }}"
                                            data-nama_obat="{{ $obat->nama_obat }}" data-harga="{{ $obat->harga }}">
                                            {{ $obat->nama_obat }} Rp. {{ number_format($obat->harga) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <input type="hidden" name="formtambahobat" id="formtambahobat">
                                <button type="button" class="btn btn-primary d-block" onclick="tambahobat()"> Tambah
                                    Obat</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode</th>
                                        <th>Nama</th>
                                        <th>Quantity</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="listobat">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Jumlah</th>
                                        <th></th>
                                        <th class="quantity">0</th>
                                        <th class="totalHarga">0</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya</label>
                        <input name="total_biaya" id="total_biaya"
                            class="form-control @error('total_biaya') is-invalid @enderror" required readonly>
                        @error('total_biaya')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pembayaran">Bayar</label>
                        <input name="pembayaran" id="pembayaran"
                            class="form-control @error('pembayaran') is-invalid @enderror" value="{{ old('pembayaran') }}"
                            required onInput="hitungKembalian()" onBlur="hitungKembalian()">
                        @error('pembayaran')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kembalian">Kembalian</label>
                        <input name="kembalian" id="kembalian" value="0"
                            class="form-control @error('kembalian') is-invalid @enderror" value="{{ old('kembalian') }}"
                            required readonly>
                        @error('kembalian')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="hidden" name="total_biaya" id="totalBiayaOutput">
                    <input type="hidden" name="daftar_obat" id="daftar_obat">
                    <input type="hidden" name="total_harga" id="total_harga">
                    <input type="hidden" name="kembalian" id="kembalianOutput">
                    <input type="hidden" name="pembayaran" id="pembayaranOutput">
                    <button type="submit" id="submit-button" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    <!-- ... (kode lainnya) -->
    <div class="fa-group">
        <div class="table-responsive">
            <h4 class="h4 mb-4 text-gray-800">Daftar Transaksi</h4>
            <form class="row g-3 col-md-3" action="" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari Transaksi...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary mb-3" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bidan</th>
                        <th>Nama Pasien</th>
                        <th>NIK Pasien</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Total Biaya</th>
                        <th>Pembayaran</th>
                        <th>Kembalian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis->sortBy('tanggal') as $transaksi)
                        <tr id="transaksi-row-{{ $transaksi->id }}">
                            <td>{{ $transaksis->perPage() * ($transaksis->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $transaksi->user->nama }}</td>
                            <td>{{ $transaksi->pasien->nama_pasien}}</td>
                            <td>{{ $transaksi->pasien->nik }}</td>
                            <td>{{ $transaksi->penanganan->nama_layanan }}</td>
                            <td>{{ date('d-m-Y', strtotime($transaksi->tanggal)) }}</td>

                            <!-- Tambah baris ini untuk menampilkan tanggal -->
                            <td>Rp. {{ number_format($transaksi->total_biaya) }}</td>
                            <td>Rp. {{ number_format($transaksi->pembayaran) }}</td>
                            <td>Rp. {{ number_format($transaksi->kembalian) }}</td>
                            <td>
                                <a href="{{ route('user.struk.struk', ['id' => $transaksi->id]) }}"
                                    class="badge badge-primary" target="_blank">Cetak Struk</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $transaksis->links() }}
        </div>
    </div>
@endsection

@section('js')
    <script>
        let items = [];

        const totalBiayaOutput = document.getElementById('total_biaya');
        const totalHargaInput = document.getElementById('total_harga');
        const penangananSelect = document.getElementById('penanganan_id');
        const pembayaranInput = document.getElementById('pembayaran');
        const kembalianOutput = document.getElementById('kembalian');
        const quantityElement = document.querySelector('.quantity');
        const totalHargaElement = document.querySelector('.totalHarga');

        penangananSelect.addEventListener('change', updateTotalBiaya);

        function tambahobat() {
            const obatSelect = document.getElementById('obat_id');
            const selectedOption = obatSelect.options[obatSelect.selectedIndex];
            const id = selectedOption.getAttribute('data-id');
            const nama_obat = selectedOption.text;
            const harga = parseFloat(selectedOption.getAttribute('data-harga'));

            let existingItem = null;

            for (const item of items) {
                if (item.id === id && item.nama_obat === nama_obat && item.harga === harga) {
                    existingItem = item;
                    break;
                }
            }

            if (existingItem) {
                existingItem.quantity++;
            } else {
                items.push({
                    id: id,
                    nama_obat: nama_obat,
                    harga: harga,
                    quantity: 1
                });
            }

            updateTable();
            updateTotalBiaya();
            hitungKembalian();
        }

        function updateTable() {
            const listobat = document.querySelector('.listobat');
            listobat.innerHTML = '';

            let totalHarga = 0;
            let totalQuantity = 0;

            items.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.id}</td>
                <td>${item.nama_obat}</td>
                <td>${item.quantity}</td>
                <td>Rp. ${item.harga.toFixed(0)}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger" onclick="hapusItem(${index})">
                        Hapus
                    </button>
                </td>
            `;

                listobat.appendChild(row);

                totalHarga += item.harga * item.quantity;
                totalQuantity += item.quantity;
            });

            totalHargaInput.value = totalHarga;
            totalBiayaOutput.value = totalHarga; // Atur biaya sesuai dengan total harga sementara
            updateFormData();

            // Tampilkan jumlah quantity dan total harga pada elemen HTML
            quantityElement.textContent = totalQuantity;
            totalHargaElement.textContent = totalHarga.toFixed(0);
            // Set nilai elemen input dengan data daftar obat yang dikelola dalam JavaScript
        }

        function hapusItem(index) {
            if (items[index].quantity > 1) {
                items[index].quantity--;
            } else {
                items.splice(index, 1);
            }
            updateTable();
            updateTotalBiaya();
            hitungKembalian();
        }
        // ... (bagian kode sebelumnya)

        penangananSelect.addEventListener('change', async () => {
            const penangananId = penangananSelect.value;
            if (penangananId) {
                try {
                    const response = await fetch(`/get-harga-penanganan/${penangananId}`);
                    const data = await response.json();
                    const hargaPenanganan = parseFloat(data.harga);

                    updateTotalBiaya(hargaPenanganan);
                } catch (error) {
                    console.error('Error fetching harga penanganan:', error);
                }
                hitungKembalian();
            }
        });

        // ...
        function updateTotalBiaya() {
            const penangananId = penangananSelect.value;
            const selectedPenanganan = penangananSelect.options[penangananSelect.selectedIndex];
            const hargaPenanganan = parseFloat(penangananId ? selectedPenanganan.getAttribute('data-harga') : 0);
            const totalHarga = parseFloat(totalHargaInput.value);

            const totalBiaya = hargaPenanganan + totalHarga;

            totalBiayaOutput.value = totalBiaya.toFixed(0); // Set nilai total biaya pada input
            updateFormData();
            // Update the total biaya hidden input as well
            document.getElementById('totalBiayaOutput').value = totalBiaya.toFixed(0);
        }
        // ...
        function hitungKembalian() {
            const totalBiaya = parseFloat(totalBiayaOutput.value);
            const pembayaran = parseFloat(pembayaranInput.value);

            const kembalian = isNaN(pembayaran) ? 0 : pembayaran - totalBiaya;
            kembalianOutput.value = kembalian.toFixed(0);

            // Simpan nilai pembayaran ke dalam input "pembayaran"
            if (!isNaN(pembayaran)) {
                document.getElementById('pembayaran').value = pembayaran;
                document.getElementById('pembayaranOutput').value = pembayaran.toFixed(0);
            }
            document.getElementById('kembalianOutput').value = kembalian.toFixed(0);
        }


        function updateFormData() {
            const listobatInput = document.getElementById('daftar_obat');
            listobatInput.value = JSON.stringify(items);
        }


        // ... kode lainnya ...

        // Panggil fungsi updateFormData saat formulir akan dikirim
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Cegah pengiriman langsung formulir
            updateFormData(); // Isi nilai input daftar_obat dengan data dari items
            document.forms['formT'].submit(); // Kirim formulir setelah input diisi
        });

        //     function cetakTransaksi(idTransaksi) {
        //         // Buka jendela baru dengan versi cetak dari baris transaksi
        //         const jendelaCetak = window.open('', '_blank');
        //         jendelaCetak.document.write('<html><head><title>Transaksi untuk Cetak</title></head><body>');

        //         // Dapatkan konten baris transaksi berdasarkan ID
        //         const barisTransaksi = document.getElementById('transaksi-row-' + idTransaksi);
        //         jendelaCetak.document.write(barisTransaksi.outerHTML);

        //         jendelaCetak.document.write('</body></html>');
        //         jendelaCetak.document.close();
        //         jendelaCetak.print();
        //     }
        //
    </script>
@endsection
