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
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h1 class="h2 text-dark">Belum Ada Data.</h1>
                    <a href="/input-data">Klik disini untuk membuat data</a>
                </div>
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
                        <div class="d-flex">
                            <a href="{{ route('edit', ['data' => $response]) }}" class="btn btn-primary">Edit Data</a>
                            <form action="{{route('delete', ['data' => $response['id']])}}" method="POST" class="px-2">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Delete Data"  class="btn btn-danger" onclick="confirm('Apakah anda mau menghapus data ini?')">
                            </form>
                        </div>
                    </div>
                    <hr>
                    <br>
                @endforeach
            @endif
        </div>
    </div>

@endsection
