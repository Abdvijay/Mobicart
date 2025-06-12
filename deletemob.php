<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DELETE MOB</title>
</head>

<body>
<?php
       session_start();
	   $uid=$_SESSION[uid];
       $var=$_GET['data'];
       $conn=mysql_connect('localhost','root','');
	   if(!$conn)
	      die('Could not connect database'.mysql_error());
	   mysql_select_db('bsc31319');
	   $sql="DELETE FROM cart WHERE cid='$var'";
	   $retval=mysql_query($sql,$conn);
	   if(!$retval)
	      die('Something Error'.mysql_error());
	   header('location:shoppingcart.php');
	   mysql_close($conn);
?>
</body>
</html>
