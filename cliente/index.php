<?php

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
    <title>Información sobre Mascotas - Pagina Principal</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <strong>Bienvenidos a Informacion sobre las Mascotas</strong>
        </a>
    </div>
</nav>
<main style="padding-top: 20px">
    <div class="container">
        <div class="row" style="padding-top: 20px">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img class="img-fluid" style="height: 240px;"
                         src="imgs/ganar-dinero-cuidando-mascotas.jpg">
                    <div class="card-block">
                        <h4 class="title" style="font-weight: 400;">
                            Nuestros Clientes
                        </h4>
                        <p class="card-text" style="font-weight: 300;">En la siguiente pagina se mostrará un listado de nuestros clientes</p>
                        <a class="btn btn-primary" href="clientes.php">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="img-fluid"
                         src="imgs/Perros&gatos_020.jpg">
                    <div class="card-block">
                        <h4 class="title" style="font-weight: 400;">
                            Nuestras mascotas disponibles
                        </h4>
                        <p class="card-text" style="font-weight: 300;">En la siguiente pagina, tenemos información de las mascotas que tenemos disponibles.</p>
                        <a class="btn btn-primary" href="mascotas.php">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>