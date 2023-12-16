@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <h1 class="h2 mb-4 text-gray-800">Input Data</h1>
                <p>Qui culpa adipisicing minim ut minim deserunt aliquip cupidatat.</p>
                <div class="alert alert-info">
                    <p>Catatan:</p>
                    <p>
                        Jika hasil <b>Kuantitas Penggunaan Rata-Rata Selama Satu Tahun</b>
                        merupakan bilangan desimal, maka input dengan nilai desimalnya.
                    </p>
                    <p>Input angka desimal maksimal 2 angka dibelakang koma!</p>
                </div>
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
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr class="text-center">
                                   
                                    <th class="align-middle">Nama Bahan Baku</th>
                                    <th class="align-middle">Rata-Rata Pembelian Selama Setahun</th>
                                    <th class="align-middle">Total Kuantitas Penggunaan Selama <br> Satu Tahun (Kg)</th>
                                    <th class="align-middle">Biaya Pemesanan Bahan Baku</th>
                                    <th class="align-middle">Biaya Penyimpanan Per Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                   
                                    <td rowspan="5"><input type="text" class="form-control h-100" value="Tepung" name="bahan_baku">
                                    </td>
                                    <td rowspan="5"><input type="number" class="form-control h-100" value="1838" name="average_pembelian">
                                    </td>
                                    <td><input  type="number" class="form-control" value="21550" name="total_penggunaan_tahunan"></td>
                                    <td><input type="number" class="form-control" value="575000" name="biaya_pemesanan">
                                    </td>
                                    <td rowspan="5"><input type="number" class="form-control" value="1850" name="biaya_penyimpanan">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Maksimum Selama <br> Satu Tahun (Kg)</th>
                                    <th>Waktu yang dibutuhkan sampai bahan baku sampai (dalam hari)</th>
                                </tr>
                                <tr class="text-center">
                                    <td><input type="number" class="form-control" value="1950" name="max_penggunaan_tahunan"></td>
                                    <td rowspan="3" ><input type="number" class="form-control" value="3" name="leadtime"></td>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Rata-Rata Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <td ><input step="0.01" type="number" class="form-control" value="1795.83" name="average_penggunaan_tahunan"></td>
                                </tr>
                                <tr>
                                    
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
