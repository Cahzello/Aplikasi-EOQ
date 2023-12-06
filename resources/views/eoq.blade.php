@extends('main.main')

@section('container')
    <div class="container-fluid">

        <div class="card-shadow-mb4">
            <div class="card-header">

                <h1 class="h3 mb-4 text-gray-800">Input Data</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bahan Baku</th>
                                <th>Penggunaan</th>
                                <th>Biaya Pemesanan</th>
                                <th>Biaya Penyimpanan Per Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td>
                                <td><input type="text" name="" id=""></td>
                                <td><input type="text" name="" id=""></td>
                                <td><input type="text" name="" id=""></td>
                                <td><input type="text" name="" id=""></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <a name="" id="" class="btn btn-success" href="#" role="button">Calculate</a>
            </div>

        </div>


    </div>
@endsection
