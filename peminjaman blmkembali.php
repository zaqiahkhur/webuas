<?php
require_once('database.php');
$data=getalldata('peminjaman');
session_start();
$sql_users = "SELECT no_identitas, username FROM admin WHERE role = 'member'";
$result_users = mysqli_query($koneksi, $sql_users);
$barang ="SELECT Kode_barang, nama_barang FROM barang";
$result_kode = mysqli_query($koneksi, $barang);

$sqlBelumKembali = "SELECT peminjaman.id, peminjaman.Jumlah_barang, peminjaman.keperluan,peminjaman.kode_barang,
barang.nama_barang,peminjaman.Kode_pinjam,peminjaman.no_identitas,admin.username,peminjaman.status,peminjaman.tanggal_kembali,peminjaman.tanggal_pinjam
 FROM peminjaman INNER JOIN barang ON barang.Kode_barang = peminjaman.kode_barang INNER JOIN admin ON peminjaman.no_identitas = admin.no_identitas WHERE 
 peminjaman.status='belum kembali'";
$resultBelumKembali = mysqli_query($koneksi, $sqlBelumKembali);

$query =mysqli_query($koneksi, "SELECT max(Kode_pinjam) as kodeTerbesar  from peminjaman");
$data2= mysqli_fetch_array($query);
$kodeBarangpinjam = $data2['kodeTerbesar'];
$urutan = (int) substr($kodeBarangpinjam,3,3);
$urutan++;
$huruf = "PMJ";
$kodeBarangpinjam = $huruf . sprintf("%03s", $urutan);
//echo $kodeBarang;
// $date1= new DateTime();
// $date2 = new DateTime();
// if ($date2 > $date1) {
//   echo"ok";
// }
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
                    <h1 class="h3 mb-4 text-gray-800">Daftar belum kembali</h1>
                  <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length">
                              </div></div>
                                <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
                               
                                
<!-- Modal  add barang -->

     <!-- <div class="form-group">
    <label for="tglpinjam">Tanggal Pinjam</label>
    <input type="date" class="form-control" name="tglpinjam" >
  </div> -->
    </div>
  </div>
</div>
</div></div></div>
<!-- end Modal add barang -->


  <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                        </div>
                        <div class="card-body">
<div class="row">
<div class="col-sm-12">
<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                  <thead>
                                        <tr role="row">
                                        <th >Kode Pinjam</th>
                                        <th >Kode barang</th>
                                        <th >Nama Barang</th>
                                        <th >No_identitas</th>
                                        <th >Username</th>
                                        <th >Jumlah barang</th>
                                        <th>Tanggal pinjam</th>
                                        <th>Tanggal Kembali </th>
                                        <th>Status </th>
                                        <th>Keperluan </th>

                                        </tr>
                                       
                                    </thead>
                                    <tbody> 
                                        
                                    <tr class="odd">
                                    <?php
                                    if (mysqli_num_rows($resultBelumKembali) > 0) {
                            while($row = mysqli_fetch_assoc($resultBelumKembali)) {
                                echo "<tr>
                                        <td>{$row['Kode_pinjam']}</td>
                                        <td>{$row['kode_barang']}</td>
                                         <td>{$row['nama_barang']}</td>
                                        <td>{$row['no_identitas']}</td>
                                         <td>{$row['username']}</td>
                                        <td>{$row['Jumlah_barang']}</td>
                                        <td>{$row['tanggal_pinjam']}</td>
                                        <td>{$row['tanggal_kembali']}</td>
                                        <td>{$row['status']}</td>
                                        <td>{$row['keperluan']}</td>
                                     </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>Tidak ada barang yang belum kembali</td></tr>";
                                    }
                                             ?>
                                        </tr> 
                                      
                <!-- /.container-fluid -->
<!--Edit modal-->

</div></div>
</div>
                        </div>
                    </div>
</div>
                                  
                                    </tbody>
                                </table></div></div></div>
                          
                        </div>
                        </div>
<!--Edit modal-->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

  <script language="JavaScript" type="text/javascript">
  function hapusdata(id){
        if (confirm("apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'delete_brg.php?id=' +id;
                                }
                        }
    function kembalikanBarang(id,jumlah,kd){
      if(confirm("Kembalikan Barang")){
        window.location.href ="kembalikan_barang.php?id=" +id+"&Jumlah_barang="+jumlah+"&kd="+kd;
      }
    }
                            </script>

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