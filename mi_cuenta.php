<?php
session_start();

// Si no inició sesión, regresar al formulario
if (!isset($_SESSION["id_usuario"])) {
    header("Location: iniciar_sesion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dulce Michi - Mi cuenta</title>

    <link rel="stylesheet"
          href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>

<body>
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Dulce Michi</a>
        </div>
    </nav>

    <main class="container py-5">
        <h1>
            ¡Hola,
            <?php echo htmlspecialchars(
                $_SESSION["nombre"],
                ENT_QUOTES,
                "UTF-8"
            ); ?>! 🐱
        </h1>

        <p class="lead">Has iniciado sesión en Dulce Michi.</p>

        <a href="index.php" class="btn btn-primary">Ir al inicio</a>
    </main>
</body>
</html>