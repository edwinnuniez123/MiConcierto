<?php
$ruta = "ImagenesObras/"; // Indicar ruta
$filehandle = opendir($ruta); // Abrir archivos
while ($file = readdir($filehandle)) {
        if ($file != "." && $file != "..") {
                $tamanyo = GetImageSize($ruta . $file);
                echo "<p><img src='$ruta$file' $tamanyo[3]><br></p>\n";
        } 
} 
closedir($filehandle); // Fin lectura archivos
?>
