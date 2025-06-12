<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To Mobicart</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<header>
		<div class="main">
			<ul>
			    <li class="mobicart"><strong><b>MOBICART</b></strong></li>
				<li class="active"><a href="homecontent.html" target="bottomframe">Home</a></li>
				<li><a href="mobileframe.php" target="bottomframe">Mobiles</a></li>
				<li><a href="shoppingcart.php"  target="bottomframe">Shopping Cart</a></li>
				<li><a href="orderdisplay.php" target="bottomframe">Order Details</a></li>
				<li><a href="feedback.php"  target="bottomframe">Feedbacks</a></li>
				<li><a href="loginform.php" target="_blank"><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo 'Login Here!!!';?></a></li>
				<?php if(isset($_SESSION['username'])) echo"<li><a href='logout.php' target='bottomframe'>Logout</a></li>"?>
			</ul>
		</div>
	</header>
</body>
</html>