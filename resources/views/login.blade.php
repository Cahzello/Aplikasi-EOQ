@extends('main.main')

@section('login')
    <style>
        body {
            background-color: #f8f9fa;
            /* Light gray background */
        }

        .card {
            border: 1px solid #dee2e6;
            /* Light gray border */
            border-radius: 15px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Box shadow for a subtle lift */
        }

        .btn-primary {
            background-color: #007bff;
            /* Primary button color */
            border: 1px solid #007bff;
            /* Primary button border color */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Darker color on hover */
        }

        .btn-danger {
            background-color: #dc3545;
            /* Danger button color */
            border: 1px solid #dc3545;
            /* Danger button border color */
        }

        .btn-danger:hover {
            background-color: #c82333;
            /* Darker color on hover */
        }
    </style>


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="card border-0">
                        <div class="card-body p-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                class="img-fluid" alt="Phone image">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="card border-0">
                        <div class="card-body p-4">
                            <h1 class="h4 text-gray-900 mb-4">Hello, Welcome back!!</h1>
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
                            @if (session()->has('success'))
                                <div class="alert alert-sucesss alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('login') }}" method="POST" class="mb-3">
                                @method('post')
                                @csrf
                                <!-- Email input -->
                                <div class="form-group">
                                    <label class="form-label" for="form1Example13">Username!</label>
                                    <input name="username" type="text" id="form1Example13"
                                        class="form-control form-control-lg" />
                                </div>

                                <!-- Password input -->
                                <div class="form-group">
                                    <label class="form-label" for="form1Example23">Password</label>
                                    <input name="password" type="password" id="form1Example23"
                                        class="form-control form-control-lg" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                            </form>
                            <div class="text-center">
                                <a class="small" href="{{ route('showRegis') }}">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
