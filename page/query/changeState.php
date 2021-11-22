<?php
require('connect.php');

$id = $_POST['id'];

$sql = "SELECT status FROM phone WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

$r = mysqli_fetch_assoc($result);

$new_status = !$r['status'];
$toggle = "UPDATE phone SET status = '$new_status' WHERE id = '$id'";

if (mysqli_num_rows($result)==0){
  echo json_encode(array("status"=>"no ID has been found"));
} elseif (mysqli_query($conn,$toggle)) {
  echo json_encode(array("status"=>"true"));
} else {
  echo json_encode(array("status"=>"false"));
}

?>