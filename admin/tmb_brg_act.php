<?php 
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
$namaBarang=$_POST['namaBarang'];
$jenisBarang=$_POST['jenisBarang'];
$suplier=$_POST['suplier'];
$hargaModal=$_POST['hargaModal'];
$hargaJual=$_POST['hargaJual'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['jumlah'];

// mysqli_query($koneksi, "insert into barang values('','$namaBarang','$jenisBarang','$suplier','$hargaModal','$hargaJual','$jumlah','$sisa')");
$query = mysqli_query($koneksi, "select * from barang where nama like '$namaBarang%'");
$cek2 = mysqli_num_rows($query);
if($cek2 > 0){
  echo '
  <script>
  localStorage.setItem("isDataBaru", "false");
  console.log("false")
  </script>
  ';
  // alert("false");
  // header("location:barang.php");
}else{
  echo '
  <script>
  localStorage.setItem("isDataBaru", "true");
  console.log("true")
  </script>
  ';
  // header("location:barang.php");
}
?>