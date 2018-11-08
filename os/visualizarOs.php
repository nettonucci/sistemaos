<?php
require_once '../conexao.php'; 

$con = open_conexao(); 
//selectDb(); 
   //recuperar valor passado por get
$id = trim($_REQUEST['idos']);
    //buscar no banco de dados
$rs = mysqli_query($con, "SELECT * FROM os INNER JOIN clientes ON (os.idcliente = clientes.id) WHERE os.idos=".$id);

$row = mysqli_fetch_array($rs);
$idos = $row['idos']; 
$cli = $row['idcliente']; 
$sta = $row['status'];
$dte = $row['dataentrada']; 
$tip = $row['tipoeqp'];
$mod = $row['modelo'];
$ser = $row['serial'];
$dts = $row['datasaida'];
$def = $row['defeito'];
$obs = $row['obs']; 
$lau = $row['laudo'];
$prod = $row['idproduto'];
$qtdp = $row['qtdproduto'];
$nome = $row['nome'];
$somapeca=null;
$somaserv=null;
require_once '../verifica.php';
$usuario= $_SESSION['user'];
$rs5 = mysqli_query($con,"select nome from usuarios where usuario ='$usuario';");
$row5 = mysqli_fetch_array($rs5);
$user = $row5['nome'];
close_conexao($con); 

?>

<?php
  //verifica sessão, se está logado 
//session_start();
//if (!isset($_SESSION['user'])) //AND (!isset($_SESSION[nome])) ) 
//Header("Location: index.html");

require_once '../conexao.php';
$con = open_conexao();
$rs1 = mysqli_query($con,"SELECT * FROM maoobra INNER JOIN os ON (maoobra.idos = os.idos) WHERE os.idos =".$id); //rs=record set (conjunto de registros)
$rs2 = mysqli_query($con,"SELECT * FROM ospeca INNER JOIN os ON (ospeca.idos = os.idos) INNER JOIN estoque ON(ospeca.idpeca = estoque.id) WHERE os.idos=".$id); //rs=record set (conjunto de registros)
close_conexao($con);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>Sistema Nucci</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">


  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
      
      </div>
    </div>
  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
  <li class="nav-item dropdown no-arrow mx-1">
    
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a class="dropdown-item">Olá <?php echo $user; ?></a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
</ul>

</nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../clientes/clientes.php">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../estoque/estoque.php">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="os.php">
            <i class="fas fa-fw fa-tags"></i>
            <span>Ordens de Serviço</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../vendas/vendas.php">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../caixa/caixa.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Relatórios</button>
  <div id="demo" class="collapse">
  <hr color=white>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_clientes.php">
              <i class="fas fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_estoque.php">
              <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_os.php">
              <i class="fas fa-fw fa-tags"></i>
            <span>OS's</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_vendas.php">
              <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_lanc.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
        <hr color=white>
  </div>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="os.php">Ordens de Serviço</a>
            </li>
            <li class="breadcrumb-item active">Visualizar OS</li>
          </ol>


          <!-- DataTables Example -->
          <form data-toggle="validator" method="post" action="valCadCli.php">
          <div class="card mb-3">
            <div class="card-header"
              <i class="fas fa-tags"></i>
              Visualizar OS</div>
              <td>
              <button type="button" class="btn btn-warning" title="Editar OS"
              onclick="javascript:location.href='editos.php?idos=' 
              + <?php echo $row['idos'] ?> ">
              <span class="ion-edit" aria-hidden="true"></span>
            </button>                 
          </td>  
            <div class="card-body">
              <div class="table-responsive">
                
                  <thead>
                  <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-det-tab" data-toggle="tab" href="#nav-det" role="tab" aria-controls="nav-det" aria-selected="true">Detalhes da OS</a>
              <a class="nav-item nav-link" id="nav-laudo-tab" data-toggle="tab" href="#nav-laudo" role="tab" aria-controls="nav-laudo" aria-selected="true">Laudo</a>
              <a class="nav-item nav-link" id="nav-pec-tab" data-toggle="tab" href="#nav-pec" role="tab" aria-controls="nav-pec" aria-selected="true">Peças</a>
              <a class="nav-item nav-link" id="nav-serv-tab" data-toggle="tab" href="#nav-serv" role="tab" aria-controls="nav-serv" aria-selected="true">Serviços</a>
              <a class="nav-item nav-link" id="nav-total-tab" data-toggle="tab" href="#nav-total" role="tab" aria-controls="nav-total" aria-selected="true">Total</a>
          </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-det" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <br>
                    <div class="col-sm-10">
                    <label><b>Ordem de serviço</b></label>
                    <p>
                    <?php echo $idos?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-10">
                    <label><b>Cliente</b></label>
                    <p>
                    <?php echo $nome?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Status</b></label>
                    <p>
                    <?php echo $sta?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Data de entrada</b></label>
                    <p>
                    <?php echo $dte?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Equipamento</b></label>
                    <p>
                    <?php echo $tip?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Modelo</b></label>
                    <p>
                    <?php echo $mod?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Serial/IMEI</b></label>
                    <p>
                    <?php echo $ser?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Defeito</b></label>
                    <p>
                    <?php echo $def?>
                    </div>
                    <hr>
                    <br>
                    <div class="col-sm-4">
                    <label><b>Observações</b></label>
                    <p>
                    <?php echo $obs?>
                    </div>
                    <br>
                  </div>

                  <div class="tab-pane fade show" id="nav-laudo" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                    <div class="col-sm-4">
                    <label><b>Laudo Técnico</b></label>
                    <p>
                    <?php echo $lau?>
                    </div>
                    </div>

                  <div class="tab-pane fade show" id="nav-pec" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                  <div class="col-sm-4">
                    <label><b>Peças utilizadas</b></label>
                    <p>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <div class="row col-md-7">
                      <table  class="table table-striped">
                      <tr>
                        <th widht="80" align="right">Peça</th>
                        <th widht="80" align="right">Quantidade</th>
                        <th widht="80" align="right">Valor</th>
                      </tr>
                      <?php while ($row = mysqli_fetch_array($rs2)) { ?> 
                      <tr>
             
                      <td><?php echo $row['descricao'] ?></td>
                      <td><?php echo $row['quantidadeos'] ?></td>
                      <td>R$<?php echo $row['precovenda'] ?>,00</td>
                      <?php
                        $somapeca = $somapeca + $row['precovenda'] * $row['quantidadeos'];
                        ?>                  
                      </tr>
                      <?php 
                        } ?>
                      
                      </div>
                      </table>
                      <hr>
                        <h4>
                        <?php
                        Echo 'Total de peças: R$';
                        Echo $somapeca;
                        Echo ',00';
                        ?>
                        </h4>
                        <br>
                    </div>

                    </div>

                    <div class="tab-pane fade show" id="nav-serv" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                  <div class="col-sm-4">
                    <label><b>Serviços realizados</b></label>
                    <p>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <div class="row col-md-7">
                      <table  class="table table-striped">
                      <tr>
                        <th widht="80" align="right">Serviço</th>
                        <th widht="80" align="right">Valor</th>
                      </tr>
                      <?php while ($row = mysqli_fetch_array($rs1)) { ?> 
                      <tr>
             
                      <td><?php echo $row['servico'] ?></td>
                      <td>R$<?php echo $row['valor'] ?>,00</td>
                      <?php
                        $somaserv = $somaserv + $row['valor'];
                        ?>
                      </div>          
                      </tr>
                      <?php 
                        } ?>
                      
                      </div>
                      </table>
                      <hr>
                      <h4>
                        <?php
                        Echo 'Total de serviços: R$';
                        Echo $somaserv;
                        Echo ',00';
                        ?>
                        </h4>
                    </div>
                    </div>

                    <div class="tab-pane fade show" id="nav-total" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                        <h2>Total</h2>
                        <hr>
                        <h4>
                        <?php
                        Echo 'Total de peças: R$';
                        Echo $somapeca;
                        Echo ',00';
                        ?>
                        <br>
                        
                        <hr>
                        <?php
                        Echo 'Total de serviços: R$';
                        Echo $somaserv;
                        Echo ',00';
                        ?>
                        </h4>
                        <hr>
                        <br>
                        
                        <h3>
                        <?php
                        $total = $somapeca + $somaserv;
                        Echo 'Total da Ordem de serviço: R$';
                        Echo $total;
                        Echo ',00';
                        ?>
                        </h3>
                    </div>


                  
                    </form>
                  </tbody>
                  </table>
              </div>
            </div>
            <div class="card-footer small text-muted"> </div>
          </div>



        </div>
        <!-- /.container-fluid -->
        


      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione sim para sair do sistema</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
          <a class="btn btn-primary" href="../sair.php">Sim</a>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>