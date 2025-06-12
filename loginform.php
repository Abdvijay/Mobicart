<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LOGIN FORM</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body> 
	<marquee style="color:#FBC82D;font-style: oblique;font-weight: bold;">* Please Login To get More Access!</marquee>
<form class="box" method="post" action="loginform.php">
<h2>LOGIN FORM</h2>
   <form class="box" method="post" action="loginform.php">
      <input type="text" name="username" placeholder="Enter Username"  required />
	  <input type="password" name="password" placeholder="Enter Password" required />
      <input type="submit" name="submit" value="LOGIN" />
      <a href="forgetpassword.php">Forget Password ?</a>&nbsp;&nbsp;&nbsp;
      <a href="newlogin.php">Sign Up ?</a>
    </form>
    <section>
    	<h1>Mobicart-Your Mobile Destination</h1>
    </section>

</body>
</html>
<?php
   session_start();
   if($_POST)
   {
      $username=$_POST['username'];
	  $password=$_POST['password'];
	  if(!empty($username)&&!empty($password))
	  {
	     $conn=mysql_connect('localhost','root','');
	     if(!$conn)
	        die('Could not connect database'.mysql_error());
	     mysql_select_db("bsc31319");
	    $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
	    $retval=mysql_query($sql,$conn);
	    if(mysql_num_rows($retval)==1)
	    {
	    	$row=mysql_fetch_array($retval);
	    	$_SESSION['uid']=$row['uid'];
	    	$_SESSION['username']=$row['username'];
	    	if($_SESSION['username']=="admin")
	    	{
	    		header('location:homes.php');
	    	}
	    	else{
	        header('location:homeframe.html');
	        }
	    }
	    else
	    	echo"Username and Password Error !";
	}
	else
		echo "Enter Your Username and Password";
}
?>
</body>
