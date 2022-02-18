<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level'] !="pegawai")
  {
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

  <title>Transaksi Pemasangan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
  <a class="navbar-brand" href="Dashboarduser.php" ><img src="sm2.png" width="150" height="50"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" >
        <a class="nav-link" href="Dashboarduser.php"><i class="fas fa-home"></i> <font style= "font-size:15px; color: white;" >  Home</font></a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="surat_jalan.php"><i class="fas fa-envelope-open-text"></i> Surat Jalan</a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="databarang_user.php"><i class="fas fa-database"></i> Data Barang</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="belum_lunas.php"><i class="fas fa-money-check-alt"></i> Belum Lunas</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-dollar-sign"></i> <font style= "font-size:15px; color: white;" >  Pilih Transaksi</font></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Transaksiuser.php">Transaksi Pembelian</a>
          <a class="dropdown-item" href="Transaksi_pemasangan.php">Transaksi Pemasangan</a>
        </div>
      </ul>

      <ul class="navbar-nav mr-auto">
      <li class="nav-item active" >
      </li>&nbsp; &nbsp; &nbsp; 
      <li class="nav-item active">
        <font style= "font-size:15px; color: white;" > Hi, <b><?php echo $_SESSION['username']; ?></b><hr> </font>
      </li>
      </li>
</ul>

      <ul class="nav navbar-nav navbar-right">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> <font style= "font-size:15px; color: white;" >  Logout</font></a>
      </li>
    </ul>

        </div>
      </li>
    </ul>
  </div>
</ul>

  </div>
  </div>
</nav>

<br>
<br>
<br>

<?php
   include('koneksi.php');
?>
  <div class="container mt-4">
  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div align="center">
                 <h1>Data Pemasangan Belum Lunas</h1>
              </div>
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
                 $sql = $koneksi->query("SELECT * from nota_pemasangan where status='BELUM LUNAS' ORDER BY id_nota_pemasangan ASC");
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
               <td>Rp. <?php echo number_format( $data['dp1'], 0,',','.' )?></td>
               <td>Rp. <?php echo number_format( $data['dp2'], 0,',','.' )?></td>
               <td>Rp. <?php echo number_format( $data['dp3'], 0,',','.' )?></td>
               <td><?php echo $data['catatan'];?></td>
               <td><?php
                      if ($data['status'] == 'LUNAS') {
                   ?>
                       <button type="submit" class="btn btn-success">LUNAS</button>
                   <?php
                      }else{
                   ?>
                      <h5><span class="badge badge-warning">BELUM LUNAS</span></h5>
                   <?php
                   }?>
               </td>
               <td>
                 <a href ="detail_pemasanganuser.php?id_nota_pemasangan=<?php echo $data['id_nota_pemasangan']; ?>" class="btn btn-info"><i class="far fa-eye"></i> Detail</a>
                    <a href ="updatepemasangan.php?id_nota_pemasangan=<?php echo $data['id_nota_pemasangan']; ?>" class="btn btn-dark"><i class="far fa-edit"></i> Update</a>
                 </td>
           </tr>

               <?php } ?>
               
            </tbody>
              </table>
              </div>
            </div>
          </div>

   <br><br>
  </div>
</div>

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
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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