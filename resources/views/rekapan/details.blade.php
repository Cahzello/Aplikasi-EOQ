@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <h1 class="h2 mb-4 text-gray-800">Data Rekapan Bahan Baku {{ $bahan_baku }} </h1>
                <p>Data Rekapan Bahan Baku Yang Telah Dibuat</p>
                <a href="#" class="btn btn-success">Tambah Data</a>
                <a href="#" class="btn btn-primary">Edit Nama Bahan Baku </a>
                <a href="#" class="btn btn-danger">Hapus Bahan Baku</a>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    @if (empty($responses->count()))
                                        <td colspan="7" class="align-middle">Data Belum Diisi</td>
                                    @else
                                        @foreach ($responses as $key => $response)
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
                                        @endforeach
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>


    </div>
@endsection
