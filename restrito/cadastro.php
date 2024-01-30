<?php 
  include "../validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <main>
        <section class="secao_form">
            <h1>Formulario de cadastro</h1>
            <form action="cadastro_script.php" class="formulario" method="post" enctype="multipart/form-data">
                
                <label for="name">Nome Completo:</label>
                <input minlength="6" maxlength="100" type="text" name="nome">
                
                <label for="endereco">Endereço:</label>
                <input minlength="6" maxlength="100" type="text" name="endereco">
        
                <label for="telefone">Telefone:</label>
                <input minlength="8" maxlength="20" type="number" name="telefone">
        
                <label for="email">Email:</label>
                <input minlength="6" maxlength="100" type="text" name="email">
        
                <label for="dataNascimento">Data Nascimento:</label>
                <input type="date" name="data_nascimento">

                <label for="foto">Foto:</label>
                <input type="file" name="foto" accept="image/*">
        
                <button type="submit">Cadastrar</button>
                <button class="btn btn-primary btn-sm"><a href="./index.php">voltar inicio</a></button>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>