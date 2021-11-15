<?php 
require_once('connect.php');
$id = mysqli_real_escape_string($conn,$_GET['id']);
$query = "SELECT id,username,role FROM user WHERE id = '$id'";
$result = mysqli_query($conn,$query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['oneUserObj'][] = $r;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
?>