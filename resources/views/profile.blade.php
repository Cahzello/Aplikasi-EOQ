@extends('main.main')

@section('container')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }

        .profile-container {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .profile-picture-container {
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .file-input {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }

        .file-label {
            cursor: pointer;
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .file-label-container {
            margin-left: 20px;
        }

        .file-label:hover {
            background-color: #0056b3;
        }

        .form-label {
            color: #343a40;
        }

        .btn-update {
            border: none;
            border-radius: 8px;
            padding: 5px 10px;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-update {
            background-color: #28a745;
            color: #fff;
        }

        .btn-update:hover {
            background-color: #218838;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: #fff;
            margin-right: 10px;
        }

        .btn-cancel:hover {
            background-color: #c82333;
        }
    </style>
    <div class="card mx-4 my-4 card-shadow">
        <div class="card-header d-flex">
            <a class="btn btn-primary " href="/home"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            <h3 class="mb-0 mx-4">User Profile</h3>
        </div>
        <div class="card-body">
            <form method="post" action="update_profile.php" enctype="multipart/form-data">
                <label for="usernmae" class="form-label">Change Username: </label>
                <div class="input-group mb-3">
                    <input type="username" value="{{ $response['username'] }}" class="form-control" placeholder="Enter your new username" id="username" name="username">
                </div>
                <input value="Update Username" type="submit" class="btn btn-success">
            </form>

            <form method="post" action="update_profile.php" enctype="multipart/form-data" class="mt-3">
                <label for="password" class="form-label">Change Password: </label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Enter your new password" id="password" name="password">
                    <button class="btn btn-outline-secondary" type="button" id="button-password"><i class="far fa-eye"></i></button>
                </div>
                <input value="Update Password" type="submit" class="btn btn-success">
            </form>


        </div>
    </div>
    <script>
        document.getElementById("button-password").addEventListener("click", function () {
            var passwordInput = document.getElementById("password");
            var buttonIcon = document.querySelector("#togglePassword i");
    
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                buttonIcon.classList.remove("far", "fa-eye");
                buttonIcon.classList.add("fas", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                buttonIcon.classList.remove("fas", "fa-eye-slash");
                buttonIcon.classList.add("far", "fa-eye");
            }
        });
    </script>
    <script>
        function previewFile() {
            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('profile-picture');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            file ? reader.readAsDataURL(file) : preview.src = "icon.jpg";
        }
    </script>
@endsection
