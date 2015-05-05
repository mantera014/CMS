<?
session_start();
// cek apakah user sudah login atau belum
if (!isset($_SESSION['idUser']))
{
echo "<h1>warning</h1>";
echo "<p>Maaf... fasilitas ini hanya untuk user terdaftar</p>";
echo "<p>Silakan Anda register dahulu</p>";

include "footer.php";
exit;
}
?>