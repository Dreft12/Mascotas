<?php
include "../servidor/Mascotas.php";
session_start();
if (!isset($_SESSION['Mascotas'])){
    $_SESSION['Mascotas'] = new Mascotas();
}

if (isset($_POST['idmascota'])){

    $bool = $_SESSION['Mascotas']->eliminarMascota($_POST['idmascota']);
    if ($bool){
        echo "<div class=\"alert alert-success\" role=\"alert\">
                   Cliente eliminado correctamente
                    </div><script>window.location.assign('../cliente/clientes.php')</script>";
    }else{
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                    No se pudo eliminar al cliente
                    </div><script>//window.location = '../cliente/clientes.php'</script>";
    }
}