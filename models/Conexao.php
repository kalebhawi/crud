<?php

class Conexao
{
    public function conectar(){

        $HOST = "localhost";
        $USER = "root";
        $PASS = "";
        $DB = "crud_desafio";

        $con = mysqli_connect("$HOST", "$USER", "$PASS", "$DB");

        if (!$con) {
            die("Erro ao conectar no banco " . mysqli_error());
        }

        return $con;
    }
}