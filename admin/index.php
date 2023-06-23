<?php 
include 'header.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
?>

<?php
$a = mysqli_query($koneksi, "select * from barang_laku");
?>
<!-- versi ruwet -->
<div class="container-fluid">
	<div class="row gap-2">
		<div class="row gap-2">
			<div id="dashboardMenu" class="col-sm bg-white rounded-3 p-4 shadow-1" onclick="window.location.href='barang.php';">
				<div class="row d-flex justify-content-between gap-2 align-items-center">
					<div class="col text-center text-sm-start">
						<div class="s1-infograph-title">Total</div>
						<?php 
							$y=mysqli_query($koneksi, "select sum(jumlah) as jmlhBrg from barang");	
							$yy=mysqli_fetch_array($y);
							echo "
							<div class='fs-3 fw-bold'>". number_format($yy['jmlhBrg'])."</div>
							";
						?>
						<div class="text-black-50">Barang</div>
					</div>
					<div class="col d-flex justify-content-center justify-content-sm-end">
						<i class="bi-shop-window fs-1"></i>
					</div>
				</div>
			</div>
			<div id="dashboardMenu" class="col-sm bg-white rounded-3 p-4 shadow-1" onclick="window.location.href='barang_laku.php';">
				<div class="row d-flex flex-row-reverse flex-sm-row justify-content-between gap-2 align-items-center">
					<div class="col d-flex flex-column text-center text-sm-start">
						<div class="s1-infograph-title">Terjual</div>
						<?php 
							$x=mysqli_query($koneksi, "select sum(jumlah) as jmlhLaku from barang_laku");	
							$xx=mysqli_fetch_array($x);
							echo "
							<div class='fs-3 fw-bold'>". number_format($xx['jmlhLaku'])."</div>
							";
						?>
						<div class="text-black-50">Barang</div>
					</div>
					<div class="col d-flex justify-content-center justify-content-sm-end">
						<i class="bi-bag-check fs-1"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="row gap-2">
			<div class="col-12 col-sm col-lg bg-warning-subtle rounded-3 p-4 shadow-1-warning text-center text-sm-start">
				<div class="s1-infograph-title text-warning">Pemasukan</div>
				<?php 
					$x=mysqli_query($koneksi, "select sum(total_harga) as total from barang_laku");	
					$xx=mysqli_fetch_array($x);			
					echo '
					<div class="fs-3 fw-bold text-warning">Rp. '. number_format($xx["total"]).'</div>
					';
				?>
			</div>
			<div class="col-12 col-sm col-lg bg-danger-subtle rounded-3 p-4 shadow-1-danger text-center text-sm-start">
				<div class="s1-infograph-title text-danger">Pengeluaran</div>
				<?php 
					$x=mysqli_query($koneksi, "select sum(modal * jumlah) as totalKeluar from barang");	
					$xx=mysqli_fetch_array($x);
					echo "
					<div class='fs-3 fw-bold text-danger'>Rp. ". number_format($xx['totalKeluar'])."</div>
					";
				?>
			</div>
			<div class="col-12 col-sm-12 col-lg bg-success-subtle rounded-3 p-4 shadow-1-success text-center text-lg-start">
				<div class="s1-infograph-title text-success">Keuntungan</div>
				<?php 
					$x=mysqli_query($koneksi, "select sum(total_harga) as totalMasuk from barang_laku");	
					$xx=mysqli_fetch_array($x);

					$y=mysqli_query($koneksi, "select sum(modal * jumlah) as totalKeluar from barang");	
					$yy=mysqli_fetch_array($y);
					echo "
					<div class='fs-3 fw-bold text-success'>Rp. ". number_format(($xx['totalMasuk'])-($yy['totalKeluar']))."</div>
					";
				?>
			</div>
		</div>
		<div class="row gap-2">
			<div id="dashboardMenu" class="col bg-white rounded-3 p-4 shadow-1" onclick="window.location.href='tambah_user.php';">
				<div class="row d-flex justify-content-center gap-2 align-items-center">
					<div class="col d-flex flex-column align-items-center">
						<div class="s1-infograph-title">Karyawan</div>
						<?php 
							$x=mysqli_query($koneksi, "select count(bagian) as jmlKaryawan from admin where bagian = 'karyawan'");	
							$xx=mysqli_fetch_array($x);
							echo "
							<div class='fs-3 fw-bold'>". number_format($xx['jmlKaryawan'])."</div>
							";
						?>
						<div class="text-black-50">Orang</div>
					</div>
					<div class="col d-flex justify-content-center">
						<i class="bi-people fs-1"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- <section>
			<div class="s1">
				<div class="s1-infograph">
					<div class="s1-infograph-title">Total</div>
					<div class="s1-infograph-main">56</div>
					<div class="s1-infograph-cta">Barang</div>
				</div>
				<div class="s1-infograph">
					<div class="s1-infograph-title">Terjual</div>
					<div class="s1-infograph-main">42</div>
					<div class="s1-infograph-cta">Barang</div>
				</div>
				<div class="s1-infograph">
					<div class="s1-infograph-title">Pemasukan</div>
					<div class="s1-infograph-main">Rp. 280.000</div>
					<div class="s1-infograph-cta">Turun 56%</div>
				</div>
				<div class="s1-infograph">
					<div class="s1-infograph-title">Pengeluaran</div>
					<div class="s1-infograph-main">Rp. 150.000</div>
					<div class="s1-infograph-cta">Turun 75%</div>
				</div>
			</div>
		</section> -->
		<!-- <section>
			<div class="s2">
				<div class="s2-infograph-1">
					<div class="s1-infograph-title">Produk Terlaris</div>
					<div class="s2-infograph-1-main">
						<div class="images">
							<div class="image">
								<img src="../assets/images/Chitato-Beef-BBQ-Flavour-68-Grams-blibli.png" alt="">
							</div>
							<div class="image">
								<img src="../assets/images/95kwon4q.png" alt="">
							</div>
							<div class="image">
								<img src="../assets/images/transparent-indomie.png" alt="">
							</div>
						</div>
						<div class="images">
							<div class="image">21 Pcs</div>
							<div class="image">19 Pcs</div>
							<div class="image">16 Pcs</div>
						</div>
					</div>
				</div>
				<div class="s2-infograph-2">
					<div class="s1-infograph-title">Analisis Profit per <?php echo date("d M");?></div>
					<div class="s2-infograph-2-main2">
						<div class="s2-graph">
							<div class="s2-graph-scale">
								<ul>
									<li>1000K</li>
									<li>800K</li>
									<li>600K</li>
									<li>400K</li>
									<li>200K</li>
									<li>0</li>
								</ul>
							</div>
							<div class="s2-graph-value">
								<div class="s2-graph-value-main">
									<div class="s2-profit">
										<ul>
											<li>
												<div class="s2-income" style="height: calc(70% - 10%);"></div>
												<div class="s2-outcome" style="height: calc(60% - 10%);"></div>
											</li>
											<li>
												<div class="s2-income" style="height: calc(65% - 10%);"></div>
												<div class="s2-outcome" style="height: calc(50% - 10%);"></div>
											</li>
											<li>
												<div class="s2-income" style="height: calc(50% - 10%);"></div>
												<div class="s2-outcome" style="height: calc(35% - 10%);"></div>
											</li>
											<li>
												<div class="s2-income" style="height: calc(80% - 10%);"></div>
												<div class="s2-outcome" style="height: calc(60% - 10%);"></div>
											</li>
											<li>
												<div class="s2-income" style="height: calc(70% - 10%);"></div>
												<div class="s2-outcome" style="height: calc(60% - 10%);"></div>
											</li>
											<li>
												<div class="s2-income" style="height: calc(28% - 10%);"></div>
												<div class="s2-outcome" style="height: calc(15% - 10%);"></div>
											</li>
										</ul>
									</div>
									<ul>
										<li><div class="bg-strip"></div></li>
										<li><div class="bg-strip"></div></li>
										<li><div class="bg-strip"></div></li>
										<li><div class="bg-strip"></div></li>
										<li><div class="bg-strip"></div></li>
									</ul>
								</div>
								<div class="s2-graph-value-name">
									<ul>
										<li>Des</li>
										<li>Jan</li>
										<li>Feb</li>
										<li>Mar</li>
										<li>Apr</li>
										<li>Mei</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="s2-legends">
						<div class="s2-legend">
							<div class="s2-legend-symbol-1"></div>
							<div class="s1-infograph-cta">Pemasukan</div>
						</div>
						<div class="s2-legend">
							<div class="s2-legend-symbol-2"></div>
							<div class="s1-infograph-cta">Pengeluaran</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
</div>

<!-- versi simple -->
<!-- <div class="min-dashboard">
	<main>
		<section>
			<div class="md-intro">Persiapan</div>
			<div class="md-title">Halo, selamat datang di Razor Mart!</div>
			<div class="md-desc">Mari mulai mengelola toko secara online sehingga Anda dapat memperoleh kembali waktu dan fokus pada pertumbuhan.</div>
		</section>
	</main>
</div> -->

<?php 
include 'footer.php';

?>