<html>
<head>
<title>modificar2</title>
</head>
<body>
<?php
$pro=$_GET['pro'];
$npro=$_GET['npro'];
$nval=$_GET['nval'];

include("conectar.php");
$con->query("UPDATE  datos SET producto='$npro', valor='$nval' WHERE producto='$pro'");
include("cerrar.php");

echo ("<br>usuario: ".$user);


?>
<a href="index.php">MENÚ</a>

</body>
</html>