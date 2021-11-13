<?php
$conn = mysqli_connect('localhost', 'root', '','conference');
if (mysqli_connect_errno()) {
    echo "ไม่สามารถติดต่อฐานข้อมูล MySQL ได้".mysqli_connect_error();
    exit;
}
date_default_timezone_set('Asia/Bangkok');
mysqli_set_charset($conn,'utf8');
?>