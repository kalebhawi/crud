<?php

require "..\..\models\ClienteDAO.php";

$clienteDAO = new ClienteDAO();
$con = $clienteDAO->conectar();
$id = $_POST['id'];
var_dump($id);
var_dump($_POST);

if (!$id) {
    $sql = "update clientes set nome = '" . $_POST['nomeCliente'] . "' where id ='" . "$id" . "'";
    $clienteBd = mysqli_query($con, $sql);
    var_dump($sql);
    $sql = "update clientes set cpf_cnpj = '" . $_POST['cpfCnpj'] . "' where id ='" . "$id" . "'";
    $clienteBd = mysqli_query($con, $sql);
    var_dump($sql);
} else {
    $sql = "INSERT INTO clientes (nome, cpf_cnpj) VALUES ('".$_POST['nomeCliente']."', '".$_POST['cpfCnpj']."')";

    $clienteBd = mysqli_query($con, $sql);
}


if ($clienteBd) {
    //header("Location: /crud/views/index.php");
} else {
    echo "Erro ao cadastrar cliente" . mysqli_error($con);
}

mysqli_close($con);
?>