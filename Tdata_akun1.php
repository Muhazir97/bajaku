 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <body>
  <?php
     include('koneksi.php');

         $nama      = $_REQUEST['nama'];
         $email     = $_REQUEST['email'];
         $password  = $_REQUEST['password']; 
         $level     = $_REQUEST['level'];
         
$sql = "SELECT * FROM data_login WHERE email='$_POST[email]'";
  $query = mysqli_query($koneksi, $sql) or die (mysql_error());
 
  if(mysqli_num_rows($query) > 0){
    
     echo "<script type='text/javascript'>swal('Data Gagal di Tambahkan!','Maaf Email ini Sudah Ada', 'warning',);</script>";
  } else {

          if(!$insert = mysqli_query($koneksi, "INSERT INTO data_login VALUES (NULL,'$nama','$email','$password','$level')")){
                echo "<script type='text/javascript'>swal('Data Gagal di Tambahkan!','', 'warning',);</script>";
            }else{
                //ambil id terakhir insert
                echo "<script type='text/javascript'>swal('Data Berhasil di Tambahkan!','', 'success',);</script>";

            }
    
   } ?>

 </body>
 </html>

 <script>
setTimeout(function () {
   window.location.href= 'register.php'; // the redirect goes here

},1000); // 5 seconds
</script>



   