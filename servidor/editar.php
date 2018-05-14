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
    <title>Listado de mascotas</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
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
        <strong>Editar mascota</strong>
        <form action="editar.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputText4">Nuevo nombre a mascota</label>
                    <input type="text" class="form-control" id="inputText4" name="nombre" placeholder="Nuevo nombre">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nuevo dueño</label>
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputText4">Ingresar edad de la mascota</label>
                    <input type="number" class="form-control" id="inputText4" name="edad" placeholder="Ingresar Edad">
                </div>
            </div>
            <input type="hidden" name="idmascota2" value="<?php echo $_POST['idmascota']?>">
            <input type="submit" class="btn btn-primary" value="Actualizar mascota">
            <input type="reset" class="btn btn-primary btn-danger" value="Restaurar formulario">
        </form>
    </div>
</main>

<?php
        if (isset($_POST['nombre']) && isset($_POST['dueno'])) {
            $bool = $_SESSION['Mascotas']->editar($_POST['idmascota2'], $_POST['dueno'], $_POST['nombre'], $_POST['edad']);
            if ($bool) {
                echo "<div class=\"alert alert-success\" role=\"alert\">
                    Mascota editada correctamente
                    </div>";
            }
        }

?>
</body>
</html>