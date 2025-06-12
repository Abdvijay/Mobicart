<?php
       session_start();
	   $uid=$_SESSION[uid];
       $var=$_GET['data'];
       $vard=$_GET['data1'];
       $conn=mysql_connect('localhost','root','');
	   if(!$conn)
	      die('Could not connect database'.mysql_error());
	   mysql_select_db('bsc31319');
	   $sql="DELETE FROM `order` WHERE oid='$var' AND opstatus=1";
	   $retval=mysql_query($sql,$conn);
	   if(!$retval)
	      die('Something Error'.mysql_error());
	   header('location:pretrieve.php');
	   mysql_close($conn);
?>