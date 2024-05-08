<?php
session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
      <link rel="icon" href="/img/icono.png">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .success-message {
            color: #4CAF50;
            font-size: 18px;
            font-weight: bold;
        }

        .link {
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>

<body>
    <?php
session_start();
include("conexión.php");

$nuevo_usuario = $_POST['nuevo_usuario'];
$nueva_contrasena = $_POST['nueva_contrasena'];
$tipo_usuario = $_POST['tipo_usuario'];
$con_privilegios = (int)$_POST['con_privilegios'];

$consulta_existencia = "SELECT * FROM usuarios WHERE usuario='$nuevo_usuario'";
$resultado_existencia = mysqli_query($conexion, $consulta_existencia);

if (mysqli_num_rows($resultado_existencia) == 0) {
    // El usuario no existe, entonces podemos agregarlo con el tipo de usuario y privilegios
    $contrasena_encriptada = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

    $consulta_agregar = "INSERT INTO usuarios (usuario, contrasena, estado, privilegios) VALUES ('$nuevo_usuario', '$contrasena_encriptada', '$tipo_usuario', $con_privilegios)";
    $resultado_agregar = mysqli_query($conexion, $consulta_agregar);

    if ($resultado_agregar) {
        echo "<div class='contenedor'>";
        echo "<p class='success-message'>Usuario registrado correctamente.</p>";
        echo "<p><a href='registro.php' class='link'>Volver a intentar</a></p>";
        echo "</div>";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conexion);
    }
} else {
    echo "El usuario ya existe. <a href='registro.php'>Volver a intentar</a>";
}

mysqli_close($conexion);
?>

</body>

</html>
