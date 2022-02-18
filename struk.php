<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']!="pegawai"){
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
<div class="col-4 col-lg-3">

 <h4 > &nbsp; &nbsp;  &nbsp;Toko sembako ibu ani</h4>
Kasir &nbsp;: <?php echo $_SESSION['username']?> <br>
Tgl &nbsp; &nbsp; :  <?php
                $Today = date('y:m:d');
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?><br>
Waktu : <?php
date_default_timezone_set('Asia/Jakarta');
 $time1 = date('H:i:s'); 
echo $time1?><br>
------------------------------------------------


<script> 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){

two = document.autoSumForm.bayar.value; 
three = document.autoSumForm.subtotal.value; 
document.autoSumForm.kembali.value = (two * 1) - (three * 1);}
function stopCalc(){
clearInterval(interval);}
</script>


</head>
<body>
  <div class="wrapper">
       <div class="left1">


<?php
include('koneksi.php');


  if (isset($_GET['op']))
  {
    if ($_GET['op'] == 'send')
    {
      date_default_timezone_set('Asia/Jakarta');
      $dmy = date('Ymd');
      $time1 = date('H:i:s');
      $barcode  = $_POST['barcode'] ;
      $jumlah   = $_POST['jumlah'] ;
       $kasir   = $_SESSION['nama'];
      $select = "select nama,harga_jual,harga_beli from barang where barcode='$barcode' or nama='$barcode'";
      $select_query = mysqli_query($koneksi, $select);
 

      while($select_result = mysqli_fetch_array($select_query))
      {

      $nama   = $select_result ['nama'];
      $harga_jual = $select_result ['harga_jual'];
      $harga_beli = $select_result ['harga_beli'];

     $query_insert = "INSERT INTO temp (nama,harga_beli,harga_jual,jumlah,kasir,tgl,waktu,barcode) VALUES ('$nama','$harga_beli','$harga_jual','$jumlah','$kasir','$dmy','$time1','$barcode')";
      $query_update = "UPDATE temp SET sub_total = harga_jual * jumlah WHERE nama='$nama' and jumlah='$jumlah'";

      $insert = mysqli_query($koneksi, $query_insert);


      if ($insert) 
      {
      $update = mysqli_query($koneksi, $query_update);
      }
      else 
      {
      echo "<p>GAGAL DITAMBAHKAN</p>";
      }
      }
    }
  }
  
  ?>



<table id='tfhover'  class='tftable' border='0' align='left'> <col width='100'><col width='100'><col width='30'><col width='100'>
  
<?php
$select = "SELECT id,sub_total,nama,harga_jual,jumlah FROM temp";
$select_query = mysqli_query($koneksi, $select);

while($select_result = mysqli_fetch_array($select_query)){

?>
    <tr> 
       <td><?php echo $select_result['nama'];?></td>
       <td>Rp. <?php echo number_format( $select_result['harga_jual'], 0,',','.' )?></td>
       <td><?php echo $select_result['jumlah'];?> x</td>
       <td>Rp. <?php echo number_format( $select_result['sub_total'], 0,',','.' )?></td>
    </tr>
<?php } ?>


<?php
$select1 = "SELECT SUM(jumlah) AS alljumlah,SUM(sub_total) AS total FROM temp";
$select_query1 = mysqli_query($koneksi, $select1);

while($select_result = mysqli_fetch_array($select_query1)){
?> 
     <tr> 
        <td align="right">Total :</td>
        <td></td>
        <td><?php echo $select_result['alljumlah'];?></td>
        <td>Rp. <?php echo number_format( $select_result['total'], 0,',','.' )?></td>
     </tr>

<?php } ?>
</table>
      
<!--- form --->
------------------------------------------------


PEMBAYARAN
<form name='autoSumForm' class="form" action="struk.php" method="post">
<?php
$hitung = "SELECT SUM(sub_total) AS total1 FROM temp";
$select_hitung = mysqli_query($koneksi, $hitung);
while($select_result = mysqli_fetch_array($select_hitung))
{
$total1         = $select_result['total1'] ;
echo"
";}?>

<?php
$bayar = $_POST['bayar'] ;
$kembali = $_POST['kembali'] ; 
$query_transaksi = "INSERT INTO temp_bayar (bayar,kembali) VALUES ('$bayar','$kembali')";
$transaksi= mysqli_query ($koneksi, $query_transaksi);

if ($transaksi)
{
} 
else
{ echo "gagal ..."; }
?>

<?php
$select = "SELECT bayar,kembali FROM temp_bayar";
$select_query = mysqli_query($koneksi, $select);
while($select_result = mysqli_fetch_array($select_query))
{

$bayar         = $select_result['bayar'] ;
$kembali         = $select_result['kembali'] ;
echo"
";}?>

<ul>
  <li>
   <label>Pembayaran&nbsp;</label>
   <label>&nbsp;:</label>
&nbsp; &nbsp;Rp. <?php echo number_format( $bayar, 0,',','.' )?>
</li>
<li>
<label>Total Belanja</label>
<label>:</label>
&nbsp; &nbsp;Rp. <?php echo number_format( $total1, 0,',','.' )?>
</li>
<li>
<label>Kembalian</label>
<label>&nbsp; &nbsp; :</label>
&nbsp; &nbsp;Rp. <?php echo number_format( $kembali, 0,',','.' )?>
</li>
</ul>

<div class="clear"></div> 
</form>
------------------------------------------------<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Terimaksih sudah belanja <br>

</div>

                           
      </div>
      <?php } ?>
  </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    window.print();
</script>