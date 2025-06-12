
<?php
  echo"<div class='top'>";
  $conn=mysql_connect('localhost','root','');
  if(!$conn)
    die('could not connect:'.mysql_error());
  mysql_select_db('bsc31319');
  $sql="select mid from mobile";
  $mnum=mysql_num_rows($retval=mysql_query($sql,$conn));
  $sql1="select * from `order` where opstatus='0'";
  $retval1=mysql_query($sql1,$conn);
  $onum=mysql_num_rows($retval1);
  $result=mysql_query('select sum(totalamount) as value_sum from cart');
  $row=mysql_fetch_assoc($result);
  $sum=$row['value_sum'];
 ?>
  <!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
	<link rel="stylesheet" type="text/css" href="dashboards.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<div class="icon">01</div>
			  <div class="content">
			   <h3>Mobiles</h3>
			   <p>Number of Mobiles : <?php echo $mnum?></p>
			   <a href="retrieve.php">View More</a>
			 </div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="box">
			<div class="icon">02</div>
			  <div class="content">
			   <h3>Orders</h3>
			   <p>Number Of Orders : <?php echo $onum?></p>
			   <a href="oretrieve.php">View More</a>
			 </div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="box">
			<div class="icon">03</div>
			  <div class="content">
			   <h3>Total Revenue</h3>
			   <p>Revenue:<?php echo $sum?></p>
			   <a href="pretrieve.php">View More</a>
			 </div>
			</div>
		</div>
	</div>
	<a href="homes.php">Back To Home</a>

</body>
</html>