 function validateform(){        
       if(checkfnname()&&checklnname()&&checkpassword()&&checkcfpassword()&&checkemail())
       {  
       var pass= document.getElementById('passwordval').value;
       var fname = document.getElementById('fnval').value;
       var lname = document.getElementById('lnval').value;
       var eid = document.getElementById('emailme').value;
       $.post('useraval.php',{func:'formsubmit',password:pass,firstname:fname,lastname:lname,email:eid},function(data){
       alert(data),
       window.location='register.php';
       });
       }
       
    }
    function checkpassword()
    {
    
      var pass= document.getElementById('passwordval').value;
      if (pass.length < 5) {
            document.getElementById('checkpassword').innerHTML = "minimum length is 5";
            document.getElementById('passwordval').value = "";
            document.getElementById('cfpasswordval').value = "";
            return false;
        }
        else{
           document.getElementById('checkpassword').innerHTML = "";
           return true;
        }
    }
    function checkcfpassword()
    {
      var pass = document.getElementById('passwordval').value;
      var cfpassword = document.getElementById('cfpasswordval').value;
      if (pass != cfpassword) {
            document.getElementById('checkcfpassword').innerHTML = "password not match";
            document.getElementById('passwordval').value = "";
            document.getElementById('cfpasswordval').value = "";
            return false;
        }
     else{
           document.getElementById('checkcfpassword').innerHTML = "";
           return true;
        }
        
    }
    function checkfnname()
    {
      var firstname = document.getElementById('fnval').value;
       var splChars = "*|,\":<>[]{}`\';()@&$#%";
        for (var i = 0; i < firstname.length; i++) {
            if (splChars.indexOf(firstname.charAt(i)) != -1) {
               document.getElementById('checkfn').innerHTML = 'special chracter not allowed';
                return false;
                
            }
           else{
             document.getElementById('checkfn').innerHTML = "";
            
            }
        }
        return true;
     }
    function checklnname()
    {
       var lastname = document.getElementById('lnval').value;
       var splChars = "*|,\":<>[]{}`\';()@&$#%";
        for (var i = 0; i < lastname.length; i++) {
            if (splChars.indexOf(lastname.charAt(i)) != -1) {
               
                document.getElementById('checkln').innerHTML = 'special chracter not allowed';
                return false;
            }
             else{
             document.getElementById('checkln').innerHTML = "";
            }
        }
        return true;
    }
   function checkemail(){
   var eid = document.getElementById('emailme').value;
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(eid) == false) {
            document.getElementById('checkemail').innerHTML = "email is not proper";
            document.getElementById('emailval').value = "";
            return false;   
        }
        
        else{
           document.getElementById('checkemail').innerHTML = "";
           $.post('useraval.php',{func:'email',password:'',firstname:'',lastname:'',email:eid,pic:''},function(data){
           document.getElementById('checkemail').innerHTML=data;
          });
          if(document.getElementById('checkemail').innerHTML=="<span style='color:green'>Available</span>")
          {
              return true;
          }
          else{
          return true;
          }
        }
}

       function clearfn()
	    { 
	       document.getElementById('checkfn').innerHTML="";
	    } 
	    function clearln()
	    { 
	       document.getElementById('checkln').innerHTML="";
	    } 
	    function clearemail()
	    { 
	       document.getElementById('checkemail').innerHTML="";
	    } 
	    function clearpassword()
	    { 
	       document.getElementById('checkpassword').innerHTML="";
	    } 
	    function clearcfpassword()
	    { 
	       document.getElementById('checkcfpassword').innerHTML="";
	    } 
	    
        function resetme()
        {
          if(checkpassword()&&checkcfpassword())
	       { 
	       var userid= document.getElementById('userid').value; 
	       var pass= document.getElementById('passwordval').value;
	       $.post('../register/useraval.php',{func:'reset',email:'',password:pass,firstname:'',lastname:'',pic:'',uid:userid},function(data){
	       alert(data),
	       window.location='reset_password.php'
	       });
	      }

        }         
 

