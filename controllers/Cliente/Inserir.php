<?php

include "../models/ClienteDAO.php";

$id = $_REQUEST['id'];
$cliente = null;

if (!is_null($id)) {
    $clienteDAO = new ClienteDAO();
    $con = $clienteDAO->conectar();
    // buscar no banco o cliente
    $procura = "select * from clientes where id =" . $id;
    $clienteBd = mysqli_query($con, $procura);
    $resultado = mysqli_fetch_array($clienteBd);

    $cliente = ['id' => $resultado['id'],'nome' => $resultado['nome'], 'cpf_cnpj' => $resultado['cpf_cnpj']];
    mysqli_close($con);
} else {
    $cliente = ['nome' => '', 'cpf_cnpj' => ''];
}
?>