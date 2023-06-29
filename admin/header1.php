<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	$koneksi = mysqli_connect('localhost','root','','projectweb');
	include 'cek.php';
	include 'config.php';
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Razort Mart - Karyawan</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/newStyle/base.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid bg-white px-3 shadow-1 sticky-top m-0">
		<main class="row d-flex justify-content-between align-items-center gap-1" style="height: 3rem;">
			<section class="col-auto ps-sm-3 pe-md-5">
				<div>Razort Mart</div>
			</section>
			<section class="col-auto">
				<ul class="d-flex align-items-center justify-content-center m-auto p-0">
					<li id="navKaryawanMenu" class="d-none d-sm-flex gap-1 align-items-center py-2 px-4" onclick="window.location.href='index1.php';">
						<i class="bi bi-house"></i>
						<div class="d-none d-lg-inline-flex">Welcome</div>
					</li>
					<li id="navKaryawanMenu" class="d-none d-sm-flex gap-1 align-items-center py-2 px-4" onclick="window.location.href='barang1.php';">
						<i class="bi bi-archive"></i>
						<div class="d-none d-lg-inline-flex">Data Barang</div>
					</li>
					<li id="navKaryawanMenu" class="d-none d-sm-flex gap-1 align-items-center py-2 px-4" onclick="window.location.href='barang_laku1.php';">
						<i class="bi bi-clipboard2-data"></i>
						<div class="d-none d-lg-inline-flex">Entry Penjualan</div>
					</li>
					<li id="navKaryawanMenu" class="d-flex d-sm-none gap-1 align-items-center p-2" onclick="myFunction()">
						<i class="bi bi-list"></i>
					</li>
				</ul>
			</section>
			<section id="menuIconNav" class="col-auto pe-sm-3 pe-md-5">
				<ul class="nav d-flex gap-1 align-items-center justify-content-center">
					<li class="nav-item d-none d-md-inline-flex">
						<a class="nav-link text-black-50"><?php echo $_SESSION['uname']  ?></a>
					</li>
					<li class="nav-item d-inline-flex d-md-none">
						<i class="bi-person"></i>
					</li>
					<li class="text-black-50">|</li>
					<li class="nav-item" style="cursor: pointer;" onclick="if(confirm('Apakah anda yakin ingin logout ??')){ location.href='logout.php' }">
						<a class="nav-link text-danger">Logout</a>
					</li>
				</ul>
			</section>
		</main>
	</div>
	
	<style>
	#myDIVKaryawan {
		background-color: white;
		align-items: center;
		height: calc(100vh - 3rem);
		width: 100%;
		box-shadow: 0px 0px 30px -15px var(--color1-light4);
	}
	</style>

	<script>
	function myFunction() {
		const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
		const body = document.body;
		body.style.top = `-${scrollY}`;
		body.style.position = 'fixed';
		body.style.left = '0';
		body.style.right = '0';
		var x = document.getElementById("myDIVKaryawan");
		// var y = document.getElementById("menuIconNav");
		x.style.position = 'fixed';

		if (x.style.display === "flex") {
			x.style.display = "none";
			const body = document.body;
			const scrollY = body.style.top;
			x.style.position = '';
			// y.style.marginRight = '';
			body.style.position = '';
			body.style.top = '';
			body.style.left = '';
			body.style.right = '';
			window.scrollTo(0, parseInt(scrollY || '0') * -1);
		} else {
			x.style.display = "flex";
			// y.style.marginRight = '14.5px';
		}
	}
	</script>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					$periksa=mysqli_query($koneksi, "select * from barang where jumlah <=3");
					while($q=mysqli_fetch_array($periksa)){	
						if($q['jumlah']<=3){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div id="myDIVKaryawan" class="bg-white" style="display: none; z-index: 9;">
		<ul class="list-unstyled w-100 h-100 d-flex flex-column justify-content-center align-items-center m-0">
			<li class="d-flex py-3 gap-3 w-100 d-flex justify-content-center" style="cursor: pointer;" onclick="window.location.href='index1.php';">
				<i class="bi bi-house"></i>
				<div class="">Welcome</div>
			</li>
			<li class="d-flex py-3 gap-3 w-100 d-flex justify-content-center" style="cursor: pointer;" onclick="window.location.href='barang1.php';">
				<i class="bi bi-archive"></i>
				<div class="">Data Barang</div>
			</li>
			<li class="d-flex py-3 gap-3 w-100 d-flex justify-content-center" style="cursor: pointer;" onclick="window.location.href='barang_laku1.php';">
				<i class="bi bi-clipboard2-data"></i>
				<div class="">Entry Penjualan</div>
			</li>
		</ul>
	</div>
	<div class="container-lg px-5">