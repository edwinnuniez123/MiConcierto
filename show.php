<?php
 $con=mysqli_connect("localhost", 
			"root",
			"programacion", 
			"myconcert");

if (mysqli_connect_errno($con)){
	echo "Failed to connect " . mysqli_connect_error();
}else{
	echo "Connection Succesful";
}

$name = $_POST['name'];

$query = "SELECT * FROM myconcert where usuario like '%" . $name . "%'";
$result = mysqli_query($con, $query);                                                           
echo "<table border=1>";

while ($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['idusuario'] . "</td>";
	echo "<td>" . $row['usuario'] . "</td>";
	echo "<td>" . $row['contrasenia'] . "</td>";
	echo "<td>" . $row['nombre'] . "</td>";
	echo "</tr>";
}
echo "</table>";
 ?>
