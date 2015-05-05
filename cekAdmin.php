<?php
session_start();
// cek apakah user sudah login atau belum dan cek apakah user admin
// atau bukan
if (!isset($_SESSION['idUser']) || $_SESSION['username'] != "admin")
{
echo "<h1>warning</h1>";
echo "<p>Maaf... fasilitas ini hanya untuk administrator</p>";
include "footer.php";
exit;
}
?>