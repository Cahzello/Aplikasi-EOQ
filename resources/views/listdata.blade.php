@extends('main.main')


@section('container')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Hasil Perhitungan</h1>
        </div>
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
    </div>


    @if (empty($responses->count()))
        <div class="card mx-4 p-3 card-shadow">

            <div class="d-flex flex-column align-items-center justify-content-center">
                <h1 class="h2 text-dark">Belum Ada Data.</h1>
                <a href="/input-data">Klik disini untuk membuat data</a>
            </div>
        </div>
    @else
        <div class="py-2 bg-body-tertiary">
            <div class="container mx-0 ">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

                    @foreach ($responses as $response)
                        <div class="col my-2">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title">Bahan Baku {{ $response['bahan_baku'] }}</h3>
                                    <p class="card-text">Dibuat Tanggal: {{ $response['created_at']->format('d F Y') }}</p>
                                    <p class="card-text">Terakhir Update Tanggal:
                                        {{ $response['updated_at']->format('d F Y') }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('details', ['data' => $response]) }}"
                                                class="btn btn-primary">View</a>
                                        </div>
                                        <div>
                                            <small class="text-body-secondary">Created: </small>
                                            <small class="text-body-secondary">
                                                {{ $response['created_at']->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    @endif
@endsection
