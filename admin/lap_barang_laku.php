<?php
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$barang_laku = mysqli_query($koneksi, "SELECT * FROM barang_laku");

$mpdf = new \Mpdf\Mpdf();

$html= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang Laku</title>
</head>
<body>
    <h3> Data Barang Laku</h3>
    <table border="1" cellpadding="10" cellspacing=0"">
	    <tr>
            <th class="col-md-1">No. </th>
			<th class="col-md-1">Tanggal </th>
            <th class="col-md-4">Nama Barang</th>
            <th class="col-md-4">Jumlah Barang</th>
            <th class="col-md-3">Harga Barang</th>
            <th class="col-md-1">Total Harga</th>    
        </tr>';

    $i = 1;
    foreach( $barang_laku as $row){
        $html .= '<tr>
            <td>'. $i++ .'</td>
			<td>'. $row["tanggal"] .'</td>
            <td>'. $row["nama"] .'</td>
            <td>'. $row["jumlah"] .'</td>
            <td>'. $row["harga"] .'</td>
            <td>'. $row["total_harga"] .'</td>
        </tr>';
    }

$html .= '</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Barang', 'I');
?>

