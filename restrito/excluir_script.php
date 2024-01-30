<?php 
  include "../validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
      <?php 
      include "conexao.php";
        $id = $_POST['id'];
        $nome = $_POST['nome']??"";
    
        $sql="DELETE FROM `pessoas` WHERE cod_pessoa = $id";


        if(mysqli_query($conn, $sql)){
            echo "
            <div class=\"inicio\">
                <h1>$nome excluico com sucesso.</h1>
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
                <h1>$nome NÃO FOI excluido.</h1>
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