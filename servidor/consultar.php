<html>
<head>
<title>consultar</title>
</head>
<body>
<?php
include("conectar.php");

$result=mysqli_query($con,"SELECT * FROM ".$table);

	while($row=mysqli_fetch_array($result))
	{
		echo ($row['producto']);
		echo ($row['valor']."<br>");
	}
include("cerrar.php");

echo ("<br>usuario: ".$user);

?>
<a href="index.php">MENÚ</a>
</body>
</html>