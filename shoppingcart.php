<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SHOPPING CART</title>
<link rel="stylesheet" type="text/css" href="carttable.css" />
</head>

<body><br /><br /><br /> 
<strong><strong><---<a href="mobileframe.php">BACK TO MOBILE</a></strong></strong>
<caption><strong><h2><center>SHOPPING CART</center></h2></strong></caption>
    <?php
	  session_start();
	  $uid=$_SESSION[uid];
	  if(isset($_SESSION[uid]))
      {
         $conn=mysql_connect('localhost','root','');
	     if(!$conn)
	        die('Could not connect database'.mysql_error());
	     mysql_select_db('bsc31319');
	     $sql="SELECT * FROM cart WHERE uid='$uid' AND mobstatus='0'";
	     $retval=mysql_query($sql,$conn);
	     $row=mysql_fetch_array($retval);
	     $n=mysql_num_rows($retval);
	     if($n>0)
	     {
	        echo"<center><table id='cart' border='4' cellpadding='15' cellspacing='5'>";
	        echo"<tr><TH>MOBILE BRAND<TH>MOBILE NAME<TH>MOBILE COLOR<TH>MOBILE RAM<TH>MOBILE ROM<TH>MOBILE PRICE<TH>QUANTITY<TH>AMOUNT<TH>ACTION</tr>";
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
		            echo "<tr><td>$mobbrand<td>$mobname<td>$mobcolor<td>$mobram<td>$mobrom<td>$mobprice<td>$quantity<td>$amount";
		            ?>
		            <td><a href='deletemob.php?data=<?php echo $row['cid'];?>' target="bottomframe">DELETE</a></tr>
		            <?php
			   }while($row1=mysql_fetch_array($ret)); 
	      }while($row=mysql_fetch_array($retval)); 
	      echo "</center></table>";
	      mysql_close($conn); 
	      ?>
	      <br /><br /><br /><strong><b><a href="orderform.php" target="bottomframe">PROCEED TO ORDER</a></b></strong></center>
          <?php	
	    }
	    else
	    {
	       echo "<br><br><center><strong><h2 style='font-style:oblique; color:red'>There is No Items in the Cart.";
	    } 
	}
	else
    {
       echo"<br><br><br><Br><center><strong style='font-style:oblique; color:red'>PLEASE LOGIN TO CONTINUE CLICK HERE -->";
    }
?>
</body>
</html>
