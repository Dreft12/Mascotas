
<?php
$host="127.0.0.1";//ip
$user="huber";
$password="prueba";
$table="datos";
$db="prueba";
$con=new mysqli($host,$user,$password,$db);

if($con->connect_errno){
	echo "no se puede acceder a base de datos";
	exit();
}
?>