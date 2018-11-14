<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
  
   if (!empty($id)){
      $con = open_conexao(); 
      $sql = "DELETE FROM caixa WHERE iid='$id';";

      $rem = mysqli_query($con,$sql); 
      close_conexao($con); 

      if ($rem==FALSE)
        $msg= "Erro na remoção de Cliente<BR/>";
      else {
          //$msg = "Foi removido ". mysqli_affected_rows() . " registro";
          unset($id); 
      }
      //echo $msg;
   }
   //header("location: clientes.php"); 
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
          <h4 class="modal-title">Remover Cliente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'Lançamento removido com sucesso!';
            
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a class="btn btn-success" href="caixa.php"> OK</a>
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