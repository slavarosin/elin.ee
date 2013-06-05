<?php
include_once "ez_sql.php";

function show_admin_news_page(){
	global $db;
	$news = $db->get_results("SELECT id,short,link,date,active FROM news ORDER BY date DESC", ARRAY_A);

	if ($db->num_rows){
		echo "<div align='left'><a href='?m=addnews'>Add News</a></div>";
		echo "<table class='text' width='100%' border='1' cellpadding='3' cellspacing='2'>";

      	echo "<tr align=left bgcolor='#d0d0d0'>";
        echo "<th>Short</th>";
        echo "<th>Link</th>";
        echo "<th>Date</th>";
        echo "<th></th>";
        echo "<th></th>";
      	echo "</tr>";

		foreach($news as $key=>$value){
			echo "<tr>";
        	echo "<td>".$news[$key]['short']."</td>";
        	echo "<td>".$news[$key]['link']."</td>";
        	echo "<td>".date("d.m.y H:i", strtotime($news[$key]['date']))."</td>";
        	echo "<td><a href='?m=news&remove=".$news[$key]['id']."'>Remove</a></td>";
			if($news[$key]['active']==1)
				echo "<td><a href='?m=news&deactivate=".$news[$key]['id']."'>Deactivate</a></td>";
			else
        		echo "<td><a href='?m=news&activate=".$news[$key]['id']."'>Activate</a></td>";
      		echo "</tr>";
		}
		echo "</table>";
	}
	echo "<div align='left'><a href='?m=addnews'>Add News</a></div>";
}

function addnews($short, $link, $date){
	global $db;
	$news = $db->query("INSERT INTO news (`short`,`link`,`date`) VALUES ('$short','$link','$date')");
}

function removenews($id){
	global $db;
	$news = $db->query("DELETE FROM news WHERE id=$id");
}

function activatenews($id,$active){
	global $db;
	$news = $db->query("UPDATE news SET active='$active' WHERE id=$id");
}


function show_admin_objects_page(){
	global $db;
	$projects = $db->get_results("SELECT project_id,year,name,place,orderer,created,active,gallery_id FROM cms_projects ORDER BY created DESC", ARRAY_A);


	if ($db->num_rows){
		echo "<br><div align='left'><a href='?m=addobject'>Add Object</a></div>";
		echo "<table class='text' width='100%' border='1' cellpadding='3' cellspacing='2'>";

      	echo "<tr align=center bgcolor='#d0d0d0'>";
      	echo "<th>Id</th>";
        echo "<th>Name</th>";
        echo "<th>Place</th>";
        echo "<th>Orderer</th>";
        echo "<th>Year</th>";
        echo "<th>Created</th>";
        echo "<th>Active?</th>";
        echo "<th>Photos?</th>";
      	echo "</tr>";

		foreach($projects as $key=>$value){
			echo "<tr>";
			echo "<td>".$projects[$key]['project_id']."</td>";
        	echo "<td>".$projects[$key]['name']."</td>";
        	echo "<td>".$projects[$key]['place']."</td>";
        	echo "<td>".$projects[$key]['orderer']."</td>";
        	echo "<td>".$projects[$key]['year']."</td>";
        	echo "<td>".date("d.m.y H:i", $projects[$key]['created'])."</td>";
        	echo "<td>".(($projects[$key]['active']>0)?"Yes":"No")."</td>";
        	echo "<td>".(($projects[$key]['gallery_id']>0)?"Yes":"No")."</td>";
        	echo "<td><a href='?m=objects&remove=".$projects[$key]['project_id']."'>Remove</a></td>";
      		echo "</tr>";
		}
		echo "</table>";
	}
	echo "<div align='left'><a href='?m=addobject'>Add Object</a></div>";
}

function addobject($year,$name,$place,$orderer,$active,$gallery_id){
	global $db;
	$news = $db->query("INSERT INTO cms_projects (`year`,`name`,`place`,`orderer`,`created`,`active`,`gallery_id`) VALUES ('$year','$name','$place','$orderer',".time().",'$active','$gallery_id')");
	return mysql_insert_id();
}

function removeobject($id){
	global $db;
	$news = $db->query("DELETE FROM cms_projects WHERE project_id=$id");
}

function checkAdmin($login, $pass){
	if($login == "admin" && $pass == "Nimda0")
		return true;
	else
		return false;
}

/*
    Function createthumb($name,$filename,$new_w,$new_h)
    creates a resized image
    variables:
    $name       Original filename
    $filename   Filename of the resized image
    $new_w      width of resized image
    $new_h      height of resized image
*/
function createthumb($name,$filename,$new_w,$new_h) {
    $system=explode(".",$name);
    if (preg_match("/jpg|jpeg/", $system[sizeof($system) - 1])) {
        $src_img=imagecreatefromjpeg($name);
    } else return;

    $old_x=imageSX($src_img);
    $old_y=imageSY($src_img);
    if ($old_x > $old_y) {
        $thumb_w=$new_w;
        $thumb_h=$old_y*($new_h/$old_x);
    }
    if ($old_x < $old_y) {
        $thumb_w=$old_x*($new_w/$old_y);
        $thumb_h=$new_h;
    }
    if ($old_x == $old_y) {
        $thumb_w=$new_w;
        $thumb_h=$new_h;
    }
    $dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
    imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
    echo imagejpeg($dst_img,$filename);

    imagedestroy($dst_img);
    imagedestroy($src_img);
}
?>