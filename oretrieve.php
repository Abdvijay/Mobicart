<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php require_once 'header.php';?>
 <?php
      session_start();
      $conn=mysql_connect('localhost','root','');
	  if(!$conn)
	     die('Could not connect database'.mysql_error());
	  mysql_select_db('bsc31319');
	  $sql2="SELECT * FROM `order` where opstatus=0";
	  $ret2=mysql_query($sql2,$conn);
	  $row2=mysql_fetch_array($ret2);
	  $n1=mysql_num_rows($ret2);
	  if($n1>0)
	  {
	  echo"<center><table border='4' cellpadding='15' cellspacing='5'>";
	  echo"<tr><TH>MOBILE BRAND<TH>MOBILE NAME<TH>MOBILE COLOR<TH>MOBILE RAM<TH>MOBILE ROM<TH>MOBILE PRICE<TH>QUANTITY<TH>AMOUNT<TH>DOOR NO<TH>STREET<TH>PLACE<TH>DISTRICT<TH>PINCODE<TH>LANDMARK<TH>PAYMENT<TH>USER<TH>ACTION</tr>";
	  do
	  {
	       $dno=$row2[dno];
	       $uid=$row2[uid];
	       $query="select * from `user` where uid='$uid'";
	       $var=mysql_query($query,$conn);
	       $val=mysql_fetch_array($var);
	       $username=$val[username];
	       $street=$row2[street];
	       $district=$row2[district];
	       $place=$row2[place];
           $pincode=$row2[pincode];
           $landmark=$row2[landmark];
           $payment="Cash On Delivery";
	       $cid=$row2[cid];
	       $sql="SELECT * FROM cart WHERE cid='$cid' AND mobstatus='1'";
	       $retval=mysql_query($sql,$conn);
	       $row=mysql_fetch_array($retval);
	       $n=mysql_num_rows($retval);
	       $oid=$row2[oid];
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
		       echo "<tr><td>$mobbrand<td>$mobname<td>$mobcolor<td>$mobram<td>$mobrom<td>$mobprice<td>$quantity<td>$amount<td>$dno<td>$street<td>$district<td>$place<td>$pincode<td>$landmark<td>$payment<td>$username";
			   ?>
		          <td><a href='processorder.php?data=<?php echo $oid;?>&data1=<?php echo $mid;?>' target="bottomframe">Process</a></tr>
		       <?php
			}while($row1=mysql_fetch_array($ret)); 
	 }while($row2=mysql_fetch_array($ret2)); 
	 echo "</table></center>";
	 mysql_close($conn);
    }
    else
	{
	    echo "<br><br><center><strong><h2 style='font-style:oblique; color:red'>There is No Order Yet!!!!";
	}
?>
</body>
</html>


