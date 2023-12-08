@extends('main.main')

@section('container')
    <div class="container-fluid">

        <div class="card-shadow-mb4">
            <div class="card-header">

                <h1 class="h3 mb-4 text-gray-800">Input Data</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('calculate') }}" method="post">
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
                                    <td rowspan="5"><input type="text" class="form-control h-100" name="bahanBaku">
                                    </td>
                                    <td><input type="number" class="form-control" name="penggunaanTotal"></td>
                                    <td rowspan="5"><input type="number" class="form-control" name="biayaPemesanan">
                                    </td>
                                    <td rowspan="5"><input type="number" class="form-control" name="biayaPerUnit"></td>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Maksimum Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <th><input type="number" class="form-control" name="penggunaanMax"></th>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Rata-Rata Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <th><input type="number" class="form-control" name="penggunaanAverage"></th>
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
