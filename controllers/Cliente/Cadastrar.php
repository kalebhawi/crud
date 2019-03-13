<?php

require "..\..\models\ClienteDAO.php";
sleep(5);
$clienteDAO = new ClienteDAO();
$con = $clienteDAO->conectar();

$nome = filter_input(INPUT_POST, "nomeCliente", FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, "cpfCnpj", FILTER_SANITIZE_STRING);

$id = isset($_POST['id']) ? $_POST['id'] : null;


if (!is_null($id)) { //Comentario

    $sql = "update clientes set nome = '{$_POST['nomeCliente']}', cpf_cnpj = '{$_POST['cpfCnpj']}'  where id = $id";
    $clienteBd = mysqli_query($con, $sql);

    header("Location: /crud/views/listar.php");

} else {
    $sql = "INSERT INTO clientes (nome, cpf_cnpj) VALUES ('" . $_POST['nomeCliente'] . "', '" . $_POST['cpfCnpj'] . "')";

    $clienteBd = mysqli_query($con, $sql);
    header("Location: /crud/views/cadastra.php");

}

mysqli_close($con);
?>