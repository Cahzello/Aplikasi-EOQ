<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">User Profile</h3>
            </div>
            <div class="card-body">
                <form method="post" action="update_profile.php" enctype="multipart/form-data">
                    <div class="profile-container">
                        <div class="profile-picture-container">
                            <img src="icon.jpg" alt="Profile Picture" class="profile-picture" id="previewImage">
                        </div>
                        <div class="file-label-container">
                            <div class="border-text">Max size photo 512x512 <br> bisa ganti PP</div>
                            <label for="profile-picture" class="file-label mt-1">Choose File
                                <input type="file" class="form-control file-input" id="profile-picture" name="profile_picture" accept="image/*" onchange="previewFile()">
                            </label>
                        </div>
                    </div>
                </form>

                <form method="post" action="update_profile.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        <button type="button" class="btn btn-update mt-1">Update Username</button>
                    </div>
                </form>

                <form method="post" action="update_profile.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        <button type="button" class="btn btn-update mt-1">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewFile() {
            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('profile-picture');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            file ? reader.readAsDataURL(file) : preview.src = "icon.jpg";
        }
    </script>
</body>
</html>
