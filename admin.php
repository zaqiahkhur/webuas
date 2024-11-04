<?php
require_once('database.php');
$data=getalldata('admin');
session_start();
$query =mysqli_query($koneksi, "SELECT max(no_identitas) as kodeinden  from admin");
$data2= mysqli_fetch_array($query);
$noidentitas = $data2['kodeinden'];
$urutan = (int) substr($noidentitas,3,3);
$urutan++;
$huruf = "NOIDEN";
$noidentitas = $huruf . sprintf("%03s", $urutan);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar User</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                    <h1 class="h3 mb-4 text-gray-800">Daftar User</h1>
                  <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length">
                               </div></div>
                                <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">  
                                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="margin-top: 20px; margin-bottom: 20px; background: linear-gradient(to bottom, #674188, #D4BEE4); border:none; color:white;"> Add User</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form action="input_adm.php" method="post">
          <!-- No Identitas -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="no_identitas">No Identitas</label>
              <input type="text" class="form-control" name="no_identitas" value="<?=$noidentitas?>" readonly required>
            </div>

            <!-- Nama -->
            <div class="form-group col-md-6">
              <label for="nama">Nama-Kelas</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
          </div>

          <!-- Password -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <!-- Unit Kerja -->
            <div class="form-group col-md-6">
              <label for="unitkerja">Unit Kerja</label>
              <input type="text" class="form-control" name="unitkerja" required>
            </div>
          </div>

          <!-- Role -->
          <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" name="role" required>
          </div>

          <!-- Tombol Batal dan Submit -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div></div></div>
 <div class="card shadow mb-4">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                        </div>
                        <div class="card-body">
                                      <div class="table-responsive">
<div class="row">
<div class="col-sm-12">
<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 64.75px;">Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80.6094px;">No Identitas</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80.6094px;">Username</th>
                                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30.1719px;">password</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30.1719px;">Unit Kerja</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 67.8594px;">role</th>
                                                     <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55.7969px;">Action</th>
                                    </thead>
                                    <tbody>
                                    <tr class="odd">
                                          <?php foreach($data as $item) : ?>
                                    <tr class="odd">
                                            <td class="sorting_1"><?php echo $item['id']; ?></td>
                                                         <td><?php echo $item['no_identitas']; ?></td>
                                            <td><?php echo $item['username']; ?></td>
                                            <td><?php echo $item['password']; ?></td>
                                            <td><?php echo $item['Unit_kerja']; ?></td>
                                            <td><?php echo $item['role']; ?></td> 
                                             <td><?php echo"<a href='javascript:hapusdata(".$item['id'].")'><button class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a>";?> </td>

                                        </tr>
                                     <?php endforeach; ?></tbody>
                                        </tr></tbody>
                                </table></div></div>
                                 </div>
                    </div>
</div>
         
                            </div>
                        </div>
                <!-- /.container-fluid -->

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
                                window.location.href = 'delete_adm.php?id=' +id;
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