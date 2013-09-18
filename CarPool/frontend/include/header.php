<?php
include ('dbconnect.php');

echo '<div id="header">
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
            <br/>
			<div id="authlabel"></div>
			</div>
		  </div>
	   </div>	
	</div>
<div id="navigation">
<nav>
<a href="../homepage/index.php"><img src="http://localhost/CarPool/frontend/images/home.png" width="50px" height="50px"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

?>