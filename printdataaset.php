<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']!="admin"){
    echo "anda belum login! silahkan <a href='index.html'> login dulu,</a>";
  }else{
 
  ?>

<html>
    <head>
        <title>PT. Sikasmart</title>
            <link rel ="stylesheet" type="text/css" href="1. LatihanMenu3.css">
      <link rel ="icon" type="image/png" href="tw.png">
    </head>
    <body>
    <div id="layout">
    <div class="header">
    <img src="sm2.png" class="header">
</div>
     
<br>

<h2>Laporan Data Barang</h2>
  <hr>
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
  <table class="demo-table"  >
    
  <tr bgcolor="#6495ED">
    <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kode Barcode</th>
                        <th>Harga Beli</th>
                        <th>Stock</th>
                      
                      </tr>
                   </thead>
                      <tbody>
                          <?php
                             $no =1;
                             $sql = $koneksi->query("select * from barang");
                             while ($select_result = $sql->fetch_assoc()){
                               
                            $nama        = $select_result['nama'] ;
                            $barcode      = $select_result['barcode'] ;
                            $harga_beli     = $select_result['harga_beli'] ;
                            $stock     = $select_result['stock'] ;
                         ?>
   <tr>
       <td><?php echo $no ++; ?></td> 
          <?php
          echo "
          <td style='text-align:left;'>$nama</td>
          <td style='text-align:left;'>$barcode</td>
          <td>$harga_beli</td>
          <td>$stock</td>
          "
          ?>
    </tr>
  </tr>
  <?php } ?>
</table>
</form>
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
