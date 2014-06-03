<?php
echo "<meta http-equiv=content-type content=text/html; charset=UTF-8 />" ;
$conexion = mysql_connect("localhost", "root", "programacion");

mysql_select_db("myconcert", $conexion);
echo "Usuario " . $_POST['usuario'];
echo "Contraseña " . $_POST['contrasenia'] ;
if($_POST['usuario'] && $_POST['contrasenia']) {

     $sql="SELECT * FROM usuario WHERE usuario='".$_POST['usuario']."' AND contrasenia='".$_POST['contrasenia']."'";

     $resultado=mysql_query($sql, $conexion) or die ("Error");

     $numRegistros=mysql_num_rows($resultado);

     if($numRegistros==0) {

        echo "Error, no existen registros que coincidan con tu usuario y contraseña";

     } else {

        echo "Login exitoso";

     }
} else {

   echo "Introduce user y password para loguearte";

}

?>
