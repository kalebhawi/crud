<?php
require_once "../models/exibir.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD - Made by Kaleb Hawi</title>
</head>
<body class="text-center">
<header>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">CRUD - Cadastrar novo cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="edita.php">Editar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deleta.php">Deletar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="exibe.php">Exibir</a>
            </li>
        </ul>
    </nav>

    <legend>Tabela de clientes cadastrados</legend>
</header>

<div class="container">
    <table class="table table-bordered" style="width:100%">
        <tbody>
            <tr>
                <th>ID:</th>
                <th>Nome:</th>
                <th>CPF/CNPJ:</th>
            </tr>

            <?php
            $exibir = new ExibirClientes();
            ?>

        </tbody>
    </table>

    <a href="../views/index.php"><input type="button" class="btn btn-primary" value="Página inicial"></a>

</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>