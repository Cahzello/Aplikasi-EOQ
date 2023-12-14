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
</head>

<body>

    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <form class="mx-1 mx-md-4">

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="text" id="form3Example1c" class="form-control" placeholder="Your Name" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="email" id="form3Example3c" class="form-control" placeholder="Your Email" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="password" id="form3Example4c" class="form-control" placeholder="Password" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-key fa-lg fa-fw"></i></span>
                                                </div>
                                                <input type="password" id="form3Example4cd" class="form-control" placeholder="Repeat your password" />
                                            </div>
                                        </div>

                                        <!-- <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree to all statements in <a href="#!" style="color: #007bff;">Terms of service</a>
                    </label>
                  </div> -->

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="/login">Create an Account!</a>
                                    </div>
                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection