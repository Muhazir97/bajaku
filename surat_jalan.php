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

  <title>Transaksi Pembelian</title>

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
  <div class="container mt-5">
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div align="center">
               <h1>Surat Jalan</h1>
             </div>
            </div>
 
 <br>
<style type='text/css'>

.wrapper{
   position: relative;
   float: left;
   left: 0px;
   width: 100%;
   margin-bottom: 10px;
   background-color: #ffffff
}
.left1{
   position: relative;
   float: left;
   left: 5px;
   width: 700px;
   height: 600px;
   background-color: #ffffff
}
.left2{
   position: relative;
   float: left;
   left: 15px;
   width: 300px;
   height: 600px;
   background-color: #ffffff
}
body {
   border-width: 0px;
   padding: 0px;
   margin: 0px;
   font-size: 90%;
   background-color: white;
}
</style>


  <style type="text/css"> 
  
  h1 {
    font-family: Verdana;
  }
  
  body {
    font-family: Verdana;
    font-size: 12px;
  } 
  
  td {
    font-size: 12px;
  }
  
  </style> 
<style type="text/css">
table.tftable {table-layout:fixed; width:100%; word-break:break-all; font-size:12px;color:#333333;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px; border-style: solid;border-color: #729ea5;}
table.tftable tr {background-color:#d4e3e5;}
table.tftable td {font-size:12px;border-width: 1px;padding: 4px;border-style: solid;border-color: #729ea5; text-align:right; }
</style>

<script> 
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){

two = document.autoSumForm.bayar.value; 
three = document.autoSumForm.subtotal.value; 
document.autoSumForm.kembali.value = (two * 1) - (three * 1);}
function stopCalc(){
clearInterval(interval);}
</script>

</head>
<body>
  <div class="wrapper">
       <div class="left1">
 
  

<a style="color: red;">*</a> <i>Hapus Item barang jika sudah di cetak</i><br><br>

<table id='tfhover'  class='tftable' border='1' align='center'> <col width='200'><col width='100'><col width='100'><col width='100'><col width='50'>

<tr>

<th style="text-align:center;">Nama Barang</th>
<th style="text-align:center;">Jumlah Barang</th>
<th style="text-align:center;">Satuan</th>

<th></th>
</tr>
 
<?php
    include('koneksi.php');

$select = "SELECT id,nama_barang,jumlah_barang,satuan FROM temp_surat";
$select_query = mysqli_query($koneksi, $select);


while($select_result = mysqli_fetch_array($select_query))
{

$id           = $select_result['id'] ;
$nama         = $select_result['nama_barang'] ;
$harga_jual   = $select_result['jumlah_barang'] ;
$jumlah       = $select_result['satuan'] ;

echo "
<tr>
<td style='text-align:left;'>$nama</td>
<td style='text-align:center;'>$harga_jual</td>
<td style='text-align:center;'>$jumlah</td>
<td>
   <a href='delete_item.php?id=$id'><img src='bin.png'></img></a>
</td>
</tr>
";
}

?>

</table>

       </div>
       <div class="left2">
     <div class="message warning">
<div class="contact-form">
  <div class="logo">
    <h1></h1>
  </div>  
<!--- form --->
<br>
INPUT
<form class="form" action="Tdata_surat.php?op=send" method="post" name="contact_form">
  <ul>
    <li>
       <label>Nama Barang</label>
       <input type="text" id  name="nama_barang"  placeholder="Nama Barang" required size='21' />                      
     </li>
    <li>
       <label>Jumlah Barang</label>
      <input type="text"  name="jumlah_barang"  placeholder="Jumlah Barang" required size='20'/>                  
     </li>
    <li>
       <label>Satuan</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      <input type="text"  name="satuan"  placeholder="Satuan" required size='20'/>                  
     </li>
    <BR>

     <li class="style">
         <button class="btn btn-primary btn-sm" type="Submit" value="TAMBAHKAN BARANG" ><i class="fas fa-plus"></i> TAMBAHKAN BARANG</button>
     </li>
  </ul> 
  <div class="clear"></div> 
</form>

Data Customer
<form name='struk' class="form" action="cetak_surat.php?op=send" target="cetak_surat.php?op=send"  method="post">  
    
     <ul>
    <li>
       <label>Nama Customer</label>
       <input type="text" name="nama_customer"  placeholder="Nama Customer"  size='18' />                      
     </li>

    <li>
       <label>No Telephone</label>&nbsp;&nbsp;
      <input type="text"  name="no_tlp"  placeholder="No Telephone" size='20'/>                  
    </li>

    <li>
       <label>Alamat</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      <textarea type="text"  name="alamat"  placeholder="Alamat" size='20'/></textarea>               
     </li>
    <BR>

     <li class="style">
         <button class="btn btn-info btn-sm" type="Submit" value="TAMBAHKAN BARANG" ><i class="fas fa-print"></i> Cetak Surat</button>
     </li>
  </ul> 

</form>

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