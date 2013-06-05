<?php

define("INDEX_ID", 1);
define("CONTACT_ID", 2);
define("PROJECTS_ID", 3);
define("GALLERY_ID", 4);
define("LICENSES_ID", 5);
define("FEEDBACK_ID", 6);
define("LICENSES_PICTURE", 7);

function show_licenses_image($license_id)
{
	global $smarty, $db;
	$license_id = intval($license_id);
	$url = $db->get_var("SELECT link FROM cms_licenses WHERE license_id = $license_id");
	if($url)
	{
		$smarty->assign('pic_url',$url);
		$smarty->display('license_pic.tpl');
	}
	return;
}

function page_views($page_id)
{
	global $db;
	return $db->get_var("SELECT views FROM cms_page WHERE page_id = $page_id");
}

function show_page($page_id, $message='')
{
	global $smarty, $db;

	$template = 'index.tpl';

	$logged = user_logged_in();

	$page = $db->get_row("SELECT title, source, template FROM cms_page WHERE page_id = $page_id");
	if ( $db->num_rows )
	{
		if ( !$logged )
		{
			$db->query("UPDATE cms_page SET views = views + 1 WHERE page_id = $page_id");
		}
		$template = $page->template;
		$smarty->assign('content', html_entity_decode($page->source));
	}

	if ( $logged )
	{
		$template = 'adm_'.$template;
		$smarty->assign('page_views',page_views($page_id));
	}

	$smarty->assign('message', $message);

	$smarty->display($template);
}

function show_licenses_page($error = "")
{
	global $smarty, $db;
	
	$template = 'litsentsid.tpl';

	$logged = user_logged_in();

	if ( !$logged )
	{
		$db->query("UPDATE cms_page SET views = views + 1 WHERE page_id = ".LICENSES_ID);
	}
	
	$litsentsid = $db->get_results("SELECT license_id, link, name FROM cms_licenses WHERE active = 1 ORDER BY created DESC", ARRAY_A);
	if ( $db->num_rows )
	{
		$smarty->assign('litsentsid',$litsentsid);
	}

	if ( $logged )
	{
		$template = 'adm_'.$template;
		$smarty->assign('page_views',page_views(LICENSES_ID));
		$smarty->assign('error',$error);
	}	
		
	$smarty->display($template);
}

function show_projects_page($aasta)
{
	global $smarty, $db;

	$template = 'tehtud.tpl';

	$logged = user_logged_in();

	if ( !$logged )
	{
		$db->query("UPDATE cms_page SET views = views + 1 WHERE page_id = ".PROJECTS_ID);
	}

	$aastad = $db->get_results("SELECT DISTINCT year FROM cms_projects ORDER BY year",ARRAY_A);
	if ( $db->num_rows )
	{
		$smarty->assign('aastad',$aastad);
	}

	$aasta = ($aasta == 0) ? intval(date("Y")) : $aasta;

	$smarty->assign('aasta',$aasta);

	$projektid_tulem = $db->get_results("SELECT `project_id`, `name`, `place`, `orderer`, `gallery_id` FROM cms_projects WHERE year = $aasta AND active = 1 ORDER BY project_id", ARRAY_A);

	$projektid = array();

	if ( $db->num_rows )
	{
		$a = false;
		foreach($projektid_tulem as $key=>$value)
		{
			$projektid[$key]['project_id'] = $projektid_tulem[$key]['project_id'];
			$projektid[$key]['name'] = ($logged) ? htmlentities(stripslashes($projektid_tulem[$key]['name'])) : stripslashes($projektid_tulem[$key]['name']);
			$projektid[$key]['place'] = ($logged) ? htmlentities(stripslashes($projektid_tulem[$key]['place'])) : stripslashes($projektid_tulem[$key]['place']);
			$projektid[$key]['orderer'] = ($logged) ? htmlentities(stripslashes($projektid_tulem[$key]['orderer'])) : stripslashes($projektid_tulem[$key]['orderer']);
			$projektid[$key]['gallery_id'] = $projektid_tulem[$key]['gallery_id'];
			$projektid[$key]['color'] = ($a)?' bgcolor="#F9F9F9"':'';
			$a = !$a;
		}
	}

	$smarty->assign('projektid',$projektid);

	if ( $logged )
	{
		$smarty->assign('page_views',page_views(PROJECTS_ID));
		$galerii_tulem = $db->get_results("SELECT `gallery_id`, `description` FROM cms_gallery ORDER BY description", ARRAY_A);
		$galeriid = array(0=>'Galerii puudub');
		if ( $db->num_rows )
		{
			foreach($galerii_tulem as $key=>$value)
			{
				$galeriid[$galerii_tulem[$key]['gallery_id']] = stripslashes($galerii_tulem[$key]['description']);
			}
		}
		$smarty->assign('galeriid', $galeriid);
		$template = 'adm_'.$template;
	}

	$smarty->display($template);
}

function show_gallery_page($galerii)
{
	global $smarty, $db;

	$template = 'galerii.tpl';

	$logged = user_logged_in();

	if ( !$logged )
	{
		$db->query("UPDATE cms_page SET views = views + 1 WHERE page_id = ".GALLERY_ID);
	}

	$pildid = array();

	if ( $logged )
	{
		$pildid = $db->get_results("SELECT gallery_id, description FROM cms_gallery", ARRAY_A);
		$gallery_title = '';
	}
	else if ( $galerii )
	{
		$pildid = $db->get_results("SELECT link, description FROM cms_pictures WHERE gallery_id = $galerii", ARRAY_A);
		if ( $db->num_rows )
		{
			$gallery_title = $db->get_var("SELECT description FROM cms_gallery WHERE gallery_id = $galerii");
			$db->query("UPDATE cms_gallery SET views = views + 1 WHERE gallery_id = $galerii");
		}
	}
	else
	{
		$pildid = $db->get_results("SELECT g.gallery_id, g.description, p.link FROM cms_gallery g, cms_pictures p WHERE g.primary_picture = p.picture_id ORDER BY g.time DESC LIMIT 4", ARRAY_A);
		$gallery_title = '';
	}

	$smarty->assign('gallery_title',$gallery_title);
	$smarty->assign('pildid',$pildid);

	if ( $logged )
	{
		$template = 'adm_'.$template;
		$smarty->assign('page_views',page_views(GALLERY_ID));
	}

	$smarty->display($template);
}

function user_log_in($username,$password)	{
/*
 =======================================================
 * Kontrollib, kas sisestatud andmetega kasutaja on
 * olemas. Juhul, kui see nii on, seatakse sessiooni-
 * muutuja sisselogituse jaoks.
 =======================================================
*/
	global $db;

	$username = addslashes(htmlspecialchars(trim($username)));
	$password = htmlspecialchars(trim($password));

	// kui kasutajanimi või parool on tühjad, ei saa sisse logida
	if ( empty($username) || empty($password) )
	{
		$_SESSION['username'] = '';
		$_SESSION['user_id'] = '';
		return FALSE;
	}
	$sql = "SELECT user_id, name FROM cms_user
			WHERE name = '$username'
			AND password = MD5('$password')";

	$userdata = $db->get_row($sql);
	// kui kasutaja leitakse, alustatakse sessioon
	if ( $userdata->name == $username )
	{
		$db->query("UPDATE cms_user SET last_login = now() WHERE user_id = ".$userdata->user_id);
		$_SESSION['logged_in'] = TRUE;
		$_SESSION['username'] = $userdata->name;
		$_SESSION['user_id'] = $userdata->user_id;
		return TRUE;
	}
	else
	{
		$_SESSION['username'] = '';
		$_SESSION['user_id'] = '';
		return FALSE;
	}
}


function user_logged_in()	{
/*
 =======================================================
 * Kontrollib, kas kasutaja on parajasti sisse logitud
 * (peab eksisteerima vastav sessioonimuutuja).
 =======================================================
*/
	if ( isset($_SESSION['logged_in']) && $_SESSION['username'] != '' )
		return TRUE;
	else
		return FALSE;
}

function user_log_out()	{
/*
 =======================================================
 * Logib kasutaja välja (kustutab vastavad sessiooni-
 * muutujad).
 =======================================================
*/
	$_SESSION = array();
	session_destroy();
	return;
}
?>