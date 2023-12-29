@extends('main.main')

@section('login')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            background-color: #ffffff;
            border-radius: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>

    <section class="vh-100 bg-white">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }} <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('register') }}" method="POST" class="mx-1 mx-md-4">
                                        @method('post')
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-user fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="text" id="form3Example1c" class="form-control"
                                                    value="{{ old('username') }}" name="username"
                                                    placeholder="Your Username" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="email" id="form3Example3c" class="form-control"
                                                    value="{{ old('email') }}" name="email" placeholder="Your Email" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-lock fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="password" id="form3Example4c" class="form-control"
                                                    name="password" placeholder="Password" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-key fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="password" id="form3Example4cd" class="form-control"
                                                    name="repeatedpw" placeholder="Repeat your password" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="/login">already have an account?</a>
                                    </div>
                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex flex-column justify-content-center align-items-center order-1 order-lg-2">
                                    <img src="LOGO/black/180x180.svg" class="img-fluid mx-auto" alt="Phone image"
                                        style="max-width: 80%;">
                                    <h1 id="title-company" class="text-dark">Shid<img src="LOGO/black/64X64.svg"
                                            class="img-fluid mx-auto" alt="Phone image" style="max-width: 80%;">ia
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
