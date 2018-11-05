<?php
   require_once '../conexao.php'; 
 
   $cli = trim($_POST['idclid']); 
   $eqp = trim($_POST['iddesd']);
   $val = trim($_POST['idvald']);
   $mtdpgto = trim($_POST['idmtdpgtod']);
   $forpgto = trim($_POST['idforpgtod']);
   $data = trim($_POST['iddata']);
   $tip = 'DESPESA';

 
   if (!empty($cli)){
      $con = open_conexao();  
      $sql = "INSERT INTO caixa 
               (clientepgto, eqppgto, valpgto, mtdpgto, formpgto, dataentrada, tipopgtoo)
        VALUES ('$cli', '$eqp', '$val', '$mtdpgto', '$forpgto', '$data', '$tip');";  
      $ins = mysqli_query($con, $sql);
   
      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          //$msg = "Foi inserido com sucesso";
          unset($serv, $val, $idos); 
      }
      close_conexao($con); 
      //echo $msg;
      //echo $cli;
      //echo $eqp;
      //echo $val;
      //echo $mtdpgto;
      //echo $forpgto;
      //echo $tip;
   }
   //header('location: caixa.php');
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
          <h4 class="modal-title">Nova despesa</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'Despesa adicionada com sucesso!';
            
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

