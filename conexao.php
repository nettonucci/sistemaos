<?php
function open_conexao(){
    $conexao = mysqli_connect("localhost", "root", "", "banco");
    if (!$conexao) {
        echo "Erro ao conectar no banco de dados....";
        exit;
    }
    return $conexao; 
}

function close_conexao($conexao) {
    if (!$conexao) {
        echo "Erro ao fechar banco MySql...";
        //exit;   
    }
     mysqli_close($conexao);
}

?>
