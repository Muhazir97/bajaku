<?php

include('koneksi.php');

  if (isset($_GET['op']))
  {
    if ($_GET['op'] == 'send')
    {
      date_default_timezone_set('Asia/Jakarta');
      $dmy          = date('Ymd');
      $time1        = date('H:i:s');
      $nama_barang  = $_POST['nama_barang'] ;
      $jumlah_barang= $_POST['jumlah_barang'] ;
      $satuan       = $_POST['satuan'] ;
      
     $query_insert = "INSERT INTO temp_surat (nama_barang,jumlah_barang,satuan) VALUES ('$nama_barang','$jumlah_barang','$satuan')";

      $insert = mysqli_query($koneksi, $query_insert);

      if ($insert){
      
      }
      else{
      echo "<p>GAGAL DITAMBAHKAN</p>";
      }
      
    }
  }
  header("location:surat_jalan.php");
  ?>