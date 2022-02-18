<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include ('koneksi.php');
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from data_login where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
  
  $data = mysqli_fetch_assoc($login);
 
  // cek jika user login sebagai admin
  if($data['level']=="admin"){
 
    // buat session login dan username
    $_SESSION['username'] = $data['nama'];
    $_SESSION['level'] = "admin";
    // alihkan ke halaman dashboard admin
    header("location:Dashboard.php");
 
  // cek jika user login sebagai pegawai
  }else if($data['level']=="pegawai"){
    // buat session login dan username
    $_SESSION['username'] = $data['nama'];
    $_SESSION['level'] = "pegawai";
    // alihkan ke halaman dashboard pegawai
    header("location:Dashboarduser.php");
 
  }else{
 
    // alihkan ke halaman login kembali
     echo "<script>alert('Username atau Password anda salah!');window.location='index.html'</script>"; //salah password
  } 
}else{
  echo "<script>alert('Username atau Password anda salah!');history.go(-1);</script>"; //salah usrname
}
 
?>