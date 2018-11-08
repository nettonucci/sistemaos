<?php
    require_once 'conexao.php';
    $user = trim($_POST['user']);
    $pswd = trim($_POST['pass']);
    $con = open_conexao();
    $sql = "SELECT * FROM usuarios where usuario='$user';";
    $rs = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($rs);
    if($pswd == $row['senha']){
        session_start();
        $_SESSION['user'] = $user; 
        $msg = "<script language='javascript' type='text/javascript'>alert('Login efetuado com sucesso!!'); window.location = 'index.php';</script>";
    }
        else $msg = "<script language='javascript' type='text/javascript'>alert('Usuário ou senha inválidos!!'); window.location = 'login.php';</script>";; 
    echo $msg;
    close_conexao($con);
?>