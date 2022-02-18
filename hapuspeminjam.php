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
    $id_nota = $_GET['id_nota'];
 
    //perintah untuk melakukan hapus
    //melakukan penghapusan data berdasarkan ID
    $query2 = mysqli_query($koneksi, "DELETE from  belanja WHERE id_nota=$id_nota ") or die(mysql_error());
    $sql = "DELETE FROM nota_belanja WHERE id_nota=$id_nota";
 
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
   window.location.href= 'peminjam_asetK.php'; // the redirect goes here

},1000); // 5 seconds
</script>
