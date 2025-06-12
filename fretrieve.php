<!DOCTYPE html>
<html>
<head>
	<title>feedbacks</title>
	<link rel="stylesheet" type="text/css" href="tables.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
		
</head>
<body>
  <?php require_once 'header.php';?>
  <?php require_once'fprocess.php'?>
  <?php if(isset($_SESSION['message'])):?>
  <div class="alert alert-<?$_SESSION['msg-type']?>">
  	<?php 
  	   unset($_SESSION['message']);
  	?>
  </div>
<?php endif?>
<div class="container">
	<?php 
	   $conn=mysql_connect('localhost','root','');
	   mysql_select_db('bsc31319');
	   $sql="select * from feedback inner join user on feedback.uid=user.uid";
	   $retval=mysql_query($sql,$conn);
	   $n=mysql_num_rows($retval);
	   if($n>0){
	   ?>
	   <div class="row justify-content-center">
	   <table id="style"class="table" border="2" style="border-color: black">
	      <thead>
	         <tr>
	           <th>Id</th>
	           <th>Name</th>
	           <th>Mobile</th>
	           <th>E-mail</th>
	           <th>Feedback</th>
	           <th>Date</th>
	           <th colspan="2">Action</th>
	         </tr>
	      </thead>
	     <?php
	        while($row=mysql_fetch_assoc($retval)):?>
	     <tr>
	       <td><?php echo $row['fid'];?></td>
	       <td><?php echo $row['username'];?></td> 
	       <td><?php echo $row['phoneno'];?></td>
           <td><?php echo $row['mailid'];?></td>
           <td><?php echo $row['feedback'];?></td>
           <td><?php echo $row['date'];?></td>
           <td>
           	<a href="fprocess.php?delete=<?php echo $row['fid'] ?>" class="btn btn-danger">Delete</a></td>
         </tr>
        <?php endwhile;?>
    </table>
</div>

</div>
<?php 
   }
  else
  {
  	 echo "<br><br><center><strong><h2 style='font-style:oblique; color:red'>There is no Feedbacks To Read.Please Come After Sometime!!!";
  }?>
<?php mysql_close($conn);?>
</body>
</html>