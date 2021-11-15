<?php
 require('connect.php');
  $old_password = mysqli_real_escape_string($conn,$_POST['old_password']);
  $new_password = mysqli_real_escape_string($conn,$_POST['new_password']);
  $id = $_POST['id'];
  $key = "newDEVsince2021";
  $hash_new_password = hash_hmac('sha256',$new_password,$key);
  $hash_old_password = hash_hmac('sha256',$old_password,$key);
  $check_old_password = "SELECT password FROM user WHERE id='$id' AND password ='$hash_old_password'";
  $result = mysqli_query($conn,$check_old_password);

  if(mysqli_num_rows($result)==1){
  $sql = "UPDATE user SET password = '$hash_new_password' WHERE id='$id'";
  if(mysqli_query($conn,$sql)) {
    echo json_encode(array("status"=>'true'));
  } else {
    echo json_encode(array("status"=>'false'));
  }
}else{
  echo json_encode(array("status"=>'false'));
}
  mysqli_close($conn);
?>