<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['idos']);
   $lau = trim($_POST['idlaudo']);
   $sta =  trim($_POST['status']);

 
   if (!empty($id)){
    $con = open_conexao(); 
    $sql = "UPDATE os SET laudo='$lau', status='$sta'
           WHERE idos='$id';";
    $upd = mysqli_query($con,$sql); 
    close_conexao($con);

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($nome, $cpf, $telefone, $celular, $email, $cep, $rua, $numero, $bairro, $cidade, $estado); 
      }
      close_conexao($con); 
      echo $msg;
      echo $sta;
      echo $id;
      echo $lau;
   }
   header('location: editos.php?idos='.$id);
?> 