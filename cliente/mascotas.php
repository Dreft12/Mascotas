<?php
include "../servidor/Mascotas.php";
session_start();
if (!isset($_SESSION['Mascotas'])){
    $_SESSION['Mascotas'] = new Mascotas();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <title>Mascotas disponibles</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <strong>Bienvenidos a Informacion sobre las Mascotas</strong>
        </a>
    </div>
    <div class="container" style="float: right;">
        <a class="btn btn-primary" href="../servidor/agregarmascota.php">Agregar Mascota</a>
        <a href="../cliente/mascotasin.php" class="btn btn-primary">Mascotas sin cliente o dueños</a>
        <a href="../cliente/index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    </div>
</nav>
<main style="padding-top: 20px">
    <div class="container">
        <strong>Lista de mascotas completa</strong>
        <div class="row" style="padding-top: 20px">


            <?php $_SESSION['Mascotas']->listaMascotaCompleta(); ?>

        </div>
    </div>
</main>
<script src="js/popper.min.js"></script>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/js/bootstrap.js"></script>
</body>
</html>