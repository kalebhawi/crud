<?php

$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "crud_desafio";

$nomeCliente = $_POST['nomeCliente'];
$cpfCnpj = $_POST['cpfCnpj'];

$con = mysqli_connect("$HOST", "$USER", "$PASS", "$DB");

if (!$con) {
    die("Erro ao conectar no banco " . mysqli_error());
}

$procura = "select * from clientes where nome = '$nomeCliente'; ";
$result = mysqli_query($con, $procura);
$sql = "insert into clientes (nome, cpf_cnpj) values ('$nomeCliente', '$cpfCnpj')";

if (mysqli_num_rows($result) > 0) {
    $_SESSION['ja_cadastrado'];
} else {
    if (mysqli_query($con, $sql)) {
        echo "Cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente" . mysqli_error($con);
    }
}
mysqli_close($con);
header("Location: /crud/views/index.php");
?>