<?php

include('./classes.php');

$not_set_flag=FALSE;
foreach($_POST as &$value)
{
	if(!isset($value) || empty($value))	
	$not_set_flag=TRUE;
}

if($not_set_flag)
	echo "Please make sure that you have entered every detail";
else
{
	$attempt=new signinattempt();
	$attempt->attempt($_POST['uname'],$_POST['pword']);
}

?>