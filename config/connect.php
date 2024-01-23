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


?>