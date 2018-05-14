<html>
<head>
<title>modificar2</title>
</head>
<body>
<?php
$can=$_GET['can'];
$cprov=$_GET['cod_prov'];
$nprov=$_GET['nprov'];

include("connection.php");
mysql_select_db($db) or die("consulta fallida");//seleccionar DB
$sql="UPDATE  insumos SET cantidad='$can' WHERE producto='$pro'";
mysql_query($sql);
mysql_close();

echo ("<br>usuario: ".$user);


?>
<a href="index.php">MENÚ</a>

</body>
</html>