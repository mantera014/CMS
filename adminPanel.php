<?php
include "header.php";
include "cekAdmin.php";
include "dbconnect.php";

echo "<h1>admin panel</h1>";

if (isset($_GET['op']))
{
	// hapus user
	$op = $_GET['op'];
	if ($op == "deleteUser")
{
	$idUser = $_GET['idUser'];
	$query = "DELETE FROM user WHERE idUser = $idUser";
	$hasil = mysql_query($query);
}
else if ($op == "viewArticle")
{
	// lihat isi artikel yang telah masuk
	$idArtikel = $_GET['idArtikel'];
	$query = "SELECT user.username, artikel.kategori, artikel.judul, artikel.sinopsis, artikel.isi, artikel.date FROM artikel, user WHERE user.idUser = artikel.idUser AND artikel.idArtikel = $idArtikel";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	
echo "<h3>".$data['judul']."</h3>";
echo "<p><b>kategori</b> :".$data['kategori']."</p>";
echo "<p><b>oleh</b> : ".$data['username']."</p>";
echo "<p><b>sinopsis</b> :<br>".$data['sinopsis']."</p>";
echo "<p><b>ditulis pada tanggal</b> :".$data['date']."</p>";
echo "<p>".$data['isi']."</p>";
}
	else if ($op == "deleteArticle")
{
	// hapus artikel
	$idArtikel = $_GET['idArtikel'];
	$query = "DELETE FROM artikel WHERE idArtikel = ".$idArtikel;
	$hasil = mysql_query($query);
	
	echo "<p>artikel sudah dihapus</p>";
}
else if ($op == "approveArticle")
{
	// approve artikel yang layak tampil
	$idArtikel = $_GET['idArtikel'];
	$query = "UPDATE artikel SET status = 1 WHERE idArtikel = ".$idArtikel;
	$hasil = mysql_query($query);
	
	echo "<p>artikel sudah diapprove</p>";
}
	else if ($op == "editArticle")
{
	// edit artikel
	$idArtikel = $_GET['idArtikel'];
	$query = "SELECT * FROM artikel WHERE idArtikel = ".$idArtikel;
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	
echo "<form action='".$_SERVER['PHP_SELF']."?op=articleUpdate' method='post'>
	<div class='row'>
		<span class='formlabel'>Kategori</span>
		<span class='forminput'><select name='kategori' class='textarea'><option value='database'>database</option><option value='programming'>programming</option><option value='webprogramming'>web programming</option></select></span>
	</div>
		
<div class='row'>
	<span class='formlabel'>Judul</span>
	<span class='forminput'><input type='text' name='judul' value='".$data['judul']."' /><input type='hidden' name='idArtikel' value='".$data['idArtikel']."' /></span>
</div>

<div class='row'>
	<span class='formlabel'>Sinopsis</span>
	<span class='forminput'><textarea rows='5' cols='18' name='sinopsis' class='textarea'>".$data['sinopsis']."</textarea></span>
</div>

<div class='spacer'>&nbsp;</div>

<div class='row'>
	<span class='formlabel'>Isi Artikel</span>
	<span class='forminput'><textarea rows='20' cols='3' name='isi' class='textarea'>".$data['isi']."</textarea></span>
</div>

<div class='spacer'>&nbsp;</div>

<div class='row'>
	<span class='formlabel'></span>
	<span class='forminput'><input type='submit' value='submit' class='submit' /></span>
</div>
</form>";
}
	else if ($op == "articleUpdate")
{
	// proses update artikel yang sudah diedit
	$idArtikel = $_POST['idArtikel'];
	$kategori = $_POST['kategori'];
	$judul = $_POST['judul'];
	$sinopsis = $_POST['sinopsis'];
	$isi = $_POST['isi'];
	
	$query = "UPDATE artikel SET kategori = '".$kategori."', judul = '".$judul."', sinopsis = '".$sinopsis."', isi = '".$isi."' WHERE idArtikel = ".$idArtikel; $hasil = mysql_query($query);
	
	echo "<p>artikel sudah diupdate</p>";
}
	echo "<a href=".$_SERVER['PHP_SELF'].">kembali ke admin panel</a>";
}
	else
{
	echo "<p><b>user administration</b></p>";
	
	// menampilkan semua user yang terdaftar
	$query = "SELECT * FROM user ORDER BY idUser";
	$hasil = mysql_query($query);
	
	echo "<table border=1>";
	echo "<tr><td><b>username</b></td><td><b>fullname</b></td><td><b>action</b></td></tr>";
	while ($data = mysql_fetch_array($hasil))
{
	echo "<tr><td>".$data['username']."</td><td>".$data['fullname']."</td><td><a href=".$_SERVER['PHP_SELF']."?op=deleteUser&idUser=".$data['idUser'].">delete</a></td></tr>";
}
	echo "</table><br><br>";
	echo "<p><b>articles administration</b></p>";
	
	// menampilkan daftar semua artikel yang telah masuk
	$query = "SELECT * FROM artikel ORDER BY idArtikel";
	$hasil = mysql_query($query);
	
	echo "<table border=1>";
	echo"<tr><td><b>judul</b></td><td><b>kategori</b></td><td><b>status</b></td><td><b>action</b></td></tr>";
	while ($data = mysql_fetch_array($hasil))
{
	echo "<tr><td>".$data['judul']."</td><td>".$data['kategori']."</td><td>".$data['status']."</td><td><a href=".$_SERVER['PHP_SELF']."?op=viewArticle&idArtikel=".$data['idArtikel'].">view</a> <a href=".$_SERVER['PHP_SELF']."?op=deleteArticle&idArtikel=".$data['idArtikel'].">delete</a> <a href=".$_SERVER['PHP_SELF']."?op=approveArticle&idArtikel=".$data['idArtikel'].">approve</a> <a href=".$_SERVER['PHP_SELF']."?op=editArticle&idArtikel=".$data['idArtikel'].">edit</a></td></tr>";
}
	echo "</table>";
}
include "footer.php";
?>