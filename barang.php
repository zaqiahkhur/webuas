<?php
require_once('database.php');
$data=getalldata('barang');
session_start();

$query =mysqli_query($koneksi, "SELECT max(Kode_barang) as kodeTerbesar  from barang");
$data2= mysqli_fetch_array($query);
$kodeBarang = $data2['kodeTerbesar'];
$urutan = (int) substr($kodeBarang,3,3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

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
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-4 text-gray-800">Daftar Barang</h1>
                  <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length">
                               </div></div>
                                <div class="col-sm-12 col-md-6 "><div id="dataTable_filter" class="dataTables_filter">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add barang  </button>
                                
<!-- Modal  add barang -->
  <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }

    if (isset($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    }
    ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action = "input_brg.php" method ="post">
  <div class="form-row">
    <div class="form-group col-md-6">
       <label for="kodebarang">Kode Barang</label>
     <input type="text" class="form-control" name="kodepinjam" value="<?=$kodeBarang ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="namabarang">Nama Barang</label>
      <input type='text' class='form-control' name='namabarang' >
    </div>
  </div>
  <div class="form-group col-md-6">
     <label for="jml">Jumlah Barang</label>
    <input type="text" class="form-control" name="jml" >
  </div>

    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    <input type="submit" class="btn btn-primary"></input>
</form>
      </div>
    </div>
  </div>
</div>
</div></div></div>
<!-- end Modal add barang -->



<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                         <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 64.75px;">Kode Barang</th>
                                         <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80.6094px;">id</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80.6094px;">Nama barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55.7969px;">Jumlah Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55.7969px;">Action</th>
                                    </thead>
                                    <tbody>
                                           <?php foreach($data as $item) : ?>
                                    <tr class="odd">
                                            <td class="sorting_1"><?php echo $item['Kode_barang']; ?></td>
                                            <td><?php echo $item['id']; ?></td>
                                            <td><?php echo $item['nama_barang']; ?></td>
                                            <td><?php echo $item['Jumlah_barang']; ?></td>
                                            <td><a href='' class='btn btn-warning' data-toggle="modal" data-target="#modal<?php echo "$item[id]";?>" data-target="#edit8">Edit</a> <?php echo"<a href='javascript:hapusdata(".$item['id'].")'><button class='btn btn-danger'>Hapus</button></a>";?></td>
                                            </tr>
                                             </td>
                                        </tr>   
                <!-- /.container-fluid -->
<!--Edit modal-->
<div class="modal fade" id="modal<?php echo "$item[id]";?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang <?php echo $item['id'];?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action = "update_brg.php" method ="post" name="editbrg">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
       <?php var_dump($item['id']);?>
  <div class="form-row">
      <div class="form-group form-group-default">
     <label>Kode Barang</label>
    <input id="kodeBarang" type="text" name="kodeBarang" class="form-control" placeholder="Masukkan Kode Barang" value="<?php echo $item['Kode_barang']; ?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="namabarang">Nama Barang</label>
      <input type='text' class='form-control' name='namabarang' class="form-control" placeholder="Masukkan Kode Barang" value="<?php echo $item['nama_barang']; ?>" required> 
    </div>
  </div>
  <div class="form-group col-md-6">
     <label for="jml">Jumlah Barang</label>
    <input type="text" class="form-control" name="jml" class="form-control" placeholder="Masukkan Kode Barang" value="<?php echo $item['Jumlah_barang']; ?>" required> 
  </div>

    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    <input type="submit" class="btn btn-primary"></input>
   
</form>
      </div>
    </div>
  </div>
</div>
</div></div></div>
                                   <?php endforeach; ?>
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
                            </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>