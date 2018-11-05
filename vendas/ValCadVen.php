<?php
   require_once '../conexao.php'; 

   $cli = trim($_POST['idcli']); 
   $des = trim($_POST['iddes']);
   $val = trim($_POST['idval']);
   $peca = trim($_POST['idpec']);
   $mtdpgto = trim($_POST['idmtdpgto']);
   $forpgto = trim($_POST['idforpgto']);
   $porc = trim($_POST['idporc']);
   $real = trim($_POST['idreal']);
   $tip = 'RECEITA';
   $data = trim($_POST['iddata']);
   $peca2=null;
   $qtd = trim($_POST['idQtd']); 
   $qtdest=null;
   $soma=null;
   $tip2=null;
   $desconto=null;


   if(!empty($des))
   {
      $peca2=$des;
      $tip2='AVULSA';
   }
   else
   {
    $con = open_conexao(); 
    //selectDb(); 
       //recuperar valor passado por get
    $id = trim($_REQUEST['idpec']);
        //buscar no banco de dados
    $rs = mysqli_query($con, "select * from estoque WHERE id=".$id);
    
    $row = mysqli_fetch_array($rs); 
    $qtdest = $row['quantidade'];
    $soma = $qtdest - $qtd;
    $peca2=$row['descricao'];
    $val = $row['precovenda'] * $qtd;
    $tip2='ESTOQUE';
   }

   if($porc!=0)
   {
      $desconto=$val*$porc/100;
      $val=$val-$desconto;
   }
   else if($real!=0)
   {
     $val=$val-$real;
   }

   
 
   if ($qtdest>=$qtd && $qtd!=0){
      $con = open_conexao();  
      $sql = "INSERT INTO vendas
               (cliente, descricaov, valor, datavenda, tipovenda)
        VALUES ('$cli', '$peca2', '$val', '$data', '$tip2');";  
      $ins = mysqli_query($con, $sql); 

      $sql2 = "INSERT INTO caixa 
                (clientepgto, eqppgto, valpgto, mtdpgto, formpgto, tipopgtoo, dataentrada)
        VALUES ('$cli', '$peca2', '$val', '$mtdpgto', '$forpgto', '$tip', '$data');";   
      $ins = mysqli_query($con, $sql2); 
      
      $sql3 = "UPDATE estoque SET quantidade='$soma'
      WHERE id='$peca';";
      $upd = mysqli_query($con,$sql3);
      $msg= 'Venda criada com sucesso!'; 
      $msg2= 'Nova venda';
    }
    else {
      $msg= "Quantidade solicitada do produto insuficiente";
      $msg2= 'OPS!';
    }
    if($qtd==0)
    {
      $msg='Quantidade minima para venda: 1 Item';
    }
    close_conexao($con);  
   
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
          <h4 class="modal-title"><?php Echo $msg2;?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
            Echo $msg;
            
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a class="btn btn-success" href="vendas.php"> OK</a>
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
