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
          $msg = "Foi inserido com sucesso";
          unset($serv, $val, $idos); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header('location: editos.php?idos='.$id);
?> 