<?php 
require('connect.php');
$id = $_POST['id'];
$SQL ="DELETE FROM phone WHERE id = '$id'";

$check_number = "SELECT id FROM phone WHERE id = '$id'";
$query = mysqli_query($conn,$check_number);

if (mysqli_num_rows($query)==0){
  echo json_encode(array("status"=>"no ID has been found"));
} else {
  if(mysqli_query($conn,$SQL)){
    echo json_encode(array("status"=>"true"));
  }else{
    echo json_encode(array("status"=>"false"));
  }
}

mysqli_close($conn);
?>