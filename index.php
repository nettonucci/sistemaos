<?php
  //verifica sessão, se está logado 
//session_start();
//if (!isset($_SESSION['user'])) //AND (!isset($_SESSION[nome])) ) 
//Header("Location: index.html");

require_once 'conexao.php';
require_once 'verifica.1.php';
$con = open_conexao();
$rs = mysqli_query($con,"SELECT COUNT(*) as qtd FROM clientes;"); //rs=record set (conjunto de registros)
$rs2 = mysqli_query($con,"SELECT COUNT(*) as qtd2 FROM estoque;");
$rs3 = mysqli_query($con,"SELECT COUNT(*) as qtd3 FROM os;");
$rs4 = mysqli_query($con,"SELECT COUNT(*) as qtd4 FROM vendas;");
$row = mysqli_fetch_array($rs);
$row2 = mysqli_fetch_array($rs2);
$row3 = mysqli_fetch_array($rs3);
$row4 = mysqli_fetch_array($rs4);
$qtd = $row['qtd'];
$qtd2 = $row2['qtd2'];
$qtd3 = $row3['qtd3'];
$qtd4 = $row4['qtd4'];

$usuario= $_SESSION['user'];
$rs5 = mysqli_query($con,"select nome from usuarios where usuario ='$usuario';");
$row5 = mysqli_fetch_array($rs5);
$nome = $row5['nome'];
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

  <title>Sistema Nucci</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

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
        <a class="dropdown-item">Olá <?php echo $nome ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="clientes/clientes.php">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Clientes</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="estoque/estoque.php">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Estoque</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="os/os.php">
          <i class="fas fa-fw fa-tags"></i>
          <span>Ordens de Serviço</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vendas/vendas.php">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Vendas</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="caixa/caixa.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Relatórios</button>
  <div id="demo" class="collapse">
  <hr color=white>
  <li class="nav-item">
          <a class="nav-link" href="relatorios/rel_clientes.php">
              <i class="fas fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios/rel_estoque.php">
              <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios/rel_os.php">
              <i class="fas fa-fw fa-tags"></i>
            <span>OS's</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios/rel_vendas.php">
              <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios/rel_lanc.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
        <hr color=white>
  </div>
  <br>
  <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo1">Configuração</button>
  <div id="demo1" class="collapse">
  <hr color=white>
  <li class="nav-item">
          <a class="nav-link" href="user/msg_aut.php">
          <i class="fas fa-key"></i>
            <span>Usuários</span></a>
        </li>
        <hr color=white>
  </div>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Resumo</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <div class="mr-5"><?php echo $qtd?> Clientes</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="clientes/clientes.php">
                <span class="float-left">Mais</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-boxes"></i>
                </div>
                <div class="mr-5"><?php echo $qtd2?> Itens em Estoque</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="estoque/estoque.php">
                <span class="float-left">Mais</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-tags"></i>
                </div>
                <div class="mr-5"><?php echo $qtd3?> OS's</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="os/os.php">
                <span class="float-left">Mais</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php echo $qtd4?> Vendas</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="vendas/vendas.php">
                <span class="float-left">Mais</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y - H:i:s');
        ?>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Grafico OS's</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Atualizado em <?php echo $date ?> </div>
        </div>

        
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Studio BlueMind 2018</span>
          </div>
        </div>
      </footer>

    </div>
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
          <a class="btn btn-primary" href="sair.php">Sim</a>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
