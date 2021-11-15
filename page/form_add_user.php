<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>
  <title>เพิ่มผู้ใช้งาน</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function checkPasswordStrength() {
      var number = /([0-9])/;
      var alphabets = /([a-zA-Z])/;
      var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
      
      if($('#password').val().length<8) {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('weak-password');
        $('#password-strength-status').html("ต้องมีความยาวอย่างน้อย 8 ตัวอักษรหรือมากกว่านั้น");
      } else {  	
          if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
          $('#password-strength-status').removeClass();
          $('#password-strength-status').addClass('strong-password');
          $('#password-strength-status').html("รหัสผ่านมีความปลอดภัยมาก");
            } else {
          $('#password-strength-status').removeClass();
          $('#password-strength-status').addClass('medium-password');
          $('#password-strength-status').html("รหัสผ่านปานกลาง (ควรมีตัวหนังสือ, เลข และอักขระพิเศษ)");
            } 
      }
    }
</script>
  <style>
    #password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
    .medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
    .weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
    .strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
  </style>
    <?php require('components/navbar.php'); ?>
      <br/>
      <div class="container">
        <div class="toast bg-danger text-white" data-bs-animation="true" id="myToast" data-bs-delay="2000" data-bs-autohide="true">
          <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
          </div>
          <div class="toast-body">
            ชื่อผู้ใช้นี้มีอยู่แล้ว กรุณาตรวจสอบอีกครั้ง
          </div>
        </div>

        <div class="toast bg-success text-white" data-bs-animation="true" id="myToast_success" data-bs-delay="2000" data-bs-autohide="true">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>สำเร็จ</strong>
            </div>
          <div class="toast-body">
            เพิ่มผู้ใช้เรียบร้อย
          </div>
        </div>

        <div class="mt-2">
          <h5>เพิ่มชื่อผู้ใช้</h5>
        </div>
          <div>
              <div class="row">
                <div class="col-3">
                </div>
                <div class="card col-6 border mt-4">
                  <div class="card-header text-center">
                  เพิ่มชื่อผู้ใช้
                  </div>
                  <div class="card-body">
                    <div class="card-text text-center">
                      <form method="post" enctype="multipart/form-data" id="myform">
                        <input type="text" class="form-control" name="username" id="" placeholder="ชื่อผู้ใช้" maxlength="255" aria-label="name" aria-describedby="email-addon">
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="add_user_error"></label>
                      </div>
                      <div class="text-center">
                      <input type="password" name="password" id="password" class="form-control" onKeyUp="checkPasswordStrength();" maxlength="255" placeholder="รหัสผ่าน"/><div id="password-strength-status"></div>
                      </div>
                      <div class="text-start mb-2">
                      <a href="form_user.php" class="btn btn-danger btn-lg  mt-4">ย้อนกลับ</a>
                      <button class="btn btn-success btn-lg me-md-2" type="submit" id="save">บันทึก</button>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </body>
<script src="ajax/add_phone.js"></script>
<script>
$(document).ready(function() {
$('#user').addClass('active');
});
</script>
</html>