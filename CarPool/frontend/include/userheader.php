<?php
include 'dbconnect.php';
session_start();
//echo $_SESSION['username'];
if(empty($_SESSION['username']))
{
  header('Location:../homepage/index.php');
}
else{
$data ="select * from users where email='".$_SESSION['username']."'";

$result=mysql_query($data,$con);
$row=mysql_fetch_assoc($result);
echo  
 '
 <div id="header">
<div id="logo">
<img src="http://localhost/CarPool/frontend/images/logo.png" width="250px" height="70px"/>
</div>
<div id="headright">
<div id="register">
<ul>
<li class="register" style="display:inline;list-style-type:none"><label id="username">Welcome  '.$row["firstname"].'</label></li>
<li class="register" id="session-logout" style="display:inline;list-style-type:none;margin-left:50px;font-size: 1.3em;color: rgb(0, 194, 255);cursor: pointer;">Logout</li>
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
';
 }
?>