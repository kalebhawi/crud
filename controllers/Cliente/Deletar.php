<?php

require "..\..\models\ClienteDAO.php";

$id = $_POST['id'];
settype($id, "integer");
$clienteDAO = new ClienteDAO();
$con = $clienteDAO->conectar();
$sql = "delete from clientes where id =" . $id;


if (mysqli_query($con, $sql)) {
   header("Location: /crud/views/listar.php");
} else {
    echo "Erro ao deletar cliente" . mysqli_error($con);
}

mysqli_close($con);
?>