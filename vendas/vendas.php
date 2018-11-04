<?php
  //verifica sessão, se está logado 
//session_start();
//if (!isset($_SESSION['user'])) //AND (!isset($_SESSION[nome])) ) 
//Header("Location: index.html");

require_once '../conexao.php';
$con = open_conexao();
$rs = mysqli_query($con,"SELECT * FROM vendas"); //rs=record set (conjunto de registros)
$query3 = mysqli_query($con,"select * from for_pgto;");
$query = mysqli_query($con,"select * from estoque;");
close_conexao($con);
$total=null;
$desp=null;
$rec=null;
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
        <li class="nav-item">
          <a class="nav-link" href="../os/os.php">
            <i class="fas fa-fw fa-tags"></i>
            <span>Ordens de Serviço</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="vendas.php">
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
  <li class="nav-item">
          <a class="nav-link" href="caixa.php">
              <i class="fas fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="caixa.php">
              <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="caixa.php">
              <i class="fas fa-fw fa-tags"></i>
            <span>OS's</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="caixa.php">
              <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="caixa.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
  </div>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Vendas</li>
          </ol>

          <form data-toggle="validator" method="post" action="ValCadVen.php">
 <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong1"> <i class="ion-plus-round"></i>
  Nova venda</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nova venda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
                      <div>
                        <label><b>Cliente/Fornecedor</b><span class="required">*</span></label>
                        <input type="text" class="form-control" name="idcli">
                      </div>
                    <hr>

                    <div class="container">
                    <label><b>Produto</b><span class="required">*</span></label>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Avulso</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Estoque</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
    <input type="hidden" name="iddata" id="id"  value="<?php echo date('d/m/Y'); ?>">
    <div>
                        <label>Descrição<span class="required">*</span></label>
                        <input type="text" class="form-control" name="iddes">
                      </div>
                      <br>
                      <div>
                        <label>Valor<span class="required">*</span></label>
                        <input type="text" class="form-control" name="idval">
                      </div>
                    <hr>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
    <select class="form-control" name="idpec" id="peca">
                        <option>Selecione...</option>
 
                          <?php while($prod = mysqli_fetch_array($query)) { ?>
                              <option value="<?php echo $prod['id'] ?>"><?php echo $prod['descricao'] ?> || Quantidade: <?php echo $prod['quantidade'] ?> || Valor: <?php echo $prod['precovenda'] ?></option>
                                <?php } ?>
                                   </select>
                                   <br>
                                   <div>
                      <label>Quantidade</label>
                      <input type="text" class="form-control" name="idQtd">
                    </div>
    </div>
  </div>
</div>
<hr>                

                    <label><b>Metodo de pagamento</b></label>
                    <select class="form-control" name="idmtdpgto" id="pgto">
                        <option>Selecione...</option>
 
                          <?php while($tipo = mysqli_fetch_array($query3)) { ?>
                              <option value="<?php echo $tipo['id'] ?>"><?php echo $tipo['tipopgto'] ?></option>
                                <?php } ?>
                                   </select>
                    <hr>   
                    
                    <label><b>Forma de pagamento</b></label>
                    <select class="form-control" name="idforpgto" id="peca">
                    <option selected>Selecione...</option>
                    <option value="À vista">À vista</option>
                    <option value="1x">1x</option>
                    <option value="2x">2x</option>
                    <option value="3x">3x</option>
                    <option value="4x">4x</option>
                    <option value="5x">5x</option>
                    <option value="6x">6x</option>
                    <option value="7x">7x</option>
                    <option value="8x">8x</option>
                    <option value="9x">9x</option>
                    <option value="10x">10x</option>
                    <option value="11x">11x</option>
                    <option value="12x">12x</option>
                    </select>
                    <hr>
                    <div class="container">
<label><b>Desconto</b></label>
<br>
<br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#por">%</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#real">R$</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="por" class="container tab-pane active"><br>
      <div>
                        <label>Desconto em %</label>
                        <input type="text" value='0' class="form-control" name="idporc">
                      </div>
                      <br>
                    <hr>
    </div>
    <div id="real" class="container tab-pane fade"><br>
      <div>
                        <label>Desconto em R$</label>
                        <input type="text" value='0' class="form-control" name="idreal">
                      </div>
                      <br>
                    <hr>
    </div>

  </div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-outline-success" value="Adicionar"/>
      </div>
    </div>
  </div>
</div>
                    
                    
                      </form>

                      
          <!-- DataTables Example -->
          <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-shopping-cart"></i>
              Vendas</div>
            <div class="card-body">
              <div class="table-responsive">
                  <thead>
                  
          <table  class="table table-striped">
            <tr>
            <th widht="80" align="right">Venda</th>
             <th widht="80" align="right">Cliente/Fornecedor</th>
             <th widht="80" align="right">Descrição</th>
             <th widht="80" align="center">Valor</th>
             <th widht="80" align="center">Data da venda</th>
             <th widht="80" align="center">Tipo da venda</th>
             <th></th>
           </tr>
		<?php while ($row = mysqli_fetch_array($rs)) { ?> 
           <tr>
             
           <td><?php echo $row['idv'] ?></td>
            <td><?php echo $row['cliente'] ?></td>
            <td><?php echo $row['descricaov'] ?></td>
            <td>R$<?php echo $row['valor'] ?>,00</td>
            <td><?php echo $row['datavenda'] ?></td>
            <td><?php echo $row['tipovenda'] ?></td>


          <td>
            <button type="button" class="btn btn-danger" title="Remover cliente"
            onclick="javascript:location.href='removCli.php?id=' 
            + <?php echo $row['id'] ?> ">
            <span class="ion-trash-a" aria-hidden="true"></span>
          </button>                 
        </td>                    
      </tr>
      
      <?php 
    } ?>

           </table>
           </div>
    </div>
    
           
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"> </div>
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
