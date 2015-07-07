<?php
	
	session_start();
	include("./includes/constants.php");

	$baseurl=BASE_URL;
	$localpath=LOCALPATH;
	$templatepath="{$localpath}/template";

	if(!isset($_GET['unit']))
	{
		$_GET['unit']='basicprogrammingandtheory';
	}

	$dir="./study/".$_GET['unit']."/".$_GET['chapter'];
	$chapter=$_GET['chapter'];
	$chapter=str_replace(".php", "", $chapter);

	if(is_file($dir))
	{
		include($dir);
	}
	else
	{
		$location="Location:./index.php?page=home#services";
		header($location);
		die();
	}
	
	require_once("..$templatepath/index.php");
	
	
	


?>