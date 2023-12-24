@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <a href="/rekapan-bulanan/data/{{ $response->id }}" class="btn btn-primary mb-3"><i
                        class="fas fa-fw fa-arrow-left"></i> Back</a>
                <h1 class="h2 mb-4 text-gray-800">Edit Data Nama Bahan Baku {{ $response->bahan_baku }} </h1>
                <p>Edit Data Bahan Baku Bulan {{ $response->bahan_baku }} </p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="mx-4 my-4">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>

                    </div>
                @endif
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @method('post')
                    @csrf
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="bahan_baku" class="form-label">Nama Bahan Baku Yang Baru: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="text" value=""  class="form-control" id="bahan_baku" name="bahan_baku" autocomplete="off">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>

        </div>


    </div>
@endsection
