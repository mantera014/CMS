<?
session_start();
include "header.php";
include "cekUser.php";
include "dbconnect.php";
// mencari data tentang user yang sedang login
$query = "SELECT * FROM user WHERE idUser = ".$_SESSION['idUser'];
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
?>
<h1>edit profile</h1>
<form action="editProfileSubmit.php" method="post">
<div class="row">
<span class="formlabel">nama lengkap</span>
<span class="forminput"><input type="text" name="fullname"
value="<? echo $data['fullname']; ?>" /></span>
</div>
<div class="row">
<span class="formlabel">password baru</span>
<span class="forminput"><input type="password" name="password1"
/></span>
</div>
<div class="row">
<span class="formlabel">ulangi password baru</span>
<span class="forminput"><input type="password" name="password2"
/></span>
</div>
<div class="row">
<span class="formlabel"></span>
<span class="forminput"><input type="submit" value="submit"
class="submit" /></span>
</div>
</form>