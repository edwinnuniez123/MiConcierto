<?php
    
     
       

    
    $nombre = $_POST['nombre'];
    $origen = $_POST['origen'];
    $nombretour = $_POST['nombretour'];
    $venue = $_POST['venue'];
    $fecha = $_POST['fecha'];
    
    
    
    $nombre = $_POST['nombre'];
    $origen = $_POST['origen'];
    $nombretour = $_POST['nombretour'];
    $venue = $_POST['venue'];
    $fecha = $_POST['fecha'];
    $con = mysqli_connect("localhost", "root","programacion","myconcert");
    
    $query1 = "INSERT INTO artista (nombreartista, origen) VALUES('$nombre', '$origen')";
    $result1 = mysqli_query($con,$query1);
    $query2 = "INSERT INTO tour (idartista, nombretour) VALUES(LAST_INSERT_ID(), '$nombretour')";
    $result2 = mysqli_query($con,$query2);
    $query3 = "INSERT INTO evento (idtour, venue, fecha) VALUES(LAST_INSERT_ID(), '$venue','$fecha')";
    $result3 = mysqli_query($con,$query3);

 echo $nombre;
 echo $origen;
 echo $nombretour;
 echo $venue;
 echo $fecha ;
   ?>
