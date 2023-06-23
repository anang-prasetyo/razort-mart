<?php 
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['jumlah'];

mysqli_query($koneksi, "insert into barang values('','$nama','$jenis','$suplier','$modal','$harga','$jumlah','$sisa')");
header("location:barang.php");

 ?>