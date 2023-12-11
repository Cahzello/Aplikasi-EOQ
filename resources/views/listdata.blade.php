@extends('main.main')


@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div class="brand-icon px-3">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <h4>
                        {{ session('success') }}
                    </h4>
                </div>
            </div>
        @endif
        <div class="card-body">
            @if (empty($responses->count()))
                <h1 class="h2 text-dark mb-4">No Data Available</h1>
            @else
                @foreach ($responses as $response)
                    <h1 class="h2 text-dark mb-4">Hasil Perhitungan Bahan Baku {{ $response['bahan_baku'] }}</h1>
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
                    <hr>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
@endsection
