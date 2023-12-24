@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <a href="/rekapan-bulanan/data/{{$data_item->item_id}}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
                <h1 class="h2 mb-4 text-gray-800">Input Data</h1>
                <p>Input Data Bulanan Untuk Bahan Baku</p>
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
                <form action="{{ route('rekapan_store', ['data_item' => $data_item]) }}" method="post">
                    @method('post')
                    @csrf
                    <div class="form-group d-flex flex-column mb-4">
                        <label for="bulan" class="form-label">Bulan: </label>
                        <select name="bulan" id="bulan" class="form-control w-50">
                            <option selected value="notSelected">---Pilih Pilihan---</option>
                            @foreach ($months as $month)
                                <option value="{{ $month->bulan }}">{{ ucfirst($month->bulan) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="" class="form-control" id="jumlah_pembelian"
                                name="jumlah_pembelian">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="jumlah_penggunaan" class="form-label">Jumlah Penggunaan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="" class="form-control" id="jumlah_penggunaan"
                                name="jumlah_penggunaan">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="biaya_pemesanan" class="form-label">Biaya Pemesanan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="" class="form-control" id="biaya_pemesanan"
                                name="biaya_pemesanan">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="biaya_penyimpanan" class="form-label">Biaya Penyimpanan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="" class="form-control" id="biaya_penyimpanan"
                                name="biaya_penyimpanan">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="leadtime" class="form-label">Waktu Pemesanan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="" class="form-control" id="leadtime"
                                name="leadtime">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>
            </div>

        </div>


    </div>
@endsection
