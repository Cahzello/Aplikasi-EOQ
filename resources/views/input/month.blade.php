@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <h1 class="h2 mb-4 text-gray-800">Input Data Bulanan</h1>
                <p>Halaman untuk meninput data bahan, sebelum di proses perhitungan EOQ.</p>
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
            <div class="card-body d-flex justify-content-between">
                <form action="" method="post">
                    @method('post')
                    @csrf
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="month">Bulan:</label>
                        <select id="month" name="month" class="form-select w-50">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="pembelian" class="form-label">Berapa banyak pembelian bahan baku (Kg): </label>
                        <div class="input-group mb-3 w-50">
                            <input type="text" value="" class="form-control" id="pembelian" name="pembelian">
                        </div>
                    </div>
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="penggunaan" class="form-label">Berapa banyak penggunaan bahan baku (Kg): </label>
                        <div class="input-group mb-3 w-50">
                            <input type="text" value="" class="form-control" id="penggunaan" name="penggunaan">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>

        </div>


    </div>
@endsection
