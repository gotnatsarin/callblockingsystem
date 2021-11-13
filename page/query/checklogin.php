<?php
session_start();
if (!isset($_SESSION['login_id'])) {
  header( "location: index.php" );
}
require 'connect.php';
$session_login_id = $_SESSION['login_id'];

  $qry_user = "SELECT * FROM user WHERE id ='$session_login_id'";
  $result_user = mysqli_query($conn,$qry_user);
          if ($result_user) {
              $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
              $s_login_username = $row_user['username'];
              $s_login_fullname = $row_user['full_name'];
              $s_login_isadmin = $row_user['role'];
          }
          mysqli_close($conn); 
?>