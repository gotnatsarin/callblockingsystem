<?php
require_once('connect.php');

$rows = 5;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

$sql= "SELECT * FROM phone ORDER BY status";
$result = mysqli_query($conn,$sql);
$total_data = mysqli_num_rows($result);
$total_page = ceil($total_data/$rows);
$start = ($page - 1)*$rows;

$query = "SELECT * FROM phone WHERE phonenumber LIKE '%".$_POST["search"]."%' LIMIT $start,$rows";
$query_exe = mysqli_query($conn,$query);
$rowsFecth = array();

if(mysqli_num_rows($query_exe)>0){
  while($r = mysqli_fetch_assoc($query_exe)) {
    $rowsFecth['PhoneDataObj'][] = $r;
  }
  
  $rowsFetch["totalPage"] = $total_page;
  $rowsFetch["page"] = $page;

  print json_encode($rowsFecth,JSON_UNESCAPED_UNICODE);
}else{

 echo json_encode(array("status"=>"false"));
}

?>