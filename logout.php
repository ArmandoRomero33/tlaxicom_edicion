<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión (o a cualquier otra página después del cierre de sesión)
header("Location: index.php");
exit();
?>
