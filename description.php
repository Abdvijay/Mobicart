<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DESCRIPTION</title>
<style>
   .sty{
		text-transform: uppercase;
		font-weight: 22px;
		font-size: 18px;
   } 
</style>
</head>
<caption><center><h2>DESCRIPTION</h2></center></caption>
<hr /><br /><br />
<body>
<?php
      $conn=mysql_connect('localhost','root','');
	  $var=$_GET['data'];
	  if(!$conn)
	     die('Could not connect database'.mysql_error());
	  mysql_select_db('bsc31319');
	  $sql="SELECT mobilebrand,mobilename,mobiledisplay,mobilecamera,mobilebattery,mobilesoc,mobilecolor,mobileram,mobilerom,mobileprice FROM mobile WHERE mobilename='$var'";
	  $retval=mysql_query($sql,$conn);
	  $row=mysql_fetch_array($retval);
	  echo"<div class='sty'>";
	  if($retval)
	  {
	         echo "<table cellspacing='5' cellpadding='10'>";
		     echo "<tr><td>MOBILE BRAND     :<td>{$row[mobilebrand]}"; 
			 echo "<tr><td>MOBILE NAME      :<td>{$row[mobilename]}"; 
			 echo "<tr><td>MOBILE DISPLAY   :<td>{$row[mobiledisplay]}"; 
			 echo "<tr><td>MOBILE CAMERA    :<td>{$row[mobilecamera]}"; 
		     echo "<tr><td>MOBILE BATTERY   :<td>{$row[mobilebattery]}"; 
			 echo "<tr><td>MOBILE PROCESSOR :<td>{$row[mobilesoc]}"; 
			 echo "<tr><td>MOBILE COLOR     :<td>{$row[mobilecolor]}"; 
		     echo "<tr><td>MOBILE RAM       :<td>{$row[mobileram]}"; 
		     echo "<tr><td>MOBILE ROM       :<td>{$row[mobilerom]}"; 
			 echo "<tr><td>MOBILE PRICE     :<td>{$row[mobileprice]}";
			 echo "</table>";  
	  }
	  echo"</div>";
	  mysql_close($conn);
?>
<center><caption><a href="defaultmobilesbrand.php">BACK</a></caption></center>
</body>
</html>
