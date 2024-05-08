<?php
session_start();
include("conexion.php");

// Verificar si el usuario tiene privilegios (tipo 1)
if (isset($_SESSION['privilegios']) && $_SESSION['privilegios'] == true) {
    // Verificar si se proporciona el ID del usuario y la acción
    if (isset($_GET['id']) && isset($_GET['accion'])) {
        $id_usuario = $_GET['id'];
        $accion = $_GET['accion'];

        // Realizar la acción correspondiente
        switch ($accion) {
            case 'habilitar':
                $consulta_accion = "UPDATE usuarios SET estado='activo' WHERE id=$id_usuario";
                break;

            case 'deshabilitar':
                $consulta_accion = "UPDATE usuarios SET estado='inactivo' WHERE id=$id_usuario";
                break;

            case 'eliminar':
                $consulta_accion = "DELETE FROM usuarios WHERE id=$id_usuario";
                break;

            default:
                echo "Acción no válida.";
                exit();
        }

        $resultado_accion = mysqli_query($conexion, $consulta_accion);

        // Mensaje de respuesta
        if ($resultado_accion) {
            echo "Acción realizada correctamente.";
        } else {
            echo "Error al realizar la acción: " . mysqli_error($conexion);
        }
    } else {
        echo "Falta el ID del usuario o la acción.";
    }
} else {
    echo "No tienes permisos para acceder a esta página. <a href='/contratos/dashboard.php'>Volver al inicio</a>";
}

mysqli_close($conexion);
?>
