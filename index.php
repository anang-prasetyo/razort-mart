<!DOCTYPE html>
<html>
<head>
	<title>RazorMart | Login</title>
	<link rel="stylesheet" href="assets/newStyle/login.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'admin/config.php'; ?>
</head>
<body>	
	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
		<div class="login">
			<main>
				<section>
					<div>
						<h1>Login</h1>
						<div class="desc">Silahkan lengkapi data berikut ini untuk login ke akun anda</div>
					</div>
				</section>
				<section>
					<form action="login_act.php" method="post">
						<div class="isian">
							<!-- <span class="material-symbols-outlined">person</span> -->
							<object type="image/svg+xml" data="assets/icons/person.svg"></object>
							<input type="text" placeholder="Username" name="uname" id="" onkeyup="this.value = this.value.toUpperCase()" required>
						</div>
						<div class="isian">
							<!-- <span class="material-symbols-outlined">key</span> -->
							<object type="image/svg+xml" data="assets/icons/key.svg"></object>
							<input type="password" placeholder="Password" name="pass" id="">
						</div>
						<div class="submit">
							<input type="submit" value="Login">
						</div>
					</form>
				</section>
			</main>
		</div>
	</div>
</body>
</html>