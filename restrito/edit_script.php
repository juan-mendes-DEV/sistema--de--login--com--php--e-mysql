<?php 
  include "../validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
      <?php 
      include "conexao.php";
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];

        // $sql="INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";

        $sql="UPDATE `pessoas` set `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento` = '$data_nascimento' WHERE cod_pessoa = $id";


        if(mysqli_query($conn, $sql)){
            echo "
            <div class=\"inicio\">
                <h1>$nome alterado com sucesso.</h1>
                <p>Este é um sistema simplificado de cadastros. Base de estudos para criação de sistemas web com PHP e MYSQL.</p>
                <hr>
            <div class=\"buttons\">
                <button><a href=\"./index.php\">Inicio</a></button>
          </div>
        </div>
            ";
        }else{
            echo "
            <div class=\"inicio\">
                <h1>$nome NÃO FOI alterado.</h1>
                <p>Este é um sistema simplificado de cadastros. Base de estudos para criação de sistemas web com PHP e MYSQL.</p>
                <hr>
            <div class=\"buttons\">
                <button><a href=\"./index.php\">Inicio</a></button>
        </div>
        </div>
                
            ";
        }
?>
    </main>
</body>
</html>