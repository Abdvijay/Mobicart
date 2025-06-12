<?php
  session_start();
  session_destroy();
  echo "<h2>Logout Successful";
  header('location:new.html');
?>