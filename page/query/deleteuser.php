<?php 
require('connect.php');
$id = $_POST['id'];

$query = "DELETE FROM user WHERE id = '$id'";
if(mysqli_query($conn,$query)){
  echo json_encode(array("status"=>"true"));
}else{
  echo json_encode(array("status"=>"false"));
}
mysqli_close($conn);
?>