<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>addtocart</title>
<style>
div{
   float:left;
}
</style>
</head>
<body>
<?php
session_start();
$uid=$_SESSION[uid];
if(isset($_SESSION[uid]))
{
      $conn=mysql_connect('localhost','root','');
	  $var=$_GET['data1'];
	  $_SESSION[mid]=$var;
	  if(!$conn)
	     die('Could not connect database'.mysql_error());
	  mysql_select_db('bsc31319');
	  $sql="SELECT * FROM mobile WHERE mobilename='$var'";
	  $retval=mysql_query($sql,$conn);
	  $row=mysql_fetch_array($retval);
	  if($retval)
	  {
	            $mid=$row[mid];
				$_SESSION[mid]=$mid;
	            $mobprice=$row[mobileprice];
				$mobbrand=$row[mobilebrand];
				$mobname=$row[mobilename];
				$mobcolor=$row[mobilecolor];
				$mobram=$row[mobileram];
				$mobrom=$row[mobilerom];
				?>
				<br /><br /><center><a href='defaultmobilesbrand.php'>BACK</a></center>
				<?php
	            echo "<center><table border='2' cellpadding='5' cellspacing='3'>";
			    echo "<tr><th>MOBILE BRAND&nbsp;&nbsp;&nbsp;<th>MOBILE NAME&nbsp;&nbsp;&nbsp<th>MOBILE COLOR&nbsp;&nbsp;&nbsp<th>MOBILE RAM&nbsp;&nbsp;&nbsp<th>MOBILE ROM&nbsp;&nbsp;&nbsp<th>MOBILE PRICE&nbsp;&nbsp;&nbsp<th>QUANTITY</tr><br><br>";
			    echo "<tr></tr><tr></tr>";
		        echo "<tr><td>{$row[mobilebrand]}<td>{$row[mobilename]}<td>{$row[mobilecolor]}<td>{$row[mobileram]}<td>{$row[mobilerom]}<td>{$row[mobileprice]}<td><form method='post'>";
				?>
				<input type="text" name="quantity" value="<?php if ($_POST['submit']=='OK') echo $_POST['quantity'];?>" maxlength="1">
				<?php
				echo "<input type='submit' name='submit' value='OK'>"; 
		            if($_POST['submit'])   
	                {
					   $quantity=$_POST['quantity'];
		               $amount=($mobprice)*($quantity);
					   $_SESSION[quantity]=$quantity;
					   $_SESSION[amount]=$amount;
					}
			   ?>
			   <tr><td colspan="6"><div class="tp">Total Price :<td><input type="text" name="tp" value="<?php if($_POST) echo $amount;?>" readonly="1" /></div> </td>
			   </table>
			   <br /><strong><center><input type='submit' name='check' value='CHECK AND SUBMIT'/></center></strong>
			   </form>
			   <?php
			   if($_POST['check'])   
	           {
			       $quantity=$_POST['quantity'];
		           $amount=($mobprice)*($quantity);
				   $mid=$_SESSION[mid];
				   if(!empty($quantity)&&!empty($amount)){
				      $sql="INSERT INTO cart(quantity,totalamount,mid,uid)VALUES('$quantity','$amount','$mid','$uid')";
				      $retval=mysql_query($sql,$conn);
				      if($retval)
				      { 
					      die("<br><br><center><strong>Your Adding Cart Inserted Successfully</strong></center>".mysql_error());
				      }
				      else
				          die(mysql_error());
				   }
				   else
				      die('Please Enter All The Things'.mysql_error());
				}
	  }
	  mysql_close($conn);
}
else
{
   echo"<br><br><br><Br><center><strong style='font-style:oblique; color:red'>PLEASE LOGIN TO CONTINUE !";
}
?>
</body>
</html>
