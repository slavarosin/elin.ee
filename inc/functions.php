<?php
include_once "ez_sql.php";

function show_projects_page($year){
	global $db;

	if(!isset($year) || !is_numeric($year))
		$year = intval(date("Y"));

	$years = $db->get_results("SELECT DISTINCT year FROM cms_projects ORDER BY year DESC", ARRAY_A);

	$year_exists = false;
	if ($db->num_rows){
		echo "<SELECT class='text' name='year' onChange='top.location.href=\"done.php?year=\"+this.value'>";
		foreach($years as $key=>$value){
			echo "<OPTION value=".$value['year'];
			if($year==$value['year']){
				echo " selected";
				$year_exists = true;
			}
			echo ">".$value['year']."</OPTION>";
		}
		echo "</SELECT>";
	}

	if(!$year_exists)
		$year = $years[0]["year"];

	$projects = $db->get_results("SELECT `project_id`, `name`, `place`, `orderer`, `gallery_id` FROM cms_projects WHERE year = $year AND active = 1 ORDER BY project_id", ARRAY_A);

	$done = array();

	if ($db->num_rows){
		$a = false;

		echo "<table class='text' width='100%' border='0' cellpadding='3' cellspacing='2'>";

      	echo "<tr align=left bgcolor='#d0d0d0'>";
        echo "<th width='187'>OBJEKT</th>";
        echo "<th width='130'>ASUKOHT</th>";
        echo "<th width='97'>TELLIJA</th>";
      	echo "</tr>";

		foreach($projects as $key=>$value){
			$done[$key]['project_id'] = $projects[$key]['project_id'];
			$done[$key]['name'] = stripslashes($projects[$key]['name']);
			$done[$key]['place'] = stripslashes($projects[$key]['place']);
			$done[$key]['orderer'] = stripslashes($projects[$key]['orderer']);
			$done[$key]['gallery_id'] = $projects[$key]['gallery_id'];
			$done[$key]['color'] = (!$a)?'#f9f9f9':'';
			$a = !$a;

			echo "<tr bgcolor=".$done[$key]['color'].">";
        	echo "<td>";
        	if($done[$key]['gallery_id']!=0) echo "<a href='objectFrame.php?id=".$done[$key]['project_id']."'>";
        	echo $done[$key]['name'];
			if($done[$key]['gallery_id']!=0) echo "</a>";
			echo "</td>";
        	echo "<td>".$done[$key]['place']."</td>";
        	echo "<td>".$done[$key]['orderer']."</td>";
      		echo "</tr>";
		}
		echo "</table>";
	}
}

function show_object_page($id){
	global $db;

	if(!isset($id) || !is_numeric($id)){
		echo "<h2 align='center'>Objekt ei leitud!</h2>";
		return;
	}

	$project = $db->get_row("SELECT `project_id`, `name`, `place`, `year`, `orderer` FROM cms_projects WHERE project_id = $id AND active = 1", ARRAY_A);

	$done = array();

	if ($db->num_rows){
		echo "<table width='100%'>";
		echo "<tr>";
		$size = getimagesize("images/objects/thumb/$id/1.jpg");

		echo "<td>";
		if(file_exists("images/objects/thumb/$id/2.jpg"))
			echo "<a href='object_imagesFrame.php?id=$id'>";
		echo "<img src='images/objects/thumb/$id/1.jpg' ".$size[3].">";
		if(file_exists("images/objects/thumb/$id/2.jpg"))
			echo "</a>";
		echo "</td>";
		echo "<td><table class='object' width='250' height='125' cellpadding='5'>";
    	echo "<tr bgColor='white'>";
      	echo "<td colspan=3>".$project['orderer']."</td></tr>";
    	echo "<tr><td colspan=3>".$project['name']."</td></tr>";
    	echo "<tr bgColor='white'>";
      	echo "<td colspan=3>".$project['place']."</td></tr>";
  		echo "</table></td></tr></table>";
		echo "<b><a href='doneFrame.php?year=".$project['year']."'>&lt;&lt;&nbsp;Tagasi</a></b>";
	}
}

function show_object_images_page($id){
	global $db;
	$i = 1;
	echo "<b><a href='objectFrame.php?id=$id'>&lt;&lt;&nbsp;Tagasi</a></b>";
	echo "<table width='100%'>";
	while (file_exists("images/objects/thumb/$id/$i.jpg")){
		$size = getimagesize("images/objects/thumb/$id/$i.jpg");

		echo "<tr><td align='center'><a href='images/objects/full/$id/$i.jpg' target='_blank'>";
		echo "<img src='images/objects/thumb/$id/$i.jpg' ".$size[3]."/>";
		echo "</a></td>";
		$i++;
		if(file_exists("images/objects/thumb/$id/$i.jpg")){
			$size = getimagesize("images/objects/thumb/$id/$i.jpg");
			echo "<td align='center'><a href='images/objects/full/$$id/i.jpg' target='_blank'>";
			echo "<img src='images/objects/thumb/$id/$i.jpg' ".$size[3]."/>";
			echo "</a></td>";
		}else{
			echo "</tr>";
			break;
		}
		$i++;

		echo "</tr>";
	}
	echo "</table>";
	echo "<b><a href='objectFrame.php?id=$id'>&lt;&lt;&nbsp;Tagasi</a></b>";
}

function show_gallery_page(){
	global $db;
	$i = 1;
	echo "<table width='100%'>";
	while (file_exists("images/gallery/thumb/$i.jpg")){
		$size = getimagesize("images/gallery/thumb/$i.jpg");

		echo "<tr><td align='center'><a href='images/gallery/full/$i.jpg' target='_blank'>";
		echo "<img src='images/gallery/thumb/$i.jpg' ".$size[3]."/>";
		echo "</a></td>";
		$i++;
		if(file_exists("images/gallery/thumb/$i.jpg")){
			$size = getimagesize("images/gallery/thumb/$i.jpg");
			echo "<td align='center'><a href='images/gallery/full/$i.jpg' target='_blank'>";
			echo "<img src='images/gallery/thumb/$i.jpg' ".$size[3]."/>";
			echo "</a></td>";
		}else{
			echo "</tr>";
			break;
		}
		$i++;

		echo "</tr>";
	}
	echo "</table>";
}

function show_news_page(){
	global $db;
	$year = date("Y");

	do {
		$ids = $db->get_results("SELECT `project_id`, `name` FROM cms_projects WHERE year = $year AND active = 1 AND gallery_id > 0", ARRAY_A);

		$r = rand(0,$db->num_rows-1);
		$year--;
	} while ($db->num_rows <= 0);

	$id = $ids[$r]['project_id'];
	$name = $ids[$r]['name'];

	$size = getimagesize("images/objects/thumb/$id/1.jpg");

	$w = 150;
	$h = 112;
	if($size[0]<$size[1]){
		$w = 112;
		$h = 150;
	}

	echo "<tr>";
    echo "<td height='106'><div align='center'><img src='images/objects/thumb/$id/1.jpg' width='$w' height='$h'></div></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td height='14'><div align='center' class='lastprojectname'>$name</div></td>";
	echo "</tr>";

	$news = $db->get_results("SELECT short, link, date FROM news WHERE active=1 ORDER BY date DESC", ARRAY_A);

	echo "<tr>";
	echo "<td height='31'><img src='images/news.png' width='171' height='21' align='top'></td>";
	echo "</tr>";
	echo "<tr>";
    echo "<td height='131' valign='top'>";

    if ($db->num_rows){
		foreach($news as $key=>$value){
			echo "<p class='text' align='left' style='padding-left: 10px'>";
			echo date("d.m.y H:i",strtotime($news[$key]['date']))."&nbsp;<br>";
			if($news[$key]['link']!="")
				echo "<a href='".$news[$key]['link']."' target='_blank'>";
			echo $news[$key]['short'];
			if($news[$key]['link']!="")
				echo "</a>";
	    	echo "</p>";
		}
	}
    echo "</td>";
	echo "</tr>";
}
?>