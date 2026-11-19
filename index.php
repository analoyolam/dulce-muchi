<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasteleria (inicio)</title>

    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-sm bg-primary" data-bs-theme="dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">Dulce Michi</a>

        <div class="navbar-nav flex-row flex-wrap gap-3">
            <a class="nav-link" href="index.php">Inicio</a>
            <a class="nav-link" href="catalogo.php">Pasteles</a>
            <a class="nav-link" href="carrito.php">🛒 Carrito</a>
        </div>

    </div>
</nav>
    <main class="container py-5">
    <div class = card>
        <div class="card-body text-center">
            <h1>Dulce Michi<h1>
                 <p class="lead">
        Pasteles para tus momentos especiales
                 </p>
        </div>
    </div>

<!-- carrusel adaptado -->
<div id="pastelitos" class="carousel slide mt-4"
     data-bs-ride="carousel">

    <div class="carousel-inner rounded">

        <div class="carousel-item active" data-bs-interval="4000">
            <img src="imagenes/pastel1.jpg"
                 class="d-block w-100"
                 style="height: 400px; object-fit: contain; background-color: #fff0f3;"
                 alt="Primer pastel de Dulce Michi">
        </div>

        <div class="carousel-item" data-bs-interval="4000">
            <img src="imagenes/pastel2.jpg"
                 class="d-block w-100"
                 style="height: 400px; object-fit: contain; background-color: #fff0f3;"
                 alt="Segundo pastel de Dulce Michi">
        </div>

        <div class="carousel-item" data-bs-interval="4000">
            <img src="imagenes/pastel3.jpg"
                 class="d-block w-100"
                 style="height: 400px; object-fit: contain; background-color: #fff0f3;"
                 alt="Tercer pastel de Dulce Michi">
        </div>

    </div>

    <button class="carousel-control-prev" type="button"
            data-bs-target="#pastelitos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-secondary rounded"
              aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>

    <button class="carousel-control-next" type="button"
            data-bs-target="#pastelitos" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-secondary rounded"
              aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>

</div>
    
</main>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>