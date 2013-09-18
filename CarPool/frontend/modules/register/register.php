<!--User Registeration Page-->
<!DOCTYPE html>
<!--Head Part of Registeration caontaing all style Information-->
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Register-CarPool</title>

<link rel="shortcut icon" type="image/x-icon" href=""/>
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/register/register.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../../css/default.css"/>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<!--internal styling of some common elemnts(signup,emailid)-->
<style type="text/css">
  #signup .input-text{
	width:198px;
	background-color:white;
   }
  #emailval{
	margin-top:0px;
	margin-left:-37px;
    }
    
</style>
<script   src="../../js/jquery-1.9.0.js"  language="javascript"  type="text/javascript" ></script>
<script   src="../../js/validateform.js"  language="javascript"  type="text/javascript" ></script>
<script src="../../js/jquery-1.8.3.js"></script>
<script src="../../js/jquery-ui.js"></script>
<!--clinetside scripting login and registeration module-->
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("#signin").click(function() {
			  $('#signup').toggle();
		});
		$("#login").click(function() {
           var pass=document.getElementById('passval').value;
		   var eid=document.getElementById('emailval').value;
		   $.post('../homepage/user.php',{func:'validate',email:eid,password:pass},function(data){
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
<!--Main Body part of Registeation page-->
<body>

<div id="totalbody" style="margin-top:-48px">
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
<div id="home-wrapper">
	<!-- <img id="slider" src="images/olive-oil.jpg"/> -->
	<br/><br/><br/><br/><br/><br/>
	<?php define ('MAX_FILE_SIZE', 1024 * 2000); ?>
  
	<div class="signup">
	<div id="signup1">Sign Up</div>
	</div>
	
	<!--
     <script language="javascript" type="text/javascript">
       upclick(
         {
          element: 'uploader',
          action: 'about:blank',
          onstart:
            function(filename)
            {
              alert('IMG: Start upload: '+filename);
              $('#uploader').attr('src',)
            },
          oncomplete:
            function(response_data)
            {
              alert('IMG: Complete: '+response_data);
            }
         });
    </script>
    -->
<!--Registeration Form For user Profile-->    
	<div class="center-div">	
		
		<div class="div1">
		<form action="" method="post">
		<br/><br/><br/>
		<table cellspacing="4px">
		<tr>
		<td><label>First name</label></td>
		<td><input type="text" class="input-text" placeholder=" First name" id="fnval" onfocusout="checkfnname()" onfocusin="clearfn()" required /></td>
		</tr>
		
		<tr>
		<td></td>
		<td id="checkfn" class="validate"></td>
		</tr>
		<tr class="tr1"></tr>
		<tr>
		<td><label>Last name</label></td>
		<td><input type="text" class="input-text" placeholder=" Last name" id="lnval" onfocusout="checklnname()" onfocusin="clearln()" required/></td>
		</tr>
		
		<tr>
		<td></td>
		<td id="checkln" class="validate"></td>
		</tr>
        <tr class="tr1"></tr>

		<tr>
		<td><label>Email</label></td>
		<td><input type="email" class="input-text" placeholder=" Email" id="emailme" onfocusout="checkemail()" onfocusin="clearemail()"  required/></td>
        </tr>
        
        <tr>
		<td></td>
		<td id="checkemail" class="validate"></td>
		</tr>
        <tr class="tr1"></tr>

        <tr>
		<td><label>Password</label></td>
		<td><input type="password" class="input-text" placeholder=" Password" id="passwordval" onfocusout="checkpassword()" onfocusin="clearpassword()"  required/></td>
        </tr> 
        
        <tr>
		<td></td>
		<td id="checkpassword" class="validate"></td>
		</tr>
        <tr class="tr1"></tr>

        <tr>
		<td><label>Confirm password</label></td>
		<td><input type="password" class="input-text" placeholder=" Confirm password" id="cfpasswordval" onfocusout="checkcfpassword()" onfocusin="clearcfpassword()"  required/></td>
		</tr>
		
		<tr>
		<td></td>
		<td id="checkcfpassword" class="validate"></td>
		</tr>
        
		
		<!--
		<div id="captcha-wrap">
		<div class="captcha-box">
			<img src="http://demos.99points.info/recaptcha_like_captcha/get_captcha.php" alt="" id="captcha" />
		</div>
		<div class="text-box">
			<label>Type the two words:</label>
			<input name="captcha-code" type="text" id="captcha-code"/>
		</div>
		<div class="captcha-action">
			<img src="refresh.jpg"  alt="" id="captcha-refresh" />
		</div>
	    </div>	
       -->
        </table>
		<input type="button" class="button" value="Register" onclick="validateform()"/>
		</form>
		<label id="validate"></label>
		</div>
		
			</div>	
<div class="clear"></div>
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
</div>
-->
<!--Footer of Registeration Page-->
<?php
	require('../../include/footer.php');
?>
</div>
</body>

</html>
