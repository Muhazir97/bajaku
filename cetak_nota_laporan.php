<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']!="admin"){
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>
  
<title>PT. Sikasmart</title>
      <link rel ="stylesheet" type="text/css" href="1. LatihanMenu3.css">
      <link rel ="icon" type="image/png" href="tw.png">
<div class="container">

  <style>.header{
    width       :100%;
    height        :100px;
   }
  </style>
    <div class="header">
      <img src="sm2.png" class="header">
    </div>    
<br>

  <h2>Laporan Transaksi Penjualan</h2>
  <h3 align="left">No Nota : <?php $id_nota = $_GET['id_nota']; echo $id_nota ?></h3><hr>
<br>
<br>

<style type="text/css">
    body {
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
    }
    
    /* Table */
    .demo-table {
      border-collapse: collapse;
      font-size: 13px;
    }
    .demo-table th, 
    .demo-table td {
      border: 1px solid black;
      padding: 7px 17px;
    }
    .demo-table .title {
      caption-side: bottom;
      margin-top: 12px;
    }
    
    /* Table Header */
    .demo-table thead th {
      background-color: #blue;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
    }
    
    /* Table Body */
    .demo-table tbody td {
      color: #353535;
    }
    .demo-table tbody td:first-child,
    .demo-table tbody td:last-child,
    .demo-table tbody td:nth-child(4) {
      text-align: center;
    }
    .demo-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .demo-table tbody tr:hover td {
      background-color: #ffffa2;
      border-color: #ffff0f;
      transition: all .2s;
    }
    
    /* Table Footer */
    .demo-table tfoot th {
      background-color: #e5f5ff;
    }
    .demo-table tfoot th:first-child {
      text-align: left;
    }
    .demo-table tbody td:empty
    {
      background-color: #ffcccc;
    }
  </style>

</head>
   <?php
       include('koneksi.php');
  ?>

<body>

  <table class="demo-table"> 
     <tr bgcolor="#6495ED">
        <th>NO</th>
        <th>Kode Barcode</th> 
        <th>Nama Barang</th>
        <th>Harga Beli</th> 
        <th>Harga Jual</th>
        <th>Jumlah /Batang</th>
        <th>Kasir</th>
        <th>Tgl Transaksi</th>
        <th>Waktu Transaksi</th>
        <th>Sub Total </th>
     </tr>
     </thead>
     <tbody>
         <?php
            $id_nota = $_GET['id_nota'];
            $no =1;

            $sql = $koneksi->query("SELECT * from belanja where id_nota='$id_nota' ORDER BY id ASC");

         while ($data = $sql->fetch_assoc()){
       ?>
     <tr>
        <td><?php echo $no ++; ?></td> 
        <td><?php echo $data['barcode'];?></td> 
        <td><?php echo $data['nama'];?></td>
        <td>Rp. <?php echo number_format( $data['harga_beli'], 0,',','.' )?></td>
        <td>Rp. <?php echo number_format( $data['harga_jual'], 0,',','.' )?></td>
        <td><?php echo $data['jumlah'];?></td>
        <td><?php echo $data['kasir'];?></td>
        <td><?php echo $data['tgl'];?></td>
        <td><?php echo $data['waktu'];?></td>
        <td>Rp. <?php echo number_format( $data['sub_total'], 0,',','.' )?></td>       
     </tr>

  <?php } ?>

    <?php } ?>
        </tbody>
        <?php
        $id_nota = $_GET['id_nota'];
        $hitung = "SELECT SUM(sub_total) AS total1 FROM belanja where id_nota='$id_nota' ";
        $select_hitung = mysqli_query($koneksi, $hitung);
        while($select_result = mysqli_fetch_array($select_hitung))
        {
        $total1         = $select_result['total1'] ;
        echo"
        ";
    ?>
      <tr>
          <td colspan="9" rowspan="" headers=""><i><b>Total Pendapatan</i></b></td>
          <td colspan="" rowspan="" headers="">
            <i><b> Rp. <?php echo number_format($total1,0,',','.');?> </i></b>
          </td>
        <?php  ?>
   </table>
 <br>
 <br>
 <br>
</div>
        
    </body>
</html>
 <script>
    window.print();
 </script>

<?php }?>
