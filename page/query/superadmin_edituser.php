<?php
 require('connect.php');
  $new_password = mysqli_real_escape_string($conn,$_POST['new_password']);
  $username = mysqli_real_escape_string($conn,$_POST['new_username']);
  $id = $_POST['id'];
  $key = "newDEVsince2021";
  $hash_new_password = hash_hmac('sha256',$new_password,$key);
  $check_user = "SELECT password FROM user WHERE id='$id'";
  $result = mysqli_query($conn,$check_user);
  $sql;

  if(mysqli_num_rows($result)==1){
    if($new_password==""){
      $sql = "UPDATE user SET username = '$username' WHERE id='$id'";
    }else{
      $sql = "UPDATE user SET username = '$username', password = '$hash_new_password' WHERE id='$id'";
    }
  
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