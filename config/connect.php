<?php 

function connectDataBase(){
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'barbearia';

    $connection = mysqli_connect($server, $user, $password, $database);

    if(!$connection){
        die("Conexão falhou" . mysqli_connect_error());
    }

    return $connection;
}


function dadosBarbeiro($profissionalSelecionado){
    global $email, $telefone, $especialidade, $foto;
    
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "barbearia";

    $connection = new mysqli($server, $user, $password, $database);

    if ($connection->connect_error) {
        die("Falha na conexão: " . $connection->connect_error);
    }

    $sql = "SELECT email, telefone, especialidade, foto FROM barbeiros WHERE nome = '$profissionalSelecionado'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $telefone = $row["telefone"];
            $especialidade = $row["especialidade"];
            $foto = $row["foto"];
        }
    } else {
        echo "Nenhum resultado encontrado";
    }

    $connection->close(); // Fechar a conexão com o banco de dados
}


?>