@extends('main.main')

@section('container')
    <div class="container-fluid">

        <div class="card-shadow-mb4">
            <div class="card-header">

                <h1 class="h3 mb-4 text-gray-800">Input Data</h1>
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
            <div class="card-body">
                <form action="{{ route('product') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr class="text-center">
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Bahan Baku</th>
                                    <th class="align-middle">Total Kuantitas Penggunaan Selama <br> Satu Tahun (Kg)</th>
                                    <th class="align-middle">Biaya Pemesanan Bahan Baku</th>
                                    <th class="align-middle">Biaya Penyimpanan Per Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="align-middle" rowspan="5">1</td>
                                    <td rowspan="5"><input type="text" class="form-control h-100" name="bahan_baku">
                                    </td>
                                    <td><input type="number" class="form-control" name="total_penggunaan_tahunan"></td>
                                    <td rowspan="5"><input type="number" class="form-control" name="biaya_pemesanan">
                                    </td>
                                    <td rowspan="5"><input type="number" class="form-control" name="biaya_penyimpanan">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Maksimum Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <th><input type="number" class="form-control" name="max_penggunaan_tahunan"></th>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Rata-Rata Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <th><input type="number" class="form-control" name="average_penggunaan_tahunan"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>

        </div>


    </div>
@endsection
