<?php
require_once('connect.php');

$query = "SELECT * FROM phone ORDER BY status";
$query_exe = mysqli_query($conn,$query);
$row = array();

while($r = mysqli_fetch_assoc($query_exe)) {
  $rows['PhoneDataObj'][] = $r;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
?>