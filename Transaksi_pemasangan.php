<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level'] !="pegawai")
  {
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>
<!DOCTYPE html>
 <html lang="en">
 <link rel ="icon" type="image/png" href="tw.png">
 <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Transaksi Pemasangan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
      <a class="navbar-brand" href="Dashboarduser.php" ><img src="sm2.png" width="150" height="50"></a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active" >
                <a class="nav-link" href="Dashboarduser.php"><i class="fas fa-home"></i> <font style= "font-size:15px; color: white;" >  Home</font></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="surat_jalan.php"><i class="fas fa-envelope-open-text"></i> Surat Jalan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="databarang_user.php"><i class="fas fa-database"></i> Data Barang</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="belum_lunas.php"><i class="fas fa-money-check-alt"></i> Belum Lunas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-dollar-sign"></i> <font style= "font-size:15px; color: white;" >  Pilih Transaksi</font></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Transaksiuser.php">Transaksi Pembelian</a>
                <a class="dropdown-item" href="Transaksi_pemasangan.php">Transaksi Pemasangan</a>
              </div>
          </ul>

        <ul class="navbar-nav mr-auto">
             <li class="nav-item active" >
             </li>&nbsp; &nbsp; &nbsp; 
             <li class="nav-item active">
                <font style= "font-size:15px; color: white;" > Hi, <b><?php echo $_SESSION['username']; ?></b><hr> </font>
             </li>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> <font style= "font-size:15px; color: white;" >  Logout</font></a>
                  </li>
                </ul>
            </div>
          </li>
        </ul>
      </div>
    </ul>

  </div>
 </div>
</nav>

<br>
<br>
<br>
  <div class="container mt-5">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div align="center">
                <h1>Transaksi Pemasangan</h1>
            </div>
          </div><br>

    <div class="container">
      <div class="row">
        <div class="col-4"> 

          <form name='autoSumForm' class="form" action="angkut_nota_doang.php?op=send" target="angkut_nota_doang.php?op=send" method="post">
                <div class="form-group">
                    <label>Nama Material</label>
                    <input type="text" name="material" placeholder="Nama Material" class="form-control" required>
                </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                       <label>Harga Permeter</label>
                       <input type="text" name="harga_jual" id="harga_jual" placeholder="Harga Permeter" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                        <label>Meter/ Volume</label>
                        <input type="text" name="meter" placeholder="Meter/ Volume" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required>
                  </div>
                </div>
              </div>
              <div class="">
                  <div class="form-group">
                        <label>Sub Total</label>
                        <input type="text" value='0' id="input" name="sub_total" placeholder="Sub Total" class="form-control" readonly onchange='tryNumberFormat(this.form.thirdBox);' required>
                  </div>
               </div>
               <br>
               <div align="center">
                   <button type="submit" class="btn btn-primary btn-sm"><i class="fab fa-telegram-plane"></i> Cetak Nota</button>
               </div>
          </form><hr>

    <script> 
        function startCalc(){
        interval = setInterval("calc()",1);}
        function calc(){

        two = document.autoSumForm.harga_jual.value; 
        three = document.autoSumForm.meter.value;
         
        document.autoSumForm.input.value = (two * 1) * (three * 1);}
        function stopCalc(){
        clearInterval(interval);}
  </script>
</div>
 <br>
<style type='text/css'>
      .wrapper{
         position: relative;
         float: left;
         left: 0px;
         width: 100%;
         margin-bottom: 10px;
         background-color: #ffffff
      }
      .left1{
         position: relative;
         float: left;
         left: 5px;
         width: 700px;
         height: 600px;
         background-color: #ffffff
      }
      .left2{
         position: relative;
         float: left;
         left: 15px;
         width: 300px;
         height: 600px;
         background-color: #ffffff
      }
      body {
         border-width: 0px;
         padding: 0px;
         margin: 0px;
         font-size: 90%;
         background-color: white;
      }
</style>
<style type="text/css"> 
      h1 {
        font-family: Verdana;
      }
      
      body {
        font-family: Verdana;
        font-size: 12px;
      } 
      
      td {
        font-size: 12px;
      }
</style> 
<style type="text/css">
      table.tftable {table-layout:fixed; width:100%; word-break:break-all; font-size:12px;color:#333333;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
      table.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px; border-style: solid;border-color: #729ea5;}
      table.tftable tr {background-color:#d4e3e5;}
      table.tftable td {font-size:12px;border-width: 1px;padding: 4px;border-style: solid;border-color: #729ea5; text-align:right; }
</style>

</head>
<body>
  <div class="wrapper">
     <div class="left1">
        


<a style="color: red;">*</a> <i>Ketika di Submit Data otomatis tersimpan ke Database dan Terprint</i><br><br>


<table id='tfhover'  class='tftable' border='1' align='center'> <col width='200'><col width='100'><col width='100'><col width='100'><col width='50'>

<tr>

<th style="text-align:center;">Material</th>
<th style="text-align:center;">Jumlah </th>
<!-- <th style="text-align:center;">Harga</th> -->

<th></th>
</tr>
 
<?php
    include('koneksi.php');

$select = "SELECT id_pemasangan,material,jumlah FROM temp_pemasangan";
$select_query = mysqli_query($koneksi, $select);


while($select_result = mysqli_fetch_array($select_query))
{

$id = $select_result['id_pemasangan'] ;
$nama          = $select_result['material'] ;
$harga_jual    = $select_result['jumlah'] ;
// $jumlah       = $select_result['satuan'] ;

echo "
<tr>
<td style='text-align:left;'>$nama</td>
<td style='text-align:center;'>$harga_jual</td>

<td>
   <a href='delete_itempemasangan.php?id=$id'><img src='bin.png'></img></a>
</td>
</tr>
";
}

?>

</table>

<!-- <table id='tfhover'  class='tftable' border='1' align='center'> <col width='200'><col width='100'><col width='100'><col width='100'><col width='50'>
<tr>

<th style='text-align:center;' colspan="2"></th>
<th style='text-align:right;'><input type="" name="" size='13' ></th>
</tr>
</table> -->

</div>
       <div class="left2">
          <div class="message warning">
             <div class="contact-form">
                <div class="logo">
               </div>  
<!--- form --->
<br>
INPUT
<form  action="temp_pemasangan.php?op=send" method="post">
  <ul>
    <li>
       <label>Kode Barang</label>&nbsp;
       <input type="text" id  name="material"  placeholder="Kode atau nama barang" required size='21' />                      
     </li>
    <li>
       <label>Jumlah</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
      <input type="text"  name="jumlah"  placeholder="Jumlah" required size='21'/>                  
     </li>
    <BR>

     <li class="style">
         <button class="btn btn-primary btn-sm" type="Submit" value="TAMBAHKAN BARANG" ><i class="fas fa-plus"></i> TAMBAHKAN BARANG</button>
     </li>
  </ul> 
  <div class="clear"></div> 
</form>

Data Customer
<form name='autoSumForm1' class="form" action="angkut_pemasangan.php" target="_blank" method="post">  
    
     <ul> 
    <li>
       <label>Nama Customer</label>
       <input type="text" name="nama_customer"  placeholder="Nama Customer"  size='18' />                      
     </li>

    <li>
       <label>No Telephone</label>&nbsp;&nbsp;
      <input type="number"  name="no_tlp"  placeholder="No Telephone" value="0" size='20'/>                  
    </li>

    <li>
       <label>Alamat</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      <textarea type="text"  name="alamat"  placeholder="Alamat" size='20'/></textarea>               
    </li>

   <!--  <li>
       <label>Material</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      <input type="text"  name="material"  placeholder="Material" size='19'/>            
    </li>

    <li>
       <label>Harga Permeter</label>
      <input type="text" name="harga_jual" id="harga_jual" placeholder="Harga Permeter" onFocus="startCalc();" onBlur="stopCalc();" required size='19'>
    </li>

    <li>
       <label>Volume / Meter </label>&nbsp;
      <input type="text" name="meter" placeholder="Meter/ Volume" onFocus="startCalc();" onBlur="stopCalc();" required size='19'>            
    </li> -->

    <li>
       <label>Pembayaran </label>&nbsp;&nbsp;
      <input type="text" value='0' id="input" name="sub_total" placeholder="Sub Total" onchange='tryNumberFormat(this.form.thirdBox);' required >
    </li>

    <li>
      <label for="exampleFormControlSelect1"><a style="color: red;">*</a> Pilih Status</label>&nbsp;
      <select name="status" required="" style="width: 170px; height: 25px;">
        <option value="">Pilih Status</option>
        <option value="LUNAS">LUNAS</option>
        <option value="BELUM LUNAS">BELUM LUNAS</option>
      </select>
    </li>

  <li>
    <label for="exampleFormControlTextarea1">Catatan</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
     <textarea type="text"  name="catatan"  placeholder="Catatan" size='25'/></textarea>
  </li>
    <BR>

     <!-- <li class="style">
         <button class="btn btn-success btn-sm" type="Submit" formaction="angkut_nota_doang.php?op=send" ><i class="fab fa-telegram-plane"></i> Cetak Nota</button>
     </li><br> -->
     <li class="style">
         <button class="btn btn-secondary btn-sm" type="Submit" value="TAMBAHKAN BARANG" ><i class="fab fa-telegram-plane"></i> Cetak Surat Jalan</button>
     </li>
  </ul> 
</form>
</div>

<!-- <input type="text" id="input">
<input type="text" id="output">
 -->
<!--   <script> 
        function startCalc(){
        interval = setInterval("calc()",1);}
        function calc(){

        two = document.autoSumForm1.harga_jual.value; 
        three = document.autoSumForm1.meter.value;
         
        document.autoSumForm1.sub_total.value = (two * 1) * (three * 1);}
        function stopCalc(){
        clearInterval(interval);}
  </script> -->



      
</div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Powered by SIKASMART V.0.2</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html> 
<?php } ?>