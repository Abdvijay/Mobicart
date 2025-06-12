<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MOBILE BRAND LINK</title>
</head>
<caption><center><h2>MOBILES</h2></center></caption>
<body>
<?php
       $var=$_GET['data'];
       $conn=mysql_connect('localhost','root','');
	   if(!$conn)
	      die('Could not connect database'.mysql_error());
	   mysql_select_db('bsc31319');
	   $sql="SELECT mobilebrand,mobilename,mobilecolor,mobileram,mobilerom,mobileprice FROM mobile WHERE mobilebrand='$var'";
	   $retval=mysql_query($sql,$conn);
	   if($retval)
	   {
	      while($row=mysql_fetch_array($retval))
	      {
	         echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><strong>{$row[mobilebrand]}</strong></b><br>";
			 echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row[mobilename]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		     echo"&nbsp;&nbsp;&nbsp;&nbsp;{$row[mobileram]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row[mobilerom]}<br>&nbsp;&nbsp;&nbsp;&nbsp;{$row[mobilecolor]}";
		     echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row[mobileprice]}<br>";
			 ?>
		     <b><a href='description.php?data=<?php echo $row['mobilename'];?>'>DESCRIPTION</a></b>&nbsp;&nbsp;&nbsp;
			 <b><a href='addtocart.php?data1=<?php echo $row['mobilename'];?>'>ADD TO CART</a></b>
		  <?php 
		  }
	   } 
	   mysql_close($conn);
?>
<strong><br /><br /><center><a href='defaultmobilesbrand.php'>BACK</a></center></strong>
</body>
</html>
