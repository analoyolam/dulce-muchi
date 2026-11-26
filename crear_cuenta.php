<?php
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // recibe
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";
    $fecha_nacimiento = $_POST["fecha_nacimiento"] ?? "";
    $direccion = trim($_POST["direccion"] ?? "");

    // comprueba
    $fecha = DateTime::createFromFormat("!Y-m-d", $fecha_nacimiento);
    $fecha_valida = $fecha
        && $fecha->format("Y-m-d") == $fecha_nacimiento
        && $fecha <= new DateTime("today");

    // valida
    if ($nombre == "" || $direccion == "") {
        $mensaje = "Completa tu nombre y dirección";

    } elseif (strlen($nombre) > 100 || strlen($direccion) > 255) {
        $mensaje = "El nombre o la dirección son demasiado largos";

    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)
              || strlen($correo) > 254) {
        $mensaje = "Escribe un correo electrónico válido";

    } elseif (strlen($contrasena) < 8 || strlen($contrasena) > 72) {
        $mensaje = "La contraseña debe tener mínimo 12 cáractres";

    } elseif (!$fecha_valida) {
        $mensaje = "Escribe una fecha de nacimiento válida";

    } else {

        // guarda un hash de la contraseña
        $contrasena_protegida = password_hash(
            $contrasena,
            PASSWORD_DEFAULT
        );

        try {
            // Los signos ? recibirán los datos del formulario
            $consulta = mysqli_prepare(
                $conexion,
                "INSERT INTO usuarios
                (nombre, correo, contrasena, fecha_nacimiento,
                 numero_tarjeta, direccion, rol)
                VALUES (?, ?, ?, ?, '', ?, 'cliente')"
            );

            mysqli_stmt_bind_param(
                $consulta,
                "sssss",
                $nombre,
                $correo,
                $contrasena_protegida,
                $fecha_nacimiento,
                $direccion
            );

            mysqli_stmt_execute($consulta);
            mysqli_stmt_close($consulta);

            $mensaje = "¡Tu cuenta se creó correctamente!";

        } catch (mysqli_sql_exception $error) {

            if ($error->getCode() == 1062) {
                $mensaje = "Ese correo ya tiene una cuenta registrada.";
            } else {
                $mensaje = "No se pudo crear la cuenta. Intenta nuevamente.";
                error_log($error->getMessage());
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dulce Michi - Crear cuenta</title>

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
                <a class="nav-link" href="iniciar_sesion.php">Cuenta</a>
                   
                </a>
            </div>
        </div>
    </nav>

    <main class="container py-5">

        <h1>Crea tu cuenta 🐱</h1>
        <p class="lead">Forma parte de Dulce Michi.</p>

<?php if ($mensaje != "") { ?>
    <div class="alert alert-info" role="alert">
        <?php echo htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8"); ?>
    </div>
<?php } ?>

        <form action="crear_cuenta.php" method="post">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control"
                       id="nombre" name="nombre" maxlength="100" required>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control"
                       id="correo" name="correo" maxlength="254" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control"
                       id="contrasena" name="contrasena"
                       minlength="8" autocomplete="new-password" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">
                    Fecha de nacimiento
                </label>
                <input type="date" class="form-control"
                       id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control"
                       id="direccion" name="direccion" maxlength="255" required>
            </div>

            <button type="submit" class="btn btn-secondary">
                Crear cuenta
            </button>

            <a href="index.php" class="btn btn-outline-primary">
                Volver al inicio
            </a>
        </form>
    </main>
</body>
</html>