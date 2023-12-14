@extends('main.main')

@section('auth')
    <div class="row justify-content-center">

        <div class="card o-hidden border-0 shadow-lg my-5 col-xl-6">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5 text-center">
                            <div class="text-center">
                                <h1 class="h-2 text-black">Error 404</h1>
                            </div>
                            <div>
                                <p>Check if URL is correct.</p>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('login') }}">To Login Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
