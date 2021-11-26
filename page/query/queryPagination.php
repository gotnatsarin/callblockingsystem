<?php 
require('connect.php');

$searchKey = $_GET['search']  ?? null;
$rows = 15;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

$sql= "SELECT * FROM phone WHERE phonenumber like '%$searchKey%' ORDER BY id";
$result = mysqli_query($conn,$sql);
$total_data = mysqli_num_rows($result);
$total_page = ceil($total_data/$rows);
$start = ($page - 1)*$rows;

$sql2 = "SELECT * FROM phone WHERE phonenumber like '%$searchKey%' ORDER BY status,id ASC  LIMIT $start,$rows";
$result2 =  mysqli_query($conn,$sql2);
$rowsFetch = array();

if(mysqli_num_rows($result2)>=1){
  while($r = mysqli_fetch_assoc($result2)){
    $rowsFetch['PhoneDataObj'][] = $r;
  }
  $rowsFetch["totalPage"] = $total_page;
  $rowsFetch["page"] = $page;
  $rowsFetch["start"] = $start;
  $rowsFetch['rows'] =">1";
  $total_page = ceil(mysqli_num_rows($result2)/$rows);
print json_encode($rowsFetch,JSON_UNESCAPED_UNICODE);
}else{
  
  $rowsFetch["totalPage"] = $total_page;
  $rowsFetch["page"] = $page;
  $rowsFetch["start"] = $start;
  $rowsFetch['rows'] ="0";
  print json_encode($rowsFetch,JSON_UNESCAPED_UNICODE);
}
?>