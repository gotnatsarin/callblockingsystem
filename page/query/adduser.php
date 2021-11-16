<?php 
require('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];

$key = "newDEVsince2021";
$hash_login_password = hash_hmac('sha256',$password,$key);

$VENICE = "SELECT username FROM user WHERE username='$username'";

$result_check = mysqli_query($conn,$VENICE);

if(mysqli_num_rows($result_check)==1){
  echo json_encode(array("status"=>"false"));
}else{
  $sql ="INSERT INTO user (`username`,`password`,`role`) VALUES ('$username','$hash_login_password','1')";
  if(mysqli_query($conn,$sql)){
  echo json_encode(array("status"=>"true"));
  }else{
  echo json_encode(array("status"=>"false"));
  }
}
mysqli_close($conn);
?>