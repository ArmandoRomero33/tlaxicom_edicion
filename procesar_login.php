//<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Sentencia preparada para evitar inyección SQL
$consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$consulta->bind_param("s", $usuario);
$consulta->execute();
$resultado = $consulta->get_result();

// ... (código anterior)
// ... (código anterior)

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($contrasena, $fila['contrasena'])) {
        // Verificar si el usuario está activo o inhabilitado
        if ($fila['estado'] == 'activo') {
            $_SESSION['usuario'] = $usuario;

            // Verificar si el usuario tiene privilegios
            $_SESSION['privilegios'] = ($fila['privilegios'] == 1);

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Tu cuenta está inhabilitada. Contacta al administrador. <a href='index.php'>Volver a intentar</a>";
        }
    } else {
        echo "Inicio de sesión incorrecto. <a href='index.php'>Volver a intentar</a>";
    }
} else {
    echo "Inicio de sesión incorrecto. <a href='index.php'>Volver a intentar</a>";
}

$consulta->close();
mysqli_close($conexion);

