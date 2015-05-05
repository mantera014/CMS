<?php
session_start();

include "dbconnect.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

// cek password dari database dengan yang dimasukkan ketika login
// bila sama, maka login sukses dan muncul panel user
if ($data['password'] == $password)
{
$_SESSION['idUser'] = $data['idUser'];
$_SESSION['username'] = $data['username'];

// bila username = admin, maka akan muncul panel admin
if ($_SESSION['username'] == "admin") $adminpanel = "<li><a href=\"adminPanel.php\">admin panel</a></li>";
else $adminpanel = "";
	$status = "<a href=logout.php>logout</a>";
	$userpanel = "<div id=\"addlinks\">
					<h1>member menu</h1>
					<ul>
					<li><a href=\"submitArticle.php\">kirim
					artikel</a></li>
					<li><a href=\"editProfile.php\">edit
					profile</a></li>".$adminpanel."
					</ul>
			</div>";
echo "<h1>status login</h1>";
echo "<p>Selamat datang <b>".$data['fullname']."</b>.</p> <p>Anda
berhak untuk mengirim artikel.</p>";
}
else
{
$status = "<a href=login.php>login</a>";
$userpanel = "";
include "header.php";
echo "<h1>status login</h1>";
echo "<p>Password salah atau username tidak terdaftar</p>";
}
include "footer.php";
?>
Membuat File Logout