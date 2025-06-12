<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>brand list</title>
</head>
<body><h2>BRAND</h2>
<hr />
<?php
    $conn=mysql_connect('localhost','root','');
	if(!$conn)
	   die('Could not connect database'.mysql_error());
	mysql_select_db('bsc31319');
	$sql="SELECT mobilebrand FROM mobile";
	$retval=mysql_query($sql,$conn);
	/*
	   $n=mysql_num_rows($retval);
	*/
	if($retval)
	{
	   while($row=mysql_fetch_array($retval))
	   {
	      echo "<table>";
	      echo "<td><th><a href=mobilebrandlink.php?data={$row['mobilebrand']} target='rightframe'>{$row['mobilebrand']}</a></td></th>";
		  echo "</table>";
	   }
	   /* do{
		    echo "{$row[mobilebrand]}<br>";
			$n--;
		  }while($n>0);
	   */
	}
	else
	   die('Something Error !'.mysql_error());
	mysql_close($conn);
?>
</body>
</html>
