<?php
echo "<meta http-equiv=content-type content=text/html; charset=UTF-8 />" ;
if($_GET['accion']=="registrar") {

   /*Esto quiere decir que se está enviando el formulario y hay que registrar */

   $user=$_POST['usuario'];
   $pass1=$_POST['contrasenia'];
   $pass2=$_POST['contrasenia2'];


   if($pass1==$pass2) {
       /*Si las passwords coindicen registramos:*/

       $conexion = mysql_connect("localhost", "root", "programacion");

       mysql_select_db("myconcert", $conexion);

       $sql="INSERT INTO usuario (usuario, contrasenia) VALUES ('".$user."', '".$pass1."')";

       mysql_query($sql, $conexion) or die ("Error al insertar datos ". mysql_error());

       echo "Registro exitoso<br><a href=indexlogin.html>Hacer login</a>";
   } else {
       die("Error, las password no coinciden");
   }
} else { ?><html><head><title>Registro</title></head>
<body>
Formulario de registro de usuarios
<form action="registro.php?accion=registrar" method="POST">
Introduce usuario: <input type="text" name="usuario"><br>
Introduce password: <input type="password" name="contrasenia"><br>
Confirma password: <input type="password" name="contrasenia2"><br>

<input type="submit" value="Registrar">
</form>
</body>
</html>
<?php 
}
?>
