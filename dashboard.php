

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="/img/icono.png">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
          
           background-image: url('carrusel/fibra.gif');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
        }

        .sidebar {
            height: 100%;
            width: 290px; 
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
            color: white;
            transition: width 0.3s;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar h2, .sidebar p {
            text-align: center;
        }

        .main-content {
            margin-left: 300px; 
            padding: 20px;
        }

        .logout-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            margin-top: 180px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #2980b9;
        }

        .toggle-sidebar-btn {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            position: fixed;
            top: 10px;
            left: 10px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard</h2>
       <p>Bienvenido, <?php echo $usuario; ?> </p>
        <a href="dashboard.php">Inicio</a>
        <a href="bienvenido.php">Realizar Contrato</a>
        <a href="registro.php">Registrar Nuevo Usuario</a>
        <a href="lista_usuarios.php">Lista de Usuarios</a>
        <a href="logout.php" class="logout-btn">Cerrar sesión</a>
    </div>

    <div class="main-content">
    
</div>


    
</body>
</html>
