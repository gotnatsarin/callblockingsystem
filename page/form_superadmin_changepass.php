<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require('mdb_js.php'); ?>
    <?php require('mdb_css.php'); ?>

    <title>หน้าเปลียนรหัสผ่าน user</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
    <br>
    <div class="container">
        <div class="mt-2">
          <h5>แก้ไขบัญชีผู้ใช้</h5>
          <div>
          <form method="post" enctype="multipart/form-data" id="myform">
          <input type="hidden" id="user_id" value="<?php echo $_GET['id'];?>">
          <div class="row">
            <div class="col-3">
            </div>
            <div class="card col-6 border mt-4">
              <div class="card-header text-center">
              แก้ไขบัญชีผู้ใช้
              </div>
              <div class="card-body">
              <div class="card-text text-end mb-3">
                  <b>ชื่อผู้ใช้ : </b>
                </div>
                <div class="text-center">
                  <input type="text" class="form-control"  id="new_username" placeholder="ชื่อผู้ใช้ใหม่" >
                </div>
                <div class="text-center" >
                  <label style="color: red;font-size: 13px;" id="newuser_error"></label>
                </div>
                <div class="text-center">
                  <input type="password" class="form-control"  id="new_pass" placeholder="รหัสผ่านใหม่" >
                </div>
                <div class="text-center" >
                  <label style="color: red;font-size: 13px;" id="newpass_error"></label>
                </div>
                <div class="text-center">
                  <input type="password" class="form-control"  id="confirm_newpass" placeholder="ยืนยันรหัสผ่านใหม่" >
                </div>
                <div class="text-center" >
                  <label style="color: red;font-size: 13px;" id="confirm_error"></label>
                </div>
              </form>
              <div class="text-start mb-2">
                  <a href="form_user.php" class="btn btn-danger btn-lg  mt-4">ย้อนกลับ</a>
                  <button class="btn btn-success btn-lg me-md-2" type="button" id="save">บันทึก</button>
                </div>
              </div>
              <div class="toast bg-danger text-white" data-bs-animation="true" id="changefailed" data-bs-delay="2000" data-bs-autohide="true">
                <div class="toast-header bg-danger text-white">
                  <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
                </div>
                <div class="toast-body">
                  รหัสผ่านไม่ตรงกัน
                </div>
              </div>
              <div class="toast bg-success text-white" data-bs-animation="true" id="changesuccess" data-bs-delay="2000" data-bs-autohide="true">
                <div class="toast-header bg-success text-white">
                  <strong class="me-auto"><i class="bi-gift-fill"></i>สำเร็จ</strong>
                </div>
                <div class="toast-body">
                แก้ไขข้อมูลเสร็จสิ้น
                </div>
              </div>
</body>
<script src="ajax/edituser.js"></script>
<script>
$(document).ready(function() {
$('#user').addClass('active');
});
</script>
</html>