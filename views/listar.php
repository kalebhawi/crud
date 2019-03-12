<?php
require "..\models\ClienteDAO.php";
$clientes = new ClienteDAO();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD - Made by Kaleb Hawi</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body class="text-center">
<?php include_once "header.php";?>

<legend>Tabela de clientes cadastrados</legend>
<div class="container">
    <table class="table table-bordered" style="width:100%">
        <tbody>
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>

            <?php foreach($clientes->listar() as $row): ?>

                   <tr>
                       <td><?php echo $row["nome"] ?></td>
                       <td><?php echo $row["cpf_cnpj"] ?></td>
                       <td>
                            <form action="/crud/controllers/Cliente/Deletar.php" method="post"
                                  onclick="return confirm('Tem certeza que deseja excluir ?');">
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                <button class="btn"><i class="far fa-trash-alt"></i></button>
                             </form>
                        </td>

                       <td>
                           <form action="/crud/controllers/Cliente/Inserir.php" method="post">
                               <input type="hidden" name="id" value="<?=$row['id']?>">
                               <a href="cadastra.php?id=<?=$row['id']?>" class="btn"><i class="far fa-edit"></i></a>
                           </form>
                       </td>
                   </tr>
            <?php endforeach; ?>

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