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
    $id_nota_pemasangan = $_GET['id_nota_pemasangan'];
 
    //perintah untuk melakukan hapus
    //melakukan penghapusan data berdasarkan ID
    $query2 = mysqli_query($koneksi, "DELETE from  data_pemasangan WHERE id_nota_pemasangan=$id_nota_pemasangan ") or die(mysql_error());
    $sql = "DELETE FROM nota_pemasangan WHERE id_nota_pemasangan=$id_nota_pemasangan";
 
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
   window.location.href= 'data_pemasangan.php'; // the redirect goes here

},1000); // 5 seconds
</script>