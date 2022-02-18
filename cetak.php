
<title>BAJAKU</title>
  <link rel ="stylesheet" type="text/css" href="1. LatihanMenu3.css">
  <link rel ="icon" type="image/png" href="tw.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="container">
	<?php  include('koneksi.php'); ?>
	<style>
    .header{
      width: 100%;
      height: 80px;
    }
   </style>
	<div class="header">
	 <img src="sm2.png" class="header">
  </div>
  <br>
  <br>
  <br>
	<h1>Laporan</h1>
	<hr>
	<table>
		<tr>
			<th>1. Barang Terjual Hari Ini</th>
			<td>:</td>
			<td><?php
            date_default_timezone_set('Asia/Jakarta');
            $dmy     = date('Ymd');
            $select1 = "SELECT SUM(jumlah ) AS total2 FROM belanja WHERE tgl = '$dmy'";
            $select_query1 = mysqli_query($koneksi, $select1);
            while($select_result = mysqli_fetch_array( $select_query1)){
              $total2 = $select_result['total2'] ;
              echo"$total2";
            }
          ?>
			</td>
		</tr>
		<tr>
			<th>2. Penghasilan Penjualan Hari Ini</th>
			<td>:</td>
			<td><?php
              date_default_timezone_set('Asia/Jakarta');
              $dmy     = date('Ymd');
              $select1 = "SELECT SUM(sub_total ) AS total FROM belanja WHERE tgl = '$dmy'";
              $select_query1 = mysqli_query($koneksi, $select1);
              while($select_result = mysqli_fetch_array( $select_query1)){
              $total = $select_result['total'] ;
           ?> Rp. <?php echo number_format( $total, 0,',','.' );} ?>
      </td>
	 </tr>
      <tr>
        <th>3. Jumlah Pemasangan Hari Ini</th>
        <td>:</td>
        <td><?php
                date_default_timezone_set('Asia/Jakarta');
                $dmy = date('Ymd');
                echo mysqli_num_rows(mysqli_query($koneksi,"SELECT*FROM nota_pemasangan WHERE tgl = '$dmy' "));
            ?>      
        </td>
      </tr>
      <tr>
        <th>4. Penghasilan Pemasangan Hari Ini</th>
        <td>:</td>
        <td><?php
                date_default_timezone_set('Asia/Jakarta');
                $dmy = date('Ymd');
                $select1 = "SELECT SUM(dp1+dp2+dp3 ) AS total FROM nota_pemasangan WHERE tgl = '$dmy'";
                $select_query1 = mysqli_query($koneksi, $select1);
                while($select_result = mysqli_fetch_array( $select_query1)){
                  $total          = $select_result['total'] ;
             ?> Rp. <?php echo number_format( $total, 0,',','.' );} ?>
        </td>
      </tr>
	</table>
  
<?php
  date_default_timezone_set('Asia/Jakarta');
  $dmy         = date('Y-m');
  $bulan       = mysqli_query($koneksi, "SELECT * FROM belanja WHERE tgl like '%$dmy%' GROUP BY tgl order by tgl asc");
  $penghasilan = mysqli_query($koneksi, "SELECT sum(sub_total) as total From belanja WHERE tgl like '%$dmy%' GROUP BY tgl ");
?>

<div align="left">
  <div style="width: 80%;">
    <canvas id="myChart"></canvas>
  </div>
</div> 
<br><br><br>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . substr($b['tgl'], -2) . '",';}?>],
        datasets: [{
            label: 'Penghasilan Penjualan',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['total'] . '",';}?>]
        }]
    },
    // Configuration options go here
    options: {}
  });
</script>
</body>
</html>

<script type="text/javascript" src="chartjs/Chart.js"></script>
</div>
<!-- <script>
    window.print();
  </script> -->
<script>
  setTimeout(function () {
     window.print(); // the redirect goes here

  },1000); // 5 seconds
</script>