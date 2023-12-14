@extends('main.main')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-7">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-warning">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                @endif
                                <form action="{{ route('register') }}" method="POST" class="user">
                                    @method('post')
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user"
                                                name="username" id="exampleFirstName" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                            name="email" placeholder="Email Address">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                name="repeatedpw" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <input class="btn btn-user btn-block btn-primary" type="submit" value="Regsiter">
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
