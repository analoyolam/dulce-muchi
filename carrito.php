<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dulce Michi - Carrito</title>

    <link rel="stylesheet"
          href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>

<body>

    <!-- Menú de navegación -->
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container">

            <a class="navbar-brand" href="index.php">
                Dulce Michi
            </a>

            <div class="navbar-nav flex-row flex-wrap gap-3">
                <a class="nav-link" href="index.php">Inicio</a>
                <a class="nav-link" href="carrito.php">🛒 Carrito</a>
                <a class="nav-link" href="iniciar_sesion.php">Cuenta</a>
            </div>

        </div>
    </nav>
    
<main class="container py-5">

    <h1>Mi carrito 🛒</h1>
    <p class="lead">Tus pastelitos favoritos, en un solo lugar.</p>

    <div class="row g-4 mt-3">

        <!--productos -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center py-5">

                    <h2 class="h4">Tu carrito está vacío</h2>

                    <p>
                        Todavía no has seleccionado ningún pastelito.
                    </p>

                    <a href="index.php" class="btn btn-secondary">
                        Volver al inicio
                    </a>

                </div>
            </div>
        </div>

        <!-- resumen de compra -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <h2 class="h4">Resumen de compra</h2>
                    <hr>

                    <p>Artículos: 0</p>

                    <div class="d-flex justify-content-between">
                        <strong>Total:</strong>
                        <strong>$0.00 MXN</strong>
                    </div>

                    <button type="button"
                            class="btn btn-secondary w-100 mt-4"
                            disabled>
                        Finalizar compra
                    </button>

                    <p class="small text-muted mt-3 mb-0">
                        Agrega productos para continuar.
                    </p>

                </div>
            </div>
        </div>

    </div>

</main>
