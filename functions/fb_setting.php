<?php

include('./classes.php');

$attempt=new signupattempt();
$attempt->verifyandsend($_POST['fullname'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['id'],$_POST['fb']);


?>