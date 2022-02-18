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

  <h2>Laporan Transaksi Pemasangan</h2><hr>
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
        <th>No</th> 
        <th>No Nota</th> 
        <th>Tanggal</th>
        <th>Waktu</th> 
        <th>Kasir</th> 
        <th>Nama Customer </th>
        <th>No Tlp</th>
        <th>Alamat</th>
        <th>DP 1</th>
        <th>DP 2</th>
        <th>DP 3</th>
        <th>Status</th>
     </tr>
     </thead>
     <tbody>
         <?php
            $no =1;
            $tgl_awal     = $_REQUEST['tgl_awal'];
            $tgl_akhir    = $_REQUEST['tgl_akhir']; 

            $sql = $koneksi->query("SELECT * from nota_pemasangan WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_nota_pemasangan ASC");
                                         
            while ($data = $sql->fetch_assoc()){
          ?>
     <tr>
         <td><?php echo $no ++; ?></td> 
               <td><?php echo $data['id_nota_pemasangan'];?></td>
               <td><?php echo $data['tgl'];?></td>
               <td><?php echo $data['waktu'];?></td>
               <td><?php echo $data['kasir'];?></td>
               <td><?php echo $data['nama_customer'];?></td>
               <td><?php echo $data['no_tlp'];?></td>
               <td><?php echo $data['alamat'];?></td>
               <td>Rp. <?php echo number_format( $data['dp1'], 0,',','.' )?></td>
               <td>Rp. <?php echo number_format( $data['dp2'], 0,',','.' )?></td>
               <td>Rp. <?php echo number_format( $data['dp3'], 0,',','.' )?></td>
               <td><?php
                      if ($data['status'] == 'LUNAS') {
                   ?>
                       <button type="submit" class="btn btn-success">LUNAS</button>
                   <?php
                      }else{
                   ?>
                      <button type="submit" class="btn btn-warning">BELUM LUNAS</button>
                   <?php
                   }?>
               </td>    
     </tr>

  <?php } ?>

         <?php
            $no =1;
            $tgl_awal     = $_REQUEST['tgl_awal'];
            $tgl_akhir    = $_REQUEST['tgl_akhir']; 

            $jumlah = $koneksi->query("SELECT sum(dp1+dp2+dp3) as total from nota_pemasangan WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'");
                                          
            ($d = $jumlah->fetch_assoc())

         ?>
      <tr>
          <td colspan="11" rowspan="" headers=""><i><b>Total Pendapatan</i></b></td>
          <td colspan="" rowspan="" headers="">
            <i><b> Rp. <?php echo number_format($d['total'],0,',','.');?> </i></b>
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
