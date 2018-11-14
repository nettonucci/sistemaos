<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
   $iduser = trim($_POST['iduser']);

   
   if(!empty($id)){
    $con = open_conexao(); 
    $sql = "DELETE FROM usuarios WHERE id='$id';";
    $rem = mysqli_query($con,$sql); 

                   close_conexao($con); 
                   
                   if($id==$iduser)
                   {
                    $msg = "<script language='javascript' type='text/javascript'>alert('Usuário removido com sucesso, necessario relogar!'); window.location = 'logout.php';</script>";;
                   }
                   else $msg = "<script language='javascript' type='text/javascript'>alert('Usuario removido com sucesso!'); window.location = 'user.php';</script>";;
      }
    echo $msg;


  
   //header("location: estoque.php"); 
?> 