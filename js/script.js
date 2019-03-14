/*******
 * 1 - Zerar o formulário quando sucesso no cadastro DONE
 * 2 - Retornar mensagem do backend sendo de sucesso ou erro e mostrar na página DONE
 * 3 - Alterar a classe do elemento da página, que representa o feedback de mensagem para o usuário, para sucesso ou
 * erro quando necessário DONE
 * 4 - Mostrar o texto vindo do backend para o usuário DONE
 * 5 - Habilitar novamente o botão quando retornar a resposta do backend DONE
 */

$(document).ready(function () {
    var $formCadastro = $("#cadastroCliente");

    $formCadastro.submit(function (event) {
        console.log($(this));
        event.preventDefault();
        var $infoProcess = $("#infoProcess");
        var $feedbackProcess = $("#feedbackProcess");
        var $feedbackProcessDenied = $("#feedbackProcessDenied");
        var $btnCadastrar = $("#cadastrar");
        var data = {};
        var valid = true;

        $.each($(this).find('input'), function (index, element) {
            var $element = $(element);
            if($element.val() != ""){
                data[$element.attr('name')] = $element.val();
            }else{
                alert(`${$element.attr('title')} deve ser preenchido!`);
                valid = false;
            }
        });

        if(valid){
            $.ajax({
                url : $(this).attr('action'),
                type : $(this).attr('method'),
                data : data,
                beforeSend: function(){
                    $infoProcess.show();
                    $btnCadastrar.hide();
                },
                success: function(data){
                    var response = JSON.parse(data);
                    if(response.success){
                        $formCadastro[0].reset();
                        $infoProcess.hide();
                        $feedbackProcess.show();
                        $btnCadastrar.prop("disabled",true);
                        $feedbackProcess.text("Dados enviados com sucesso!");
                    } else {
                        $infoProcess.hide();
                        $feedbackProcessDenied.show();
                        $feedbackProcessDenied.text("Ocorreu um erro ao enviar os dados, verifique-os e tente novamente.");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Ocorreu um erro!');
                },
                complete : function () {

                }
            });
        }
    });
});