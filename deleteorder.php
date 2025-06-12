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
	   $var1=$_GET['data1'];
       $conn=mysql_connect('localhost','root','');
	   if(!$conn)
	      die('Could not connect database'.mysql_error());
	   mysql_select_db('bsc31319');
	   $sql1="SELECT * FROM `order` WHERE oid='$var'";
	   $retval1=mysql_query($sql1,$conn);
	   $row=mysql_fetch_array($retval1);
	   $cid=$row[cid];
	   if(!$retval1)
	      die('Something Error'.mysql_error());
	   else
	   {
	      $odate=$row[odate];
		  $date=strtotime($odate);
		  $sysdate=strtotime(date('d-m-Y'));
		  $diff=$sysdate-$date;
		  $final=ceil($diff/86400);
		  if($final<3)
		  {
	         $sql2="SELECT * FROM `cart` WHERE cid='$cid'";
		     $retval2=mysql_query($sql2,$conn);
		     $row1=mysql_fetch_array($retval2);
		     $mid=$row1[mid];
		     $quantity=$row1[quantity];
		     $sql3="SELECT * FROM `mobile` WHERE mid='$mid'";
		     $retval3=mysql_query($sql3,$conn);
		     $row2=mysql_fetch_array($retval3);
		     $mobquantity=$row2[mobilequantity];
		     $mobqua=$mobquantity+$quantity;
	         $sql4="UPDATE `mobile`
		     SET mobilequantity='$mobqua'
		     WHERE mid='$mid'";	
		     $retval4=mysql_query($sql4,$conn); 
		     header('location:orderdisplay.php');
	         $sql5="UPDATE `order`
		     SET ostatus='2'
		     WHERE oid='$var'";
		     $retval5=mysql_query($sql5,$conn);
		  }
	      else
		  {
		     echo"<strong><b><center>YOUR ORDER CANCELLATION TIME HAS BEEN ELAPSED...</center></b></strong>";
		  }
	 }
	   mysql_close($conn);
?>
</body>
</html>
