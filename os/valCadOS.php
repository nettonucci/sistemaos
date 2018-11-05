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
      //echo $msg;
   }
   //header("location: os.php");
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
          <h4 class="modal-title">Nova OS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'OS aberta com sucesso!';
            
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a class="btn btn-success" href="os.php"> OK</a>
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