<?php 
session_start();
$koneksi = mysqli_connect('localhost','root','','projectweb');
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$query=mysqli_query($koneksi, "select * from admin where uname='$uname' and pass='$pass'")or die(mysqli_error($koneksi));
$cek = mysqli_num_rows($query);

if($cek > 0){

	$data = mysqli_fetch_assoc($query);
   
	if($data['bagian']=="ADMIN"){
   
	 $_SESSION['uname'] = $uname;
	 $_SESSION['bagian'] = "ADMIN";
	 header("location:admin/index.php");
   
	}else if($data['bagian']=="KARYAWAN"){

	 $_SESSION['uname'] = $uname;
	 $_SESSION['bagian'] = "KARYAWAN";
	 header("location:admin/index1.php");
   
	}else{
   
	 header("location:index.php?pesan=gagal")or die(mysqli_error($koneksi));
	} 
   }else{
	header("location:index.php?pesan=gagal")or die(mysqli_error($koneksi));
   }
 ?>