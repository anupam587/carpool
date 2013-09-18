<?php
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["Filedata"]["name"]));
$message="";
if(isset($_GET['type']) && $_GET['type']=="Images")
{
	if (($_FILES["Filedata"]["type"] == "image/gif")
	|| ($_FILES["Filedata"]["type"] == "image/jpeg")
	|| ($_FILES["Filedata"]["type"] == "image/jpg")
	|| ($_FILES["Filedata"]["type"] == "image/png")
	|| ($_FILES["Filedata"]["type"] == "image/pjpeg"))
	{
	  $path = "../../upload/users/";
	}
	else
	  {
	  $message="Invalid file";
	  }
}
else
{
	$path = "../../upload/users/";
}

	  $filename = time().$_FILES["Filedata"]["name"];
	  if ($_FILES["Filedata"]["error"] < 0)
	    {
	    $message="Return Code: " . $_FILES["Filedata"]["error"] . "<br />";
	    }
	  else
	    {
	    /*echo "Filedata: " . $_FILES["Filedata"]["name"] . "<br />";
	    echo "Type: " . $_FILES["Filedata"]["type"] . "<br />";
	    echo "Size: " . ($_FILES["Filedata"]["size"] / 1024) . " Kb<br />";
	    echo "Temp file: " . $_FILES["Filedata"]["tmp_name"] . "<br />";*/
		
	    if (file_exists($path . $_FILES["Filedata"]["name"]))
	      {
	      $message=$filename. " already exists. ";
	      }
	    else
	      {
	      move_uploaded_file($_FILES["Filedata"]["tmp_name"],
	      $path . $filename);
	     // echo "Stored in: " . "../../../Filedatas/pictures/ad-management/" . $_FILES["Filedata"]["name"];
	     echo $filename;
	      }
	    }


?>
