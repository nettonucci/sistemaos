<?php
   require_once '../conexao.php'; 

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
   $data = trim($_POST['iddatacad']);

 
   if (!empty($nome) && !empty($cpf) && !empty($telefone) && !empty($celular) && !empty($email) && !empty($cep) && !empty($rua) && !empty($numero) && !empty($bairro) && !empty($cidade) && !empty($estado)){
      $con = open_conexao();  
      $sql = "INSERT INTO clientes 
               (nome, cpf, telefone, celular, email, cep, rua, numero, bairro, cidade, estado, datacad)
        VALUES ('$nome', '$cpf', '$telefone', '$celular', '$email', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$data');";  
      $ins = mysqli_query($con, $sql); 

      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          //$msg = "Foi inserido com sucesso";
          unset($nome, $cpf, $telefone, $celular, $email, $cep, $rua, $numero, $bairro, $cidade, $estado); 
      }
      close_conexao($con); 
      //echo $msg;
   }
  // header("location: clientes.php");
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
          <h4 class="modal-title">Cadastro de Cliente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'Cliente cadastrado com sucesso!';
            
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