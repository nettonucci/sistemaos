<?php
  require_once '../conexao.php';

   $id = trim($_POST['idid']);

   $con = open_conexao();

   if($id!=null)
   {
    $rs3 = mysqli_query($con,"SELECT COUNT(*) as qtd3 FROM os where idos=$id;");
    $row = mysqli_fetch_array($rs3);
    $qtd = $row['qtd3'];


    if($qtd!=0)
      {

          header('location: editos.php?idos='.$id);
      }
      else
    {
      echo $msg = "<script language='javascript' type='text/javascript'>alert('Ordem de serviço invalida'); window.location = 'os.php';</script>";;
    }
   }
  else
   {
     echo $msg = "<script language='javascript' type='text/javascript'>alert('Campo OS Nº não pode ser nulo'); window.location = 'os.php';</script>";;
   }

   
?> 