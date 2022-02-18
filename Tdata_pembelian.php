<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level'] !="pegawai")
  {
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>
<?php

include('koneksi.php');

  if (isset($_GET['op']))
  {
    if ($_GET['op'] == 'send')
    {
      date_default_timezone_set('Asia/Jakarta');
      $dmy          = date('Ymd');
      $time1        = date('H:i:s');
      $barcode      = $_POST['barcode'] ;
      $jumlah       = $_POST['jumlah'] ;
      $harga_jual   = $_POST['harga_jual'] ;
      $kasir        = $_SESSION['username'];
      
      $select       = "SELECT id_brg,nama,harga_beli from barang where barcode='$barcode' or nama='$barcode'";
      $select_query = mysqli_query($koneksi, $select);
 
      while($select_result = mysqli_fetch_array($select_query)){

      $id_brg     = $select_result ['id_brg'];
      $nama       = $select_result ['nama'];
      $harga_beli = $select_result ['harga_beli'];

     $query_insert = "INSERT INTO temp (id_brg,nama,harga_beli,harga_jual,jumlah,kasir,tgl,waktu,barcode) VALUES ($id_brg,'$nama','$harga_beli','$harga_jual','$jumlah','$kasir','$dmy','$time1','$barcode')";
     $query_update = "UPDATE temp SET sub_total = harga_jual * jumlah WHERE nama='$nama' and jumlah='$jumlah'";

      $insert = mysqli_query($koneksi, $query_insert);

      if ($insert){
      $update = mysqli_query($koneksi, $query_update);
      }
      else{
      echo "<p>GAGAL DITAMBAHKAN</p>";
      }
      }
    }
  }
  
   header("location:Transaksiuser.php")
  ?>

  <?php } ?> 