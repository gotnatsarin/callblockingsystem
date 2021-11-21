<?php 
date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d"); 
$date = substr($date,0,7);

require_once('connect.php');
$query = "SELECT phoneNumber,count(phoneNumber) c FROM report_test WHERE timeStamp like '$date%' GROUP BY phoneNumber ORDER BY c DESC LIMIT 10";
$result = mysqli_query($conn,$query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['countBlockNumber'][] = $r;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
?>