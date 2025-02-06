<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<!--content-->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-3" style="min-height: 400px;">
            <div class="col-md-10 bg-success-subtitle p-4">
                 <!-- Selamat Datang -->
                 <?php if (isset($_SESSION['user'])): ?>
  <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
    <h3 class="text-center">Selamat datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h3>
  </div>
<?php endif; ?>

            </div>
        </div>
    </div>
<!--content-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>