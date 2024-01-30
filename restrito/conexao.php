
<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

    if ($conn = mysqli_connect($server,$user,$pass,$bd)) {
        //echo "conectado";
    }else{
        echo "erro";
    }


    function mostraData($data){
        $d = explode('-',$data);
        $escreve = $d[2]."/".$d[1]."/".$d[0];
        return $escreve;
    }

    function mover_foto($vetor_foto){
        $vtipo = explode("/",$vetor_foto['type']);
        $tipo = $vtipo[0] ?? "";
        $extensao = $vtipo[1] ?? "";
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 500000) and ($tipo == "image")){
            $nome_arquivo = date('Ymdhms').".".$extensao;
            move_uploaded_file($vetor_foto['tmp_name'], "/opt/lampp/htdocs/primeiraConexaoBDD/img/".$nome_arquivo);
            return $nome_arquivo;
        }else{
            return 0;
        }
    }
    function clear($conexao, $texto_puro){
        $texto = mysqli_real_escape_string($conexao, $texto_puro);
        $texto = htmlspecialchars($texto);
        return $texto;
    }
?>  