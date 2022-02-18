<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']!="admin"){
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
$id_brg     = $_POST['id_brg'];
$nama       = $_POST['nama'];
$barcode    = $_POST['barcode'];
$harga_beli = $_POST['harga_beli'];
$stock      = $_POST['stock'];

// update data ke database
if(!$insert =mysqli_query($koneksi,"update barang set nama='$nama', barcode='$barcode', harga_beli='$harga_beli',stock='$stock' where id_brg='$id_brg'")){
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
   window.location.href= 'tables2.php'; // the redirect goes here

},2000); // 5 seconds
</script>
 
<?php } ?>