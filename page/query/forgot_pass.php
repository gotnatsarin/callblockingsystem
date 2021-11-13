<?php 
$email = $_GET['email'];

require('connect.php');
if(isset($email)){
  $query = "SELECT * FROM user WHERE email = '$email'";
  $result = mysqli_query($conn,$query);

  $row = mysqli_fetch_array($result ,MYSQLI_ASSOC);
  if($row['email']==$email){
    $data = json_encode(array("status"=>'true',"id"=>$row['id']));
    echo $data;
  }else{
    $data = json_encode(array("status"=>'false',"id"=>null));
    echo $data;
  }
}
?>