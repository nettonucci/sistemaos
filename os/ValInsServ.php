<?php
   require_once '../conexao.php'; 

   $serv = trim($_POST['servico']); 
   $val = trim($_POST['valor']); 
   $idos = trim($_POST['idos']);
   $id = $idos;
 
   if (!empty($serv) && !empty($val) && !empty($idos)){
      $con = open_conexao();  
      $sql = "INSERT INTO maoobra 
               (servico, valor, idos)
        VALUES ('$serv', '$val', '$idos');";  
      $ins = mysqli_query($con, $sql); 

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {  
        $msg = "<script language='javascript' type='text/javascript'>alert('Serviço inserido com sucesso!'); window.location = 'editos.php?idos=$idos';</script>";
      }
      close_conexao($con); 
      echo $msg;
   }
?> 