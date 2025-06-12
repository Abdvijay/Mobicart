<?php
   session_start();
   $mid=0;
   $mobilecode='';
   $mobilebrand='';
   $mobilename='';
   $mobiledisplay='';
   $mobilecamera='';
   $mobilebattery='';
   $mobilesoc='';
   $mobileram='';
   $mobilerom='';
   $mobilecolor='';
   $mobileprice='';
   $mobilecolor='';
   $mobilequantity='';
   $update=false;
   $conn=mysql_connect('localhost','root','');
   if(!$conn)
   	die('could not connect'.mysql_error());
   mysql_select_db('bsc31319');
   if(isset($_POST['save']))
   {
      $mobilecode=$_POST['mobilecode'];
      $mobilebrand=$_POST['mobilebrand'];
      $mobilename=$_POST['mobilename'];
      $mobiledisplay=$_POST['mobiledisplay'];
      $mobilecamera=$_POST['mobilecamera'];
      $mobilebattery=$_POST['mobilebattery'];
      $mobilesoc=$_POST['mobilesoc'];
      $mobileram=$_POST['mobileram'];
      $mobilerom=$_POST['mobilerom'];
      $mobilecolor=$_POST['mobilecolor'];
      $mobileprice=$_POST['mobileprice'];
	  $mobilequantity=$_POST['mobilequantity'];
      $sql="select * from mobile where mobilecode='$mobilecode'";
      $retval=mysql_query($sql,$conn);
      if(!$retval)
        die('No Records Found:'.mysql_error());
      if(mysql_num_rows($retval)>0)
        die('Mobile Already Exists');
      else{
        $sql="insert into mobile (mobilecode,mobilebrand,mobilename,mobiledisplay,mobilecamera,mobilebattery,mobilesoc,mobileram,mobilerom,mobilecolor,mobileprice,mobilequantity) values('$mobilecode','$mobilebrand','$mobilename','$mobiledisplay','$mobilecamera','$mobilebattery','$mobilesoc','$mobileram','$mobilerom','$mobilecolor','$mobileprice','$mobilequantity')";
	  $retval=mysql_query($sql,$conn);
	  if(!$retval)
	    die('could not Insert:'.mysql_error());
    echo"Mobile added Successfully";
	  echo"<script>alert('Mobile Added Successfully !')</script>";
	  header("location:insert.php");
	  mysql_close($conn);
   }
 }
   if(isset($_GET['delete']))
   {
   	  $mid=$_GET['delete'];
   	  $sql="delete from mobile where mid='$mid'";
   	  $retval=mysql_query($sql,$conn);
   	  if(!$retval)
   	  	die('could not delete'.mysql_error());
   	  $_SESSION['message']="Mobile Deleted Successfully";
	  $_SESSION['msg-type']="danger";
	  header("location:retrieve.php");
	  mysql_close($conn);
   }
   if(isset($_GET['edit']))
   {
   	$update=true;
   	$mid=$_GET['edit'];
   	$sql="select * from mobile where mid='$mid'";
   	$retval=mysql_query($sql,$conn);
   	if(mysql_num_rows($retval)==1)
   	{
   		  $row=mysql_fetch_array($retval);
   		  $mobilecode=$row['mobilecode'];
        $mobilebrand=$row['mobilebrand'];
        $mobilename=$row['mobilename'];
        $mobiledisplay=$row['mobiledisplay'];
        $mobilecamera=$row['mobilecamera'];
        $mobilebattery=$row['mobilebattery'];
        $mobilesoc=$row['mobilesoc'];
        $mobileram=$row['mobileram'];
        $mobilerom=$row['mobilerom'];
        $mobilecolor=$row['mobilecolor'];
        $mobileprice=$row['mobileprice'];
		 $mobilequantity=$row['mobilequantity'];
    }
   }
   if(isset($_POST['update']))
   {
   	  $mid=$_POST['mid'];
   	  $mobilecode=$_POST['mobilecode'];
      $mobilebrand=$_POST['mobilebrand'];
      $mobilename=$_POST['mobilename'];
      $mobiledisplay=$_POST['mobiledisplay'];
      $mobilecamera=$_POST['mobilecamera'];
      $mobilebattery=$_POST['mobilebattery'];
      $mobilesoc=$_POST['mobilesoc'];
      $mobileram=$_POST['mobileram'];
      $mobilerom=$_POST['mobilerom'];
      $mobilecolor=$_POST['mobilecolor'];
      $mobileprice=$_POST['mobileprice'];
	  $mobilequantity=$_POST['mobilequantity'];
      $sql="update mobile set mobilecode='$mobilecode',mobilebrand='$mobilebrand',mobilename='$mobilename',mobiledisplay='$mobiledisplay',mobilecamera='$mobilecamera',mobilebattery='$mobilebattery',mobilesoc='$mobilesoc',mobileram='$mobileram',mobilerom='$mobilerom',mobilecolor='$mobilecolor',mobileprice='$mobileprice',mobilequantity='$mobilequantity' where mid='$mid'";
      $retval=mysql_query($sql,$conn);
      $_SESSION['message']="Updated Successfully";
	  $_SESSION['msg-type']="danger";
	  header("location:insert.php");
	  mysql_close($conn);
   }
?>