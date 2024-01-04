@extends('main.main')

@section('container')
    <div class="card card-shadow mx-4 my-4 ">
        <div class="card-header ">
            <a class="btn btn-primary mb-4" href="/data"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            <h1 class="text-gray-800">Data User {{ $response['username'] }}</h1>
        </div>
        @if (session()->has('success'))
            <div class="mx-4 my-0">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>

            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('edit_role', ['data' => $response]) }}" method="post">
                @method('post')
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username: </span>
                    <input type="text" value="{{ $response['username'] }}" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email: </span>
                    <input type="text" value="{{ $response['email'] }}" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Role: </span>
                    <input type="text" value="{{ $response['role'] }}" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Change Role: </span>
                    <select name="role" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            <hr>
            <form action="{{route('delete_acc_by_admin', ['data' => $response])}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete Account" onclick="return confirm('Apakah anda mau menghapus akun ini? ')">
                <div class="alert alert-danger my-3">
                    <p>This action take delete the account and all records data have been created.</p>
                </div>
            </form>
        </div>
    </div>
@endsection
