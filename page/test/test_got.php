<?php
require_once('connect.php');

$rows = 5;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

$query = "SELECT * FROM phone WHERE phonenumber LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($conn,$query);
$total_data = mysqli_num_rows($result);
$total_page = ceil($total_data/$rows);
$start = ($page - 1)*$rows;

$sql2 = "SELECT * FROM phone ORDER BY status LIMIT $start,$rows";
$result2 =  mysqli_query($conn,$sql2);
$rowFecth = array();

if(mysqli_num_rows($result2)>0){
  while($r = mysqli_fetch_assoc($result2)) {
    $rowsFetch['PhoneDataObj'][] = $r;
  }

  $rowsFetch["totalPage"] = $total_page;
  $rowsFetch["page"] = $page;
  print json_encode($rowsFetch,JSON_UNESCAPED_UNICODE);

}else{
 echo json_encode(array("status"=>"false"));
}

?>