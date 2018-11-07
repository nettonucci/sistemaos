<?php
require_once '../conexao.php'; 

$con = open_conexao(); 
//selectDb(); 
   //recuperar valor passado por get
$id = trim($_REQUEST['id']);
    //buscar no banco de dados
$rs = mysqli_query($con, "select * from clientes where id=".$id);

$row = mysqli_fetch_array($rs);
$id = $row['id']; 
$nome = $row['nome']; 
$cpf = $row['cpf'];
$tel = $row['telefone']; 
$cel = $row['celular'];
$email = $row['email'];
$cep = $row['cep'];
$rua = $row['rua']; 
$num = $row['numero'];
$bai = $row['bairro'];
$cid = $row['cidade'];
$est = $row['estado'];
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <title>Sistema - Nucci</title>

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

      <a class="navbar-brand mr-1" href="index.html">Menu</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
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
        <li class="nav-item active">
          <a class="nav-link" href="clientes.php">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../estoque/estoque.php">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../os/os.php">
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
              <a href="clientes.php">Clientes</a>
            </li>
            <li class="breadcrumb-item active">Editar Cliente</li>
          </ol>


          <!-- DataTables Example -->
          <form data-toggle="validator" method="post" action="valAlterCli.php">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user-alt"></i>
              Editar Cliente</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  
                  <input type="hidden" name="id"  value="<?php echo $id?>">
                  
                  <div id="accordion">
                    <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <i class="btn btn-link" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Dados Pessoais
</i>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <div class="col-sm-4">
                      <label>Nome</label> 
                      <input type="text" class="form-control" name="idNome" value="<?php echo $nome?>">
                    </div>
                    <br>
                    <div class="col-sm-4">
                        <label>CPF/CNPJ</label>
                        <input type="text" class="form-control" name="idCpf" value="<?php echo $cpf?>" >
                      </div>
                      
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <i class="btn btn-link collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Contatos
</i>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      
        <div class="col-sm-4">
          <label>Telefone</label>
            <input type="text" class="form-control" name="idTel" value="<?php echo $tel?>" >
        </div>
        <br>
        <div class="col-sm-4">
          <label>Celular</label>
            <input type="text" class="form-control" name="idCel" value="<?php echo $cel?>" >
         </div>
        <br>
        <div class="col-sm-4">
          <label>Email</label>
            <input type="text" class="form-control" name="idEmail" value="<?php echo $email?>" >
        </div>

      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <i class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Endereço
</i>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      <div class="col-sm-4">
                        <label>CEP</label>
                        <input type="text" class="form-control" name="idCep" value="<?php echo $cep?>" >
                      </div>
                      <br>
                      <div class="col-sm-4">
                        <label>Rua</label>
                        <input type="text" class="form-control" name="idRua" value="<?php echo $rua?>" >
                      </div>
                      <br>
                      <div class="col-sm-4">
                        <label>Numero</label>
                        <input type="text" class="form-control" name="idNum" value="<?php echo $num?>" >
                      </div>
                      <br>
                      <div class="col-sm-4">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name="idBai" value="<?php echo $bai?>" >
                      </div>
                      <br>
                      <div class="col-sm-4">
                        <label>Cidade</label>
                        <input type="text" class="form-control" name="idCid" value="<?php echo $cid?>" >
                      </div>
                      <br>
                      <div class="col-sm-4">
                        <label>Estado</label>
                        <input type="text" class="form-control" name="idEst" value="<?php echo $est?>" >
                      </div>
      </div>
    </div>
  </div>
</div>
<br>
<input type="submit" class="btn btn-outline-success" value="Atualizar"/>







                    </form>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"> </div>
          </div>

         

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
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
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
