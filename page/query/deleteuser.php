<?php 
session_start();
require('connect.php');
$id = $_POST['id'];

$sql_check= "SELECT * FROM user WHERE id ='$id'";
$result_check = mysqli_query($conn,$sql_check);

$row = mysqli_fetch_array($result_check,MYSQLI_ASSOC);


if(mysqli_num_rows($result_check)==0){
  echo json_encode(array("status"=>"no ID"));
}elseif($row['role']==0){
  echo json_encode(array("status"=>"ThisisSuperAdmin"));
}else{
  $query = "DELETE FROM user WHERE id = '$id'";
  if(mysqli_query($conn,$query)){
    echo json_encode(array("status"=>"true"));
  }else{
    echo json_encode(array("status"=>"false"));
  }
}

mysqli_close($conn);
?>