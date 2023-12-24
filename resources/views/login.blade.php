@extends('main.main')

@section('login')
<style>
    section {
      background-color: #f8f9fa; /* Light gray background */
    }

    .card {
      border: 1px solid #dee2e6; /* Light gray border */
      border-radius: 15px; /* Rounded corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift */
    }

    .btn-primary {
      background-color: #007bff; /* Primary button color */
      border: 1px solid #007bff; /* Primary button border color */
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Darker color on hover */
    }

    .btn-danger {
      background-color: #dc3545; /* Danger button color */
      border: 1px solid #dc3545; /* Danger button border color */
    }

    .btn-danger:hover {
      background-color: #c82333; /* Darker color on hover */
    }
  </style>
</head>

<body>

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <div class="card border-0">
            <div class="card-body p-0 text-center">
              <img src="LOGO/black/180x180.svg"
                class="img-fluid mx-auto" alt="Phone image" style="max-width: 80%;">
            </div>
          </div>
        </div>
         <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <div class="card border-0">
            <div class="card-body p-4">
              <h1 class="h4 text-gray-900 mb-4">Hello, Welcome back!!</h1>
              <form class="mb-3">
                <!-- Email input -->
                <div class="form-group">
                  <label class="form-label" for="form1Example13">Email address</label>
                  <input type="email" id="form1Example13" class="form-control form-control-lg" />
                </div>

                <!-- Password input -->
                <div class="form-group">
                  <label class="form-label" for="form1Example23">Password</label>
                  <input type="password" id="form1Example23" class="form-control form-control-lg" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>

                <!-- Google login button with attractive color -->
                <button type="button" class="btn btn-danger btn-lg btn-block" id="loginWithGoogle">
                  <i class="fab fa-google fa-fw"></i> Login with Google
                </button>
              </form>
              <div class="text-center">
                <a class="small" href="/register">Create an Account!</a>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </section>
@endsection
