<?php
include "header.php";
include "dbconnect.php";

$idArtikel = $_GET['idArtikel'];

$query = "SELECT user.username, artikel.kategori, artikel.judul, artikel.sinopsis, artikel.isi, artikel.date, artikel.counter FROM artikel, user WHERE user.idUser = artikel.idUser AND artikel.idArtikel = $idArtikel";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

// counter jumlah berapa kali telah dibaca akan bertambah
$counter = $data['counter']+1;

echo "<h1>".$data['judul']."</h1>";
echo "<p><b>kategori</b> : ".$data['kategori']."<br>";
echo "<b>oleh</b> : ".$data['username']."<br>";
echo "<b>ditulis pada tanggal</b> : ".$data['date']."<br>";
echo "<b>telah dibaca</b> : ".$counter." kali</p>";
echo "<p>".$data['isi']."</p>";

// mengupdate counter
$query2 = "UPDATE artikel SET counter = ".$counter." WHERE idArtikel = ".$idArtikel;
$hasil2 = mysql_query($query2);

?>