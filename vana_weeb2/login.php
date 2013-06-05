<?php
session_start();

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
if ( !include_once('functions.php') )	// Muud funtksioonid
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}

if ( user_logged_in() )
{
	// kasutaja on juba sisse logitud, saadab tagasi sinna, kust tuldi
	if ( isset($_SERVER['HTTP_REFERER']) )
		header("Location: ".$_SERVER['HTTP_REFERER']);
	else
		// või esilehele, kui vastavat infot ei leidu
		header("Location: index.php");
}
else
{
	// templeidi klassi eksemplari loomine
	$smarty = new Smarty;

	$teade = '';

	if ( isset($_POST['submit']) )
	{
		$user = trim($_POST['username']);
		$pass = trim($_POST['password']);
		if ( empty($user) || empty($pass) )
		{
			// kasutaja jättis ühe või mõlemad väljadest täitmata
			$teade = 'Kasutajanimi ja parool peavad olema määratud';
		}
		else
		{
			// proovib sisse logida
			user_log_in($_POST['username'],$_POST['password']);
			if ( !user_logged_in() )
			{
				$teade = 'Vale kasutajanimi ja/või parool';
			}
			else
			{
				// logimine õnnestus, suunab esilehele
				header("Location: index.php");
				exit;
			}
		}
	}

	// templeidi muutujad
	$smarty->assign('teade', $teade);
	$smarty->assign('tegevus', 'login.php');
	$smarty->display('login.tpl');
}
?>