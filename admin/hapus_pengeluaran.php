<?php 
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
$id=$_GET['id'];
mysqli_query($koneksi, "delete from pengeluaran where id ='$id'");
header("location:pengeluaran.php");
 ?>