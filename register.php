<?php include "header.php"; ?>

<h1>user registration</h1>
<form action="regSubmit.php" method="post">
<div class="row">
<span class="formlabel">username</span>
<span class="forminput"><input type="text" name="username"
/></span>
</div>
<div class="row">
<span class="formlabel">nama lengkap</span>
<span class="forminput"><input type="text" name="fullname"
/></span>
</div>
<div class="row">
<span class="formlabel">password</span>
<span class="forminput"><input type="password" name="password1"
/></span>
</div>
<div class="row">
<span class="formlabel">ulangi password</span>
<span class="forminput"><input type="password" name="password2"
/></span>
</div>
<div class="row">
<span class="formlabel"></span>
<span class="forminput"><input type="submit" value="submit"
class="submit" /></span>
</div>
</form>
<?php
include "footer.php";
?>