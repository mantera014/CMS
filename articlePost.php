<?
session_start();
include "header.php";
include "cekUser.php";
include "dbconnect.php";

echo "<h1>submit article</h1>";

$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$sinopsis = $_POST['sinopsis'];
$isi = $_POST['isi'];

// informasi tanggal kirim artikel
$tgl = date("d/m/Y");
$counter = 0;
$status = 0;

$query = "INSERT INTO artikel(iduser, kategori, judul, sinopsis, isi, date, counter, status) VALUES(".$_SESSION['idUser'].", '$kategori', '$judul', '$sinopsis', '$isi', '$tgl', '$counter', '$status')";
$hasil = mysql_query($query);

echo "<p>Artikel sudah disubmit</p>";

include "footer.php";
?>