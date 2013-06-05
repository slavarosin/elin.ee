<?php
session_start();

$pic_dir = '/data05/virt1545/domeenid/www.elin.ee/htdocs/pics/';

if ( !include_once('ez_sql.php') )	// MySQL
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}
if ( !include_once('functions.php') )	// Muud funtksioonid
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}

if ( user_logged_in() )
{
	function add_gallery()
	{
		echo '<FORM action="admin.php" method="post">';
		echo 'Pealkiri: <input type="text" name="title"><br>';
		echo '<input type="hidden" name="add_gallery" value="1">
		<input type="submit" name="submit" value="Lisa">
		</FORM>
		';
	}

	function add_picture($gallery)
	{
		echo '<FORM action="admin.php" method="post" enctype="multipart/form-data">';
		echo 'Pealkiri: <input type="text" name="title"><br>';
		echo 'Pilt: <input type="file" name="picture"><br>';
		echo '<input type="hidden" name="add_picture" value="1">
		<input type="hidden" name="gallery" value="'.$gallery.'">
		<input type="submit" name="submit" value="Lisa">
		</FORM>
		';
	}

	function edit_gallery($gallery)
	{
		global $db;
		$gallery = intval($gallery);
		$primary = $db->get_var("SELECT primary_picture FROM cms_gallery WHERE gallery_id = $gallery");
		$pictures = $db->get_results("SELECT * FROM cms_pictures WHERE gallery_id = $gallery");

		if ( $db->num_rows )
		{
			foreach ( $pictures as $pic )
			{
				echo '<img src="pics/' . $pic->link . '" border="0" /><BR>';
				echo '<FORM action="admin.php?action=edit_gallery&gallery='.$gallery.'" method="post">';
				echo 'Pealkiri: <input type="text" name="title" value="' . $pic->description . '">';
				echo '<TABLE><TR><TD><input type="hidden" name="modify_picture" value="1">
				<input type="hidden" name="picture" value="'.$pic->picture_id.'">
				<input type="submit" name="submit" value="Muuda pealkiri">
				</FORM></TD>';
				if ( $pic->picture_id == $primary )
				{
					echo '<TD>Pilt on primaarne</TD>';
				}
				else
				{
					echo '<TD>
					<FORM action="admin.php?action=edit_gallery&gallery='.$gallery.'" method="post">
					<input type="hidden" name="primary_picture" value="1">
					<input type="hidden" name="picture" value="'.$pic->picture_id.'">
					<input type="submit" name="submit" value="Määra primaarseks">
					</FORM></TD>';
				}
				echo '<TD>
				<FORM action="admin.php?action=edit_gallery&gallery='.$gallery.'" method="post">
				<input type="hidden" name="delete_picture" value="1">
				<input type="hidden" name="picture" value="'.$pic->picture_id.'">
				<input type="submit" name="submit" value="Kustuta">
				</FORM></TD></TR></TABLE>
				';
			}
		}

		echo '<BR><BR><a href="'.$_SERVER['PHP_SELF'].'?action=add_picture&gallery='.$gallery.'">Lisa uus pilt</a><br>';
	}


	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<HTML>
	<HEAD>
	<TITLE> Galerii haldus </TITLE>
	</HEAD>

	<BODY>

	<a href="index.php?c=4">TAGASI GALERII ESILEHELE</a>

	<br><br>
	<?php
	if ( isset($_REQUEST['add_gallery']) )
	{
		$db->query("INSERT INTO `cms_gallery` ( `gallery_id` , `description` , `time` , `primary_picture` ) 
					VALUES (
					'', '".htmlentities(addslashes($_POST['title']))."', '".time()."', '0'
					);");
		echo '<a href="'.$_SERVER['PHP_SELF'].'?action=add_picture&gallery='.$db->insert_id.'">Lisa uus pilt</a><br>';
	}

	if ( isset($_REQUEST['add_picture']) )
	{
		$gallery = isset($_REQUEST['gallery']) ? intval($_REQUEST['gallery']) : 0;
		$count = $db->get_var("SELECT COUNT(gallery_id) FROM cms_gallery WHERE gallery_id = $gallery");
		if ( $count )
		{
			$error = "";
			if ( $_FILES['picture']['size'] == 0 )
			{
				$error .= "Pildi lisamine ebaõnnestus või proovisid lisada 0-suurusega faili!<br>\n";
			}

			$file_name_parts = explode('.',$_FILES['picture']['name']);
			$extension = end($file_name_parts);
			$upload_pic_name = uniqid("g".$gallery."_").'.'.$extension;
			$upload_pic = $pic_dir.$upload_pic_name;
			
			if (file_exists($upload_pic)) {
				$error .= "Sellise nimega fail on juba olemas<br>\n";
			}

			if (!move_uploaded_file($_FILES['picture']['tmp_name'], $upload_pic))
			{
				$error .= "Pildi lisamine ebaõnnestus!<br>\n";
			}

			if ( $error )
			{
				echo $error;
			}
			else
			{
				$db->query("INSERT INTO `cms_pictures` ( `picture_id` , `gallery_id` , `link` , `description` , `time` ) 
						VALUES (
						'', '$gallery', '$upload_pic_name', '".htmlentities(addslashes($_POST['title']))."', '".time()."'
						);");
				$new_pic_id = $db->insert_id;

				$pic_count = $db->get_var("SELECT COUNT(*) AS pic_count FROM cms_pictures WHERE gallery_id = $gallery");
				if ( $pic_count == 1 )
				{
					$db->query("UPDATE `cms_gallery` SET `primary_picture` = '$new_pic_id' WHERE `gallery_id` = '$gallery'");
				}
			}
		}
		echo '<a href="'.$_SERVER['PHP_SELF'].'?action=edit_gallery&gallery='.$gallery.'">Tagasi galerii vaatesse</a><br>';
	}

	if ( isset($_REQUEST['modify_picture']) )
	{
		$picture = isset($_REQUEST['picture']) ? intval($_REQUEST['picture']) : 0;
		$db->query("UPDATE `cms_pictures` SET `description` = '".htmlentities(addslashes($_POST['title']))."' WHERE `picture_id` = '$picture'");
	}

	if ( isset($_REQUEST['primary_picture']) )
	{
		$picture = isset($_REQUEST['picture']) ? intval($_REQUEST['picture']) : 0;
		$gallery_id = $db->get_var("SELECT `gallery_id` FROM `cms_pictures` WHERE `picture_id` = '$picture'");
		$db->query("UPDATE `cms_gallery` SET `primary_picture` = '$picture' WHERE `gallery_id` = '$gallery_id'");
	}

	if ( isset($_REQUEST['delete_picture']) )
	{
		$picture = isset($_REQUEST['picture']) ? intval($_REQUEST['picture']) : 0;
		$link = $db->get_var("SELECT `link` FROM `cms_pictures` WHERE `picture_id` = '$picture'");
		if($link && unlink($pic_dir.$link))
		{
			$db->query("DELETE FROM `cms_pictures` WHERE `picture_id` = '$picture'");
		}
	}

	if ( isset($_REQUEST['action']) )
	{
		switch($_REQUEST['action'])
		{
			case 'add_gallery':
				add_gallery();
				break;
			case 'add_picture':
				$gallery = isset($_REQUEST['gallery']) ? intval($_REQUEST['gallery']) : 0;
				add_picture($gallery);
				break;
			case 'edit_gallery':
				$gallery = isset($_REQUEST['gallery']) ? intval($_REQUEST['gallery']) : 0;
				edit_gallery($gallery);
				break;
		}
	}
	?>

	</BODY>
	</HTML>
<?php
}
else
{
	header("Location: index.php");
}
?>