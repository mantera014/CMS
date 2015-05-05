<?
include "footer.php";
?>
<?
include "dbconnect.php";
include "header.php";
include "cekUser.php";
echo "<h1>edit profile</h1>";
$fullname = $_POST['fullname'];
$password1 = md5($_POST['password1']);
$password2 = md5($_POST['password2']);
if ($password1 == $password2)
{
$query = "UPDATE user SET fullname = '$fullname', password =
'$password1' WHERE idUser = ".$_SESSION['idUser'];
$hasil = mysql_query($query);
echo "Profile sudah ter-update";
}
else echo "Password tidak sama";
include "footer.php";
?>