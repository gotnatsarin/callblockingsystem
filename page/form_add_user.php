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
  <style>
    #password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
    .medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
    .weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
    .strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
  </style>
    <?php require('components/navbar.php'); ?>
    <div class="modal fade" id="addconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">กรุณายืนยัน</h5>
        </div>
        <div class="modal-body">
          ท่านต้องการเพิ่มผู้ใช้นี้ใช่หรือไม่ ?
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" class="btn btn-danger" >ยกเลิก</button>
          <button type="button" id="confirmbutton" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>
      <br/>
      <div class="container">
        <div class="toast bg-danger text-white" data-bs-animation="true" id="add_user_failed" data-bs-delay="2000" data-bs-autohide="true">
          <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
          </div>
          <div class="toast-body">
            ชื่อผู้ใช้นี้มีอยู่แล้ว กรุณาตรวจสอบอีกครั้ง
          </div>
        </div>

        <div class="toast bg-success text-white" data-bs-animation="true" id="add_user_success" data-bs-delay="2000" data-bs-autohide="true">
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
                        <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="add_user_error"></label>
                      </div>
                      <div class="text-center">
                      <input type="password" name="password" id="password" class="form-control"  maxlength="255" placeholder="รหัสผ่าน"/><div id="password-strength-status"></div>
                      </div>
                      <div class="text-start mb-2">
                      <a href="form_user.php" class="btn btn-danger btn-lg  mt-4">ย้อนกลับ</a>
                      <button class="btn btn-success btn-lg me-md-2" type="button" id="save">บันทึก</button>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </body>
<script src="ajax/add_user.js"></script>
<script>
$(document).ready(function() {
$('#user').addClass('active');
});
</script>
</html>