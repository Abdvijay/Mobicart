<?php
   session_start();
   $fid=0;
   $name='';
   $phone='';
   $email='';
   $feedback='';
   $conn=mysql_connect('localhost','root','');
   if(!$conn)
   	  die('could not connect'.mysql_error());
   	mysql_select_db('bsc31319');

   	if(isset($_POST['save']))
   	{

   	  $temp=$_SESSION['uid'];
   	  $feedback=$_POST['feedback'];
   	  $sql="insert into feedback(feedback,uid)values('$feedback','$temp')";
   	  $retval=mysql_query($sql,$conn);
   	  if(!$retval)
   	  	die('Insertion error:'.mysql_error());
   	  $_SESSION['message']="Record Has Been Saved!";
   	  $_SESSION['msg-type']="success";
   	  header('location:feedback.php');
   	  mysql_close($conn);
   	}
      if(isset($_GET['delete']))
      {
         $fid=$_GET['delete'];
         $sql="delete from feedback where fid='$fid'";
         $retval=mysql_query($sql,$conn);
         if(!$retval)
            die('could not delete'.mysql_query());
         $_SESSION['message']="Record Has Been Saved!";
         $_SESSION['msg-type']="success";
         header('location:fretrieve.php');
         mysql_close($conn);

      }
?>