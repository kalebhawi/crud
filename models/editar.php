<?php

$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "crud_desafio";

//variaveis para buscar o cliente
$nomeCliente = $_GET['nomeCliente'];
$cpfCnpj = $_GET['cpfCnpj'];
$id = $_GET['id'];

//variaveis para editar o cliente buscado
$setNomeCliente = $_GET['setNomeCliente'];
$setCpfCnpj = $_GET['setCpfCnpj'];

$con = mysqli_connect("$HOST", "$USER", "$PASS", "$DB");

if (!$con) {
    die("Erro ao conectar no banco " . mysqli_error());
}

$procura = "select * from clientes where nome = '$nomeCliente' and cpf_cnpj = '$cpfCnpj'";
$result = mysqli_query($con, $procura);
$editar = "update clientes set cpf_cnpj = '$setCpfCnpj' and nome = '$setNomeCliente' where id='$id'";
$sql = mysqli_query($con, $editar);

if (mysqli_num_rows($result) == 0) {
    echo "Nenhum cadastro para os dados informados. Por favor, verifique-os.";
    exit();
} else {
    if (mysqli_affected_rows($sql) >= 1) {
        echo "Editado com sucesso!";
        header("Location: /crud/views/index.php");
    } else {
        echo "Não foi possível editar o cliente.";
    }
}
echo "$id";
mysqli_close($con);

?>