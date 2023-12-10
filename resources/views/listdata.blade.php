@extends('main.main')


@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">
        <div class="card-body">
            <h1 class="h2 text-dark mb-4">Hasil Perhitungan Bahan Baku {{$response['bahan_baku']}}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-dark">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" class="align-middle">Metode EOQ</th>
                            <th rowspan="2" class="align-middle">Safety Stock</th>
                            <th rowspan="2" class="align-middle">Reorder Point</th>
                        </tr>
                        <tr class="text-center">
                            <th class="align-middle">Pembelian</th>
                            <th class="align-middle">Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="align-middle">{{ $response['eoq'] }}</td>
                            <td class="align-middle">{{ $response['frekuensi'] }}</td>
                            <td class="align-middle">{{ $response['safety_stock'] }}</td>
                            <td class="align-middle">{{ $response['rop'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
