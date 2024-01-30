<?php 
  include "../validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login simples</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <main>
      <?php 
      include "conexao.php";
        $nome = clear($conn, $_POST['nome']);
        $endereco = clear($conn,$_POST['endereco']);
        $telefone = clear($conn,$_POST['telefone']);
        $email = clear($conn,$_POST['email']);
        $data_nascimento = $_POST['data_nascimento'];

        $foto = $_FILES['foto'];
        $nome_foto = mover_foto($foto);
         if($nome_foto == 0){
            $nome_foto = NULL;
         }
        $sql="INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`,`foto`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto')";

        if(mysqli_query($conn, $sql)){
            if($nome_foto != NULL){
                echo "<img id='imagem' src=\"img/$nome_foto\" title=\"$nome_foto\">";
            }
            echo "
            <div class=\"inicio\">
                <h1>$nome CADASTRADO com sucesso.</h1>
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
                <h1>$nome NÃO FOI CADASTRADO.</h1>
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