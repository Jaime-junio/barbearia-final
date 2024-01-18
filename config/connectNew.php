<?php

function connectNew(){
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "barbearia";

    $connection = new mysqli($server, $user, $password, $database);

    if ($connection->connect_error) {
        die("Falha na conexão: " . $connection->connect_error);
    }else{
        return $connection;
    }
}

?>