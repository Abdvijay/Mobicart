<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>order</title>
</head>

<body>
<caption><b><h3>ORDERED PRODUCTS</h3></b></caption>
<?php
      session_start();
	  $uid=$_SESSION[uid];
	  $conn=mysql_connect('localhost','root','');
	  if(!$conn)
	     die('Could not connect database'.mysql_error());
	  mysql_select_db('bsc31319');
	  $sql="SELECT * FROM order WHERE uid='$uid'";
	  $retval=mysql_query($sql,$conn);
	  $row=mysql_fetch_array($retval);
	  $n=mysql_num_rows($retval);
	  echo"$n";
	  echo"<center><table border='4' cellpadding='15' cellspacing='5'>";
	  echo"<tr><TH>MOBILE ID<TH>MOBILE BRAND<TH>MOBILE NAME<TH>MOBILE COLOR<TH>MOBILE RAM<TH>MOBILE ROM<TH>MOBILE PRICE<TH>QUANTITY<TH>AMOUNT<TH>DOOR NO<TH>STREET<TH>PLACE<TH>DISTRICT<TH>PINCODE<TH>LANDMARK<TH>PAYMENT<TH>ACTION</tr>";
	  if($retval)
	  {
	     do
		 {
	     $dno=$row[dno];
	     $street=$row[street];
	     $district=$row[district];
	     $place=$row[place];
         $pincode=$row[pincode];
         $landmark=$row[landmark];
         $payment="Cash On Delivery";
		 $sql1="SELECT * FROM `cart` WHERE uid='$uid' AND mobstatus='1'";
		 $retval1=mysql_query($sql1,$conn);
		 $row1=mysql_fetch_array($retval1);
		 if($retval1)
		 {
		    $mid=$row1[mid];
			$sql2="SELECT * FROM mobile WHERE mid='$mid'";
		    $retval2=mysql_query($sql2,$conn);
			$row2=mysql_fetch_array($retval2);
			if($retval2)
			{
			   $mobprice=$row2[mobileprice];
		       $mobbrand=$row2[mobilebrand];
		       $mobname=$row2[mobilename];
		       $mobcolor=$row2[mobilecolor];
		       $mobram=$row2[mobileram];
		       $mobrom=$row2[mobilerom];
		       $quantity=$row1[quantity];
		       $amount=$row1[totalamount];
			}
		    else
			{
			   die('Error hii'.mysql_error());
			}
		 }
		 else
		 {
		    die('Error hellow'.mysql_error());
		 }
		 }while($row=mysql_fetch_array($retval));
	 }
	 else
	 {
	    die('Error bye'.mysql_error());
	 }
	  mysql_close($conn);
?>
</body>
</html>
