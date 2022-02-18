<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
     include('koneksi.php'); 
 
    //menangkap parameter yang dikirimkan dari detail.php
    $id = $_GET['id'];
 
    //perintah untuk melakukan hapus
    //melakukan penghapusan data berdasarkan ID
    $sql = "DELETE FROM data_login WHERE id=$id";
 
    if ($koneksi->query($sql) === TRUE) {
        //jika  berhasil langsung diarahkan kembali ke file bootstrap.php
        echo "<script type='text/javascript'>swal('Data Berhasil di Hapus!','', 'success',);</script>";
    } else {
        // jika gagal tampil ini
        echo "<script type='text/javascript'>swal('Gagal Menghapus Data!','', 'warning',);</script>" . $koneksi->error;
    }
 
    $koneksi->close();
?>
</body>
</html>

<script>
setTimeout(function () {
   window.location.href= 'register.php'; // the redirect goes here

},1000); // 5 seconds
</script>
