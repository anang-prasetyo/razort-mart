<?php 
include 'header1.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
?>

<?php
$a = mysqli_query($koneksi, "select * from barang_laku");
?>

<main class="" style="height: calc(100vh - 3rem);">
	<div class="container d-flex flex-column gap-2 align-items-center justify-content-center text-center h-100">
		<div class="fs-2">Sambutan</div>
		<div class="display-2">Halo, selamat datang <br> di Razort Mart!</div>
		<div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aut odio omnis, reiciendis dignissimos distinctio repudiandae numquam vero ullam maxime animi. Deleniti eaque eveniet sapiente illum laborum atque eum doloribus.</div>
	</div>
</main>

<?php 
include 'footer.php';

?>