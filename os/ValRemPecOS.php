<?php
   require_once '../conexao.php'; 

   $idd = trim($_POST['id']);
   $idos = trim($_POST['idos']);
   $qtd = trim($_POST['idqtd']);
   $idpeca = trim($_POST['idpeca']);

   $con = open_conexao(); 
   //selectDb(); 
      //recuperar valor passado por get
   $id = trim($_REQUEST['idpeca']);
       //buscar no banco de dados
   $rs = mysqli_query($con, "select * from estoque WHERE id=".$id);
   
   $row = mysqli_fetch_array($rs); 
   $qtdest = $row['quantidade'];
   $soma = $qtdest + $qtd;
  
   if (!empty($idd) && !empty($id) && !empty($qtd)){
      $con = open_conexao(); 
      $sql = "DELETE FROM ospeca WHERE idd='$idd';";

      $rem = mysqli_query($con,$sql); 


      $sql2 = "UPDATE estoque SET quantidade='$soma'
             WHERE id='$id';";
      $upd = mysqli_query($con,$sql2); 
      close_conexao($con); 
      if ($rem==FALSE)
        $msg= "Erro na remoção de Peças<BR/>";
      else {
          $msg = "Foi removido ". mysqli_affected_rows() . " registro";
          unset($id); 
      }
      echo $qtd;
      echo '-';
      echo $qtdest;
      echo '-';
      echo $soma;
   }
   header('location: editos.php?idos='.$idos); 
?> 