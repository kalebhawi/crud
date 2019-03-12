<?php

$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "crud_desafio";

$nomeCliente = $_POST['nomeCliente'];
$cpfCnpj = $_POST['cpfCnpj'];

$con = mysqli_connect("$HOST", "$USER", "$PASS", "$DB");

if(!$con){
    die("Erro ao conectar no banco " . mysqli_error());
}


$procura = "select * from clientes where nome = '$nomeCliente'; ";
$result = mysqli_query($con, $procura);
$sql = "delete from clientes where nome = '$nomeCliente' and cpf_cnpj = '$cpfCnpj'";

if(mysqli_num_rows($result) == 0){
    echo "Não foi possível deletar com os dados informados. Por favor, verifique-os.";
    exit();
} else {
    if(mysqli_query($con, $sql)){
        echo "Dados deletados com sucesso!";
    } else{
        echo "Erro ao deletar cliente" . mysqli_error($con);
    }
}

mysqli_close($con);
header("Location: /crud/views/index.php");
?>