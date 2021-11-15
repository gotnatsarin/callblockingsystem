<?php 
$key = "newDEVsince2021";
$hash_login_password = hash_hmac('sha256',"kantapat",$key);
echo "23aa6dfbe6ecb7fa8f7226f8ba83506ff50f76a35d5b912cad7e14893ba74a5d<br>";
echo $hash_login_password;
?>