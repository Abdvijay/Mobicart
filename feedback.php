<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="feedback.css">
    <style>
       html{
            background: #a64bf4;
   background:-webkit-linear-gradient(45deg,#00dbde,#fc00ff);
   background:-o-linear-gradient(45deg,#00dbde,#fc00ff);
   background:-moz-linear-gradient(45deg,#00dbde,#fc00ff);
   background:linear-gradient(45deg,#00dbde,#fc00ff);
        }
    </style>
</head>
<body>
    <?php require_once 'fprocess.php';?>
    <h1>Let's Place Your Footprints Here</h1>
    <div class="row justify-content-center">
    	<form class="box" method="post" action="fprocess.php">
            <h2>FEEDBACK</h2>
    		<input type="hidden" name="fid" value="<?php echo $fid;?>">
    		<div class="form-group">
    			<input type="text" name="name"  value="<?php echo $name;?>" placeholder="Enter your name" required>
    		</div>
    		<div class="form-group">
    			<input type="text" name="phone"  value="<?php echo $phone;?>" placeholder="Enter your Phone Number" required>
    		</div>
    		<div class="form-group">
    			<textarea name="feedback"  value="<?php echo $feedback;?>" placeholder="Enter your Feedback" required></textarea>
    		</div>
    		<div class="form-group">
    			<button type="submit" name="save" class="btn btn-primary">Save</button>
    		</div>
    		
    	</form>
    </div>
</body>
</html>