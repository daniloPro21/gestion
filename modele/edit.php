<?php
include('connection.php');

if( empty($_GET['action']) or empty($_GET['id']) )

		{
			header('location:table.php');
		}


		if( $_GET['action']=='delete' AND !empty($_GET['id']) ){
			    $id=$_GET['id'];

				$delete= "DELETE FROM employer WHERE matricule='$id' ";
				$delete1= "DELETE FROM exercer WHERE matricule='$id'";
				$delete2= "DELETE FROM posseder WHERE matricule='$id' ";
				$dani=mysqli_query($db,$delete);
				$dani1=mysqli_query($db,$delete1);
				$dani2=mysqli_query($db,$delete2);
				if($dani){

						echo '<script>alert("suppression ressusit");window.location="../vue/Admin/tables.php"</script>';

				}else{

					echo '<script>alert("suppression echouer");window.location="../vue/Admin/tables.php"</script>';

				}

		}

		 if ($_GET['action']=='edit' AND !empty($_GET['id']) AND !empty($_POST)) {
		 	$lastmatricule=$_GET['id'];
		 	if (isset($_POST['valider'])){ 

             if(!empty($_POST['matricule']) AND !empty($_POST['num_con'])AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['age'])AND !empty($_POST['sexe'])  AND !empty($_POST['cni']) AND !empty($_POST['status']) AND !empty($_POST['salaireb']) AND !empty($_POST['prime']) AND !empty($_POST['salairetle'])  AND !empty($_POST['poste'])){

            $matricule= $_POST['matricule'];
            $matricule= $_POST['num_con'];
            $nom= $_POST['nom'];
            $prenom= ($_POST['prenom']);
            $age= ($_POST['age']);
            $sexe= ($_POST['sexe']);
            $cni= ($_POST['cni']);
            $status= ($_POST['status']);
            $salaireb= ($_POST['salaireb']);
            $prime= ($_POST['prime']);
            $salairetle= ($_POST['salairetle']);
            $poste= ($_POST['poste']);
            $sql= "UPDATE employer SET matricule='$matricule', nom='$nom', prenom='$prenom', age='$age', sexe='$sexe', cni='$cni', status='$status', salaire_b='$salaireb', prime='$prime', salaire_tle='$salairetle' WHERE matricule='$lastmatricule'";
            $sql1="UPDATE exercer SET matricule= '$matricule', poste='$poste' WHERE matricule='$lastmatricule'";
            $sql2="UPDATE  posseder SET  matricule='$matricule', num_con='$num_con' WHERE matricule='$lastmatricule' ";
              $reusit=mysqli_query($db,$sql);
              $reusit1=mysqli_query($db,$sql1);
              $reusit2=mysqli_query($db,$sql2);

                 if ($reusit){

                   echo '<script>alert("Modification ressusit");window.location="../vue/Admin/tables.php"</script>';

                     }else{
               echo '<script>alert("verifiez vos champs");window.location="../vue/Admin/tables.php"</script>';

            }
                }
            }

		 	
		 }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="../vue/Admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vue/Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vue/Admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../vue/Admin/css/sb-admin.css" rel="stylesheet">

  </head>


  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="admin.php">Home</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
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
         <a class="dropdown-item" href="../../modele/logout.php">logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="admin.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Ajouter un employer</li>
          </ol>

          <!-- Page Content -->
            <form method="post" >
              <div class="form-group">
             MATRICULE <input type="text" class="form-control" name="matricule" placeholder="le matricule de l'employer"><br>
             NUMERO DE CONTRAT <input type="text" class="form-control" name="num_con" placeholder="le Numero de contrat"><br>
             NOM <input type="text" class="form-control" name="nom" placeholder="nom de l'employer" required><br>
             PRENOM <input type="text" class="form-control" name="prenom" placeholder="prenon de l'employer" required><br>
             AGE <input type="text" class="form-control" name="age" placeholder="age de l'employer" required><br>
             SEXE :
            Masculin <input type="radio"  name="sexe" value="masculin" required>
            Feminin <input type="radio"  name="sexe" value="feminin" required><br></br>
             CNI <input type="text" class="form-control" name="cni" placeholder="CNI de l'employer" required><br>
             STATUS <input type="text" class="form-control" name="status" placeholder="status de l'employer" required><br>
             POSTE <input type="text" class="form-control" name="poste" placeholder="poste de l'employer" required><br>
             SALAIRE DE BASE <input type="text" class="form-control" name="salaireb" placeholder="salire de base" required><br>
             PRIME <input type="text" class="form-control" name="prime" placeholder="prine de l'employer" required><br>
             SALAIRE TOTAL <input type="text" class="form-control" name="salairetle" placeholder="salaire totla" required><br>
             <div class="form-group form-button">
             <input type="submit" name="valider"  id="signup" class="btn btn-success" value="VALIDE" required/>
             <button type="reset" class="btn btn-danger" name="annuler">ANNULER</button>
              </div>
           </div>
         </form>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
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
    <script src="../vue/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="../vue/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vue/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../vue/Admin/js/sb-admin.min.js"></script>

  </body>

</html>

