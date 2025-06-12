<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DEFAULT MOBILE BRANDS</title>
<link rel="stylesheet" type="text/css" href="mobilebrand.css">
</head>
<style >
	.dis{
		text-transform: uppercase;
		font-weight: 22px;
		font-size: 18px;
	}
	.align{
         
	}
	.title{
		letter-spacing: 3px;
		text-transform: uppercase;
		font-size: 35px;
	}
</style>

<body>
<?php
       $conn=mysql_connect('localhost','root','');
	   if(!$conn)
	      die('Could not connect database'.mysql_error());
	   mysql_select_db('bsc31319');
	   $sql="SELECT mobilebrand,mobilename,mobilecolor,mobileram,mobilerom,mobileprice FROM mobile";
	   $retval=mysql_query($sql,$conn);
	   echo"<div class='dis'>";
	   if($retval)
	   { 
	      while($row=mysql_fetch_array($retval))
	      {  
	      	
	         echo"<b><center class='title'>{$row[mobilebrand]}</center></b><br>";
	         echo"<div class='align'>MODEL:{$row[mobilename]}<br>";
		     echo"RAM:{$row[mobileram]}<br>";
		     echo"ROM:{$row[mobilerom]}<br>";
		     echo"COLOR:{$row[mobilecolor]}<br>";
		     echo"PRICE:{$row[mobileprice]}<br></div>";
		     
		     ?>
		     <center><b><a href="description.php?data=<?php echo $row['mobilename'];?>">DESCRIPTION</a></b>&nbsp;&nbsp;&nbsp;
			 <b><a href='addtocart.php?data1=<?php echo $row['mobilename'];?>'>ADD TO CART</a></b><br /><br /></center>
			 <hr>
		     <?php
		  }
	   }
	   echo"<div>";
	   mysql_close($conn);
?>
</body>
</html>
