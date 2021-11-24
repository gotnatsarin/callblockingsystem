<?php
require_once('connect.php');

$query = "SELECT * FROM phone WHERE phonenumber LIKE '%".$_POST["search"]."%'";

$query_exe = mysqli_query($conn,$query);
$row = array();



if(mysqli_num_rows($query_exe)>0){
  while($r = mysqli_fetch_assoc($query_exe)) {
    $rows['PhoneDataObj'][] = $r;
  }
  
  print json_encode($rows,JSON_UNESCAPED_UNICODE);
}else{

 echo json_encode(array("status"=>"false"));
}

?>