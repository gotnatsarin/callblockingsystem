<?php 
  $password = $_POST['password'];
  $userid = $_POST['userid'];
  require('connect.php');
  $query = "UPDATE user SET password = '$password' where id = '$userid'";
  if(mysqli_query($conn,$query)){
    echo "true";
  }else{
    echo "false";
  }
mysqli_close($conn);
?>
