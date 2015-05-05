<?php
include "header.php";
include "cekUser.php";
echo "<h1>submit article</h1>";
?>
<form action="articlePost.php" method="post">
<div class="row">
    <span class="formlabel">Kategori</span>
    <span class="forminput"><select name="kategori" class="textarea"><option value="database">database</option><option value="programming">programming</option><option value="web programming">web programming</option></select></span>
</div>

<div class="row">
    <span class="formlabel">Judul</span>
    <span class="forminput"><input type="text" name="judul" /></span>
</div>

<div class="row">
    <span class="formlabel">Sinopsis</span>
    <span class="forminput"><textarea rows="5" cols="18" name="sinopsis" class="textarea"></textarea></span>
</div>

<div class="spacer">&nbsp;</div>

<div class="row">
    <span class="formlabel">Isi Artikel</span>
    <span class="forminput"><textarea rows="20" cols="3" name="isi" class="textarea"></textarea></span>
</div>
<div class="spacer">&nbsp;</div>

<div class="row">
    <span class="formlabel"></span>
    <span class="forminput"><input type="submit" value="submit" class="submit" /></span>
</div>
</form>
<?
include "footer.php";
?>