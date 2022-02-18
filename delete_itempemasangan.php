<html>
<head>
<title>MENGHAPUS DATA  </title>
<META http-equiv="refresh" content="0;URL=Transaksi_pemasangan.php"> 
</head>
<body>

<?php 
include('koneksi.php');

$id_pemasangan = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE from temp_pemasangan where id_pemasangan='$id_pemasangan'") or die(mysql_error());
?>


</center>
</body>
</html>