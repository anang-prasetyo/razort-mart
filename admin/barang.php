<?php include 'header.php'; 
$koneksi = mysqli_connect('localhost','root','','projectweb');
?>
<div class="data-barang">
	<main>
		<section>
			<div class="text-center py-4">
				<nav class="d-flex justify-content-center" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<?php
						if(isset($_GET['cari'])){
							echo' 
							<li class="breadcrumb-item"><a href="barang.php">Data Semua Barang</a></li>
							<li class="breadcrumb-item active" aria-current="page">Hasil Pencarian "'.$_GET["cari"].'"</li>
							';
						}else{
							echo' 
							<li class="breadcrumb-item active" aria-current="page">Data Semua Barang</li>
							';
						}
						?>
					</ol>
				</nav>
				<h3>Data Barang</h3>
				<div>Semua data barang yang telah dimasukkan akan ditampilkan disini.</div>
			</div>
		</section>
		<hr>
		<section class="my-5">
			<div class="d-flex gap-2 gap-md-4 justify-content-center align-content-center">
				<button id="btnMobile" data-toggle="modal" data-target="#myModal" class="d-inline-flex d-md-none buttonku-1-primary"><i class="bi-plus"></i></button>
				<button id="btnDesktop" data-bs-toggle="modal" data-bs-target="#myModal" class="d-none d-md-inline-flex buttonku-1-primary gap-2"><i class="bi-plus"></i> Tambah Barang</button>
				<form action="cari_act.php" method="get" class="position-relative">
					<input type="text" class="form-control ps-5" placeholder="Cari barang di sini .." autocomplete='off' aria-describedby="basic-addon1" name="cari">
					<i class="bi-search position-absolute top-50 translate-middle-y ms-3"></i>
				</form>
				<button id="btnMobile" class="d-inline-flex d-md-none buttonku-1" onclick=" window.open('lap_barang.php','_blank')"><i class="bi-printer"></i></button>
				<button id="btnDesktop" class="d-none d-md-inline-flex buttonku-1 gap-2" onclick=" window.open('lap_barang.php','_blank')"><i class="bi-printer"></i> Cetak</button>
			</div>
		</section>
		
		<section>
			<div class="s3" style="overflow: auto;">
				<?php 
				$per_hal=20;
				$jumlah_record=mysqli_query($koneksi, "SELECT COUNT(*) from barang");
				$jum=mysqli_fetch_array($jumlah_record);
				// $halaman=ceil($jum['number'] / $per_hal);
				$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
				$start = ($page - 1) * $per_hal;
				?>
				<table class="table table-hover">
					<tr>
						<th class="col-md-1">No</th>
						<th class="col-md-3">Nama Barang</th>
						<th class="col-md-2">Jenis Barang</th>
						<th class="col-md-1 text-end">Harga Beli</th>
						<th class="col-md-1 text-center">Jumlah</th>
						<th class="col-md-1 text-end">Harga Jual</th>
						<!-- <th class="col-md-1">Sisa</th>		 -->
						<th class="col-md-3 text-center">Opsi</th>
					</tr>
					<?php 
					if(isset($_GET['cari'])){
						$cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
						$brg=mysqli_query($koneksi, "select * from barang where nama like '$cari%' or jenis like '$cari%' order by nama");
					}else{
						$brg=mysqli_query($koneksi, "select * from barang order by nama limit $start, $per_hal");
					}
					$no=1;
					while($b=mysqli_fetch_array($brg)){

						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $b['nama'] ?></td>
							<td><?php echo $b['jenis'] ?></td>
							<td class="text-end">Rp.<?php echo number_format($b['modal']) ?>,-</td>
							<td class="text-center"><?php echo $b['jumlah'] ?></td>
							<td class="text-end">Rp.<?php echo number_format($b['harga']) ?>,-</td>
							<td id="rowResponsive" class="text-center">
								<div class="d-flex justify-content-center align-items-center gap-1">
									<a id="btnDesktop" href="det_barang.php?id=<?php echo $b['id']; ?>" class="d-none d-lg-inline-flex buttonku-1">Detail</a>
									<a id="btnDesktop" href="edit.php?id=<?php echo $b['id']; ?>" class="d-none d-lg-inline-flex buttonku-1">Edit</a>
									<a id="btnDesktop" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="d-none d-lg-inline-flex buttonku-1-danger">Hapus</a>
	
									<button id="btnMobile" class="d-inline-flex d-lg-none buttonku-1" onclick="window.location.href='det_barang.php?id=<?php echo $b['id']; ?>';"><i class="bi-three-dots"></i></button>
									<button id="btnMobile" class="d-inline-flex d-lg-none buttonku-1" onclick="window.location.href='edit.php?id=<?php echo $b['id']; ?>';"><i class="bi-pencil-square"></i></button>
									<button id="btnMobile" class="d-inline-flex d-lg-none buttonku-1-danger" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }"><i class="bi-trash"></i></button>
								</div>
							</td>
						</tr>
						<?php 
					}
					?>
					<tr>
						<td colspan="3" class="text-center">Sub Total</td>
							<?php 
								$x=mysqli_query($koneksi, "select sum(modal * jumlah) as totalKeluar from barang");	
								$xx=mysqli_fetch_array($x);

								$y=mysqli_query($koneksi, "select sum(jumlah) as jmlhBrg from barang");	
								$yy=mysqli_fetch_array($y);

								$z=mysqli_query($koneksi, "select sum(harga * jumlah) as profit from barang");	
								$zz=mysqli_fetch_array($z);
								echo "
								<td class='text-end'><b> Rp.". number_format($xx['totalKeluar']).",-</b></td>
								<td class='text-center'><b>". number_format($yy['jmlhBrg'])."</b></td>
								<td class='text-end'><b> Rp.". number_format($zz['profit']).",-</b></td>
								";
							?>
						<td></td>
					</tr>
				</table>
			</div>
		</section>
	</main>
</div>
<!-- <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button> -->

<!-- <ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul> -->
<?php 
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
?>
<?php 
// $per_hal=20;
// $jumlah_record=mysqli_query($koneksi, "SELECT COUNT(*) from barang");
// $jum=mysqli_fetch_array($jumlah_record);
// $halaman=ceil($jum['number'] / $per_hal);
// $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
// $start = ($page - 1) * $per_hal;
?>
<!-- <div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td></td>		
			<td></td>
		</tr>
		<tr>
			<td></td>	
			<td><?php?></td>
		</tr>
	</table>
</div> -->




<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<form action="tmb_brg_act1.php" method="post" class="d-flex flex-column gap-2">
				<div class="form-group">
					<label>Nama Barang</label>
					<input name="nama" type="text" class="form-control" placeholder="Nama Barang .." onkeyup="this.value = this.value.toUpperCase()" required>
				</div>
				<div class="form-group">
					<label>Jenis</label>
					<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang .." onkeyup="this.value = this.value.toUpperCase()" required>
				</div>
				<div class="form-group">
					<label>Suplier</label>
					<input name="suplier" type="text" class="form-control" placeholder="Suplier .." onkeyup="this.value = this.value.toUpperCase()" required>
				</div>
				<div class="form-group">
					<label>Harga Modal</label>
					<input name="modal" type="number" min="0" class="form-control" placeholder="Modal per unit">
				</div>	
				<div class="form-group">
					<label>Harga Jual</label>
					<input name="harga" type="number" min="0" class="form-control" placeholder="Harga Jual per unit">
				</div>	
				<div class="form-group">
					<label>Jumlah</label>
					<input name="jumlah" type="number" min="0" class="form-control" placeholder="Jumlah">
				</div>																	

			</div>
			<div class="modal-footer">
				<input type="reset" class="buttonku-1" value="Reset">
				<input type="submit" class="buttonku-1-primary" value="Tambah Barang">
			</div>
    </div>
  </div>
</div>



<?php 
include 'footer.php';

?>