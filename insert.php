<!DOCTYPE html>
<html>
<head>
	<title>Add Mopbiles</title>
	<link rel="stylesheet" type="text/css" href="loginform.css">
</head>
<body>
	<?php require_once 'process.php';?>
	<?php require_once 'header.php';?>
	
	<div class="row justify-content-center">
		<center>
		<h1>Add Mobiles</h1>
		<form class="box" method="post" action="process.php">
			<input type="hidden" name="mid" value="<?php echo $mid;?>">
			<div class="form-group">
				<input type="text" name="mobilecode" class="form-control" value="<?php echo $mobilecode;?>" placeholder="Enter Your MobileCode" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilebrand" class="form-control" value="<?php echo $mobilebrand;?>" placeholder="Enter Your MobileBrand" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilename" class="form-control" value="<?php echo $mobilename;?>" placeholder="Enter Your MobileName" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobiledisplay" class="form-control" value="<?php echo $mobiledisplay;?>" placeholder="Enter Your MobileDisplay" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilecamera" class="form-control" value="<?php echo $mobilecamera;?>" placeholder="Enter Your MobileCamera" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilebattery" class="form-control" value="<?php echo $mobilebattery;?>" placeholder="Enter Your MobileBattery" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilesoc" class="form-control" value="<?php echo $mobilesoc;?>" placeholder="Enter Your MobileSoc" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobileram" class="form-control" value="<?php echo $mobileram;?>" placeholder="Enter Your MobileRAM" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilerom" class="form-control" value="<?php echo $mobilerom;?>" placeholder="Enter Your MobileROM" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilecolor" class="form-control" value="<?php echo $mobilecolor;?>" placeholder="Enter Your MobileColor" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobileprice" class="form-control" value="<?php echo $mobileprice;?>" placeholder="Enter Your MobilePrice" required>
			</div><br>
			<div class="form-group">
				
				<input type="text" name="mobilequantity" class="form-control" value="<?php echo $mobilequantity;?>" placeholder="Enter Your Mobilequantity" required>
			</div><br>
			<div class="form-group">
				<?php
				   if($update==true):
				?>
				<button type="submit" class="btn btn-info" name="update">Update</button>
				<?php else:?>
				<button type="submit" class="btn btn-primary" name="save">Save</button>
			    <?php endif?>
			</div>
			<a href="homes.php">Back to Home</a>
		</div>
		</form>

</body>
</html>