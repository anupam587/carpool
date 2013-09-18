<?php
 include '../../include/dbconnect.php';
 session_start();
 if($_POST['func']=='logout')
 {
  echo "You are Logged out";
  session_destroy();
  
 }
 else if($_POST['func'] == 'loginas')
 {
   $query=mysql_query("select * from user where email='".$_SESSION['username']."'");
   $row=mysql_fetch_assoc($query);
   if($row['password']=='facebook')
   {
     echo "facebook";
   }
   else{
     echo "member";
   }
 }
 
?>