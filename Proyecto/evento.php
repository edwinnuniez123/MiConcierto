<?php
       session_start();
       require_once('auth.php');     
       
?>

<html> 
  <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="estilo.css" type="text/css" media="screen" />
     <title>MiPagina</title>
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

      <?php
          $idusuario = $_SESSION['SESS_MEMBER_ID'];
       $ideventoPorUsuario = $_SESSION['IdeventoPorUser'];
       $con = mysqli_connect("localhost", "root","programacion","myconcert");
         if (mysqli_connect_errno($con)){
           echo "Error";
          }else{
       $query = "SELECT A.nombreartista, T.nombretour, E.venue, E.fecha FROM 
                     artista A JOIN tour T ON A.idartista = T.idartista  
                               JOIN evento E ON E.idtour = T.idtour
                               JOIN eventosPorUsuario EU ON EU.idevento = E.idevento               
                     WHERE EU.idusuario = '$idusuario'";
            $result = mysql_query($query,$con)

        $query1 = "SELECT F.foto FROM
                   eventosPorUsuario EU JOIN fotoPorEventoPorUsuario FEU ON EU.ideventoPorUsuario = FEU.ideventoPorUsuario
                   WHERE EU.ideventoPorUsuario = '$ideventoPorUsuario'";
        $result1 = mysql_query($query1,$con);
            echo "<table border = '1'> "; 
            
            while ($row = mysql_fetch_assoc($result)){
	       echo "<tr>";
	       echo "<td>" . $row['nombreartista'] . "</td>";
	       echo "<td>" . $row['nombretour'] . "</td>";
               echo "<td>" . $row['venue'] . "</td>";
               echo "<td>" . $row['fecha'] . "</td>";
               
	       echo "</tr>";
               echo "<div class='gallery'>"
               while ($row1 = mysql_fetch_assoc($result1)){
                 echo "<a href='$row1['foto']'>""<img src='$row1['foto']'>""</a>";
               }  
               echo "</div>";
            }
            mysql_free_result($result);
            mysql_free_result($result1);
            echo "</table> ";
          } 
          mysql_close($con); 
         
    ?> 
    
 </body> 
</html>

