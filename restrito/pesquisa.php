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

        <?php 

            include "conexao.php";
            
            $pesquisa = $_POST["busca"]??"";
            

            $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

            $dados = mysqli_query($conn,$sql);
            
        ?>
    <main>
    <div class="inicio">
            <h1>Pesquisa de funcionarios da Empresa</h1>
            <h4> digite os dados para pesquisar</h4>
            <hr>
            
        <div class="pesquisa">
            <nav>
                <form action="pesquisa.php" method="post">
                    
                    <input type="search" name="busca" placeholder="nome" autofocus>
                    <button type="submit">Pesquisar</button>
                    <button><a href="./index.php">Voltar inicio</a></button>
                </form>
            </nav>
        </div>
        </div>
        
        <div class="tabela">

            <table class="table  table-hover">
            <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Funções</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                            while($linha = mysqli_fetch_assoc($dados)){
                                
                                $cod_pessoa = $linha['cod_pessoa'];
                                $nome = $linha['nome'];
                                $endereco = $linha['endereco'];
                                $telefone = $linha['telefone'];
                                $email = $linha['email'];
                                $datanascimento = $linha['data_nascimento'];
                                $datanascimento = mostraData($datanascimento);
                                $foto = $linha['foto'];
                                if (!$foto == null) {
                                    $mostra_foto = "<img src='img/$foto' class='imagemPequena'>";
                                }
                                else{
                                    $mostra_foto = '';
                                }
                                
                                echo " <tr>
                                            <th>$mostra_foto</th>
                                            <th>$nome</th>
                                            <td>$endereco</td>
                                            <td>$telefone</td>
                                            <td>$email</td>
                                            <td>$datanascimento</td>
                                            <td width=170px>
                                            <a href=\"cadastro_edit.php?id=$cod_pessoa;\" class=\"btn btn-primary btn-sm\">Editar</a>
                                            <a href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\" class=\"btn btn-danger btn-sm\"
                                            onclick=\"pegar_dados('$cod_pessoa','$nome')\"
                                            >Deletar</a>
                                            </td>
                                        </tr>
                                    ";
                                
                            }
                            
                 ?>
                 

                </tbody>
    
            </table>
        </div>
    </main>
    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmação de exclusão</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="excluir_script.php" method="post">
        <p>Voce tem certeza que deseja deletar o usuario <b id="nome_pessoa">nome da pessoa</b>?</p>
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="hidden" name="nome" id="nome_pessoa_1" value="">
        <input type="hidden" name="id" id="cod_pessoa" value="">
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>  

    </div>
    </div>
  </div>
</div>
    
    <script>
        function pegar_dados(id,nome){
            document.getElementById("nome_pessoa").innerHTML = nome;
            document.getElementById("nome_pessoa_1").value = nome;
            document.getElementById("cod_pessoa").value = id;

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>