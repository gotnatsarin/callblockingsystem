<?php 
require('connect.php');
$phoneNumber = $_GET['phoneNumber'];

$sql = "SELECT * FROM log_block WHERE source = $phoneNumber ORDER BY timestamp DESC";
$result = mysqli_query($conn,$sql);

while($r = mysqli_fetch_assoc($result)){
  $rows['PhoneObj'][] = $r;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>