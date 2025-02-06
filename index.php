<?php
session_start();
include "config.php";

// Check if the session variable is set
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($user_id) {
    $query = "SELECT * FROM tbtodo WHERE user_id = '$user_id'";
    $hasil = mysqli_query($mysqli, $query);
} else {
    echo "<p style='color: red; text-align: center;'>User not logged in or session expired.</p>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #2a3166 !important;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }
        .container-fluid {
            padding: 20px;
        }
        .content-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #2a3166;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #1a1f4d;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Todo List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?halaman=home" title="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=todo" title="todo">Todo</a>
                    </li>
                </ul>
                <!-- Tombol Login di sebelah kanan -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= isset($_SESSION['user']) ? 'logout.php' : 'login.php' ?>">
                            <?= isset($_SESSION['user']) ? 'Logout' : 'Login' ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 content-box">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == 'home') {
                        include "home/home.php";
                    } else if ($_GET['halaman'] == 'todo') {
                        include "todo/todo.php";
                    } else if ($_GET['halaman'] == 'edit_todo') {
                        include "todo/edit_todo.php";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".alert").delay(200).slideUp(400, function(){
            $(this).alert('close');
        });
    </script>
</body>
</html>