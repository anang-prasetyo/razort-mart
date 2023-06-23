<?php
include 'config.php';
$koneksi = mysqli_connect('localhost','root','','projectweb');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$barang = mysqli_query($koneksi, "SELECT * FROM barang");

$mpdf = new \Mpdf\Mpdf();

$html= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
</head>
<body>
    <h3> Data Barang </h3>
    <table border="1" cellpadding="10" cellspacing=0"">
	    <tr>
            <th class="col-md-1">No. </th>
            <th class="col-md-4">Nama Barang</th>
            <th class="col-md-4">Jenis Barang</th>
            <th class="col-md-4">Suplier</th>
            <th class="col-md-3">Harga Barang</th>
            <th class="col-md-1">Jumlah</th>    
        </tr>';

    $i = 1;
    foreach( $barang as $row){
        $html .= '<tr>
            <td>'. $i++ .'</td>
            <td>'. $row["nama"] .'</td>
            <td>'. $row["jenis"] .'</td>
            <td>'. $row["suplier"] .'</td>
            <td>'. $row["harga"] .'</td>
            <td>'. $row["jumlah"] .'</td>
        </tr>';
    }

$html .= '</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Barang', 'I');
?>

