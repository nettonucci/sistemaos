<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
   $desc = trim($_POST['idDesc']); 
   $comp = trim($_POST['idComp']); 
   $vend = trim($_POST['idVend']);
   $qtd = trim($_POST['idQtd']);

   if (!empty($id) && !empty($desc) && !empty($comp) && !empty($vend) && !empty($qtd)){
      $con = open_conexao(); 
      $sql = "UPDATE estoque SET descricao='$desc', precocompra='$comp', precovenda='$vend', quantidade='$qtd'
             WHERE id='$id';";

      $upd = mysqli_query($con,$sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Peças<BR/>";
      else {
          //$msg = "Foi alterado ". mysqli_affected_rows() . " registro";
          unset($id, $qtde, $val); 
      }
      //echo $msg;
   }
   //header("location: estoque.php"); 
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
          <h4 class="modal-title">Alterar peça</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'Peça alterada com sucesso!';
            
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a class="btn btn-success" href="estoque.php"> OK</a>
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


</body>
</html>