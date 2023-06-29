<?php 
include 'header1.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
?>

<div class="edit">
	<main>
		<section>
			<div class="text-center py-4">
				<nav class="d-flex justify-content-center" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="barang1.php">Data Barang</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Barang</li>
					</ol>
				</nav>
				<h3>Edit Barang</h3>
				<div>Lakukan edit data barang jika ada data yang salah.</div>
				<hr>
				<div class="d-flex justify-content-center" style="margin: 2rem 0;">
					<button class="buttonku-1" onclick="window.location.href='barang1.php';"><i class="bi-arrow-left me-2"></i> Kembali</button>
				</div>
			</div>
		</section>
		<section>
			<div class="s2">
			<?php
			$id_brg=mysqli_real_escape_string($koneksi, $_GET['id']);
			$det=mysqli_query($koneksi, "select * from barang where id='$id_brg'")or die(mysql_error($koneksi));
			while($d=mysqli_fetch_array($det)){
			?>					
				<form action="update1.php" method="post">
					<table class="table">
						<tr>
							<td>Nama</td>
							<td style="display: none;"><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
							<td><input type="text" class="form-control" name="nama" onkeyup="this.value = this.value.toUpperCase()" required value="<?php echo $d['nama'] ?>"></td>
						</tr>
						<tr>
							<td>Jenis</td>
							<td><input type="text" class="form-control" name="jenis" onkeyup="this.value = this.value.toUpperCase()" required value="<?php echo $d['jenis'] ?>"></td>
						</tr>
						<tr>
							<td>Suplier</td>
							<td><input type="text" class="form-control" name="suplier" onkeyup="this.value = this.value.toUpperCase()" required value="<?php echo $d['suplier'] ?>"></td>
						</tr>
						<tr>
							<td>Modal</td>
							<td><input type="number" min="0" class="form-control" name="modal" value="<?php echo $d['modal'] ?>"></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><input type="number" min="0" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td><input type="number" min="0" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div style="display: flex; gap: 1rem;">
									<input type="reset" value="Reset" class="buttonku-1">
									<input type="submit" class="buttonku-1-primary" value="Simpan Perubahan">
								</div>
							</td>
						</tr>
					</table>
				</form>
				<?php 
			}
			?>
			</div>
		</section>
	</main>
</div>
<?php include 'footer.php'; ?>