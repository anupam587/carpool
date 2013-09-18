<?php
include '../../include/dbconnect.php';
if($_POST['func']=='email')
{
	$emailid=$_POST['email'];
	$data="select * from users where email='$emailid'";
	$result=mysql_query($data,$con);
	$rows=mysql_num_rows($result);
	if($rows!=0)
	{
	echo "email already exist";
	}
	else{
	echo "<span style='color:green'>Available</span>";
	}
}
if($_POST['func']=='formsubmit')
{
	  $userid=rand(11111,99999);
	  $usid=(string)$userid;
	  $accessid=md5($usid);
	  echo "registering the information\n";
	 	  $to      = $_POST['email'];
	  $subject = 'confirmation link';
	  $message = "Click to Below Link to Register With us\n"."http://anupamgupta.cu.cc/excelsior-local/frontend/modules/homepage/completereg.php?id=".$accessid;
	     $headers = 'From: anupamgupta293@gmail.com' . "\r\n" .
	    'Reply-To: anupamgupta293@gmail.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	     
	  $data="insert into users values($userid,'".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".md5($_POST['password'])."')";
	     
	  if(mysql_query($data))
	  {
	 }
	  else{
	     echo "connection error with database";
	  }  
}
if($_POST['func']=='reset')
{
         
	 if( mysql_query("update user set password='".md5($_POST['password'])."' where userid=".$_POST['uid']))
	 {
	   echo "your password is  changed successfully";
	 }
	 else{
	   echo "connection error with database due to server load";
	 }	  
}
?>