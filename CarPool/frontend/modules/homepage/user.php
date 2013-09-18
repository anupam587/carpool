<?php
//including database connecting file
include '../../include/dbconnect.php';
//login module ajax
if($_POST['func']=='validate'){
		$user=$_POST['email'];
		$pass=md5($_POST['password']);
		$data="select * from users where email='$user' && password='$pass'";
		$result=mysql_query($data);
		if(mysql_num_rows($result)==1)
		{
		echo "aviliable";
		session_start();
		$_SESSION['username']=$_POST['email'];
		//$row=mysql_fetch_assoc($result);
		//$_SESSION['userid']=$row['userid'];
		}
		else{
		echo "username & password is wrong";
		}
}
//post of a new ride 
else if($_POST['func']=='postride')
{ 
        $travelid=rand(111111111,9999999999);
        session_start();
        $_SESSION['username'];
        $data="select * from users where email='".$_SESSION['username']."'";
		$result=mysql_query($data);
        $row=mysql_fetch_assoc($result);
		$userid=$row['userid'];  
        
        if(mysql_query("insert into travel values($travelid,$userid,'".$_POST['cityfrom']."','".$_POST['locationfrom']."','".$_POST['time1']."','".$_POST['cityto']."','".$_POST['locationto']."','".$_POST['totaltime']."','".$_POST['date1']."','".$_POST['cartype1']."','".$_POST['carowner']."',".$_POST['seat1'].") "))
        {
           echo "Your New Ride is Successfully Posted";
        }
        else{
        echo "Form Is Not Filled Completely Every Field is necessary to be filled \n           OR\n\nDatabase Connection Problem";
        }
}
//Searching for a new pool
else if($_POST['func']=='findpool')
{
		if($_POST['locationfrom']==null||$_POST['cityfrom']==null||$_POST['locationto']==null||$_POST['cityto']==null)
		    {
		     echo "You haven't filled the form completely"; 
		    }
		    $startloc=$_POST['locationfrom'];
		    $startcity=$_POST['cityfrom'];
		    $destloc=$_POST['locationto'];
		    $destcity=$_POST['cityto'];
		    $date=$_POST['date1'];
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
		    echo '<tr><th>select</th><th>From</th><th>Destination</th><th>Time</th><th>date</th><th>totaltime</th><th>Carowner</th><th>Cartype</th><th>No of seats</th></tr>';
		      while($row=mysql_fetch_assoc($query))
		      {
		        //echo $pools;
		        echo "<tr><td><input type='radio' name='choosepool' value='".$row['travelid']."'/></td><td>".$row['fromlocation']."</td><td>".$row['tolocation']."</td><td>".$row['starttime']."</td><td>".$row['date']."</td><td>".$row['totaltime']."</td><td>".$row['carowner']."</td><td>".$row['cartype']."</td><td>".$row['noofseats']."</td></tr>";
		      }
		    echo '</table>';
		    echo '<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Book Pool" src="../../images/findpool.png" class="findpool" id="bookpool"/>' ;
           }
}
//Book a New Pool
else if($_POST['func']=='bookpool')
{ 
        session_start();
        $travelid=$_POST['travel'];
        $bookid=rand(111111111,9999999999);
        $_SESSION['username'];
        $data="select * from users where email='".$_SESSION['username']."'";
		$result=mysql_query($data);
        $row=mysql_fetch_assoc($result);
		$_SESSION['userid']=$row['userid'];  
        $userid=$_SESSION['userid'];
        $data1="select * from travel where travelid='".$travelid."'";
		$result1=mysql_query($data1);
        $row1=mysql_fetch_assoc($result1);
        $seats=$row1['noofseats'];
        if(mysql_query("insert into bookuser values($bookid,$travelid,$userid)"))
        {
           $seats=$seats-1;
           mysql_query("update travel set noofseats=".$seats." where travelid=".$travelid);
           echo "Your Seat is Successfully Booked";
        }
        else{
        echo "You Have Not Selected any car\n           OR\n\nDatabase Connection Problem";
        }
}
//show all the carpool registered for a journey
else if($_POST['func']=='showpool')
{ 
        session_start();
        $travelid=$_POST['travel'];
        $_SESSION['username'];
        $data="select * from bookuser where travelid=".$travelid;
		$result=mysql_query($data);
		//$row=mysql_fetch_assoc($result);
		//echo $row['userid'];
		$num=mysql_num_rows($result);
        echo 'No of Seats booked is : '.$num."<br/><br/>";
        echo "user details of Booked Users are as Follows<br/>";
        echo '<table border="1px solid black" style="margin-left:auto;margin-right:auto;margin-top:30px;">';
		echo '<tr><th>Serial No</th><th>Firstname</th><th>Lastname</th><th>Emailid</th></tr>';
        $no=0;
        while($row=mysql_fetch_assoc($result))
        {  
           $no++;
            $user=$row['userid'];
	        $data="select * from users where userid=111111";
			$result=mysql_query($data);
			//$num=mysql_num_rows($result);
	        $row=mysql_fetch_assoc($result);
  		   echo "<tr><td>".$no."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td></tr>";
        }
        echo '</table>';
		    echo '<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Back" src="../../images/findpool.png" class="findpool" id="goback"/>' ;
		}
//goback button implemantation		
else if($_POST['func']=='goback')
{
           session_start();
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
          
}

?>