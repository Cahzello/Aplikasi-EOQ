@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <a class="btn btn-primary mb-4" href="/data"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
                <h1 class="h2 mb-4 text-gray-800">Edit Data {{ $response->bahan_baku }} </h1>
                <p>Qui culpa adipisicing minim ut minim deserunt aliquip cupidatat.</p>
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
                <form action="{{ route('update', ['data' => $response['id']]) }}" method="post">
                    @csrf
                    @method('put')
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
                                    <td rowspan="5"><input type="text" class="form-control h-100"
                                            value="{{ $response->bahan_baku }}" name="bahan_baku">
                                    </td>
                                    <td><input type="number" class="form-control"
                                            value="{{ $response->total_penggunaan_tahunan }}"
                                            name="total_penggunaan_tahunan"></td>
                                    <td rowspan="5"><input type="number" class="form-control"
                                            value="{{ $response->biaya_pemesanan }}" name="biaya_pemesanan">
                                    </td>
                                    <td rowspan="5"><input type="number" class="form-control"
                                            value="{{ $response->biaya_penyimpanan }}" name="biaya_penyimpanan">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Maksimum Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <td><input type="number" class="form-control"
                                            value="{{ $response->max_penggunaan_tahunan }}" name="max_penggunaan_tahunan">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Kuantitas Penggunaan Rata-Rata Selama <br> Satu Tahun (Kg)</th>
                                </tr>
                                <tr class="text-center">
                                    <td><input type="number" class="form-control"
                                            value="{{ $response->average_penggunaan_tahunan }}"
                                            name="average_penggunaan_tahunan"></td>
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
