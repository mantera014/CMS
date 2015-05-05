<?php 
include('header.php'); 
?>

<h1>user login</h1>
<form action="loginSubmit.php" method="post">
	<div class="row">
    	<span class="formlabel">username</span>
        <span class="forminput"><input type="text" name="username" /></span>
     </div>
     <div class="row">
     	<span class="formlabel">password</span>
        <span class="forminput"><input type="password" name="password" /></span>
     </div>
     <div class="row">
     	<span class="formlabel"></span>
        <span class="forminput"><input type="submit" value="submit" class="submit" /></span>
     </div>
</form>