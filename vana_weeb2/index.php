<?php
session_start();

$pic_dir = '/data05/virt1545/domeenid/www.elin.ee/htdocs/pics/';

if ( !include_once('ez_sql.php') )	// MySQL
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}
if ( !include_once('/data05/virt1545/domeenid/www.elin.ee/Smarty-2.6.9/libs/Smarty.class.php') )	// Smarty Template Engine
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}
if ( !include_once('functions.php') )	// Muud funktsioonid
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}


$smarty = new Smarty();
$error = "";

if ( isset($_REQUEST['edit_c']) && user_logged_in() )
{
	$edit_c = intval($_REQUEST['edit_c']);
	switch ($edit_c)
	{
		case INDEX_ID:
		case CONTACT_ID:
			$source = htmlentities($_REQUEST['source']);
			$db->query("UPDATE cms_page SET source = '$source', editor_id = ".intval($_SESSION['user_id']).", edited = ".time()." WHERE page_id = $edit_c");
			break;
		case LICENSES_ID:
			if ( isset($_REQUEST['edit']) )
			{
				$license_id = intval($_REQUEST['license_id']);
				$name = addslashes($_REQUEST['name']);
				$sql = "UPDATE cms_licenses SET name = '$name', editor_id = ".intval($_SESSION['user_id'])." WHERE license_id = $license_id";
				$db->query($sql);
			}
			if ( isset($_REQUEST['delete']) )
			{
				$license_id = intval($_REQUEST['license_id']);
				$link = $db->get_var("SELECT `link` FROM `cms_licenses` WHERE `license_id` = '$license_id'");
				if($link && unlink($pic_dir.$link))
				{
					$db->query("DELETE FROM `cms_licenses` WHERE `license_id` = '$license_id'");
				}
			}
			if ( isset($_REQUEST['add']) )
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

				if ( !$error )
				{
					$db->query("INSERT INTO `cms_licenses` ( `license_id` , `link` , `name` , `created` , `creator_id` , `active` ) 
							VALUES (
							'', '$upload_pic_name', '".htmlentities(addslashes($_REQUEST['name']))."', '".time()."', ".intval($_SESSION['user_id']).", '1'
							)");
				}
				
			}
			break;
		case PROJECTS_ID:
			if ( isset($_REQUEST['edit']) )
			{
				$proj_id = intval($_REQUEST['id']);
				$name = addslashes($_REQUEST['name']);
				$place = addslashes($_REQUEST['place']);
				$orderer = addslashes($_REQUEST['orderer']);
				$gallery_id = intval($_REQUEST['gallery_id']);
				$sql = "UPDATE cms_projects SET name = '$name', place='$place', orderer='$orderer', gallery_id = $gallery_id WHERE project_id = $proj_id";
				$db->query($sql);
			}
			if ( isset($_REQUEST['delete']) )
			{
				$proj_id = intval($_REQUEST['id']);
				$sql = "DELETE FROM cms_projects WHERE project_id = $proj_id";
				$db->query($sql);
			}
			if ( isset($_REQUEST['add']) )
			{
				$year = intval($_REQUEST['year']);
				$name = addslashes($_REQUEST['name']);
				$place = addslashes($_REQUEST['place']);
				$orderer = addslashes($_REQUEST['orderer']);
				$sql = "INSERT INTO `cms_projects` ( `project_id` , `year` , `name` , `place` , `orderer` , `created` , `active` ) VALUES ('', '$year', '$name', '$place', '$orderer', '".time()."', '1')";
				$db->query($sql);
			}
			break;
		case GALLERY_ID:
			if ( isset($_REQUEST['edit']) )
			{
				$gallery_id = intval($_REQUEST['id']);
				$description = addslashes($_REQUEST['description']);
				$sql = "UPDATE cms_gallery SET description = '$description', time = '".time()."' WHERE gallery_id = $gallery_id";
				$db->query($sql);
			}
			break;
	}
}

if ( isset($_REQUEST['c']) )
{
	$content = intval($_REQUEST['c']);
}
else
{
	$content = INDEX_ID;
}

switch ( $content )
{
	case INDEX_ID:
		show_page(INDEX_ID);
		break;
	case CONTACT_ID:
		show_page(CONTACT_ID);
		break;
	case PROJECTS_ID:
		if ( isset($_REQUEST['aasta']) )
		{
			$aasta = intval($_REQUEST['aasta']);
		}
		else
		{
			$aasta = 0;
		}
		show_projects_page($aasta);
		break;
	case GALLERY_ID:
		if ( isset($_REQUEST['galerii']) )
		{
			$galerii = intval($_REQUEST['galerii']);
		}
		else
		{
			$galerii = 0;
		}
		show_gallery_page($galerii);
		break;
	case LICENSES_ID:
		show_licenses_page($error);
		break;
	case FEEDBACK_ID:
		if ( isset($_REQUEST['msg']) )
		{
			$teade = urldecode($_REQUEST['msg']);
		}
		else
		{
			$teade = '';
		}
		show_page(FEEDBACK_ID, $teade);
		break;
	case LICENSES_PICTURE:
		show_licenses_image($_REQUEST['license_id']);
		break;
	default:
		show_page(INDEX_ID);
}
?>