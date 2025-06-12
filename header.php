<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li class="active"><a href="homes.php">Home</a></li>
				<li><a href="insert.php">Add Mobiles</a></li>
				<li><a href="retrieve.php">View Mobiles</a></li>
				<li><a href="oretrieve.php">Orders</a></li>
				<li><a href="pretrieve.php">Processed Orders</a></li>
				<li><a href="cretrieve.php">Cancelled Orders</a></li>
				<li><a href="fretrieve.php">Feedbacks</a></li>
				<li><a href="loginform.php" target="_blank"><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo 'Login Here!!!';?></a></li>
				<?php if(isset($_SESSION['username'])) echo"<li><a href='logout.php'>Logout</a></li>"?>
			</ul>
		</div>
	</header>

</body>
</html>