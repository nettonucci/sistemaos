<?php
   require_once '../conexao.php'; 

   $id = trim($_POST['idos']); 
   $cli = trim($_POST['idcli']); 
   $eqp = 'Pagamento da OS '.$id;
   $val = trim($_POST['idval']);
   $mtdpgto = trim($_POST['idmtdpgto']);
   $forpgto = trim($_POST['idforpgto']);
   $pgto = 1;
   $tip = 'RECEITA';
   $data = trim($_POST['iddata']);
   $status = 'Equipamento entregue';
   $porc = trim($_POST['idporc']);
   $real = trim($_POST['idreal']);

   if($porc!=0)
   {
      $desconto=$val*$porc/100;
      $val=$val-$desconto;
   }
   else if($real!=0)
   {
     $val=$val-$real;
   }


 
   if (!empty($id)){
      $con = open_conexao();  
      $sql = "INSERT INTO caixa 
               (ospgto, clientepgto, eqppgto, valpgto, mtdpgto, formpgto, tipopgtoo, dataentrada)
        VALUES ('$id', '$cli', '$eqp', '$val', '$mtdpgto', '$forpgto', '$tip', '$data');";  
      $ins = mysqli_query($con, $sql); 

      $sql2 = "UPDATE os SET final='$pgto', datasaida='$data', status='$status'
             WHERE idos='$id';";
      $upd = mysqli_query($con,$sql2); 
      $msg= "Peça adicionada com sucesso";
   
      if ($ins==FALSE)
        $msg= "Erro no cadastro de cliente<BR/>";
      else {
          $msg = "Foi inserido com sucesso";
          unset($serv, $val, $idos); 
      }
      close_conexao($con); 
      //echo $msg;
   }
   //header('location: editos.php?idos='.$id);
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
          <h4 class="modal-title">Finalizar OS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo 'Ordem de serviço finalizada com sucesso!';
            
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
