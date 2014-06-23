<?php
     


      
        session_start();	
        require_once('auth.php'); 
  
      
    ?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir Fotos</title>
     <link rel="stylesheet" href="estilo.css" type="text/css" media="screen" />
</head>
<body>
<header>
         
        
          
            
          
            
            <div>
            <?php
              echo "<h1 align='center'>" .$_SESSION['NOMBRE']."</h1>"; 
              echo "<h2 align='center'>" . $_SESSION['SESS_FIRST_NAME']."</h2>";
            ?> 
            </div>  
       
            
               
            
        </header>

         <div>
        <nav>
            <!-- Navegación -->
            <ul>
             <li><a href ="MiPagina.php">Crear Evento</a>  
             <li><a href ="evento.php">MiPagina</a></li>  
             <li><a href ="inicio.php">Inicio</a></li>  
             <li><a href="login.php">Logout</a></li>

            </ul> 
        </nav>
        <h1></h1>
        <h1></h1>
         <h3>Cargar Fotos</h3>
<div align="center" id="est">
<form id="form1" name="form1" method="post" action="cargarfotos.php?accion=recibir" enctype="multipart/form-data">
         <p>Seleccione la Imagen:
            <input type="file" name="imagen"/>
         </p>
     
        <input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" />
  
        <p>&nbsp;</p>
    </form>
</div>
<?php 
             if($_GET['accion']=="recibir") {
             $ideventoPorUsuario = $_SESSION['IdeventoPorUser'];
             $conexion=mysql_connect('localhost','root','programacion') or die('No hay conexión a la base de datos');
             $db=mysql_select_db('myconcert',$conexion)or die('no existe la base de datos.');

             $rutaEnServidor='imagenes';
             $rutaTemporal=$_FILES['imagen']['tmp_name'];
             $nombreImagen=$_FILES['imagen']['name'];
             $rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
             move_uploaded_file($rutaTemporal,$rutaDestino);

            

             $sql="INSERT INTO fotosPorEventoPorUsuario (ideventoPorUsuario,foto) values('".$ideventoPorUsuario. "','".$rutaDestino."')";
             $res=mysql_query($sql,$conexion);

             if ($res){
	       echo 'inserción con exito';
             }else{
               echo 'no se puedo insertar';
             } 

        }
?>


</body>
</html> 


