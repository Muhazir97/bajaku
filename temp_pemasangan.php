<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level'] !="pegawai")
  {
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{

include('koneksi.php');

  if (isset($_GET['op']))
  {
    if ($_GET['op'] == 'send')
    {
      date_default_timezone_set('Asia/Jakarta');
      $dmy          = date('Ymd');
      $time1        = date('H:i:s');
      $jumlah       = $_POST['jumlah'] ;
      $kasir        = $_SESSION['username'];
      $barcode      = $_POST['material'] ;

      $select       = "SELECT id_brg,nama,harga_beli from barang where barcode='$barcode' or nama='$barcode'";
      $select_query = mysqli_query($koneksi, $select);
 
      while($select_result = mysqli_fetch_array($select_query)){

      $id_brg    = $select_result  ['id_brg'];
      $nama       = $select_result ['nama'];
      $harga_beli = $select_result ['harga_beli'];
      
     $query_insert = "INSERT INTO temp_pemasangan (id_brg,material,jumlah,kasir,tgl,waktu) VALUES ('$id_brg','$nama','$jumlah','$kasir','$dmy','$time1')";

      $insert = mysqli_query($koneksi, $query_insert);

      if ($insert){
      
      }
      else{
      echo "<p>GAGAL DITAMBAHKAN</p>";
      }
      }
    }
  }


  header("location:Transaksi_pemasangan.php");
  ?>

  <?php } ?>