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

  if (isset($_GET['op'])){
    
    if ($_GET['op'] == 'send'){

      date_default_timezone_set('Asia/Jakarta');
      $dmy          = date('Ymd');
      $time1        = date('H:i:s');
      $material     = $_POST['material'];
      $meter        = $_POST['meter'];
      $harga_jual   = $_POST['harga_jual'] ;
      $sub_total    = $_POST['sub_total'];
      $kasir        = $_SESSION['username'];

     $query_insert = "INSERT INTO data_pemasangan (material,meter,harga_jual,sub_total,kasir,tgl,waktu) VALUES ('$material','$meter','$harga_jual','$sub_total','$kasir','$dmy','$time1')";

      $insert = mysqli_query($koneksi, $query_insert);

      if ($insert){ 
       // echo "<script type='text/javascript'>swal('Transaksi Berhasil!','', 'success',);</script>"; 
      }else{
        //echo "<script type='text/javascript'>swal('Transaksi Gagal!','', 'warning',);</script>";
     }
   }
 }
    ?>
  <style>.header{
    width       :100%;
    height        :100px;
   }
  </style>
    <div class="header">
      <img src="sm2.png" class="header">
    </div>
    <div style="font-size:20px;" align="center">
    Jl. Trip Jamaksari No 22. Cinanggung Serang Banten
    </div><hr>   
<br>
<div class="row">
  <div class="col-md-6">
   <!--  <div style="font-size:20px;">
      No Nota &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: <?php echo $id_nota_pemasangan ?><br>
    </div> -->
    <div style="font-size:20px;">
      Kasir &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <?php echo $_SESSION['username']?><br>
    </div>
    <!-- <div style="font-size:20px;">
      No Telephone &nbsp;&nbsp; &nbsp;&nbsp; : <?php echo $no_tlp ?><br>
    </div> -->
    <div style="font-size:20px;">
      Waktu &nbsp;&nbsp; &nbsp;:<?php date_default_timezone_set('Asia/Jakarta'); $time1 = date('H:i:s'); 
                         echo $time1?><br>
    </div>
    <div style="font-size:20px;">
      Tanggal &nbsp; :  <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $Today = date('y:m:d');
                    $new = date('l, F d, Y', strtotime($dmy));
                    echo $new;
                    ?><br>
    </div>
  </div>
 <!--  <div class="col-md-6">
    <div style="font-size:20px;">
      Pembayaran 1 &nbsp;&nbsp; : <?php echo $dp1 ?><br>
    </div>
    <div style="font-size:20px;">
      Pembayaran 2 &nbsp;&nbsp;  : <?php echo $dp2 ?><br>
    </div>
    <div style="font-size:20px;">
      Pembayaran 3 &nbsp;&nbsp; :  <?php echo $dp3 ?><br>
    </div>
    <div style="font-size:20px;">
      STATUS :  <?php echo $status ?><br>
    </div>
  </div> -->
</div>
<hr>
<br>
<div style="font-size:20px;">
 <ul>
    <li>
       <label>Material&nbsp;</label>
       <label>&nbsp; &nbsp;:</label>
        &nbsp; &nbsp;<?php echo $material ?>
    </li>
    <li>
        <label>Harga Jual</label>
        <label>:</label>
        &nbsp; &nbsp;<?php echo $harga_jual ?>
    </li>
    <li>
        <label>Meter</label>
        <label>&nbsp; &nbsp; &nbsp; &nbsp;:</label>
        &nbsp; &nbsp;<?php echo $meter ?><hr>
        total &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;: &nbsp; Rp. <?php echo number_format( $sub_total, 0,',','.' )?>
    </li>
  </ul>
<hr>
Terimaksih sudah Mempercayakan kepada kami <br>
</div>


<!-- <div class="row">
    <div class="col-4">

      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size: 20px;">Ttd Customer </a><br><br><br><br><br><br><br>

      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.............................
      </div>
      <div class="col-4">

      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size: 20px;">Ttd Pengirim </a><br><br><br><br><br><br><br>

      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.............................
      </div>
      <div class="col-4">
        <div align="center">
       &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp<a style="font-size: 20px;">Hormat Kami </a><br><br><br><br><br><br><br>

       &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp.................................
      </div>
    </div>
  </div>
  <br><br><br>
  
  <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"><?php echo $catatan ?></textarea>
  </div> -->

</div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



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

<script>
    window.print();
</script>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<!-- <?php
    include('koneksi.php');


  $query_insert ="INSERT INTO data_pemasangan (id_pemasangan,material,jumlah,harga_jual,sub_total,kasir,tgl,waktu,id_nota_pemasangan) SELECT id_pemasangan,material,jumlah,harga_jual,sub_total,kasir,tgl,waktu,'$id_nota_pemasangan' FROM temp_pemasangan" ;

  $insert= mysqli_query ($koneksi, $query_insert);

  if ($insert){
  $query = mysqli_query($koneksi, "delete from temp_pemasangan ") or die(mysql_error());

   
  }else{
    
 }

?> -->

</body>
</html>
  <!-- <script>
  setTimeout(function () {
     window.location.href= 'Transaksi_pemasangan.php'; // the redirect goes here

  },1000); // 5 seconds
  </script> -->
 
<?php } ?> 

