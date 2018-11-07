<?php 
    require_once '../../conexao.php';
    $quant = trim($_POST['quantidade']);
    $con = open_conexao(); 
    $sql = mysqli_query($con, "SELECT estoque.* from estoque WHERE quantidade =".$quant);
 
    $sql2 = mysqli_query($con, "SELECT count(*) AS qtd FROM estoque WHERE quantidade =".$quant); 
    $row2 = mysqli_fetch_array($sql2); 
    

    $qtd = $row2['qtd']; 
    if($qtd==0){
        echo $msg = "<script language='javascript' type='text/javascript'>alert('Nenhum resultado encontrado'); window.close();</script>";;
    }
?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Relatorio Customisado de estoque</title>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    
    <br>
    <div class="container">
    <table  class="table table-striped">

            <tr>
             <th widht="300" align="right">Descriçaão</th>
             <th widht="80" align="right">Preço de compra</th>
             <th widht="80" align="right">Preço de venda</th>
             <th widht="80" align="center">Quantidade em estoque</th>
             <th widht="80" align="center">Data de cadastro</th>
           </tr>

           <?php while ($row = mysqli_fetch_array($sql)) { ?> 

           <tr>
            <td><?php echo $row['descricao'] ?></td>
            <td><?php echo $row['precocompra'] ?></td>
            <td><?php echo $row['precovenda'] ?></td>
            <td><?php echo $row['quantidade'] ?></td>
            <td><?php echo $row['datacad'] ?></td>
         </tr>

         
      <?php
    } ?>
    </div> 
    <hr>
    <div>
    <h5><?php 
    echo 'Relatório customizado de estoque - ';
    echo 'Com quantidade em estoque: ';
    echo $quant;
    ?></h5>
    
    <hr>
    <?php
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d/m/Y - H:i:s');
    echo 'Data da consulta: ';
    echo $date;
    ?>
    <p>
    <p>
    <button onclick="myFunction()">Imprimir</button>

    <script>
    function myFunction() 
    {
        window.print();
    }
    </script>
    </div>
    <hr>
    
</body>
</html>