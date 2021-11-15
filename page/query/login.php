<?php 
require('connect.php');

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$key = "newDEVsince2021";
$hash_login_password = hash_hmac('sha256',$password,$key);

$sql = "SELECT * FROM user WHERE username=? AND password=?";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"ss",$username, $hash_login_password);
mysqli_stmt_execute($stmt);
$result_user = mysqli_stmt_get_result($stmt);

if ($result_user->num_rows ==1 ){
  session_start();
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  mysqli_close($conn);
  $_SESSION['login_id'] = $row_user['id'];
  if ($row_user['role'] == 0) {
    $_SESSION['is_superadmin'] = "yes";
    $data = json_encode(array("status"=>'true'));
    echo $data;
  } else {
    $_SESSION['is_admin'] = "yes";
    $data = json_encode(array("status"=>'true'));
    echo $data;
  }
} else {
  $data = json_encode(array("status"=>'false'));
    echo $data;
  }

?>