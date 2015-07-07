<?php
	
	session_start();
	include("./includes/constants.php");

	$baseurl=BASE_URL;
	$localpath=LOCALPATH;
	$templatepath="{$localpath}/template";

	if(!isset($_GET['page']))
	{
		$_GET['page']='home';
	}

	if(strcmp($_GET['page'],'logout')==0)
	{
	session_unset();
	session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    }


	$page=$_GET['page'];

	switch($page)
	{
		case 'home':
			include("./includes/home.content.php");
			break;
		case 'logout':
			include("./includes/logout.content.php");
			break;
		case 'account':
			include("./includes/account.content.php");
			break;
		case 'basicprogrammingandtheory':
		case 'machinelearning':
		case 'neuralnetworks':
		case 'deeplearning':
			include("./includes/unit.content.php");
			break;
		case 'lesson':
			$unit=$_GET['unit'];
			$chapter=$_GET['chapter'];
			include("./includes/studyindex/lesson_id".$unit.".".$chapter."content.php");
			break;
		default:
			$flag404=TRUE;
			break;
	}

	if(!isset($flag404))
	{
		require_once("..$templatepath/index.php");
	}
	else
	{
		include("./includes/home.content.php");
		require_once("..$templatepath/index.php");
	}
	


?>