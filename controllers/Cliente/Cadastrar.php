<?php
require "../../models/ClienteDAO.php";

$clienteDAO = new ClienteDAO();
$con = $clienteDAO->conectar();

$nome = filter_input(INPUT_POST, "nomeCliente", FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, "cpfCnpj", FILTER_SANITIZE_STRING);
$id = isset($_POST['id']) ? $_POST['id'] : null;
$alertClass = "alert alert-danger";

$messageReturn = null;
if (!is_null($id)) {
    $sql = "update clientes set nome = '{$_POST['nomeCliente']}', cpf_cnpj = '{$_POST['cpfCnpj']}'  where id = $id";
    $clienteBd = mysqli_query($con, $sql);
    echo json_encode(['success' => true, 'customStatus' => 'OK', 'message' => "Dados enviados com sucesso!"]);
} else {

    $verifyQuery = "select * from clientes where nome = '$nome' and cpf_cnpj = '$cpf'";
    $verifyResult = mysqli_query($con, $verifyQuery);

    if (mysqli_num_rows($verifyResult) == 0) {

        $sql = "INSERT INTO clientes (nome, cpf_cnpj) VALUES ('" . $_POST['nomeCliente'] . "', '" . $_POST['cpfCnpj'] . "')";
        $clienteBd = mysqli_query($con, $sql);
        echo json_encode(['success' => true, 'customStatus' => 'OK', 'message' => "Dados enviados com sucesso!"]);

    } else {
        echo json_encode(['success' => true, 'customStatus' => 'Error', 'message' => "Ocorreu um erro ao enviar os dados, verifique-os e tente novamente."]);
        echo json_encode(['success' => false, 'customStatus' => 'Error']);
    }
}
mysqli_close($con);
?>