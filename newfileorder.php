<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
	  $sql="SELECT * FROM cart WHERE uid='$uid' AND mobstatus='1'";
	  $retval=mysql_query($sql,$conn);
	  $row=mysql_fetch_array($retval);
	  $n=mysql_num_rows($retval);
	  $sql2="SELECT * FROM `order` WHERE uid='$uid'";
	  $ret2=mysql_query($sql2,$conn);
	  $row2=mysql_fetch_array($ret2);
	  $dno=$row2[dno];
	  $street=$row2[street];
	  $district=$row2[district];
	  $place=$row2[place];
      $pincode=$row2[pincode];
      $landmark=$row2[landmark];
      $payment="Cash On Delivery";
	  echo"<center><table border='4' cellpadding='15' cellspacing='5'>";
	  echo"<tr><TH>MOBILE ID<TH>MOBILE BRAND<TH>MOBILE NAME<TH>MOBILE COLOR<TH>MOBILE RAM<TH>MOBILE ROM<TH>MOBILE PRICE<TH>QUANTITY<TH>AMOUNT<TH>DOOR NO<TH>STREET<TH>PLACE<TH>DISTRICT<TH>PINCODE<TH>LANDMARK<TH>PAYMENT<TH>ACTION</tr>";
	  do
	  {
	       $mid=$row[mid];
	       $sql1="SELECT * FROM mobile WHERE mid='$mid'";
		   $ret=mysql_query($sql1,$conn);
		   $row1=mysql_fetch_array($ret);
		   do{
	           $mobprice=$row1[mobileprice];
		       $mobbrand=$row1[mobilebrand];
		       $mobname=$row1[mobilename];
		       $mobcolor=$row1[mobilecolor];
		       $mobram=$row1[mobileram];
		       $mobrom=$row1[mobilerom];
		       $quantity=$row[quantity];
		       $amount=$row[totalamount];
		       echo "<tr><td>$mid<td>$mobbrand<td>$mobname<td>$mobcolor<td>$mobram<td>$mobrom<td>$mobprice<td>$quantity<td>$amount<td>$dno<td>$street<td>$district<td>$place<td>$pincode<td>$landmark<td>$payment";
			   ?>
		          <td><a href='deleteorder.php?data=<?php echo $row2['oid'];?>' target="bottomframe">DELETE</a></tr>
		       <?php
			}while($row1=mysql_fetch_array($ret)); 
	 }while($row=mysql_fetch_array($retval)); 
	 echo "</table></center>";
	  mysql_close($conn);
?>
</body>
</html>
