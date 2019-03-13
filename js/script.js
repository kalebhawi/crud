$(document).ready(function () {
    $("#cadastrar").click(function () {
        var obj = {
            nome : $("#nomeCliente").val(),
            cpf : $("#cpfCnpj").val()
        };
        console.log(obj);

        $.ajax({
            url : "../controllers/Cliente/Cadastrar.php",
            type : "POST",
            dataType : "json",
            data : obj,
            beforeSend: function(){
                $("#spResultado").html("Processando...");
            },
            success: function(data){
                console.log(data);

                if(data == 1){
                    $("#spResultado").css("color", "green");
                    $("#spResultado").html("Cadastrado.");
                } else {
                    $("#spResultado").css("color", "red");
                    $("#spResultado").css("Não cadastrado");
                }
            },
            error : function (error) {
                console.log(error);
            },
            complete : function () {
                
            }
        });
    });
});
