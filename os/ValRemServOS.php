<?php
   require_once '../conexao.php'; 

   $idd = trim($_POST['id']);
   $idos = trim($_POST['idos']);
   $serv = trim($_POST['idserv']);
   $val = trim($_POST['idval']);
   $msg=null;
  
   if (!empty($idd) && !empty($idos) && !empty($serv)){
      $con = open_conexao(); 
      $sql = "DELETE FROM maoobra WHERE id='$idd';";

      $rem = mysqli_query($con,$sql); 

      close_conexao($con); 
      if ($rem==FALSE)
        $msg= "Erro na remoção de Peças<BR/>";
      else {
        $msg = "<script language='javascript' type='text/javascript'>alert('Serviço removido com sucesso!'); window.location = 'editos.php?idos=$idos';</script>";
      }  
   }
   //header('location: editos.php?idos='.$idos); 
?> 