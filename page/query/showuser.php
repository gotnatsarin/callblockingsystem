<?php 
require_once('connect.php');
$query = "SELECT id,username,role FROM user";
$result = mysqli_query($conn,$query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['userObj'][] = $r;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
?>