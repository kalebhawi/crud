<?php
require "..\models\ClienteDAO.php";
$clientes = new ClienteDAO();
?>

<!doctype html>
<html lang="pt-br">
<?php include_once "head.php"; ?>
<body class="text-center">
<?php include_once "header.php"; ?>
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

</body>
</html>