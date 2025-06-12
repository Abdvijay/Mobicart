<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>order form</title>
</head>

<body><h2><center><strong><caption>ORDER FORM</caption></strong></h2>
   <form method="post"><center>
   <table>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>DNo<td><input type="text" name="dno" placeholder="Enter Doorno" required /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>Street<td><input type="text" name="street" placeholder="Enter Street" required /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>Place<td><input type="text" name="place" placeholder="Enter Place" required /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>Pincode<td><input type="text" name="pincode" placeholder="Enter Pincode" required /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>District<td><input type="text" name="district" placeholder="Enter District" required /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>Landmark<td><input type="text" name="landmark" placeholder="Enter Landmark" required /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <tr><td>Payment<td><input type="text" name="payment" value="Cash On Delivery" readonly="1" /></td></td>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   </table><br />
   <input type="submit" name="submit" value="ORDER" />&nbsp;&nbsp;&nbsp;
   <input type="reset" name="reset" value="RESET" /><br /><br />
   </form>
<?php
if($_POST)
{
   session_start();
   $dno=$_POST['dno'];
   $street=$_POST['street'];
   $place=$_POST['place'];
   $district=$_POST['district'];
   $pincode=$_POST['pincode'];
   $landmark=$_POST['landmark']; 
   $uid=$_SESSION[uid];
   /*$quantity=$_SESSION[quantity];
   $amount=$_SESSION[amount];*/
   $conn=mysql_connect('localhost','root','');
   if(!$conn)
	   die("Could not connect Database".mysql_error());
   mysql_select_db('bsc31319');
   $sql="SELECT * FROM cart WHERE uid='$uid' AND mobstatus='0'";
   $retval=mysql_query($sql,$conn);
   //$row=mysql_fetch_array($retval);
   if(!empty($dno)&&!empty($street)&&!empty($place)&&!empty($pincode)&&!empty($district)&&!empty($landmark))
   {
			 while($row=mysql_fetch_array($retval))
			 {
			    $mid=$row[mid];
				$sql4="SELECT mobilequantity FROM mobile WHERE mid='$mid'";
				$ret4=mysql_query($sql4,$conn);
				$row4=mysql_fetch_array($ret4);
				$mobilequantity=$row4[mobilequantity];
			    $cid=$row[cid];
				$quantity=$row[quantity];
				$mobqua=$mobilequantity-$quantity;
				echo"$mobilequantity<br>";
				echo"$quantity<br>";
				echo"$mobqua<bR>";
		        $sql1="INSERT INTO `bsc31319`.`order` (`dno` ,`street` ,`landmark` ,`place` ,`district` ,`pincode` ,`cid` ,`uid` ,`ostatus`)VALUES ('$dno' , '$street', '$landmark', '$place', '$district', '$pincode', '$cid', '$uid', '1')" ;
		        $retval1=mysql_query($sql1,$conn);
		        if(!$retval1)
		           die("Something Error! in your submission".mysql_error());
				else{
				   $row5=mysql_fetch_array($retval1);
				   $oid=$row5[oid];
				   $sql2="UPDATE cart
				   SET mobstatus='1'
				   WHERE cid='$cid'";
			       $ret1=mysql_query($sql2,$conn);
				   $sql3="UPDATE mobile
	               SET mobilequantity='$mobqua'
	               WHERE mid='$mid'";
			       $ret3=mysql_query($sql3,$conn);
				}
			 }
			 header('location:orderdisplay.php');
		        /*else{   
			       $_SESSION[dno]=$row1[dno];
				   $_SESSION[street]=$row1[street];
				   $_SESSION[place]=$row1[place];
				   $_SESSION[pincode]=$row1[pincode];
				   $_SESSION[district]=$row1[district];
				   $_SESSION[landmark]=$row1[landmark];
				   $_SESSION[cid]=$row[cid];
				   $_SESSION[uid]=$row[uid];
				   }*/		   
   }
   else
      echo "<strong><b>PLEASE ENTER ALL THESE THINGS...</b></strong>";
   mysql_close($conn);
}
?>  
</body>
</html>
