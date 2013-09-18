<?php
    $con = mysql_connect("localhost","root","anupam");
    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("carpool", $con);
    
?>
