<?php
  session_start();
	$koneksi = mysqli_connect('localhost','root','','projectweb');
	include 'cek.php';
	include 'config.php';
  // hide error
  error_reporting(0);
  ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Entry Penjualan Barang</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/newStyle/base.css">
</head>
<body>
  <div class="container py-3">
    <h3> Data Barang </h3>
    <table class="table border border-1">
      <tr>
      <th class="col-md-1">No. </th>
        <th class="col-md-1">Tanggal </th>
        <th class="col-md-4">Nama Barang</th>
        <th class="col-md-4">Jumlah Barang</th>
        <th class="col-md-3">Harga Barang</th>
        <th class="col-md-1">Total Harga</th>    
      </tr>
      <?php
			if ($_SESSION["dateStart"] && $_SESSION["dateEnd"]){
        $dateStart = $_SESSION["dateStart"];
        $dateEnd = $_SESSION["dateEnd"];
        $barang_laku = mysqli_query($koneksi, "SELECT * from barang_laku where tanggal between '$dateStart' and '$dateEnd' order by tanggal desc");
      }
			else if ($_SESSION["dateStart"] || $_SESSION["dateEnd"]){
				if($_SESSION["dateStart"]){
          $tanggal = mysqli_real_escape_string($koneksi, $_SESSION["dateStart"]);
        }
        else if($_SESSION["dateEnd"]){
          $tanggal = mysqli_real_escape_string($koneksi, $_SESSION["dateEnd"]);
        }
        else{
          $tanggal = mysqli_real_escape_string($koneksi, $_SESSION['thisDate']);
        }
        $barang_laku = mysqli_query($koneksi, "SELECT * from barang_laku where tanggal like '$tanggal' order by tanggal desc");
      }
      else {
        $barang_laku = mysqli_query($koneksi, "SELECT * FROM barang_laku");
      }
      $i = 1;
      foreach( $barang_laku as $row){
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row["tanggal"]; ?></td>
          <td><?php echo $row["nama"]; ?></td>
          <td><?php echo $row["jumlah"]; ?></td>
          <td><?php echo $row["harga"]; ?></td>
          <td><?php echo $row["total_harga"]; ?></td>
        </tr>
        <?php
        }
      ?>
    </table>
  </div>
  <script>
    window.print()
    // $(document).ready(function(){
    // });
  </script>
</body>
</html>