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
	if($_POST["active"]=="on")
		$active = 1;
	else
		$active = 0;
	if($_POST["gallery_id"]=="on")
		$gallery_id = 1;
	else
		$gallery_id = 0;

	$id = addobject($_POST["year"],$_POST["name"],$_POST["place"],$_POST["orderer"],$active,$gallery_id);

	mkdir("/data05/virt1545/domeenid/www.elin.ee/htdocs/images/objects/full/$id/");
	mkdir("/data05/virt1545/domeenid/www.elin.ee/htdocs/images/objects/thumb/$id/");

	for ($i = 0; $i < 5; $i++) {
	   if ($HTTP_POST_FILES['ufile']['size'][$i] == 0) continue;
	   $path= "/data05/virt1545/domeenid/www.elin.ee/htdocs/images/objects/full/$id/".($i+1).".jpg";
	   $path2= "/data05/virt1545/domeenid/www.elin.ee/htdocs/images/objects/thumb/$id/".($i+1).".jpg";

        //  copy file to where you want to store file
        copy($HTTP_POST_FILES['ufile']['tmp_name'][$i], $path);
        $nw = 200;
        $nh = 150;

        $srcImage = ImageCreateFromJPEG($path);

        if (imagesx($srcImage) < imagesy($srcImage)) {
            $nh = 200;
            $c = imagesy($srcImage) / 200;
            $nw = imagesw($srcImage) / $c;
        } else {
        	$nw = 200;
            $c = imagesx($srcImage) / 200;
            $nh = imagesy($srcImage) / $c;
        }

        createthumb($path, $path2, $nw, $nh);

		echo "File Name :".$HTTP_POST_FILES['ufile']['name'][$i]."<BR/>";
		echo "File Size :".$HTTP_POST_FILES['ufile']['size'][$i]."<BR/>";
	}
}

if(isset($_GET["remove"])){
	removeobject($_GET["remove"]);
}

show_admin_objects_page();
?>
</body>
</html>
