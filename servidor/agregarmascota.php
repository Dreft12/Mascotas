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

    <link href="../cliente/js/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../cliente/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../cliente/css/style.css" rel="stylesheet">

    <title>Agregar Mascota</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <strong>Agregar mascota</strong>
        </a>
    </div>
    <a href="../cliente/mascotas.php" class="btn btn-primary">Regresar a la lista de mascotas</a>
    <a href="../cliente/index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    </div>

</nav>
<main style="padding-top: 20px">
    <div class="container">
        <strong>Agregar una nueva mascota</strong>
        <form action="agregarmascota.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Nombre</label>
                    <input type="text" class="form-control" id="inputName" name="nombre"
                           placeholder="Ingrese nombre mascota">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Edad</label>
                    <input type="number" class="form-control" name="edad" id="inputEmail4" placeholder="Ingrese Edad">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Tipo de mascota</label>
                    <select id="inputState" name="tipo" class="form-control">
                        <option value="">Escoger tipo de mascota...</option>
                        <?php
                        $link = new Conexion();
                        $sql = "SELECT tm.id, tm.Tipo FROM tipomascota tm";
                        $res = $link->getSql()->query($sql);
                        while ($tipo = $res->fetch_assoc()) {
                            echo '<OPTION VALUE="' . $tipo['id'] . '">' . $tipo['Tipo'] . '</OPTION>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Añadir Mascota</button>
        </form>

    </div>
</main>
<script src="../cliente/js/popper.min.js"></script>
<script src="../cliente/js/jquery-3.3.1.js"></script>
<script src="../cliente/js/js/bootstrap.js"></script>
<?php
if (isset($_POST['nombre'])){
    $bool = $_SESSION['Mascotas']->agregarMascota($_POST['nombre'],$_POST['tipo'],$_POST['edad']);
    if ($bool){
        echo "<div class=\"alert alert-success\" role=\"alert\">
                   Mascota añadida correctamente
                    </div>";
    }else{
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                    No se pudo agregar a la mascota
                    </div>";
    }
}
?>

</body>
</html>