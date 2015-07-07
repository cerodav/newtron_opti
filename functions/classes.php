<?php


class signupattempt
{
	

	 function connection()
	 {
		$username = "root";
		$password = "";

		try {
    	$dbh = new PDO('mysql:host=localhost;dbname=deeplearn', $username, $password);
		} catch (PDOException $e) {
    	print "Error!: " . $e->getMessage() . "<br/>";
    	die();
		}
		return $dbh;
	 }

	 function verifyandsend($post_fullname,$post_sex,$post_nation,$post_state,$post_city,$post_pcode,$post_email,$post_contact,$post_cid,$post_dept,$post_degree,$post_cname,$post_yos,$post_cadd,$post_requname,$post_reqpword,$post_reppword,$post_id,$post_fb)
	 {
	 	$dbh=$this->connection();

	 	if(!isset($post_fb) || empty($post_fb))
		{
		
		$fullname=$post_fullname;
		if("" == trim($post_fullname))
		{
			echo "Please ensure that you have entered all the requested fields";
			die();
		}	
		if (preg_match("/^[a-zA-Z ]+$/",$fullname)!=1) {
 		echo "Please ensure that you have entered valid details for all the requested fields";
 		die();
		}

		
		$email=$post_email;
		if(empty($post_email))
		{
			echo "Please ensure that you have entered all the requested fields";
			die();
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL)===FALSE) {
  		echo "Please enter a valid email address";
  		die();
		}

		
		if(empty($post_cid)||empty($post_dept)||empty($post_degree)||empty($post_cname)||empty($post_yos)||empty($post_contact)||empty($post_nation)||empty($post_requname))
		{
			echo "Please ensure that you have entered all the requested fields";
			die();
		}


		$collegeID=$post_cid; //IDK WHAT THIS MEANS?
		$dept=$post_dept;
		$degree=$post_degree;
		$college=$post_cname;
		$yos=$post_yos;
		$contact=$post_contact;
		$nation=$post_nation; //DO U NEED VERIFICATION?
		$uname=$post_requname;

		if(empty($post_reqpword))
		{
			echo "Please enter your required password";
			die();
		}
		$pword=$post_reqpword; 
		if (preg_match("/^.{8,}$/",$pword)!=1) {
		  echo "Please make sure that the entered password is atleast 8 characters long";
		  die();
		}

		if(empty($post_reppword))
			{header('Location:login.php?error=2');die();}
		$reppword=$post_reppword;
		if(strcmp($reppword,$pword)!=0)
		{
			echo "Please make sure that you re-entered the password rightly";
			die();
		}
		$pword=sha1($pword);
		$errormsg='Location:login.php?error='.$fullname.'3';
		if(empty($post_sex)||empty($post_cadd)||empty($post_state)||empty($post_city)||empty($post_pcode))
		{
			header($errormsg);
			die();
		}
		$sex=$post_sex;
		$addrofin=$post_cadd;
		$state=$post_state;
		$city=$post_city;
		$pcode=$post_pcode;

		$statement=$dbh->prepare("SELECT * FROM users_general WHERE uname='$uname'");
		$statement->execute();
		$results=$statement->fetchAll();
		if(count($results)>0)
		{
			echo "Sorry, requested username not available";
			die();
		} 
		else 
		{
		try{	
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);   
		$stmt = $dbh->prepare("INSERT INTO users_general (fullname, sex,nation,state,city,pcode,email,contact,collegeid,dept,degree,collegename,yearofstudy,uname,pword,addrofin) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bindParam(1, $fullname);
		$stmt->bindParam(2, $sex);
		$stmt->bindParam(3, $nation);
		$stmt->bindParam(4, $state);
		$stmt->bindParam(5, $city);
		$stmt->bindParam(6, $pcode);
		$stmt->bindParam(7, $email);
		$stmt->bindParam(8, $contact);
		$stmt->bindParam(9, $collegeID);
		$stmt->bindParam(10, $dept);
		$stmt->bindParam(11, $degree);
		$stmt->bindParam(12, $college);
		$stmt->bindParam(13, $yos);
		$stmt->bindParam(14, $uname);
		$stmt->bindParam(15, $pword);
		$stmt->bindParam(16, $addrofin);


		$stmt->execute();}
		catch(Exception $e)
		{
			var_dump($e->getMessage());
			die();
		}

		echo "Successful account creation, please sign in";
		}

		}
		else
		{
			$id=$post_id;
			$fullname=$post_fullname;

			$statement=$dbh->prepare("SELECT * FROM users_general WHERE contact='$id'");
			$statement->execute();
			$results=$statement->fetchAll();

			if(!empty($results))
			{
				session_start();
				$_SESSION['fullname']=$fullname;
				$_SESSION['id']=$results[0]['id'];
				$_SESSION['fb']=1;
				echo "redirect";
				die();
			} 
			else 
			{
			try{

				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);   
				$stmt = $dbh->prepare("INSERT INTO users_general (fullname, contact) VALUES (?,?)");
				$stmt->bindParam(1, $fullname);
				$stmt->bindParam(2, $post_id);
			
				$stmt->execute();}

			catch(Exception $e)
			{
				var_dump($e->getMessage());
				die();
			}
				$statement=$dbh->prepare("SELECT * FROM users_general WHERE contact='$id'");
				$statement->execute();
				$results=$statement->fetchAll();

				session_start();
				$_SESSION['fullname']=$fullname;
				$_SESSION['id']=$results[0]['id'];
				$_SESSION['fb']=1;
				echo "redirect";
			}
		}
	 }
}

class comment
{
	private $dbh;

	 function __constructor()
	 {
		$username = "root";
		$password = "";

		try {
    	$dbh = new PDO('mysql:host=localhost;dbname=deeplearn', $username, $password);
		} catch (PDOException $e) {
    	print "Error!: " . $e->getMessage() . "<br/>";
    	die();
		}
	 }

	 function addlike($likeid,$userid,$session_id)
	 {

	
		$st=$dbh->prepare("SELECT * FROM liketable WHERE id='$likeid'");
		$st->execute();
		$results=$st->fetchAll();

		$flag=0;
		foreach ($results as $key) {
		//	if(strcmp($key['user'],$_POST['id'])==0)
			if(strcmp($key['user'],$userid)==0)
				$flag=1;
		}

		if($flag==0)
		{
			$sta=$dbh->prepare("SELECT * FROM disliketable WHERE id='$likeid'");
			$sta->execute();
			$results=$sta->fetchAll();		
			foreach ($results as $key) {
		//	if(strcmp($key['user'],$_POST['id'])==0)
			if(strcmp($key['user'],$userid)==0)
				$flag=1;
			}

			if($flag==0)
			{
				$stat=$dbh->prepare("UPDATE discussion_panel SET likecount=likecount+1 WHERE id='$likeid'");
				$stat->execute();

				$stat=$dbh->prepare("INSERT INTO liketable (id, user) VALUES (?,?)");
				$stat->bindParam(1, $likeid);
			//	$stat->bindParam(2, $_POST['id']);
				$stat->bindParam(2, $userid);
				$stat->execute();

			}
			else
			{
				$stat=$dbh->prepare("UPDATE discussion_panel SET dislikecount=dislikecount-1 WHERE id='$likeid'");
				$stat->execute();

				$stat=$dbh->prepare("UPDATE discussion_panel SET likecount=likecount+1 WHERE id='$likeid'");
				$stat->execute();

				$stat=$dbh->prepare("INSERT INTO liketable (id, user) VALUES (?,?)");
				$stat->bindParam(1, $likeid);
			//	$stat->bindParam(2, $_POST['id']);
				$stat->bindParam(2, $userid);
				$stat->execute();

			//	$idofuser=$_SESSION['id'];
				$idofuser=$session_id;
				$stat=$dbh->prepare("DELETE FROM disliketable WHERE id='$likeid' AND user='$idofuser'");
				$stat->execute();
			}
		}

	}

	function adddislike($dislikeid,$userid,$session_id)
	{

		$st=$dbh->prepare("SELECT * FROM disliketable WHERE id='$dislikeid'");
		$st->execute();
		$results=$st->fetchAll();

		$flag=0;
		foreach ($results as $key) {
		//	if(strcmp($key['user'],$_POST['id'])==0)
			if(strcmp($key['user'],$userid)==0)
				$flag=1;
		}

		if($flag==0)
		{
			$sta=$dbh->prepare("SELECT * FROM liketable WHERE id='$dislikeid'");
			$sta->execute();
			$results=$sta->fetchAll();		
			foreach ($results as $key) {
		//	if(strcmp($key['user'],$_POST['id'])==0)
			if(strcmp($key['user'],$userid)==0)
				$flag=1;
			}

			if($flag==0)
			{
				$stat=$dbh->prepare("UPDATE discussion_panel SET dislikecount=dislikecount+1 WHERE id='$dislikeid'");
				$stat->execute();

				$stat=$dbh->prepare("INSERT INTO disliketable (id, user) VALUES (?,?)");
				$stat->bindParam(1, $dislikeid);
			//	$stat->bindParam(2, $_POST['id']);
				$stat->bindParam(2, $userid);
				$stat->execute();

			}
			else
			{
				$stat=$dbh->prepare("UPDATE discussion_panel SET likecount=likecount-1 WHERE id='$dislikeid'");
				$stat->execute();

				$stat=$dbh->prepare("UPDATE discussion_panel SET dislikecount=dislikecount+1 WHERE id='$dislikeid'");
				$stat->execute();

				$stat=$dbh->prepare("INSERT INTO disliketable (id, user) VALUES (?,?)");
				$stat->bindParam(1, $dislikeid);
			//	$stat->bindParam(2, $_POST['id']);
				$stat->bindParam(2, $userid);
				$stat->execute();
			//	$idofuser=$_SESSION['id'];
				$idofuser=$session_id;
				$stat=$dbh->prepare("DELETE FROM liketable WHERE id='$dislikeid' AND user='$idofuser'");
				$stat->execute();
			}
		}


	}

	function addcomment($callid,$userid,$post_comment)
	{
		
		//$userid=$_POST['id'];

		if(isset($post_comment))
		{
			$comment=$post_comment;

			$default=0;
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);   
			$stmt = $dbh->prepare("INSERT INTO discussion_panel (formid, user_id,comment,likecount,dislikecount) VALUES (?,?,?,?,?)");
			$stmt->bindParam(1, $callid);
			$stmt->bindParam(2, $userid);
			$stmt->bindParam(3, $comment);
			$stmt->bindParam(4, $default);
			$stmt->bindParam(5, $default);

			$stmt->execute();
			echo "successful entry";
		}
	}

	function printcomment($formid,$post_id)
	{
		//$formid=$_POST['formid'];
		$statement=$dbh->prepare("SELECT * FROM discussion_panel WHERE formid='$formid'");
		$statement->execute();
		$results=$statement->fetchAll();
		foreach ($results as $key) {
			$userid=$key['user_id'];
			$st=$dbh->prepare("SELECT * FROM users_general WHERE id='$userid'");
			$st->execute();
			$res=$st->fetchAll();
			if(isset($post_id)&&(!empty($post_id)))
			echo "<div class='post'><span class='chatname'>".$res[0]['fullname']." : </span>".$key['comment']."<form action='../comment.php' method='post' name='".$formid."'><input type='hidden' name='form' value='".$formid."'><br>".$key['likecount']."<input type='button' value='like' class='like_btn' name='".$key['id']."' />".$key['dislikecount']."<input type='button' value='dislike' class='dislike_btn' name='".$key['id']."' /></form></div>";
			else
			echo "<div class='post'><span class='chatname'>".$res[0]['fullname']." : </span>".$key['comment']."<form action='../comment.php' method='post' name='".$formid."'><input type='hidden' name='form' value='".$formid."'><br>".$key['likecount']."<input type='button' value='like' class='like_btn' name='".$key['id']."' disabled/>".$key['dislikecount']."<input type='button' value='dislike' class='dislike_btn' name='".$key['id']."' disabled/></form></div>";			
		}
	}
}

class signinattempt
{
	function connection()
	{
		$username="root";
		$password="";

 		try {
    		$dbh = new PDO('mysql:host=localhost;dbname=deeplearn', $username, $password);
		} catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}

		return $dbh;
	}

	function attempt($post_uname,$post_pword)
	{
		$dbh=$this->connection();

		$pword=$post_pword;
 		$uname=$post_uname;
 		$pword=sha1($pword);

 		$statement=$dbh->prepare("SELECT * FROM users_general WHERE uname='$uname'");
		$statement->execute();
		$results=$statement->fetchAll();
		if(isset($results) && !empty($results))
		{
			if(strcmp($results[0]['pword'],$pword)==0)
			{
				session_start();
				$_SESSION['fullname']=$results[0]['fullname'];
				$_SESSION['id']=$results[0]['id'];
				echo "Success";
			}
			else
			echo "Sorry wrong username or password"; 
		}
		else
		{
			
			echo "Sorry wrong username or password";
		}
	}
}

?>
