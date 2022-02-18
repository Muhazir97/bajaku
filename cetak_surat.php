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
    font-family: Verdana;
    font-size: 90px;
  }
  
  </style> 
<style type="text/css">
table.tftable {table-layout:fixed; width:100%; word-break:break-all; font-size:12px;color:#333333;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px; border-style: solid;border-color: #729ea5;}
table.tftable tr {background-color:#d4e3e5;}
table.tftable td {font-size:12px;border-width: 1px;padding: 4px;border-style: solid;border-color: #729ea5; text-align:right; }
</style>

  <div class="wrapper">

<?php

include('koneksi.php');

  if (isset($_GET['op']))
  {
    if ($_GET['op'] == 'send')
    {
      $nama_customer= $_POST['nama_customer'];
      $no_tlp       = $_POST['no_tlp'] ;
      $alamat       = $_POST['alamat'] ;
      
    }
  }
  
  ?>
  
  <div class="header">
      <img src="sm2.png" style="height:200px; width:1300px;" class="header">
    </div>
    <div style="font-size:20px;" align="center">
    Jl. Trip Jamaksari No 22. Cinanggung Serang Banten
  </div><hr><br>

<div style="font-size:20px;">
  Nama Customer&nbsp;&nbsp; : <?php echo $nama_customer ?><br>
</div>
<div style="font-size:20px;">
  No Telephone &nbsp;&nbsp; &nbsp;&nbsp; : <?php echo $no_tlp ?><br>
</div>
<div style="font-size:20px;">
  Alamat Customer :  <?php echo $alamat ?><br>
</div>
<div style="font-size:20px;">
  Tanggal &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; :  <?php
                date_default_timezone_set('Asia/Jakarta');
                $Today = date('y:m:d');
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?><br>
</div><hr>
<br>

<table id='tfhover'  class='tftable' border='1' align='center'> <col width='300'><col width='250'><col width='250'>

<tr>

<th style="text-align:center; font-size:20px;">Nama Barang</th>
<th style="text-align:center; font-size:20px;">Jumlah Barang</th>
<th style="text-align:center; font-size:20px;">Satuan</th>
</tr>
 
<?php
$select = "SELECT id,nama_barang,jumlah_barang,satuan FROM temp_surat";
$select_query = mysqli_query($koneksi, $select);


while($select_result = mysqli_fetch_array($select_query))
{

$nama         = $select_result['nama_barang'] ;
$harga_jual   = $select_result['jumlah_barang'] ;
$jumlah       = $select_result['satuan'] ;

echo "
<tr>
<td style='text-align:center; font-size:20px;'>$nama</td>
<td style='text-align:center; font-size:20px;'>$harga_jual</td>
<td style='text-align:center; font-size:20px;'>$jumlah</td>
</tr>
";
}

?>

</table><br><br><br><br>

<div class="row">
    <div class="col-6">

      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size: 20px;">Ttd Customer </a><br><br><br><br><br><br><br>

      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.............................
      </div>
      <div class="col-6">
        <div align="center">
       &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp<a style="font-size: 20px;">Hormat Kami </a><br><br><br><br><br><br><br>

       &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp.................................
      </div>
    </div>
  </div>
<!--- form --->

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
<script>
    window.print();
</script>