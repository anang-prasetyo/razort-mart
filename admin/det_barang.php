<?php 
include 'header.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
?>

<div class="edit">
	<main>
		<section>
			<div class="s1">
				<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="barang.php">Data Barang</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail Barang</li>
					</ol>
				</nav>
				<h3>Detail Barang</h3>
				<div>Semua data lengkap mengenai barang yang dipilih akan ditampilkan disini.</div>
				<hr>
				<div style="margin: 2rem 0;">
					<button class="buttonku-1" onclick="window.location.href='barang.php';"><i class="bi-arrow-left"></i> Kembali</button>
				</div>
			</div>
		</section>
		<section>
			<div class="s2">
				<?php
				$id_brg=mysqli_real_escape_string($koneksi, $_GET['id']);

				$det=mysqli_query($koneksi, "select * from barang where id='$id_brg'")or die(mysqli_error($koneksi));
				while($d=mysqli_fetch_array($det)){
					?>					
					<table class="table">
						<tr>
							<td class="text-black-50">Nama</td>
							<td><?php echo $d['nama'] ?></td>
						</tr>
						<tr>
							<td class="text-black-50">Jenis</td>
							<td><?php echo $d['jenis'] ?></td>
						</tr>
						<tr>
							<td class="text-black-50">Suplier</td>
							<td><?php echo $d['suplier'] ?></td>
						</tr>
						<tr>
							<td class="text-black-50">Modal</td>
							<td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
						</tr>
						<tr>
							<td class="text-black-50">Harga</td>
							<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
						</tr>
						<tr>
							<td class="text-black-50">Jumlah</td>
							<td><?php echo $d['jumlah'] ?></td>
						</tr>
						<tr>
							<td class="text-black-50">Sisa</td>
							<td><?php echo $d['sisa'] ?></td>
						</tr>
					</table>
					<?php 
				}
				?>
			</div>
		</section>
	</main>
</div>


<?php include 'footer.php'; ?>