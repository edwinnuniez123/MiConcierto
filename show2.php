<html>
<head>
<meta charset="UTF-8">
<title>Resultado de la Consulta</title>
</head>
<body>
<h1>Resultado de la Consulta</h1>
<?

	$name = $_POST['name'];
	echo "<h2> Personas cuyo nombre contenga " . $name . "</h2>";
	$con=mysqli_connect("localhost", "root", "programacion", "myconcert");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect " . mysqli_connect_error();
	}else{
		echo "Connection Succesful";
	}
	$query = "SELECT * FROM usuario where first_name like '%" . $name . "%'";
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
</body>
</html>
