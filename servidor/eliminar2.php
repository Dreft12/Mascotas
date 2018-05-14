<htlml>
<head>
<title>ELIMINAR2</title>
</head>
<body>
<?php
$pro=$_GET['pro'];
include("conectar.php");

$con->query("DELETE  FROM $table WHERE producto='$pro'");
include("cerrar.php");

echo ("<br>usuario: ".$user);


?>
<a href="index.php">MENÚ</a>

</body>
</htlml>