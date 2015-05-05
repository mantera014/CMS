<?php
session_start();
session_destroy();

$status = "<a href=login.php>login</a>";
include "header.php";
echo "<h1>logout</h1>";
echo "<p>Anda sudah logout</p>";

include "footer.php";

?>