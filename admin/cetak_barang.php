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
  <title>Cetak Data Barang</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/newStyle/base.css">
</head>
<body>
  <div class="container py-3">
    <h3> Data Barang </h3>
    <table class="table border border-1">
      <tr>
        <th class="col-md-1">No.</th>
        <th class="col-md-4">Nama Barang</th>
        <th class="col-md-4">Jenis Barang</th>
        <th class="col-md-4">Suplier</th>
        <th class="col-md-3">Harga Barang</th>
        <th class="col-md-1">Stock</th>    
      </tr>
      <?php
      if ($_SESSION['filterDataBarang'] === true){
        $cari = $_SESSION['kwCariDataBarang'];
        $barang = mysqli_query($koneksi, "SELECT * from barang where nama like '$cari%' or jenis like '$cari%' order by nama");
      }
      else {
        $barang = mysqli_query($koneksi, "SELECT * FROM barang");
      }
      $i = 1;
      foreach( $barang as $row){
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row["nama"]; ?></td>
          <td><?php echo $row["jenis"]; ?></td>
          <td><?php echo $row["suplier"]; ?></td>
          <td><?php echo $row["harga"]; ?></td>
          <td><?php echo $row["jumlah"]; ?></td>
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