<?php
   require_once '../conexao.php'; 

   $peca = trim($_POST['idpec']); 
   $qtd = trim($_POST['idQtd']); 
   $idos = trim($_POST['idos']);

   $con = open_conexao(); 
   //selectDb(); 
      //recuperar valor passado por get
   $id = trim($_REQUEST['idpec']);
       //buscar no banco de dados
   $rs = mysqli_query($con, "select * from estoque WHERE id=".$id);
   
   $row = mysqli_fetch_array($rs); 
   $qtdest = $row['quantidade'];
   $soma = $qtdest - $qtd;

 
   if ($qtdest>=$qtd && $qtd!=0){
      $con = open_conexao();  
      $sql = "INSERT INTO ospeca 
               (idpeca, quantidadeos, idos)
        VALUES ('$peca', '$qtd', '$idos');";  
      $ins = mysqli_query($con, $sql); 

      $sql2 = "UPDATE estoque SET quantidade='$soma'
             WHERE id='$peca';";
      $upd = mysqli_query($con,$sql2); 
      $msg = "<script language='javascript' type='text/javascript'>alert('Peça inserida com sucesso!'); window.location = 'editos.php?idos=$idos';</script>";
   }
      else {
        $msg = "<script language='javascript' type='text/javascript'>alert('Quantidade em estoque insuficiente!!'); window.location = 'editos.php?idos=$idos';</script>";

      }
      if($qtd==0)
      {
        $msg = "<script language='javascript' type='text/javascript'>alert('Quantidade minima para inserção: 1 Item'); window.location = 'editos.php?idos=$idos';</script>";
      }
      close_conexao($con); 
      
   
   
?> 
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Page Title</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
   <script src="main.js"></script>
 </head>
 <body>
<?php
echo $msg;
?>
 </body>
 </html>
