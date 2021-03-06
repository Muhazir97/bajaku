<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']!="admin"){
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>
 <!DOCTYPE html>
<html lang="en">
<link rel ="icon" type="image/png" href="tw.png">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Data Transaksi Pemasangan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="">
          
        </div>
        <div class="sidebar-brand-text mx-3"><img style="width:110%"src="sm2.png"></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="Dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables2.php">
          <i class="fas fa-database"></i>
          <span>Data Barang</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Call Information</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">For Information:</h6>
            <a class="collapse-item" href="https://bit.ly/2vFGC5f" target="https://bit.ly/2vFGC5f">Whatsapp</a>
            <a class="collapse-item" href="https://accounts.google.com" target="blank">Email</a>
          </div>
        </div>
      </li>
      
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collap" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Transaksi</span>
        </a>
        <div id="collap" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi:</h6>
            <a class="collapse-item" href="peminjam_asetK.php">Penjualan Barang</a>
            <a class="collapse-item" href="data_pemasangan.php">Pemasangan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Akun</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
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
<div class="date">
                <i class="icon-calendar icon-large"></i>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $Today = date('y:m:d');
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?>
              </div> 
         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           
              

           
            <!-- Nav Item - User Information -->
            
                
              
                <a href="logout.php" class="btn btn-primary square-btn-adjust">Logout</a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
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
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"> <a target="_blank" href="https://datatables.net"></a></p>
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <button class="btn  btn-primary mb-3 " data-toggle="modal" data-target="#print_barang"><i class="fas fa-print "></i> Generate Report </button>
          </div>  

<?php
include('koneksi.php');
?>
           
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             <h1>Data Transaksi Pemasangan</h1>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr bgcolor="#F0F8FF">
                    <th>No</th> 
                    <th>No Nota</th> 
                    <th>Tanggal</th>
                    <th>Waktu</th> 
                    <th>Kasir</th> 
                    <th>Nama Customer </th>
                    <th>No Tlp</th>
                    <th>Alamat</th>
                    <th>DP 1</th>
                    <th>DP 2</th>
                    <th>DP 3</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

               <?php
                 $no =1;
                 $sql = $koneksi->query("SELECT * from nota_pemasangan ORDER BY id_nota_pemasangan ASC");
                 while ($data = $sql->fetch_assoc()){
               ?>

           <tr>
               <td><?php echo $no ++; ?></td> 
               <td><?php echo $data['id_nota_pemasangan'];?></td>
               <td><?php echo $data['tgl'];?></td>
               <td><?php echo $data['waktu'];?></td>
               <td><?php echo $data['kasir'];?></td>
               <td><?php echo $data['nama_customer'];?></td>
               <td><?php echo $data['no_tlp'];?></td>
               <td><?php echo $data['alamat'];?></td>
               <td><?php echo $data['dp1'];?></td>
               <td><?php echo $data['dp2'];?></td>
               <td><?php echo $data['dp3'];?></td>
               <td><?php echo $data['catatan'];?></td>
               <td><?php
                      if ($data['status'] == 'LUNAS') {
                   ?>
                       <h5><span class="badge badge-success">LUNAS</span></h5>
                   <?php
                      }else{
                   ?>
                      <h5><span class="badge badge-warning">BELUM LUNAS</span></h5>
                   <?php
                   }?>
               </td>
               <td>
                 <a href ="detail_pemasangan.php?id_nota_pemasangan=<?php echo $data['id_nota_pemasangan']; ?>" class="btn btn-info"><i class="far fa-eye"></i> Detail</a>
                    <a href ="hapuspemasangan.php?id_nota_pemasangan=<?php echo $data['id_nota_pemasangan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin anda akan menghapus data ini ?');"><i class="far fa-trash-alt"></i> Hapus</a>
                 </td>
           </tr>

               <?php } ?>
               
            </tbody>

                 
                </table>
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
            <span>Powered by SIKASMART V.0.2</span>
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

  <!-- Modal print -->
<div class="modal" id="print_barang" name="cari"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cetak Data Transaksi Pemasangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="printdatapemasangan.php" target="_blank" method="get" enctype="multipart/form-data" >
         <table>
           <tr>
            <td>
               <div class="form-group">Dari Tanggal</div>
            </td>
            <td align="center" width="5%">
              <div class="form-group">:</div>
            </td>
            <td class="form-group">
              <input type="date" name="tgl_awal" class="form-control" placeholder="Nama Barang" required> 
            </td>
          </tr>

          <tr>
            <td>
               <div class="form-group">Dari Tanggal</div>
            </td>
            <td align="center" width="">
              <div class="form-group">:</div>
            </td>
            <td class="form-group">
              <input type="date" name="tgl_akhir" class="form-control" placeholder="Nama Barang" required> 
            </td>
          </tr>
         </table>
        <br>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
         <button type="submit" class="btn btn-primary" value="Cari"><i class="fas fa-print"></i> Submit </button>
      </div>
      </form>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php } ?>
