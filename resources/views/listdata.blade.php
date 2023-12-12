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
                <div class="d-flex align-items-center justify-content-center">
                    <h1 class="h2 text-dark">No Data Available</h1>
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
                        <div>
                            <a href="{{ route('edit', ['data' => $response]) }}" class="btn btn-primary">Edit Data</a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Data</button>
                        </div>
                    </div>
                    <hr>
                    <br>
                @endforeach
            @endif
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda mau menghapus data ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
