<?php include 'header.php'; 
$koneksi = mysqli_connect('localhost','root','','projectweb');
?>

<div class="edit">
	<main>
		<section>
			<div class="s1">
				<h3>Tambah User</h3>
				<div>
					<button data-bs-toggle="modal" data-bs-target="#myModal" class="buttonku-1-primary"><i class="bi-plus"></i> Tambah User</button>
				</div>
			</div>
		</section>
	</main>
</div>

<!-- <?php 
$periksa=mysqli_query($koneksi, "select * from barang where jumlah <=3");
while($q=mysqli_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?> -->

<!-- <?php 
$per_hal=10;
$jumlah_record=mysqli_query($koneksi, "SELECT COUNT(*) from barang");
$jum=mysqli_fetch_array($jumlah_record);
$halaman=ceil($jum['number'] / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?> -->

<!--  <form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>  -->
 <br/> 

 <ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul> 
<!-- modal input --> 
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<form action="tmb_user_act.php" method="post" class="d-flex flex-column gap-2">
				<!-- <div class="form-group">
					<label>Nomor Id</label>
					<input name="id" type="text" class="form-control" placeholder="No Id" required>
				</div> -->
				<div class="form-group">
					<label>Nama User</label>
					<input name="uname" type="text" class="form-control" placeholder="Nama User" onkeyup="this.value = this.value.toUpperCase()" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input name="pass" type="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<label>Bagian</label>
					<select class="form-control" name="bagian">
						<option selected disabled hidden>Pilih Bagian ..</option>
						<option value="ADMIN">ADMIN</option>
						<option value="KARYAWAN">KARYAWAN</option>
					</select>
					<!-- <input name="bagian" type="text" class="form-control" placeholder="Admin/Karyawan"> -->
				</div>
				<div class="modal-footer">
					<input type="reset" class="buttonku-1" value="Reset">
					<input type="submit" class="buttonku-1-primary" value="Tambah User">
				</div>
			</form>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah User Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_user_act.php" method="post">
					<div class="form-group">
						<label>Nomor Id</label>
						<input name="id" type="text" class="form-control" placeholder="No Id" required>
					</div>
					<div class="form-group">
						<label>Nama User</label>
						<input name="uname" type="text" class="form-control" placeholder="Nama User">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="pass" type="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Bagian</label>
						<input name="bagian" type="text" class="form-control" placeholder="Admin/Karyawan">
					</div>																				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div> -->



<?php 
include 'footer.php';

?>