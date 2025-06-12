<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="login1.css">
<title>NEW USER</title>
</head>

<body>
	<h1 class="head">Mobi</h1><h1 class="head1">Cart</h1>
	<p class="header">Please Register Yourself To Join With Us ! Let's Start Your Mobile Journey with Mobicart ! An Independent Mobile Selling Platform !</p>
	
  <form class="box" method="post" action="newlogin.php">
  	<h2>Sign UP</h2>
   <input type="text" name="username" placeholder="Enter Username" required />
   <input type="email" name="emailid" placeholder="Enter E-mail" required />
    <input type="text" name="phoneno" placeholder="Enter Phone" required />
	<input type="password" name="password" placeholder="Enter Password" required /></td></td></tr>
	<input type="submit" name="submit" value="REGISTER" />
	<a href="loginform.php">Already a User ?</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="homeframe.html">Back To Home ?</a>
   </form>
<?php
   if($_POST)
   {
      $username=$_POST['username'];
	  $mailid=$_POST['emailid'];
	  $phoneno=$_POST['phoneno'];
	  $password=$_POST['password'];
	  $conn=mysql_connect('localhost','root','');
	  if(!$conn)
	     die("Could not Connect Database".mysql_error());
	  mysql_select_db('bsc31319');
	  if(!empty($username)&&!empty($mailid)&&!empty($phoneno)&&!empty($password))
	  {
	     $sql="INSERT INTO user(username,mailid,phoneno,password)
	     VALUES('$username','$mailid','$phoneno','$password')";
	     $retval=mysql_query($sql,$conn);
	     if(!$retval)
	        die("<center><strong><h2>Could Not Insert Data".mysql_error());
	     else
	        header('location:new.html');
	  }
	  else
	  {
	     echo "<center><h2><strong>Please Enter All The Things...";
	  }
	  mysql_close($conn);
  }
?>
</body>
</html>
