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

    <link href="js/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <title>Nuestros Clientes</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <strong>Nuestros Clientes</strong>
        </a>
    </div>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Agregar+
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button"><a class="btn btn-primary agregar" href="../servidor/agregarcliente.php">Agregar Cliente</a></button>
            <button class="dropdown-item" type="button"><a class="btn btn-primary agregar" href="../servidor/amascotacliente.php">Agregar Mascota a cliente</a></button>

        </div>
    </div>
                <a href="index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    </div>

</nav>
<main style="padding-top: 20px">
    <div class="container">
        <strong>Seleccione a un cliente para ver el listado de sus mascotas</strong>
        <div class="row" id="row" style="padding-top: 20px">
           <?php $_SESSION['Mascotas']->consultarClientes(); ?>
        </div>
    </div>
</main>
<script src="js/popper.min.js"></script>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/js/bootstrap.js"></script>


</body>
</html>