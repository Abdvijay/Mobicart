<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
   <?php require_once 'process.php'?>
   <?php require_once 'header.php';?>
   <?php if(isset($_SESSION['message'])):?>
   	<div class="alert alert-<?php $_SESSION['msg-type']?>">
   		<?php
   		   
   		   unset($_SESSION['message']);
   		?>
   	</div>
   <?php endif;?>
   	<?php
   	   $conn=mysql_connect('localhost','root','');
   	   if(!$conn)
   	      die('could not connect'.mysql_error());
       mysql_select_db('bsc31319');
       $sql="select * from mobile";
       $retval=mysql_query($sql,$conn);
       $n=mysql_num_rows($retval);
       if($n>0){
    ?>
    <center>
    <div class="row justify-content-center">
    	<table id="style" border="5"  cellspacing="5" cellpadding="5" >
    		<thead>
    			<tr>
    				<th>MobileCode</th>
    				<th>MobileBrand</th>
    				<th>MobileName</th>
    				<th>MobileDisplay</th>
    				<th>MobileCamera</th>
    				<th>MobileBattery</th>
    				<th>MobileRAM</th>
    				<th>MobileROM</th>
    				<th>MobileSoc</th>
    				<th>MobileColor</th>
    				<th>MobilePrice</th>
					<th>MobileQuantity</th>
    				<th colspan="2">Action</th>
    			</tr>
    		</thead>
    		<?php
    		   While($row=mysql_fetch_assoc($retval)):?>
    		   <tr>
    		   	<td><?php echo $row['mobilecode'];?></td>
    		   	<td><?php echo $row['mobilebrand'];?></td>
    		   	<td><?php echo $row['mobilename'];?></td>
    		   	<td><?php echo $row['mobiledisplay'];?></td>
    		   	<td><?php echo $row['mobilecamera'];?></td>
    		   	<td><?php echo $row['mobilebattery'];?></td>
    		   	<td><?php echo $row['mobileram'];?></td>
    		   	<td><?php echo $row['mobilerom'];?></td>
    		   	<td><?php echo $row['mobilesoc'];?></td>
    		   	<td><?php echo $row['mobilecolor'];?></td>
    		   	<td><?php echo $row['mobileprice'];?></td>
				<td><?php echo $row['mobilequantity'];?></td>
                <td>
                	<a href="insert.php?edit=<?php echo $row['mid'];?>" class="btn btn-info">Edit</a>
                	<a href="process.php?delete=<?php echo $row['mid'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    <?php
         }
       else{
        echo "<br><br><center><strong><h2 style='font-style:oblique; color:red'>There is No Mobiles Yet.Please Add It!!!";
       }?>
   <?php mysql_close($conn);?>
</body>
</html>