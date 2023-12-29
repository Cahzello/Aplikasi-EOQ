@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-primary mb-4" href="/rekapan-bulanan"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            <h1 class="h2 mb-4 text-gray-800 mx-2">Data Rekapan Bahan Baku {{ $data_item->bahan_baku }} </h1>
        </div>
        <div class="card-shadow-mb4">
            <div class="card-header">
                <p>Data Rekapan Bahan Baku Yang Telah Dibuat</p>
                <p>Untuk menghitung EOQ diperlukan semua data telah terisi.</p>
                <div class="d-flex flex-row m-2">
                    <a href="{{ route('rekapan_view_store', ['data_item' => $data_item]) }}" id="isiData"
                        class="btn btn-success mx-1">Isi
                        Data</a>
                    <a class="btn btn-primary mx-1" id="hitung_eoq"
                        href="{{ route('perhitungan.store', ['data' => $data_item]) }}">
                        Hitung EOQ
                    </a>
                    <a href="{{ route('item_view_edit', ['item' => $data_item]) }}" class="mx-1 btn btn-primary">Edit Nama
                        Bahan
                        Baku </a>

                    <form action="{{ route('item_delete', ['item' => $data_item]) }}" method="POST" class="mx-1">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Hapus Bahan Baku"
                            onclick="return confirm('Apakah anda ingin menghapusnya?')">
                    </form>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="mx-4 my-4">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>

                    </div>
                @endif
            </div>
            <div class="card-body">
                @if (empty($responses))
                    <div class="card mx-4 p-3 card-shadow">

                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <h1 class="h2 text-dark">Belum Ada Data.</h1>
                            <a href="/input-data">Klik disini untuk membuat data</a>
                        </div>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Jumlah Penggunaan</th>
                                    <th>Biaya Pemesanan</th>
                                    <th>Biaya Penyimpanan</th>
                                    <th>Leadtime</th>
                                    <th>Edit Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($responses->count()))
                                    <tr class="text-center">
                                        <td colspan="8" class="align-middle">Data Belum Diisi</td>

                                    </tr>
                                @else
                                    @foreach ($responses as $key => $response)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }} </td>
                                            <td>{{ ucfirst($response['bulan']) }} </td>
                                            <td>{{ $response['jumlah_pembelian'] === null ? 'Data Kosong' : $response['jumlah_pembelian'] }}
                                            </td>
                                            <td>{{ $response['jumlah_penggunaan'] === null ? 'Data Kosong' : $response['jumlah_penggunaan'] }}
                                            </td>
                                            <td>{{ $response['biaya_pemesanan'] === null ? 'Data Kosong' : $response['biaya_pemesanan'] }}
                                            </td>
                                            <td>{{ $response['biaya_penyimpanan'] === null ? 'Data Kosong' : $response['biaya_penyimpanan'] }}
                                            </td>
                                            <td>{{ $response['leadtime'] === null ? 'Data Kosong' : $response['leadtime'] }}
                                            </td>
                                            <td>
                                                <a href="{{ route('rekapan_view_edit', ['record' => $response]) }}"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const count = {{ $data_terisi }}; // Replace with your boolean value
            const eoqButton = document.getElementById('hitung_eoq');
            const isiData = document.getElementById('isiData');
            console.log(count);
            if (count < 12) {
                // Add the class
                eoqButton.classList.add('disabled');
            } else {
                // Remove the class
                eoqButton.classList.remove('disabled');
                isiData.classList.add('disabled');
            }
        });
    </script>
@endsection
