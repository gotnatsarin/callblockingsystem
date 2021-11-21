<?php
require_once('connect.php');

$phonenumber = mysqli_real_escape_string($conn,$_POST['phonenumber']);
$owner = mysqli_real_escape_string($conn,$_POST['owner']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$id = $_POST['id'];

$check_phonenumber = "SELECT phonenumber FROM phone WHERE id != '$id' AND phonenumber = '$phonenumber'";
$query = mysqli_query($conn,$check_phonenumber);

if(mysqli_num_rows($query)==1){
  echo json_encode(array("status"=>"This phone number is already in used"));
}else{
  $sql= "UPDATE phone SET phonenumber='$phonenumber', owner='$owner',status='$status' WHERE id = '$id'";
  if(mysqli_query($conn,$sql)) {
    echo json_encode(array("status"=>"true"));
  } else {
    echo json_encode(array("status"=>"false"));
  } 
}

mysqli_close($conn);
?>