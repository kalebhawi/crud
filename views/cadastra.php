<?php
include "../controllers/Cliente/Inserir.php";
?>
<!doctype html>
<html lang="pt-br">

<?php include_once "head.php"; ?>

<body class="text-center">

<?php include_once "header.php" ?>

<h1>Formulário cadastral de clientes</h1>

<small>Insira os dados do cliente:</small>
<div>
    <form id="cadastroCliente" action="/crud/controllers/Cliente/Cadastrar.php" method="post">
        <div class="container">
            <div class="row">
                <div class="form-body col col-lg-12">
                    <div>

                        <label for="nomeCliente">Nome do cliente:
                            <input title="Nome do cliente" id="nomeCliente" name="nomeCliente" value="<?php echo $cliente['nome'] ?>"
                                   type="text" class="form-control" minlength="3" maxlength="32" required>
                        </label>

                        <label for="cpfCnpj">CPF/CNPJ:
                            <input title="CPF/CNPJ" id="cpfCnpj" name="cpfCnpj" value="<?php echo $cliente['cpf_cnpj'] ?>" type="number"
                                   class="form-control" minlength="11" maxlength="14" required>
                        </label>
                        <!--input escondido para passar id-->
                        <?php if (isset($_GET['id']) && !empty($_GET['id'])) { ?>
                            <input id="id" name="id" type="hidden" value="<?php echo $_GET['id'] ?>  ">
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="form-action">
                <button type="submit" id="cadastrar" class="btn btn-primary">Enviar dados</button>

                <div class="alert alert-info" id="infoProcess" style="display: none;" role="alert">
                    Processando...
                </div>

                <div class="alert alert-success" id="feedbackProcess" style="display: none;" role="alert">
                </div>

                <div class="alert alert-danger" id="feedbackProcessDenied" style="display: none;" role="alert">
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>