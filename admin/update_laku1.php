<?php 
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
$id=$_POST['id'];
$tanggal=$_POST['tgl'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$total_harga=$harga*$jumlah;

mysqli_query($koneksi, "update barang_laku set tanggal='$tanggal', nama='$nama', harga='$harga', jumlah='$jumlah', total_harga='$total_harga' where id='$id'");
header("location:barang_laku1.php");

?>