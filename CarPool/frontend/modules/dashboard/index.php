<!--User dashboard page implemantation-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--head part containing all the style and clinetside informarion-->
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Car_Pools</title>
<link type="text/css" rel="stylesheet" href="../../css/default.css"/>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script src="../../js/jquery-1.8.3.js"></script>
<script src="../../js/jquery-ui.js"></script>
<!--clientside scripting-->
<script type="text/javascript">
		$(document).ready(function(){
		//user session logout implemtation
		$('#session-logout').click(function(){
		     		$.post('checkout.php',{func:'logout'},function(data){
		     			 window.location.href='../homepage/index.php';
		  			});
		  		});
		 //Register a new ride in a user account 		
		 $('#carreg').click(function(){ 
		        $('#registercar').css( "display", "block" );
		        $('#carsearch').css( "display", "none" );
                $('#profile').css( "display", "none" );
		 });
		 //Implementation of searching a car
		 $('#searchcar').click(function(){ 
		        $('#registercar').css( "display", "none" );
		        $('#carsearch').css( "display", "block" );
                $('#profile').css( "display", "none" );
		 });
		 //implmetation of registered car in user Profile or account
		 $('#myprof').click(function(){ 
		        $('#registercar').css( "display", "none" );
		        $('#carsearch').css( "display", "none" );
                $('#profile').css( "display", "block" );
		 });
		 //Posting a new Ride module
		 $("#postride").click(function() {
           var tocity=document.getElementById('cityto').value;
		   var fromcity=document.getElementById('cityfrom').value;
		   var fromlocation=document.getElementById('locationfrom').value;
		   var tolocation=document.getElementById('locationto').value;
		   var time=document.getElementById('starttime').value;
		   var date=document.getElementById('pickdate').value;
           var seat=document.getElementById('seats').value;
           var traveltime=document.getElementById('totaltime').value;
           var owner=document.getElementById('owner').value;
           var cartype=document.getElementById('cartype').value;
		   $.post('../homepage/user.php',{func:'postride',cityto:tocity,cityfrom:fromcity,locationfrom:fromlocation,locationto:tolocation,time1:time,date1:date,seat1:seat,cartype1:cartype,carowner:owner,totaltime:traveltime},function(data){
		       alert(data);
		       document.getElementById('cityto').value="";
		       document.getElementById('cityto').value="";
			   document.getElementById('cityfrom').value="";
			   document.getElementById('locationfrom').value="";
			   document.getElementById('locationto').value="";
			   document.getElementById('starttime').value="";
			   document.getElementById('pickdate').value="";
	           document.getElementById('seats').value="";
	           document.getElementById('totaltime').value="";
	           document.getElementById('owner').value="";
	           document.getElementById('cartype').value="";
		   });  
		});
		//Pool searching and booking implemetaion module
		$("#poolfind").click(function() {
           var tocity=document.getElementById('tocity').value;
		   var fromcity=document.getElementById('fromcity').value;
		   var fromlocation=document.getElementById('fromlocation').value;
		   var tolocation=document.getElementById('tolocation').value;
		   var time=document.getElementById('timestart').value;
		   var date=document.getElementById('datepicker').value;
           $.post('../homepage/user.php',{func:'findpool',cityto:tocity,cityfrom:fromcity,locationfrom:fromlocation,locationto:tolocation,time1:time,date1:date},function(data){
		       document.getElementById('carsearch').innerHTML=data;
		   });  
		});
		//Booking of a new car pool 
        $("#bookpool").live('click',function() {
           // alert('book is clicked');
           //var travelid=$("#radio :radio:checked").attr('id');
           
           var travelid = $('input:radio[name=choosepool]:checked').val();
           //alert('selected  travel id is'+travelid);
           if (confirm('Are You Sure TO Book The Selected CarPool')) { 
			 // do things if OK
			 $.post('../homepage/user.php',{func:'bookpool',travel:travelid},function(data){
		       alert(data);
		       window.location='index.php';
		   });
		}     
	 	});

		/*$("input:radio[name=choosepool]").live('click',function (){
		    var somval = $(this).val();  
		    alert(somval);
        });*/
        
        //Showing  a list of pools which a user can book
        $("#showpool").live('click',function() {
            //alert('book is clicked');
           //var travelid=$("#radio :radio:checked").attr('id');
           
           var travelid = $('input:radio[name=choosecar]:checked').val();
           //alert('selected  travel id is'+travelid);
			 // do things if OK
			 $.post('../homepage/user.php',{func:'showpool',travel:travelid},function(data){
		       document.getElementById('profile').innerHTML=data;
		   });     
	 	});
	 	$("#goback").live('click',function() {
           			 // do things if OK
			 $.post('../homepage/user.php',{func:'goback'},function(data){
		       document.getElementById('profile').innerHTML=data;
		   });     
	 	});


      });
</script>
       
</head>
<!--Main body part of user dashboard page-->
<body>

<div id="totalbody">
<?php
	require('../../include/userheader.php');
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
<!--show user manu bar-->
<div id="mainbody">
<div id="menu">
<ul >
<li id="carreg">Register A Car</li>
<li id="searchcar">Search Car</li>
<li id="myprof">Registerd Carpools</li>
</ul>
</div>
<!--show content according to user selected tab--> 
<div id="showcontent">
<!--register new ride Tab user can post a new ride -->
<div id="registercar">

			<div id="search" style="height:353px;">
<!--Form for new ride registeration--> 
			<table border="0" cellspacing="15px">
			<tr style="font-size:2em; color:#D04946;float:right" >Post Your Ride</tr>
			<tr>
			<td>From City</td>
			<td><input type="text" id="cityfrom" name="cityfrom"/></td>
			<td>Location</td>
			<td><input type="text" id="locationfrom" name="locationfrom"/></td>
			</tr>
			<tr>
			<td>To City</td>
			<td><input type="text" id="cityto" name="cityto"/></td>
			<td>Location</td>
			<td><input type="text" id="locationto" name="locationto"/></td>
			
			</tr>
			<tr>
			<td>Start Time</td>
			<td><input type="time" id="starttime"/></td>
			<td>Date</td>
			<td><input type="date" id="pickdate" name="date"/></td>
			</tr>
			<tr>
			<td>No Of Seats</td>
			<td><input type="text" id="seats"/></td>
            <td>Total Time Of Travel</td>
            <td><input type="time" id="totaltime"/></td>
			</tr>
			<tr>
			<td>Car Owner</td>
			<td><input type="text" id="owner"/></td>
            <td>Car Type</td>
            <td><input type="text" id="cartype"/></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			<!--<td><img src="../../images/startpool.png" class="poolstart"></td>-->
			<td><input type="submit" value="Post Ride" src="../../images/findpool.png" class="findpool" id="postride"/></td>
			</tr>
			</table>
			
			<div id="posted">
			</div>
			</div>


</div>
<!--car search for user & can book the ride by selecting one of them-->
<div id="carsearch">
			<div id="search">
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
			<td><input type="time" id="timestart"/></td>
			<td>Date</td>
			<td><input type="date" id="datepicker" name="date"/></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			<!--<td><img src="../../images/startpool.png" class="poolstart"></td>-->
			<td><input type="submit" value="Find Pool" src="../../images/findpool.png" class="findpool" id="poolfind"/></td>
			</tr>
			</table>
			</div>
			<div id="list">
			</div>

</div>
<!--user profile page for the rides which he registerd and containg all the information users who booked a particular ride-->
<div id="profile">
           <?php
           include '../../include/dbconnect.php';
           //session_start();
	        $data="select * from users where email='".$_SESSION['username']."'";
			$result=mysql_query($data);
	        $row=mysql_fetch_assoc($result);
			$_SESSION['userid']=$row['userid'];  
	        $userid=$_SESSION['userid'];
	        //echo $userid;
            $query=mysql_query("select * from travel where userid=".$userid);
		    $pools=mysql_num_rows($query);
	        echo '<table border="1px solid black" style="margin-left:auto;margin-right:auto;margin-top:30px;">';
		    echo '<tr><th>select</th><th>Travelid</th><th>From</th><th>Destination</th><th>date</th><th>starttime</th></tr>';
		      while($row=mysql_fetch_assoc($query))
		      {
		        //echo $pools;
		        echo "<tr><td><input type='radio' name='choosecar' value='".$row['travelid']."'/></td><td>".$row['travelid']."</td><td>".$row['fromcity']."</td><td>".$row['tocity']."</td><td>".$row['date']."</td><td>".$row['starttime']."</td></tr>";
		      }
		    echo '</table>';
	        echo '<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Show Detail" src="../../images/findpool.png" class="findpool" id="showpool"/>' ;
           ?>		    
</div>
</div>
</div>
<hr/>
<br/>
<!--Footer part of user dashboard page-->
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
<!--
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
  </script>-->
</body>

</html>
