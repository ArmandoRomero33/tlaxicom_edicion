<?php
// Incluir la biblioteca de PHP QR Code
include 'phpqrcode/qrlib.php';


$websiteURL = 'https://www.tlaxicom.com/';


$dir = 'qr_codes/';

// Crear el directorio si no existe
if (!file_exists($dir)) {
    mkdir($dir);
}

$fileName = $dir . 'codigo_qr.png';

// Tamaño y nivel de corrección del código QR
$size = 10;
$level = 'H';

QRcode::png($websiteURL, $fileName, $level, $size);


echo '<img src="' . $fileName . '" alt="Código QR">';
?>
