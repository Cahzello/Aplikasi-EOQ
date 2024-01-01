@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <a href="/rekapan-bulanan/data/{{$response->item_id}}" class="btn btn-primary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
                <h1 class="h2 mb-4 text-gray-800">Edit Data Bulan {{ ucfirst($response->bulan) }}</h1>
                <p>Edit Data Bahan Baku Bulan {{ ucfirst($response->bulan) }}</p>
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
                <form action="{{route('rekapan_edit', ['record' => $response])}}" method="post">
                    @method('post')
                    @csrf
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="{{ $response->jumlah_pembelian }}" class="form-control"
                                id="jumlah_pembelian" name="jumlah_pembelian">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="jumlah_penggunaan" class="form-label">Jumlah Penggunaan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="{{ $response->jumlah_penggunaan }}" class="form-control"
                                id="jumlah_penggunaan" name="jumlah_penggunaan">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="biaya_pemesanan" class="form-label">Biaya Pemesanan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="{{ $response->biaya_pemesanan }}" class="form-control"
                                id="biaya_pemesanan" name="biaya_pemesanan" step="0.01">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="biaya_penyimpanan" class="form-label">Biaya Penyimpanan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="{{ $response->biaya_penyimpanan }}" class="form-control"
                                id="biaya_penyimpanan" name="biaya_penyimpanan" step="0.01">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="leadtime" class="form-label">Waktu Pemesanan Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="number" value="{{ $response->leadtime }}" class="form-control" id="leadtime"
                                name="leadtime" step="0.01">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>
            </div>

        </div>


    </div>
@endsection
