<?php 
require_once('connect.php');

$phonenumber = $_POST['phonenumber'];
$owner = $_POST['owner'];
$status = $_POST['status'];

$query_check = "SELECT phonenumber FROM phone WHERE phonenumber='$phonenumber'";
$result_check = mysqli_query($conn,$query_check);
$query_checkrows = "SELECT * FROM phone";
$result_check_rows = mysqli_query($conn,$query_checkrows);

if(mysqli_num_rows($result_check)>=1){
  echo json_encode(array("status"=>"false"));
}
elseif(mysqli_num_rows($result_check_rows)>99999){
  echo json_encode(array("status"=>"full"));
}else{
  $query = "INSERT INTO phone (`phonenumber`, `owner`, `status`) VALUES ('$phonenumber','$owner','$status')";
  $result = mysqli_query($conn,$query);

  if($result){ 
    echo json_encode(array("status"=>"true"));
  }else{
   echo json_encode(array("status"=>"false"));
  }
}
mysqli_close($conn);

?>