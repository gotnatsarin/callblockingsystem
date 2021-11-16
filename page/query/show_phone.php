<?php
require_once('connect.php');

$id = $_GET['id'];
$query = "SELECT * FROM phone WHERE id='$id'";
$query_exe = mysqli_query($conn,$query);
$row = array();

$r = mysqli_fetch_assoc($query_exe);

$row['showPhoneObj'][] = $r;

print json_encode($row,JSON_UNESCAPED_UNICODE);
?>