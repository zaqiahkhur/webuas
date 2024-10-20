<?php
require_once('database.php');
$data=getalldata('peminjaman');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peminjaman</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Laporan Peminjaman</h1>
                  <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length">
                              </div></div>
                                <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
</div></div

                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                        </div>
                        <div class="card-body">
                                      <div class="table-responsive">
                                        <div class="container mt-5">
    
    <form method="POST" action="cetak_laporan.php">
        <div class="row g-3 align-items-center mb-3 mt-3"> <!-- Tambahan jarak atas (mt-3) dan bawah (mb-3) -->
             <div class="col-auto">
            <div class="row g-3 align-items-center">
               <div class="col-auto">
                <label for="fromDate" class="form-label">Dari:</label>
                <input type="date" class="form-control" id="fromDate" name="dari" placeholder="mm/dd/yyyy">
            </div>
            <div class="col-auto">
                <label for="toDate" class="form-label">Sampai:</label>
                <input type="date" class="form-control" id="toDate" name="sampai" placeholder="mm/dd/yyyy">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </div>
        </div>
            </div>
        </div>
    </form>
</div>
<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                  <thead>
                                        <tr role="row">
                                        <th >Kode Pinjam</th>
                                        <th >Kode barang</th>
                                        <th >No_identitas</th>
                                        <th >Jumlah barang</th>
                                        <th>Tanggal pinjam</th>
                                        <th>Tanggal Kembali </th>
                                        <th>Status </th>
                                        <th>Keperluan </th>
                                         <th>Action </th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody> 
                                         <?php foreach($data as $item) : ?>
                                    <tr class="odd">
                                            <!-- <td><?php echo $item['Kode_pinjam']; ?></td>
                                            <td><?php echo $item['kode_barang']; ?></td>
                                            <td><?php echo $item['no_identitas']; ?></td>
                                            <td><?php echo $item['Jumlah_barang']; ?></td>
                                            <td><?php echo $item['tanggal_pinjam']; ?></td>
                                            <td><?php echo $item['tanggal_kembali']; ?></td>
                                            <td><?php echo $item['status']; ?></td>
                                            <td><?php echo $item['keperluan']; ?></td> -->
                                             <!-- <td><a href='' class='btn btn-warning' data-toggle="modal" data-target="#modal<?php echo "$item[id]";?>" data-target="#edit8">Edit</a> 
                                             <?php echo "<a href='javascript:kembalikanBarang(".$item['id']." ,".$item['Jumlah_barang'].",".$item['kode_barang'].")'><button type='button' class='btn btn-success'>Kembalikan</button></a>" ; ?> -->
                                            
                                            </tr>
                                             </td>
                                        </tr> 
                <!-- /.container-fluid -->

                                                </div></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                   <?php endforeach; ?>
                                </tbody>
                              </table></div></div></div> 
                            </div>
                          </div>
                        </div>
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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>