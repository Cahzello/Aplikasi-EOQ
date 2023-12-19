@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">
        <div class="card-body">
            <div class="d-flex justify-content-evenly">
                <a class="btn btn-primary mb-4" href="/data"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            </div>
            <div id="section-print" class="mb-3 table-responsive">
                <h1 class="h2 text-dark mb-4 mx-3">Hasil Perhitungan Bahan Baku {{ $response['bahan_baku'] }}</h1>
                <table class="table table-striped table-bordered text-dark">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" class="align-middle">Metode Konvensional</th>
                            <th colspan="2" class="align-middle">Metode EOQ</th>
                            <th colspan="2" class="align-middle">Selisih Kuantitas</th>
                        </tr>
                        <tr class="text-center">
                            <th class="align-middle">Pembelian</th>
                            <th class="align-middle">Frekuensi</th>
                            <th class="align-middle">Pembelian</th>
                            <th class="align-middle">Frekuensi</th>
                            <th class="align-middle">Pembelian</th>
                            <th class="align-middle">Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="align-middle">{{ $response['average_pembelian'] }}</td>
                            <td class="align-middle">{{ $response['frekuensi_konvensional'] }}</td>
                            <td class="align-middle"> {{ $response['eoq'] }} </td>
                            <td class="align-middle">{{ $response['frekuensi'] }} </td>
                            <td class="align-middle">{{ $response['eoq'] - $response['average_pembelian'] }} </td>
                            <td class="align-middle">
                                {{ $response['frekuensi_konvensional'] - $response['frekuensi'] }} </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-25 table table-striped table-bordered text-dark">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Safety Stock</th>
                            <th class="align-middle">Reorder Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="align-middle">{{ $response['safety_stock'] }}</td>
                            <td class="align-middle">{{ $response['rop'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex">
                <a href="{{ route('edit', ['data' => $response]) }}" class="btn btn-primary">Edit Data</a>
                <form action="{{ route('delete', ['data' => $response['id']]) }}" method="POST" class="px-2">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete Data" class="btn btn-danger"
                        onclick="return confirm('Apakah anda mau menghapus data ini?')">
                </form>
                <button id="button-print" class="btn btn-success">Print Data</button>
            </div>

        </div>
    </div>
@endsection
