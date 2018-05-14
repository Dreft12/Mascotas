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
    <link href="../cliente/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../cliente/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../cliente/css/style.css" rel="stylesheet">
    <title>Añadir mascota a Cliente</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <strong>Añadir mascota a cliente</strong>
        </a>
    </div>
    <div class="container" style="float: right;">
        <a href="../cliente/clientes.php" class="btn btn-primary">Regresar a la lista de clientes</a>
        <a href="../cliente/index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    </div>
</nav>
<main style="padding-top: 20px">
    <div class="container">
        <strong>Añadir mascota a cliente mascota</strong>
        <form action="amascotacliente.php" method="post">
            <div class="form-row">

                    <label for="inputAddress">Cliente</label>
                    <select id="inputState" name="dueno" class="form-control">
                        <option value="">Escoger nuevo dueño...</option>
                        <?php
                        $link = new Conexion();
                        $sql = "SELECT IdCliente, Nombre FROM clientes";
                        $res = $link->getSql()->query($sql);
                        while ($cliente = $res->fetch_assoc()) {
                            echo '<OPTION VALUE="' . $cliente['IdCliente'] . '">' . $cliente['Nombre'] . '</OPTION>';
                        }
                        ?>
                    </select>
                </div>

            <div class="form-group">
                <label for="inputAddress">Mascota disponible</label>
                <select id="inputState" name="mascota" class="form-control">
                    <option value="">Escoger mascota...</option>
                    <?php
                    $link = new Conexion();
                    $sql = "Select m.id, m.Nombre, m.EdadMascota, t.Tipo from mascotas m JOIN tipomascota t ON m.IdTipoMascota = t.id where not exists (select c.IdMascota from clientemascotas c where c.IdMascota = m.id)";
                    $res = $link->getSql()->query($sql);
                    while ($mascota = $res->fetch_assoc()) {
                        echo '<OPTION VALUE="' . $mascota['id'] . '">' . $mascota['Nombre'] . '</OPTION>';
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="idmascota2" value="<?php echo $_POST['idmascota']?>">
            <input type="submit" class="btn btn-primary" value="Añadir mascota a cliente">
            <input type="reset" class="btn btn-primary btn-danger" value="Restaurar formulario">
        </form>
    </div>
</main>

<?php
if (isset($_POST['mascota']) && isset($_POST['dueno'])) {
    $bool = $_SESSION['Mascotas']->agregarMascotaCliente($_POST['mascota'], $_POST['dueno']);
    if ($bool) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
                    Mascota añadida a cliente correctamente
                    </div>";
    }else{
        echo "error";
    }
}

?>
</body>
</html>