<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']!="pegawai"){
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
  
   <?php 
// koneksi database
include('koneksi.php');
 
// menangkap data yang di kirim dari form
$id_nota_pemasangan = $_POST['id_nota_pemasangan'];
$dp1                = $_POST['dp1'];
$dp2                = $_POST['dp2'];
$dp3                = $_POST['dp3'];
$status             = $_POST['status'];
$kasir              = $_SESSION['username'];
 
// update data ke database
if(!$insert =mysqli_query($koneksi,"UPDATE nota_pemasangan set id_nota_pemasangan='$id_nota_pemasangan', dp1='$dp1', dp2='$dp2',dp3='$dp3', status='$status',kasir='$kasir' where id_nota_pemasangan='$id_nota_pemasangan'")){
              echo "<script type='text/javascript'>swal('Gagal Mengupdate Data!','', 'warning',);</script>";
            }else{
                //ambil id terakhir insert
              echo "<script type='text/javascript'>swal('Data Berhasil di update!','', 'success',);</script>";

            }
 
// mengalihkan halaman kembali ke index.php
?>

  </body>
  </html>

  <script>
setTimeout(function () {
   window.location.href= 'belum_lunas.php'; // the redirect goes here

},2000); // 5 seconds
</script>
 
<?php } ?>