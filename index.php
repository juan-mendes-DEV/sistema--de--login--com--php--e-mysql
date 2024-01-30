<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link rel="stylesheet" href="./restrito/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="inicio">
            <h1>login web</h1>
        <form class="row g-3" action="index.php" method="post">
              <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input name="login" type="text" class="form-control" id="inputEmail4">
                <small  class="form-text text-muted">Entre com seus Dados de acesso</small>
              </div>
              <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="senha" class="form-control" id="inputPassword4">
                
              </div>
                
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Acessar</button>
              </div>
        </form>
        <?php 
            include "restrito/conexao.php";
          if(isset($_POST['login'])){
            $login = mysqli_real_escape_string($conn, $_POST['login']);
            $senha =  mysqli_real_escape_string($conn, md5($_POST['senha']));

            $sql = "SELECT * FROM `usuarios` WHERE login = '$login' and senha = '$senha'";
            
            if($result = mysqli_query($conn,$sql)){
              $num_registros = mysqli_num_rows($result);

              if ($num_registros == 1) {
                $linha = mysqli_fetch_assoc($result);
                  if(($login == $linha['login']) and ($senha == $linha['senha']) ){
                    session_start();
                    $_SESSION['login'] = "juan";
                    header("location: restrito");
                  }
                  else{
                    echo "<p>login invalido</p>";
                  }
              }
              else{
                echo"<p>login ou senha não encontrados ou invalidos.</p>";
              }
            }else{
              echo "nenhum resultado do banco de Dados";
            }
          }
        
        ?>


          </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>