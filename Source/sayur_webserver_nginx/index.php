<?php
$hostname = gethostname();
$date = date('l, d F Y H:i:s');
$php_version = phpversion();
$visitor_ip = $_SERVER['REMOTE_ADDR'];

echo "<h1>Selamat Datang di Situs Resep Sayuran!</h1>";
echo "<p>Pengunjung dari IP: <strong>$visitor_ip</strong></p>";
echo "<p>Versi PHP: <strong>$php_version</strong></p>";
echo "<p>Waktu: <strong>$date</strong></p>";
echo "<hr>";
echo "<p>Saat ini Anda sedang mengakses resep dari sayur: <strong>$hostname</strong></p>";

switch ($hostname) {
    case 'Bayam':
        if (!@include 'resep_1.php') {
            echo "<p>Gagal Memuat Resep! Cek Error Log untuk info lebih lanjut.</p>";
            error_log("File resep_1.php tidak ditemukan!\n", 3, "/var/log/nginx/error.log");
        }
        break;
    case 'Buncis':
        if (!@include 'resep_2.php') {
            echo "<p>Gagal Memuat Resep! Cek Error Log untuk info lebih lanjut.</p>";
            error_log("File resep_2.php tidak ditemukan!\n", 3, "/var/log/nginx/error.log");
        }
        break;
    case 'Brokoli':
        if (!@include 'resep_3.php') {
            echo "<p>Gagal Memuat Resep! Cek Error Log untuk info lebih lanjut.</p>";
            error_log("File resep_3.php tidak ditemukan!\n", 3, "/var/log/nginx/error.log");
        }
        break;
    default:
        echo "<p>Gagal Memuat Resep! Cek Error Log untuk info lebih lanjut.</p>";
        error_log("Hostname tidak ditemukan!\n", 3, "/var/log/nginx/error.log");
        break;
}
?>
