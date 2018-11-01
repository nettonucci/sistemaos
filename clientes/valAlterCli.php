<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['id']);
   $nome = trim($_POST['idNome']); 
   $cpf = trim($_POST['idCpf']); 
   $telefone = trim($_POST['idTel']); 
   $celular = trim($_POST['idCel']); 
   $email = trim($_POST['idEmail']); 
   $cep = trim($_POST['idCep']); 
   $rua = trim($_POST['idRua']);
   $numero = trim($_POST['idNum']); 
   $bairro = trim($_POST['idBai']); 
   $cidade = trim($_POST['idCid']); 
   $estado = trim($_POST['idEst']); 

   if (!empty($nome) && !empty($cpf) && !empty($telefone) && !empty($celular) && !empty($email) && !empty($cep) && !empty($rua) && !empty($numero) && !empty($bairro) && !empty($cidade) && !empty($estado)){
    $con = open_conexao(); 
      $sql = "UPDATE clientes SET nome='$nome', cpf='$cpf', telefone='$telefone', celular='$celular', email='$email', cep='$cep', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado'
             WHERE id='$id';";

      $upd = mysqli_query($con,$sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Cliente<BR/>";
      else {
          //$msg = "Foi alterado ". mysqli_affected_rows() . " registro";
          unset($id, $qtde, $val); 
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
          <h4 class="modal-title">Editar Cliente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'Cliente alterado com sucesso!';
            
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a class="btn btn-success" href="clientes.php"> OK</a>
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