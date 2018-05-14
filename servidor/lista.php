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
    <link href="../cliente/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../cliente/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../cliente/css/style.css" rel="stylesheet">
    <title>Listado de mascotas</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="../cliente/index.php">
            <strong>Listado de mascotas</strong>
        </a>
    </div>
    <div class="container" style="float: right;">
        <a href="../cliente/clientes.php" class="btn btn-primary">Regresar a la lista de clientes</a>
        <a href="../cliente/index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    </div>
</nav>
<main style="padding-top: 20px">
    <div class="container">
        <strong>Listado de mascotas</strong>
        <div class="row" id="row" style="padding-top: 20px">
            <?php $_SESSION['Mascotas']->listarMascotas($_POST['idcliente']); ?>
        </div>
    </div>
</main>
</body>
</html>