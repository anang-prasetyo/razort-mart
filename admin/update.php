<?php 
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
$id=$_POST['id'];
$nama=$_POST['namaBarang'];
$jenis=$_POST['jenisBarang'];
$suplier=$_POST['suplier'];
$modal=$_POST['hargaModal'];
$harga=$_POST['hargaJual'];
$jumlah=$_POST['jumlah'];

mysqli_query($koneksi, "update barang set nama='$nama', jenis='$jenis', suplier='$suplier', modal='$modal', harga='$harga', jumlah='$jumlah' where id='$id'");
header("location:barang.php");

?>