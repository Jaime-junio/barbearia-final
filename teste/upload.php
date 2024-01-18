<?php

if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $nome = str_replace(" ", "", $nome);

    $formatosPermitidos = array("jpg");
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

   if(in_array($extensao, $formatosPermitidos)){
        $pasta = "img/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = $nome.".$extensao";

        if(move_uploaded_file($temporario, $pasta.$novoNome)){
            $mensagem = 'upload feito com sucesso!';
        }else{
            $mensagem = 'Erro. Não foi possível fazer upload.';
        }

   }else{
        $mensagem = 'Formato inválido.';
   }

    echo $mensagem; 

}


?>

<form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data"> 

    <label for="">Digite seu nome: </label><input type="text" name="nome"><BR> <BR> 

    <input type="file" name="arquivo"><BR><BR>  

    <input type="submit" value="Enviar Foto!" name="enviar"> 
</form>
