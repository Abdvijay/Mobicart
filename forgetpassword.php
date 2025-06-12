<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>FORGET PASSWORD</title>
<link rel="stylesheet" type="text/css" href="flogin.css">
</head>
<marquee div="marquee"></marquee>
<body>
   <marquee style="color:#FBC82D;font-style: oblique;font-weight: bold;">* Mobicart-An Idependent Mobile Selling Platform</marquee>
   <h1>Mobicart-Your Mobile Destination</h1>

   <form class="box" method="post" action="forgetpassword.php">
   <h2>CHANGE PASSWORD</h2>
   <input type="email" name="mailid" placeholder="Enter MailID" required/>
   <input type="password" name="newpassword" placeholder="Enter New-Password" required/>
   <input type="password" name="confirmpassword" placeholder="Enter Confirm-Password" required/>
   <input type="submit" name="submit" value="CHANGE PASSWORD" />
   <a href="loginform.php">Back To Login ?</a>&nbsp;&nbsp;&nbsp;
   
  
   </form></center>
<?php
   if($_POST)
   {  
      $mailid=$_POST['mailid'];
	  $newpassword=$_POST['newpassword'];
	  $confirmpassword=$_POST['confirmpassword'];
	  $conn=mysql_connect('localhost','root','');
	  if(!$conn)
		 die("Could Not Connect Database".mysql_error());
	  mysql_select_db("bsc31319");
	  $sql="SELECT * FROM user WHERE mailid='$mailid'";
	  $data=mysql_query($sql,$conn);
	  if(mysql_num_rows($data)==1)
	  {
	     if($confirmpassword==$newpassword)
	     {
		    $sql="UPDATE user
		    SET password='$newpassword'
			WHERE mailid='$mailid'";
			$retval=mysql_query($sql,$conn);
			if(!$retval)
			   die("<center><h2>OOPS! SOMETHING ERROR IN YOUR SUBMISSION".mysql_error());
			else
			   echo"<center><h2>YOUR PASSWORD CHANGED SUCCESSFULLY";
	     }
	    else
		       echo"<center><h2>DOESN'T MATCH YOUR NEW PASSWORD WITH YOUR CONFIRM PASSWORD";
	   }
	   else
	      echo "<center><h2>INVALID MAIL IS ENTERED !";	   
      mysql_close($conn);
   }
?>
</body>
</html>
