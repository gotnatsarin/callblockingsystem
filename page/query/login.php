<?php 
  require('connect.php');

  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $key = "newDEVsince2021";
  $hash_login_password = hash_hmac('sha256',$password,$key);

  $sql = "SELECT * FROM user WHERE username=? AND password=?";
  $stmt = mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,"ss",$username, $password);
  mysqli_stmt_execute($stmt);
  $result_user = mysqli_stmt_get_result($stmt);
  
  if ($result_user->num_rows ==1 ){
    $sql2 = "SELECT * FROM room ORDER BY `room`.`room_place` ASC LIMIT 1";
    $result2 = mysqli_query($conn,$sql2);
    $row_room = mysqli_fetch_array($result2,MYSQLI_ASSOC);

    session_start();
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    mysqli_close($conn);
    $_SESSION['login_id'] = $row_user['id'];
    $_SESSION['roomfirst'] = $row_room['room_id'];
    if ($row_user['role'] == 0) {
      $_SESSION['is_admin'] = "yes";
      $data = json_encode(array("status"=>'true',"id"=>$row_room['room_id']));
      echo $data;
    } else {
      $_SESSION['is_admin'] = "no";
      $data = json_encode(array("status"=>'true',"id"=>$row_room['room_id']));
      echo $data;
    }
  } else {
    $data = json_encode(array("status"=>'false',"id"=>null));
      echo $data;
    }

?>