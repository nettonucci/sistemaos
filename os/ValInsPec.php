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
      $msg= "Peça adicionada com sucesso";
   }
      else {
        $msg= "Quantidade em estoque insuficiente";
      }
      if($qtd==0)
      {
        $msg='Quantidade minima para inserção: 1 Item';
      }
      close_conexao($con); 
   
   
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Inseção de peça</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo $msg;
            Echo "<script>
            function redirecionar(){
              window.location.href=editos.php?idos=$idos;
            }
            </script>";
            
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <input type="button" value="OK" onclick="redirecionar()">
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<?php
			$modal = "pendente";
			if($modal == "pendente"){ ?>
				<script>
					$(document).ready(function(){
						$('#myModal').modal('show');
					});
				</script>
			<?php } ?>

<?php 

//header('location: editos.php?idos='.$idos);

?>

</body>
</html>
