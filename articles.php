<?php
include "header.php";
include "dbconnect.php";

echo "<h1>arsip artikel</h1>";

$query = "SELECT * FROM artikel GROUP BY kategori";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
echo "<p><b>kategori</b> : ".$data['kategori']."</p>";
$query2 = "SELECT * FROM artikel WHERE kategori = '".$data['kategori']."' ORDER BY idArtikel DESC";
$hasil2 = mysql_query($query2);

echo "<ul>";
while ($data2 = mysql_fetch_array($hasil2))
{
echo "<li><a href=view.php?idArtikel=".$data2['idArtikel'].">".$data2['judul']."</a></li>";
}
echo "</ul>";
echo "<p>&nbsp;</p>";
}
include "footer.php";
?>