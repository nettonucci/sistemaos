<?php
   require_once '../conexao.php'; 
 
   $cli = trim($_POST['idclid']); 
   $eqp = trim($_POST['iddesd']);
   $val = trim($_POST['idvald']);
   $mtdpgto = trim($_POST['idmtdpgtod']);
   $forpgto = trim($_POST['idforpgtod']);
   $tip = 'DESPESA';

 
   if (!empty($cli)){
      $con = open_conexao();  
      $sql = "INSERT INTO caixa 
               (clientepgto, eqppgto, valpgto, mtdpgto, formpgto, tipopgtoo)
        VALUES ('$cli', '$eqp', '$val', '$mtdpgto', '$forpgto', '$tip');";  
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
   }
   header('location: caixa.php');
?> 

