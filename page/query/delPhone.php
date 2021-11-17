<?php 
require('connect.php');
$id = $_POST['id'];
$SQL ="DELETE FROM phone WHERE id = '$id'";
if($result = mysqli_query($conn,$SQL)){
  echo json_encode(array("status"=>"true"));
}else{
  echo json_encode(array("status"=>"false"));
}

mysqli_close($conn);
?>