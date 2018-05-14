<?php
include "Conexion.php";

class Mascotas
{


    public function consultarClientes()
    {
        $link = new Conexion();
        $sql = "SELECT c.IdCliente, c.Nombre,  c.Direccion,  c.Email,  c.Telefono FROM clientes c";
        $res = $link->getSql()->query($sql);
        while ($clientes = $res->fetch_assoc()) {
            echo "<div class=\"list-group\">
    <div class=\"clientes d-flex w-100 justify-content-space-around\">
      <h5 class=\"mb-1\">" . $clientes['Nombre'] . "</h5>
    </div>
    <p class=\"mb-1 clientes\"><b>Direccion: </b> " . $clientes['Direccion'] . "</p>
    <p class=\"mb-1 clientes\"><b>Email: </b> " . $clientes['Email'] . "</p>
    <p class=\"mb-1 clientes\"><b>Telefono: </b> " . $clientes['Telefono'] . "</p>
    <form action=\"../servidor/lista.php\" method=\"post\">
    <input type=\"hidden\" id=\"form1\" name=\"idcliente\" value=" . $clientes['IdCliente'] . ">
    <input type='submit' class='list-group-item list-group-item-action flex-column align-items-start active' value='Listar mascotas'>
    </form>
    <form action=\"../servidor/eliminarcliente.php\" method=\"post\">
    <input type=\"hidden\" id=\"form1\" name=\"idcliente\" value=" . $clientes['IdCliente'] . ">
    <input type='submit' class='btn-danger eliminarmascota list-group-item list-group-item-action flex-column align-items-start' value='Eliminar'>
    </form></div></a><br>
  ";
        }
    }

    public function listarMascotas($idcliente)
    {

        $link = new Conexion();
        $sql = "SELECT m.id, m.Nombre, tm.Tipo FROM clientes c  JOIN clientemascotas cm ON cm.IdCliente = c.IdCliente  JOIN mascotas m ON cm.IdMascota = m.id  JOIN tipomascota tm ON m.IdTipoMascota = tm.id WHERE c.IdCliente = " . $idcliente;
        $res = $link->getSql()->query($sql);
        if ($res->num_rows == 0) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
                    No se encontraron mascotas relacionadas con el cliente
                    </div><script>";
        } else {
            while ($mascotas = $res->fetch_assoc()) {
                echo "<div class=\"list-group\">
    <div class=\"d-flex w-100 justify-content-between\">
      <h5 class=\"mb-1\">" . $mascotas['Nombre'] . "</h5>
    </div>
    <p class=\"mb-1\"><b>Tipo de mascota: </b> " . $mascotas['Tipo'] . "</p>
     <form action=\"../servidor/editar.php\" method=\"post\">
    <input type=\"hidden\" id=\"form1\" name=\"idmascota\" value=" . $mascotas['id'] . ">
    <input type='submit' class='list-group-item list-group-item-action flex-column align-items-start active' value='Editar mascota'>
    </form>
    <form action=\"../servidor/eliminarmascota.php\" method=\"post\">
    <input type=\"hidden\" id=\"form1\" name=\"idmascota\" value=" . $mascotas['id'] . ">
    <input type='submit' class='btn-danger eliminarmascota list-group-item list-group-item-action flex-column align-items-start' value='Eliminar mascota de cliente'>
    </form>
    </div><br>
  ";
            }
        }
    }

    public function editar($idMascota, $idCliente, $nombre, $edad)
    {
        $link = new Conexion();
        $sql = "UPDATE mascotas set Nombre='$nombre', EdadMascota = " . $edad . " WHERE id = " . $idMascota;
        $sql2 = "UPDATE clientemascotas SET IdCliente = $idCliente WHERE IdMascota =" . $idMascota;
        return $link->getSql()->query($sql) === TRUE && $link->getSql()->query($sql2) === TRUE;
    }

    public function agregarCliente($nombre, $email, $telefono, $direccion)
    {
        $link = new Conexion();
        $sql = "INSERT INTO clientes(Nombre, Telefono, Direccion, Email)VALUES('$nombre','$telefono','$direccion','$email')";
        return $link->getSql()->query($sql);
    }

    public function eliminarCliente($idcliente)
    {
        $link = new Conexion();
        $sql = "DELETE FROM clientes WHERE IdCliente = " . $idcliente;
        return $link->getSql()->query($sql);
    }

    public function eliminarMascota($idmascota)
    {
        $link = new Conexion();
        $bool = false;
        $sql2 = "DELETE FROM clientemascotas WHERE IdMascota = " . $idmascota;
        if ($link->getSql()->query($sql2) === TRUE) {

                $bool = true;

        }
        return $bool;
    }

    public function listaMascotaCompleta()
    {
        $link = new Conexion();
        $sql = "SELECT m.id, m.Nombre, tm.Tipo, m.EdadMascota FROM mascotas m JOIN tipomascota tm ON m.IdTipoMascota = tm.id";
        $res = $link->getSql()->query($sql);
        while ($mascotas = $res->fetch_assoc()) {
            echo "<div class=\"list-group\">
    <div class=\"d-flex w-100 justify-content-between\">
      <h5 class=\"mb-1\">" . $mascotas['Nombre'] . "</h5>
    </div>
    <p class=\"mb-1\"><b>Tipo de mascota: </b> " . $mascotas['Tipo'] . "</p>
    <p class=\"mb-1\"><b>Edad de mascota: </b> " . $mascotas['EdadMascota'] . "</p>
    </div><br>
    ";
        }
    }

    public function mascotasSinDueno(){
        $sql="Select m.Nombre, m.EdadMascota, t.Tipo from mascotas m JOIN tipomascota t ON m.IdTipoMascota = t.id where not exists (select c.IdMascota from clientemascotas c where c.IdMascota = m.id)";
        $link = new Conexion();
        $res = $link->getSql()->query($sql);
        while ($mascotas = $res->fetch_assoc()) {
            echo "<div class=\"list-group\">
    <div class=\"d-flex w-100 justify-content-between\">
      <h5 class=\"mb-1\">" . $mascotas['Nombre'] . "</h5>
    </div>
    <p class=\"mb-1\"><b>Tipo de mascota: </b> " . $mascotas['Tipo'] . "</p>
    <p class=\"mb-1\"><b>Edad de mascota: </b> " . $mascotas['EdadMascota'] . "</p></div><br>
    ";
        }
    }

    public function agregarMascotaCliente($idMascota, $idCliente){
        $sql = "INSERT INTO clientemascotas(IdCliente, IdMascota) VALUES ('$idCliente', '$idMascota')";
        $link = new Conexion();
        return $link->getSql()->query($sql);
    }

    public function agregarMascota($nombre, $IdTipo, $edad){
        $link = new Conexion();
        $sql = "INSERT INTO mascotas(Nombre, IdTipoMascota, EdadMascota) VALUES ('$nombre','$IdTipo','$edad')";
        return $link->getSql()->query($sql);
    }
}
