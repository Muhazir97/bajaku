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
@media print {
    html, body {
        display: block; 
        font-family: "Calibri";
        margin: 0;
    }

    @page {
      size: 21.59cm 13.97cm;
    }

    .logo {
      width: 30%;
    }

}
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

// menangkap data yang di kirim dari form
      date_default_timezone_set('Asia/Jakarta');
      $dmy          = date('Ymd');
      $time1        = date('H:i:s');
      $kasir        = $_SESSION['username'];
   
   
    $query_insert ="INSERT INTO nota_belanja (tgl,waktu,kasir) VALUES ('$dmy','$time1','$kasir')" ;

  $insert= mysqli_query ($koneksi, $query_insert);

  $id_nota = $koneksi->insert_id;
  ?>
  <style>.header{
    width       :80%;
    height        :50px;
   }
  </style>
    <div class="header" align="center">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
      <img src="sm2.png" class="header">
    </div>
    <div align="center">
    Jl. Trip Jamaksari No 22. Cinanggung Serang Banten
    </div><hr> 
        
        
<div class="row">
  <div class="col-md-6">
    <div >
      No Nota  : <?php echo $id_nota ?><br>
    </div>
    <div>
      Kasir &nbsp; &nbsp;&nbsp; : <?php echo $kasir ?><br>
    </div>
    <div>
      Tanggal &nbsp;:  <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $Today = date('y:m:d');
                    $new = date('l, F d, Y', strtotime($dmy));
                    echo $new;
                    ?><br>
    </div>
    <div>
      Waktu &nbsp;&nbsp; : <?php echo $time1 ?><br>
    </div>
  </div>

</div>
<hr>

<table id='tfhover'  class='tftable' border='0' align='left'> <col width='100'><col width='70'><col width='30'><col width='80'>
  
  <tr>

<th style="text-align:center; ">Nama Barang</th>
<th style="text-align:center; ">Harga </th>
<th style="text-align:center; ">Jumlah </th>
<th style="text-align:center; ">Sub Total </th>
</tr>

<?php
$select = "SELECT id,sub_total,nama,harga_jual,jumlah FROM temp";
$select_query = mysqli_query($koneksi, $select);

while($select_result = mysqli_fetch_array($select_query)){

?>
    <tr> 
       <td>
         <div style=" text-align: center;"><?php echo $select_result['nama'];?></div>
       </td>
       <td>
         <div style="">Rp. <?php echo number_format( $select_result['harga_jual'], 0,',','.' )?></div>
       </td>
       <td>
          <div style=" text-align: center;"><?php echo $select_result['jumlah'];?> </div>
       </td>
       <td> 
          <div style="">Rp. <?php echo number_format( $select_result['sub_total'], 0,',','.' )?>
       </td>
    </tr>
<?php } ?>


<?php
$select1 = "SELECT SUM(jumlah) AS alljumlah,SUM(sub_total) AS total FROM temp";
$select_query1 = mysqli_query($koneksi, $select1);

while($select_result = mysqli_fetch_array($select_query1)){
?> 
     <tr> 
        <td align="right">
          <div>Total : </div>
        </td>
        <td></td>
        <td>
          <div style=" text-align: center;"><?php echo $select_result['alljumlah'];?></div>
        </td>
        <td>
          <div> Rp. <?php echo number_format( $select_result['total'], 0,',','.' )?> </div>
        </td>
     </tr>

<?php } ?>
</table><br><br><br><br>

<div >
PEMBAYARAN
<form name='autoSumForm' class="form" action="struk.php" method="post">
<?php
$hitung = "SELECT SUM(sub_total) AS total1 FROM temp";
$select_hitung = mysqli_query($koneksi, $hitung);
while($select_result = mysqli_fetch_array($select_hitung))
{
$total1         = $select_result['total1'] ;
echo"
";}?>

<?php
$bayar = $_POST['bayar'] ;
$kembali = $_POST['kembali'] ; 
$query_transaksi = "INSERT INTO temp_bayar (bayar,kembali) VALUES ('$bayar','$kembali')";
$transaksi= mysqli_query ($koneksi, $query_transaksi);

if ($transaksi)
{
} 
else
{ echo "gagal ..."; }
?>

<?php
$select = "SELECT bayar,kembali FROM temp_bayar";
$select_query = mysqli_query($koneksi, $select);
while($select_result = mysqli_fetch_array($select_query))
{

$bayar         = $select_result['bayar'] ;
$kembali         = $select_result['kembali'] ;
echo"
";}?>

 <ul>
  <li>
   <label>Pembayaran&nbsp;</label>
   <label>&nbsp;:</label>
      &nbsp; &nbsp;Rp. <?php echo number_format( $bayar, 0,',','.' )?>
      </li>
      <li>
      <label>Total Belanja</label>
      <label>:</label>
      &nbsp; &nbsp;Rp. <?php echo number_format( $total1, 0,',','.' )?>
      </li>
      <li>
      <label>Kembalian</label>
      <label>&nbsp; &nbsp; :</label>
      &nbsp; &nbsp;Rp. <?php echo number_format( $kembali, 0,',','.' )?>
   </li>
  </ul>
</div>

<div class="clear"></div> 
</form>

<!--- form --->
<a style="color: red;">*</a> <i>Barang yang sudah di beli tidak bisa di kembalikan</i><br><br>

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

<?php
    include('koneksi.php');

      

  $query_insert ="INSERT INTO belanja (id_brg,barcode,nama,harga_beli,harga_jual,jumlah,sub_total,kasir,tgl,waktu,id_nota) SELECT id_brg,barcode,nama,harga_beli,harga_jual,jumlah,sub_total,kasir,tgl,waktu,'$id_nota' FROM temp" ;

  $insert= mysqli_query ($koneksi, $query_insert);

  if ($insert){
	$query = mysqli_query($koneksi, "delete from temp ") or die(mysql_error());
	$query2 = mysqli_query($koneksi, "delete from temp_bayar ") or die(mysql_error());

	 // echo "<script type='text/javascript'>swal('Transaksi Berhasil!','', 'success',);</script>";
  }else{
     // echo "<script type='text/javascript'>swal('Transaksi Gagal!','', 'warning',);</script>";
 }

?>

</body>
</html>
 <!--  <script>
  setTimeout(function () {
     window.location.href= 'Transaksiuser.php'; // the redirect goes here

  },1000); // 5 seconds
  </script> -->

<?php } ?> 
