<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Car_Pools</title>
<link type="text/css" rel="stylesheet" href="../../css/default.css"/>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script src="../../js/jquery-1.8.3.js"></script>
<script src="../../js/jquery-ui.js"></script>
<script type="text/javascript">
		
		$(document).ready(function(){
		$('#session-logout').click(function(){
		     		$.post('checkout.php',{func:'logout'},function(data){
		     			 window.location.href='../homepage/index.php';
		  			});
		  		});
		 $("#signin").click(function() {
			  $('#signup').toggle();
		});
		$("#login").click(function() {
           var pass=document.getElementById('passval').value;
		   var eid=document.getElementById('emailval').value;
		   $.post('user.php',{func:'validate',email:eid,password:pass},function(data){
		       $("#authlabel").text(data);
		       if(data=='aviliable')
		       {    document.getElementById('authlabel').innerHTML=""; 
		     		window.location.href='../dashboard/index.php';
		       }
		   });  
		});
		$("#reg").click(function() {
			 window.location="../register/register.php"
		});
 		
         });
</script>
       
</head>

<body>

<div id="totalbody">
<?php
	require('../../include/header.php');
?>
<!--
<div id="header">
<div id="logo">
<img src="http://localhost/CarPool/frontend/images/logo.png" width="250px" height="70px"/>
</div>
<div id="headright">
<div id="register">
<ul >
<li class="register1">Login&nbsp;|</li>
<li class="register1">Register</li>
<li class="register1"><input type="search"/></li>
</ul>

</div>
<div id="navigation">
<nav>
<a href="#1"><img src="http://localhost/CarPool/frontend/images/home.png" width="50px" height="50px"/></a>
<a href="#2"><img src="http://localhost/CarPool/frontend/images/aboutus.png" width="50px" height="50px"/></a>
<a href="#3"><img src="http://localhost/CarPool/frontend/images/contactus.png" width="50px" height="50px"/></a>
</nav>
</div>
</div>
</div>
<hr/>
-->
<div id="mainbody">
<?php
    if($_GET['locationfrom']==null||$_GET['cityfrom']==null||$_GET['locationto']==null||$_GET['cityto']==null)
    {
     echo "You haven't filled the form completely"; 
    }
    $startloc=$_GET['locationfrom'];
    $startcity=$_GET['cityfrom'];
    $destloc=$_GET['locationto'];
    $destcity=$_GET['cityto'];
    $date=$_GET['date'];
    $server = 'localhost';
	$user = 'root';
	$pass = "anupam";
	$database = 'carpool';
    
    if (!mysql_connect($server, $user, $pass) || !mysql_select_db($database))
   	{
           die('Sorry but not able to connect to database..');
    }
    $query=mysql_query("select * from travel where fromcity='".$startcity."' && fromlocation='".$startloc."' && tolocation='".$destloc."' && tocity='".$destcity."'&&date='".$date."'");
    $pools=mysql_num_rows($query);
    if($pools==0){
      echo "<div style='font-size:1.5em;margin-left:auto;margin-right:auto'>Sorry  No ride is Found In our database &nbsp; &nbsp; &nbsp;<a href='../homepage/index.php'>Try another search</a></div>"; 
    }
    else{ 
    echo '<table border="1px solid black" style="margin-left:auto;margin-right:auto;margin-top:30px;">';
    echo '<tr><th>From</th><th>Destination</th><th>Time</th><th>date</th><th>totaltime</th><th>Carowner</th><th>Cartype</th><th>No of seats</th></tr>';
      while($row=mysql_fetch_assoc($query))
      {
        //echo $pools;
        echo "<tr><td>".$row['fromlocation']."</td><td>".$row['tolocation']."</td><td>".$row['starttime']."</td><td>".$row['date']."</td><td>".$row['totaltime']."</td><td>".$row['carowner']."</td><td>".$row['cartype']."</td><td>".$row['noofseats']."</td></tr>";
      }
    echo '</table>'; 
    }
?>
</div>
<hr/>
<div id="footer">
<nav>
<li class="footlink">About Us &nbsp;|</li>
<li class="footlink">How Carpool Works? &nbsp;|</li>
<li class="footlink">Coorporate Polling &nbsp;|</li>
<li class="footlink">Invite Friends &nbsp;|</li>
<li class="footlink">Terms &nbsp;|</li>
</nav>
<br/>
<br/>
<div id="copyright">
www.poolmycar.in&copy;
</div>
<div id="developer">
Designed and Developed By
<img src="../../images/devloperlogo.png"/>
</div>
</div>
</div>
<script type="text/javascript">
  $(function() {
    var fromcity= <?php echo json_encode($fromcity ); ?>;
    $( "#fromcity" ).autocomplete({
      source: fromcity  
    });
    var fromlocation= <?php echo json_encode($fromlocation ); ?>;
    $( "#fromlocation" ).autocomplete({
      source: fromlocation  
    });
    var tocity= <?php echo json_encode($tocity ); ?>;
    $( "#tocity" ).autocomplete({
      source: tocity  
    });
    var tolocation= <?php echo json_encode($tolocation ); ?>;
    $( "#tolocation" ).autocomplete({
      source: tolocation  
    });
  });
  </script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</body>

</html>
