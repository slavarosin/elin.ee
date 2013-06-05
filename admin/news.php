<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

if($_GET["do"]=="add"){
	addnews($_POST["short"],$_POST["link"],$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]." ".$_POST["hour"].":".$_POST["minute"]);
}

if(isset($_GET["remove"])){
	removenews($_GET["remove"]);
}

if(isset($_GET["activate"])){
	activatenews($_GET["activate"], 1);
}

if(isset($_GET["deactivate"])){
	activatenews($_GET["deactivate"], 0);
}

show_admin_news_page();
?>
</body>
</html>
