<?php
include "dbconnect.php";
include "header.php";
echo "<h1>status registrasi</h1>";
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$password1 = md5($_POST['password1']);
$password2 = md5($_POST['password2']);
// cek konfirmasi password
if ($password1 == $password2)
{
// cek apakah username sudah ada
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_num_rows($hasil);
// bila user name belum ada, maka user akan diregister
if ($data == 0)
{
$query = "INSERT INTO user(username, fullname, password)
VALUES('$username', '$fullname', '$password1')";
$hasil = mysql_query($query);
echo "Selamat bergabung dengan kami
<b>".$fullname."</b><br>Silakan Anda login terlebih dahulu";
}
else echo "Nama username tersebut sudah ada.";
}
else echo "Password tidak sama";
include "footer.php";
?>