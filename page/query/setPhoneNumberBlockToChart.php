<?php 
date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d"); 
$date = substr($date,0,7);

require_once('connect.php');
$query = "SELECT source, max(timestamp) timestamp,  count(source) c FROM log_block WHERE timestamp like  '$date%' GROUP BY source  ORDER BY c DESC LIMIT 10";
$result = mysqli_query($conn,$query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['countBlockNumber'][] = $r;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
?>