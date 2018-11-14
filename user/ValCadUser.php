<?php
   require_once '../conexao.php'; 

   $nome = trim($_POST['nome']); 
   $user = trim($_POST['user']); 
   $pass = trim($_POST['pass']); 
   $pass2 = trim($_POST['pass2']); 
 
   
 
   if ($pass==$pass2){
      $con = open_conexao();  
      $sql = "INSERT INTO usuarios 
               (nome, usuario, senha)
        VALUES ('$nome', '$user', '$pass');";  
      $ins = mysqli_query($con, $sql); 
      echo $msg = "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!'); window.location = 'user.php';</script>";
   }
      else {
            echo $msg = "<script language='javascript' type='text/javascript'>alert('As senhas nao batem!'); window.location = 'CadUser.php';</script>";
      }
      close_conexao($con); 
      //echo $msg;
  // header("location: estoque.php");
?> 