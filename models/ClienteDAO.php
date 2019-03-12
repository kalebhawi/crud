<?php
require "Conexao.php";

class ClienteDAO extends Conexao
{
    public function listar(){

        $procura = "select * from clientes;";
        $result = mysqli_query(parent::conectar(), $procura);

        $retorno = array();

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                array_push($retorno, $row);
            }
        }

        return $retorno;
    }
}