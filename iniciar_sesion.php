<?php
session_start();
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST["correo"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";

    if ($correo == "" || $contrasena == "") {
        $mensaje = "Completa tu correo y contraseña.";

    } else {
        $consulta = mysqli_prepare(
            $conexion,
            "SELECT id_usuario, nombre, contrasena, rol
             FROM usuarios WHERE correo = ?"
        );

        mysqli_stmt_bind_param($consulta, "s", $correo);
        mysqli_stmt_execute($consulta);

        $resultado = mysqli_stmt_get_result($consulta);
        $usuario = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($consulta);

        if (!$usuario) {
            $mensaje = "Prueba: no se encontró el correo en esta base de datos.";

        } elseif (password_verify($contrasena, $usuario["contrasena"])) {
            session_regenerate_id(true);

            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["rol"] = $usuario["rol"];

            header("Location: mi_cuenta.php");
            exit;

        } else {
            $mensaje = "Prueba: se encontró el correo, pero la contraseña no coincide.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dulce Michi - Iniciar sesión</title>

    <link rel="stylesheet"
          href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>

<body>

    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Dulce Michi</a>

            <div class="navbar-nav flex-row gap-3">
                <a class="nav-link" href="index.php">Inicio</a>
                <a class="nav-link" href="carrito.php">Carrito</a>
                <a class="nav-link active" href="iniciar_sesion.php">Cuenta</a>
            </div>
        </div>
    </nav>

    <main class="container py-5">

        <h1>Inicia sesión 🐱</h1>
        <p class="lead">¡Qué gusto tenerte de vuelta en Dulce Michi!</p>

        <?php if ($mensaje != "") { ?>
    <div class="alert alert-info">
        <?php echo htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8"); ?>
    </div>
<?php } ?>

        <form action="iniciar_sesion.php" method="post">

            <div class="mb-3">
                <label for="correo" class="form-label">
                    Correo electrónico
                </label>

                <input type="email" class="form-control"
                       id="correo" name="correo"
                       maxlength="254" autocomplete="username" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">
                    Contraseña
                </label>

                <input type="password" class="form-control"
                       id="contrasena" name="contrasena"
                       autocomplete="current-password" required>
            </div>

            <button type="submit" class="btn btn-secondary">
                Iniciar sesión
            </button>

            <p class="mt-3">
                ¿Todavía no tienes cuenta?
                <a href="crear_cuenta.php">Crear cuenta</a>
            </p>

        </form>

    </main>

</body>
</html>