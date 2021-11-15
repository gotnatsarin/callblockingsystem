<?php 
  session_start();
  if (isset($_SESSION['login_id'])) {
    header( "location: main.php" );
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php require('mdb_js.php'); ?>
      <?php require('mdb_css.php'); ?>
      <title>Call Blocking System</title>
  </head>
  <body>
    <div class="toast bg-danger text-white" data-bs-animation="true" id="myToast" data-bs-delay="2000" data-bs-autohide="true">
        <div class="toast-header bg-danger text-white">
          <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
        </div>
        <div class="toast-body">
          ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
        </div>
      </div>
    <!-- <div class="body" style="height: 100vh"> -->
    <div class="bg-image" style="background-image: url('https://www.securuscomms.co.uk/wp-content/uploads/2019/10/Understanding-VoIP-as-a-Service-image1.jpg'); height:100vh;">
      <br/><br/>
        <div class="loginBoxContent">
          <div class="loginBoxContent_text">
            <div class="text-center">
            <i class="fas fa-phone fa-4x"></i>
              </div>  
                <br/>
                <div class="text-center">
                  <h4>CALL BLOCKING SYSTEM</h4>
                  <hr>
                </div> 
              <div class="text-center">
                <h2>เข้าสู่ระบบ</h2>
              </div>
                <br/>
                <form action="javascript:void(0);" style="text-align: left;">
                  <div class="input-group">
                    <span class="input-group-text border-0" id="search-addon"><i class="fas fa-user"></i></span>
                    <input id="username" autocomplete="off" type="text" class="form-control rounded" placeholder="Username" aria-label="username" aria-describedby="username-addon" maxlength="255"/>
                  </div>
                  <div class="text-center" ><label style="color: red;font-size: 13px;" id="username_error_message"></label></div>
                  <div class="input-group">
                    <span class="input-group-text border-0" id="search-addon"><i class="fas fa-unlock-alt"></i></span> 
                    <input id="password" autocomplete="off" type="password" class="form-control rounded"  placeholder="Password" aria-label="password" aria-describedby="password-addon" maxlength="255" />
                  </div>
                  <div class="text-center" ><label style="color: red;font-size: 13px;" id="password_error_message"></label></div>
                  <div class="text-center">
                    <button id="submit" type="submit" class="btn btn-success btn-lg mt-4">เข้าสู่ระบบ</button>
                  <div>
                </form>
                <br/>
              </div>          
        </div>
      </div>
  </body>
  <script src="ajax/login.js"></script>
</html>