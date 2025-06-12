<!DOCTYPE html>
<html>
<head>
   <title>Admin Dashboard</title>
   <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>


<?php
  echo"<div class='top'>";
  $conn=mysql_connect('localhost','root','');
  if(!$conn)
    die('could not connect:'.mysql_error());
  mysql_select_db('bsc31319');
  $sql="select * from mobile";
  $number=mysql_num_rows($retval=mysql_query($sql,$conn));
  echo"<div class='top'>";
  echo"<a href='retrieve.php'><strong>Number Of Mobiles:$number &nbsp;&nbsp;&nbsp;</strong></a>";
  $sql="select * from feedback";
  $retval=mysql_query($sql,$conn);
  $number=mysql_num_rows($retval);
  echo"<a href='fretrieve.php'><strong>Number Of Feedback:$number &nbsp;&nbsp;&nbsp;</strong></a>";
  $sql="select * from user";
  $retval=mysql_query($sql,$conn);
  $number=mysql_num_rows($retval);
  echo"<a href='#'><strong>Number Of Users:$number &nbsp;&nbsp;&nbsp;</strong></a>";
  $result=mysql_query('select sum(mobilequantity) as value_sum from mobile');
  $row=mysql_fetch_assoc($result);
  $sum=$row['value_sum'];
  echo "<a href='retrieve.php'><strong>Total Stocks : $sum <strong><br><br></a>";
  echo "<hr>";
  echo "</div>";
  echo"<form method='post' action='dashboard.php'>";
  echo"<input type='text' name='temp' placeholder='Search using Mobile Name'>";
  echo"<input type='submit' name='submit' value='search'>&nbsp;&nbsp;";
  echo"<input type='submit' name='clear' value='clear'>";
  echo"</form>";
  if(isset($_POST['submit']))
  {
      require_once'process.php';
      $temp=$_POST['temp'];
      $sql="select * from mobile where mobilename LIKE '$temp%'";
      $retval=mysql_query($sql,$conn);?>
      <div class="row justify-content-center">
      <table class="table" border="5"  cellspacing="5" cellpadding="5" >
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
    <center><a href="homes.html">Back To Home</a></center>
 </div>
 <?php
    if(isset($_POST['clear']))
    {
      mysql_free_result($retval);
    }
    mysql_close($conn);
  } 
 ?> 
 </body>
</html>
