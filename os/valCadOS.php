<?php
   require_once '../conexao.php'; 

   $status = trim($_POST['idstatus']); 
   $idcliente = trim($_POST['idcli']); 
   $dataentrada = trim($_POST['iddataent']);
   $tipoeqp = trim($_POST['idequip']);
   $modelo = trim($_POST['idmodelo']);
   $serial = trim($_POST['idserial']); 
   $defeito = trim($_POST['iddef']); 
   $obs = trim($_POST['idobs']); 

 
   if (!empty($status) && !empty($idcliente) && !empty($dataentrada) && !empty($defeito) && !empty($obs)){
      $con = open_conexao();  
      $sql = "INSERT INTO os 
               (status, idcliente, dataentrada, tipoeqp, modelo, serial, defeito, obs)
        VALUES ('$status', '$idcliente', '$dataentrada', '$tipoeqp', '$modelo', '$serial', '$defeito', '$obs');";  
      $ins = mysqli_query($con, $sql); 

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($nome, $cpf, $telefone, $celular, $email, $cep, $rua, $numero, $bairro, $cidade, $estado); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: os.php");
?> 