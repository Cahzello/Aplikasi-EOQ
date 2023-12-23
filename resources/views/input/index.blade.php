@extends('main.main')

@section('container')
    <div class="card mx-4 my-4 p-4 card-shadow">

        <div class="card-shadow-mb4">
            <div class="card-header">
                <h1 class="h2 mb-4 text-gray-800">Input Data</h1>
                <p>Input nama bahan baku.</p>
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
                <form action="{{ route('store') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="input-group d-flex flex-column mb-2">
                        <label for="bahan_baku" class="form-label">Nama Bahan Baku: </label>
                        <div class="input-group mb-3 w-50">
                            <input type="text" value="" class="form-control" id="bahan_baku" name="bahan_baku">
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-success">
                </form>
            </div>

        </div>


    </div>
@endsection
