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
	$attempt=new signupattempt();
	$attempt->verifyandsend($_POST['fullname'],$_POST['sex'],$_POST['nation'],$_POST['state'],$_POST['city'],$_POST['pcode'],$_POST['email'],$_POST['contact'],$_POST['cid'],$_POST['dept'],$_POST['degree'],$_POST['cname'],$_POST['yos'],$_POST['cadd'],$_POST['requname'],$_POST['reqpassword'],$_POST['reppassword'],"","");
}


?>