<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>template: home</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-
1" />
<!-- **** Layout Stylesheet **** -->
<link rel="stylesheet" type="text/css" href="css/style.css"
/>
<!-- **** Colour Scheme Stylesheet **** -->
<link rel="stylesheet" type="text/css" href="css/color.css" />
</head>

<body>
	<div id="main">
    	<div id="links">
        <!-- **** INSERT LINKS HERE **** -->
		<b>::</b><a href="http://"><b>link</b></a> 
        <b>::</b><a href=""><b>link</b></a>
        <b>::</b><a href=""><b>link</b></a>
	</div>
    <div id="logo"><h1>YOUR COMPANY NAME</h1></div>
    <div id="content">
    	<div id="colum1">
       	  <div id="menu">
            	<h1>MENU NAVIGASI</h1>
                <ul>
                	<li><a href="index.php">HOME</a></li>	<!-- **** Colour Scheme Stylesheet **** -->
                    <LI><a href="register.php">REGISTER</a></LI>		<!-- **** Colour Scheme Stylesheet **** -->
                    <li><a href="articles.php">ARTIKAL</a></li>			<!-- **** Colour Scheme Stylesheet **** -->
                    <li><?php
							if(isset($_SESSION['idUser'])) $status = "<a href='logout.php'>LOGOUT</a>";
							else $status = "<a href='login.php'>LOGIN</a>";
							echo $status;
						?></li>
            </ul>
               </div>
               <div class="sidebaritem">
               		<h1>ARTIKAL TERBARU</h1>
                    
                    
                    <?php
						include "dbconnect.php";
						$query = "SELECT * FROM artikel WHERE status = 1 ORDER BY idArtikel DESC LIMIT 0,3";
						$hasil = mysql_query($query);
						while ($data3 = mysql_fetch_array($hasil))
						{
							echo "<p><a href=view.php?idArtikel=".$data3['idArtikel']."> ".$data3['judul']."</a></p>";
						}  
					?>
                    
               </div>
               
               <?php  
			   		if(isset($_SESSION['idUser']))
					{
						if($_SESSION['username'] == "admin") $adminpanel = "<li><a href='adminPanel.php'>ADMIN PANEL</a></li>";
						
						else $adminpanel = "";
						
						$userpanel = "<div id='addlinks'>
											<h1>member menu</h1>
											<ul>
												<li><a href='submitArticle.php'>Kirim Artikel</a></li>
												<li><a href='editProfile.php'>Edit Profile</a></li>
											</ul>
											</div>";
					}
						else $usepanel = "";
					echo $usepanel;
			   ?>
               <div class="sidebaritem">
               	<h1>Information</h1>
                
                <p>
                	Information<br>
                </p>
                </div>
	  </div>
            <div id="column2">
            </div>
            <div id="footer">
            copyright © 2007 web admin | 
            <a href="mailto:admin@admin.com">admin@admin.com</a> | 
            <a href="http://validator.w3.org/check?uri=referer">XHTML 1.1</a> | 
            <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
            </div>
            </div>
               

</body>
</html>