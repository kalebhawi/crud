<?php

class ExibirClientes{
    public function exibirClientes(){
        $HOST = "localhost";
        $USER = "root";
        $PASS = "";
        $DB = "crud_desafio";

        $con = mysqli_connect("$HOST", "$USER", "$PASS", "$DB");

        if(!$con){
            die("Erro ao conectar no banco " . mysqli_error());
        }

        $procura = "select * from clientes;";
        $result = mysqli_query($con, $procura);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>" . "<td>" . $row["id"]. "</td>" . "<td>" . $row["nome"] . "</td>" . "<td>" . $row["cpf_cnpj"] . "</td>" . "</tr>";
            }
        } else {
            echo "0 results";
        }
        mysqli_close($con);
    }
}

?>