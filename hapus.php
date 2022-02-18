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
    $id_brg = $_GET['id_brg'];
 
    //perintah untuk melakukan hapus
    //melakukan penghapusan data berdasarkan ID
    $sql = "DELETE FROM barang WHERE id_brg=$id_brg";
 
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
   window.location.href= 'tables2.php'; // the redirect goes here

},2000); // 5 seconds
</script>
