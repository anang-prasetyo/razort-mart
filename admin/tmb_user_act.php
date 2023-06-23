<?php 
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
// $id=$_POST['id'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$bagian=$_POST['bagian'];

mysqli_query($koneksi, "insert into admin values('', '$uname','$pass', '$bagian')");
header("location:tambah_user.php");

?>