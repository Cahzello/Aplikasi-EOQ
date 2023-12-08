@extends('main.main')


@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">
        <div class="card-body">
            <h1 class="h2 text-dark">Hasil Perhitungan Bahan Baku {{$response['namaBahanBaku']}}</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" class="align-middle">Metode EOQ</th>
                        </tr>
                        <tr class="text-center">
                            <th class="align-middle">Pembelian</th>
                            <th class="align-middle">Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="align-middle">{{ $response['totalEOQ'] }}</td>
                            <td class="align-middle">{{ $response['frekuensi'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
