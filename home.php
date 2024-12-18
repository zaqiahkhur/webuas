<?php
require_once('database.php');
$barang=jumlah();
$peminjam=jumlahpinjam();
$user=jumlahUser();
$barang_terbanyak = getTopPinjam();
$total_barang_sudah_kembali = getCountStatus("peminjaman", "kembali");
$barang_belum_kembali = getCountStatus("peminjaman", "belum kembali");


session_start();
// $GetCoba1=cobaGet1();
?>

<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    if($_SESSION['status']!="login"){
        header("location:login.php?msg=belum_login");
    }
    ?>    


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
      <?php include("sidebar.php");?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                          
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">   
                         <li class="nav-item d-flex align-items-center">
                              <span class="mr-2">Hello <?=$_SESSION['username']?></span>
                          </li>

                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
             
<!-- card -->
<div class="card" style="margin-top: 50px; margin-bottom: 50px;  border-radius: 20px;   background: linear-gradient(to bottom, #9B7EBD, #D4BEE4);   font-weight: bold;color: white; ">
    <div class="card-body" >
        <h5 class="card-title">
            <center>
                <h1 class="h3 mb-0 text-gray-800" style="padding-top: 20px;">
                    <span style="text-transform:uppercase;  color: white;   font-weight: bold;"> Hello <?=$_SESSION['username']?> </span>
                </h1>
            </center>
        </h5>
        <center>
            <p class="card-text" style="padding-bottom: 20px;">
                SELAMAT DATANG DI ADMIN PEMINJAMAN BARANG SMK BAKTI NUSANTARA 666
            </p>
        </center>
    </div>
</div>
<!-- endcard -->

                
        
            <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-8 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                             <h5 class="card-title">Data Barang</h5>
                                            <center><h4><?=$barang['jumlah'] ?></h4></center>
                                            <p class="card-text">Jumlah barang saat ini</p>
                                            <a href="barang.php" class="card-link">Lihat data barang</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2 "style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <h5 class="card-title">Data User
                                          </h5>
                                            <center><h4><?=$user['jumlah'] ?></h4></center>
                                            <p class="card-text">Jumlah peminjam saat ini</p>
                                            <a href="admin.php" class="card-link">Lihat data peminjam</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2"style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                        <h5 class="card-title">Data Peminjaman</h5>
                                        <center><h4><?=$peminjam['jumlah'] ?></h4></center>
                                        <p class="card-text">Jumlah peminjaman saat ini</p>
                                        <a href="peminjaman.php" class="card-link">Lihat data peminjaman</a>
                                        </div>
                                         <div class="col-auto">
                                            <i class="fas fa-calendar-alt   fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2"style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                        <h5 class="card-title">Barang belum kembali</h5>
                                        <center><h4><?=$barang_belum_kembali?></h4></center>
                                        <p class="card-text">Jumlah peminjaman saat ini</p>
                                        <a href="peminjaman blmkembali.php" class="card-link">Lihat data peminjaman</a>
                                        </div>
                                         <div class="col-auto">
                                            <i class="fas fa-calendar-alt   fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                        <h5 class="card-title">Barang sudah kembali</h5>
                                        <center><h4><?=$total_barang_sudah_kembali?></h4></center>
                                        <p class="card-text">Jumlah peminjaman saat ini</p>
                                        <a href="peminjaman sdhkembali.php" class="card-link">Lihat data peminjaman</a>
                                        </div>
                                         <div class="col-auto">
                                            <i class="fas fa-calendar-alt   fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->

            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>