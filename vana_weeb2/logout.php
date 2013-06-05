<?php
session_start();

if ( !include_once('functions.php') )	// Muud funtksioonid
{
	echo "<br><br>Can not find important files. Script will now terminate!\n";
	exit;
}

user_log_out();

header("Location: index.php");
?>