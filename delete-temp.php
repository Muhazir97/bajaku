

<html>
<head>
<title>MENGHAPUS DATA  </title>
<META http-equiv="refresh" content="0;URL=Transaksiuser.php"> 
</head>
<body>

<?php 
include ('koneksi.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "delete from temp where id='$id'") or die(mysql_error());
$query = mysqli_query($koneksi, "delete from temp_bayar where id='$id'") or die(mysql_error());
?>


</center>
</body>
</html>