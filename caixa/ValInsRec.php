<?php
   require_once '../conexao.php'; 
 
   $cli = trim($_POST['idclir']); 
   $eqp = trim($_POST['iddesr']);
   $val = trim($_POST['idvalr']);
   $mtdpgto = trim($_POST['idmtdpgtor']);
   $forpgto = trim($_POST['idforpgtor']);
   $data = trim($_POST['iddata']);
   $tip = 'RECEITA';

 
   if (!empty($cli)){
      $con = open_conexao();  
      $sql = "INSERT INTO caixa 
               (clientepgto, eqppgto, valpgto, mtdpgto, formpgto, dataentrada, tipopgtoo)
        VALUES ('$cli', '$eqp', '$val', '$mtdpgto', '$forpgto', '$data', '$tip');";  
      $ins = mysqli_query($con, $sql); 
   
      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($serv, $val, $idos); 
      }
      close_conexao($con); 
      echo $msg;
      echo $cli;
      echo $eqp;
      echo $val;
      echo $mtdpgto;
      echo $forpgto;
      echo $tip;
      echo $data;
   }
   //header('location: caixa.php');
?> 

