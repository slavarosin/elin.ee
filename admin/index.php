<?php
include "inc/functions.php";
$m=$_GET["m"];

session_set_cookie_params(0);
session_start();

if($m==""){
	if($_SESSION['alogged'] && $_SESSION['auid']=="administrator")
		$m="news";
	else
		$m="login";
}

if($m=="check"){
	if(checkAdmin($_POST["login"],$_POST["pass"])){
		$_SESSION['auid'] = "administrator";
		$_SESSION['alogged'] = true;
	}else $_GET["err"] = "error1";

}
if($m=="logout"){
	session_destroy();
}
?>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<body>
<?

if($_SESSION['alogged'] && $_SESSION['auid']=="administrator" && $m!="logout"){
	echo "<div align='right'>";
	echo "<A HREF='?m=objects'><b>Objects</b></a>&nbsp;";
	echo "<A HREF='?m=news'><b>News</b></a>&nbsp;";
	echo "<A HREF='?m=logout'><b>Log Out</b></a>";
	echo "</div><br>";

	if($m=="check"){
		if(!$_SESSION['alogged']){
			$_GET["err"] = "error1";
			include "login.php";
		}else include "news.php";
	}
	if($m=="news"){
		include "news.php";
	}
	if($m=="addnews"){
		include "addnews.php";
	}
	if($m=="objects"){
		include "objects.php";
	}
	if($m=="addobject"){
		include "addobject.php";
	}
}else include "login.php";
?>
</body>
</html>