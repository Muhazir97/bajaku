<html>
<head>
<title>MENGHAPUS DATA  </title>
<META http-equiv="refresh" content="0;URL=surat_jalan.php"> 
</head>
<body>

<?php 
include('koneksi.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE from temp_surat where id='$id'") or die(mysql_error());
?>


</center>
</body>
</html>