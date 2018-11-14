<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
   $passant = trim($_POST['passant']); 
   $passnova = trim($_POST['passnova']); 
   $passnova2 = trim($_POST['passnova2']);
   $iduser = trim($_POST['iduser']);

   $con = open_conexao();
   $sql = "SELECT * FROM usuarios where id='$id';";
    $rs = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($rs);
    if($passant == $row['senha']){
      if($passnova==$passnova2){
      $con = open_conexao(); 
      $sql = "UPDATE usuarios SET senha='$passnova'
             WHERE id='$id';";
                   $upd = mysqli_query($con,$sql); 
                   close_conexao($con); 
                   
                   if($id==$iduser)
                   {
                    $msg = "<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso, necessario relogar!'); window.location = 'logout.php';</script>";;
                   }
                   else $msg = "<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!'); window.location = 'user.php';</script>";;
      }
      else  $msg = "<script language='javascript' type='text/javascript'>alert('Senhas nao batem!'); window.history.back();</script>";; 
    }
        else $msg = "<script language='javascript' type='text/javascript'>alert('Senha antiga invalida!'); window.history.back();</script>";; 
    echo $msg;

      $upd = mysqli_query($con,$sql); 


  
   //header("location: estoque.php"); 
?> 