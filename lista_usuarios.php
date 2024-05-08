<?php
session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
      <link rel="icon" href="/img/icono.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            text-align: center;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .message-container {
            background-color: #f44336;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            
            
            
        }
     

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0991cf;
            color: white;
        }

        .habilitar, .deshabilitar, .eliminar {
            display: inline-block;
            padding: 8px 12px;
            margin: 4px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .habilitar {
            background-color: #4caf50;
            color: white;
        }

        .deshabilitar {
            background-color: #ff9800;
            color: white;
        }

        .eliminar {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<?php
// Verificar si el usuario tiene privilegios (tipo 1)
if (isset($_SESSION['privilegios']) && $_SESSION['privilegios'] == true) {
    // Obtener todos los usuarios de la base de datos
    $consulta_usuarios = "SELECT * FROM usuarios";
    $resultado_usuarios = mysqli_query($conexion, $consulta_usuarios);

    if ($resultado_usuarios) {
        ?>
        <h2>Lista de Usuarios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            <?php
            while ($fila = mysqli_fetch_assoc($resultado_usuarios)) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['usuario'] . "</td>";
                echo "<td>" . $fila['estado'] . "</td>";
                echo "<td>";
                echo "<a class='habilitar' href='procesar_accion_usuario.php?id=" . $fila['id'] . "&accion=habilitar'>Habilitar</a>";
                echo "<a class='deshabilitar' href='procesar_accion_usuario.php?id=" . $fila['id'] . "&accion=deshabilitar'>Deshabilitar</a>";
                echo "<a class='eliminar' href='procesar_accion_usuario.php?id=" . $fila['id'] . "&accion=eliminar'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>

        </table>

        <?php
    } else {
        echo "<div class='message-container'>Error al obtener la lista de usuarios: " . mysqli_error($conexion) . "</div>";
    }
} else {
    echo "<div class='message-container'>No tienes permisos para acceder a esta página. <a href='dashboard.php'>Volver al inicio</a></div>";
}
?>

</body>
</html>
