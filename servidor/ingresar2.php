<htlml>
<head>
<title>ingresar2</title>
</head>
<body>
<?php
$pro=$_GET['pro'];
$val=$_GET['val'];
echo $pro;
echo $val;
include("conectar.php");
$con->query("INSERT  INTO $table (producto, valor) VALUES ('$pro', '$val')");
include("cerrar.php");

echo ("<br>usuario: ".$user);


?>
<a href="index.php">MENÚ</a>

</body>
</htlml>