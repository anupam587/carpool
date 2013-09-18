<!--Homepage of CarPool Visible TO Every User/Guest--> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head Containg all the Styles information/clienside scripting procedures-->
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>carpool</title>
  <link type="text/css" rel="stylesheet" href="../../css/default.css"/>
  <link rel="stylesheet" href="../../css/jquery-ui.css" />
  <link rel="stylesheet" href="../../css/datepicker.css" />
<!-- <link rel="stylesheet" href="../../css/home.css" />-->
  <script src="../../js/jquery-1.8.3.js"></script>
  <script src="../../js/jquery-ui.js"></script>
  <script src="../../js/datepicker1.js"></script>
  <script src="../../js/datepicker-ui.js"></script>
  
  
<!-- google map api-->
<!--  
  <script src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=AIzaSyCQFgldyAk2VC2wX-E0PkLvch9QGOJg1Ro" type="text/javascript"></script>

<script type="text/javascript" src="gps.jquery.js"></script>

 

<script type="text/javascript">

$("#map").googleMap().load();

</script>
     <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="gmap3.min.js"></script>
    <script type="text/javascript" src="jquery-autocomplete.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-autocomplete.css"/>
    
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="lib/jquery-1.4.4.min.js"></script>
	<script src="lib/jquery-ui-1.8.7.min.js"></script>
	<script src="src/jquery.ui.addresspicker.js"></script>
	<script>
	$(function() {
		var addresspicker = $( "#addresspicker" ).addresspicker();
		var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
			regionBias: "fr",
		  elements: {
		    map:      "#map",
		    lat:      "#lat",
		    lng:      "#lng",
		    locality: '#locality',
		    country:  '#country',
        type:    '#type' 
		  }
		});
		var gmarker = addresspickerMap.addresspicker( "marker");
		gmarker.setVisible(true);
		addresspickerMap.addresspicker( "updatePosition");
		
	});
	</script>

 --> 
  
  
<!--Javascript implemtation part-->
  <script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("#signin").click(function() {
			  $('#signup').toggle();
		});
//User login module implmentation	
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
//Redirect To User registeration Page		
		$("#reg").click(function() {
			 window.location="../register/register.php"
		});

    });
  </script>   
</head>
<!--Main Body part of Homepage--> 
<body>

<div id="totalbody">
<?php
    /*session_start();
    if(!empty($_SESSION['username']))
    {
       header('Location:../dashboard/index.php');
    }*/
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
<li id="signin" class="register1">Login&nbsp;|</li>
<li class="register1" id="reg">Register</li>
<li class="register1"><input type="search"/></li>
</ul>
</div>

  <div id="signup">
	        <div class="arrow-nub"><img class="img-t3" src="../../images/arrow.png"/></div><br/>
	        <div id="login-prof"> 
	        <div id="detail">
		    <label class="style12">Email</label><br/>
			<input type="text" placeholder=" Email" class="input-text" id="emailval"/>
			<br/><label class="style12">Password</label><br/>
			<input type="password" placeholder=" Password" class="input-text" id="passval"/><br/>
			<img id="login"  src="../../images/login button.png"/>
			<a href="forgot_password.php" class="forgot-password">Forgot Password ?</a>
            <br/>
			<div id="authlabel"></div>
			</div>
		  </div>
	   </div>	
	</div>
<div id="navigation">
<nav>
<a href="#1"><img src="http://localhost/CarPool/frontend/images/home.png" width="50px" height="50px"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#2"><img src="http://localhost/CarPool/frontend/images/aboutus.png" width="50px" height="50px"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#3"><img src="http://localhost/CarPool/frontend/images/contactus.png" width="50px" height="50px"/></a>
</nav>
</div>
<div id="navag">
<div id="socialmedia">
<a href="#1"><img src="http://localhost/CarPool/frontend/images/Facebook.png" width="30px" height="30px"/></a>
<a href="#2"><img src="http://localhost/CarPool/frontend/images/Google Plus.png" width="30px" height="30px"/></a>
<a href="#3"><img src="http://localhost/CarPool/frontend/images/Twitter.png" width="30px" height="30px"/></a>
</div>
</div>

</div>
<hr/>
-->
<!--Implemnting Searching of carpools By any anonymous User-->
<div id="mainbody">
<div id="searchcarpool">
<div id="search">
<!--User Form for searching a car-->
<form action="../dashboard/guest.php" method="get">
<table border="0" cellspacing="15px">
<tr style="font-size:2em; color:#D04946;float:right" >Ride Details</tr>
<tr>
<td>From City</td>
<td><input type="text" id="fromcity" name="cityfrom"/></td>
<td>Location</td>
<td><input type="text" id="fromlocation" name="locationfrom"/></td>
</tr>
<tr>
<td>To City</td>
<td><input type="text" id="tocity" name="cityto"/></td>
<td>Location</td>
<td><input type="text" id="tolocation" name="locationto"/></td>

</tr>
<tr>
<td>Start Time</td>
<td><input type="time"/></td>
<td>Date</td>
<td><input type="date" id="datepicker" name="date"/></td>
</tr>
<tr>
<td></td>
<td></td>
<!--<td><img src="../../images/startpool.png" class="poolstart"></td>-->
<td><input type="submit" value="Find Pool" src="../../images/findpool.png" class="findpool"/></td>
</tr>
</table>
</form>
</div>
<!--Information about Latest carpools Registered-->
<div id="latestpool">
 <ul>
 <li class="style14">E-block,VIT University</li>
 <li class="style14">H-block,VIT University</li>
 <li class="style14">J-block,VIT University</li>
 <li class="style14">K-block,VIT University</li>
 <li class="style14">Airport-chennai</li>
 <li class="style14">Banglore</li>

 </ul>
</div>
</div>
<br/>
</div>
<div id="flipimages">
<img src="../../images/bg_clouds.jpg" style="width:980px;height:320px ;margin-top:-110px;"/>
</div>
<!--
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
-->
<!--Footer of Homepage-->
<?php
	require('../../include/footer.php');
?>

</div>
<!--Clinetside implementation of autocomplete function-->
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

