<?php
include "../servidor/Mascotas.php";
session_start();
if (!isset($_SESSION['Mascotas'])) {
    $_SESSION['Mascotas'] = new Mascotas();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="../cliente/js/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../cliente/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../cliente/css/style.css" rel="stylesheet">

    <title>Agregar cliente</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <strong>Agregar Clientes</strong>
        </a>
    </div>
    </div>

    <a href="../cliente/clientes.php" class="btn btn-primary">Regresar a la lista de clientes</a>
    <a href="../cliente/index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    </div>

</nav>
<main style="padding-top: 20px">
    <div class="container">
        <strong>Agregar un nuevo cliente</strong>
        <form action="agregarcliente.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Nombre</label>
                    <input type="text" class="form-control" id="inputName" name="nombre"
                           placeholder="Ingrese nombre cliente">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Direccion</label>
                    <input type="text" class="form-control" id="inputAddress" name="direccion"
                           placeholder="1234 Main St">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Telefono</label>
                    <input type="number" class="form-control" id="inputTelefono" name="telefono"
                           placeholder="+1 23 456789">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Añadir cliente</button>
        </form>

    </div>
</main>
<script src="../cliente/js/popper.min.js"></script>
<script src="../cliente/js/jquery-3.3.1.js"></script>
<script src="../cliente/js/js/bootstrap.js"></script>

<?php
    if (isset($_POST['nombre'])){
        $bool = $_SESSION['Mascotas']->agregarCliente($_POST['nombre'],$_POST['email'],$_POST['telefono'],$_POST['direccion']);
        if ($bool){
            echo "<div class=\"alert alert-success\" role=\"alert\">
                   Cliente añadido correctamente
                    </div>";
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    No se pudo agregar al cliente
                    </div>";
        }
    }
?>
</body>
</html>