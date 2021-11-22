<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>
  <title>เพิ่มหมายเลขโทรศัพท์</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
      <br/>
      <div class="modal fade" id="addconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">กรุณายืนยัน</h5>
        </div>
        <div class="modal-body">
          ท่านต้องการเพิ่มเบอร์โทรศัพท์นี้ใช่หรือไม่ ?
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" class="btn btn-danger" >ยกเลิก</button>
          <button type="button" id="confirmbutton" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

      <div class="container">
        <div class="toast bg-danger text-white" data-bs-animation="true" id="add_failed" data-bs-delay="2000" data-bs-autohide="true">
          <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
          </div>
          <div class="toast-body">
            หมายเลขโทรศัพท์นี้มีอยู่แล้ว กรุณาตรวจสอบอีกครั้ง
          </div>
        </div>

        <div class="toast bg-danger text-white" data-bs-animation="true" id="full" data-bs-delay="2000" data-bs-autohide="true">
          <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
          </div>
          <div class="toast-body">
            หมายเลขโทรศัพท์เต็ม
          </div>
        </div>

        <div class="toast bg-success text-white" data-bs-animation="true" id="add_success" data-bs-delay="2000" data-bs-autohide="true">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>สำเร็จ</strong>
            </div>
          <div class="toast-body">
            เพิ่มเบอร์โทรศัพท์เรียบร้อย
          </div>
        </div>

        <div class="mt-2">
          <h5>เพิ่มหมายเลขโทรศัพท์</h5>
        </div>
          <div>
              <div class="row">
                <div class="col-3">
                </div>
                <div class="card col-6 border mt-4">
                  <div class="card-header text-center">
                    เพิ่มหมายเลขโทรศัพท์
                  </div>
                  <div class="card-body">
                    <div class="card-text text-center">
                      <form method="post" enctype="multipart/form-data" id="myform">
                        <input type="text" class="form-control" name="Phone" id="phonenum" placeholder="เบอร์โทรศัพท์" aria-label="name" aria-describedby="email-addon" maxlength="10">
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="add_phone_error"></label>
                      </div>
                      <div class="text-center">
                        <input type="text" class="form-control" name="owner" id="owner" placeholder="ชื่อเจ้าของเบอร์" aria-label="name" aria-describedby="email-addon" maxlength="255">
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="owner_error"></label>
                      </div> 
                      <div class="text-center">
                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                          <!-- <option selected>สถานะ</option> -->
                          <option value="0">ระงับการใช้งาน</option>
                          <option value="1">ใช้งานได้</option>
                        </select>
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="status_error"></label>
                      </div>
                      <br>
                      <div class="text-start mb-2">
                        <a href="main.php" class="btn btn-danger btn-lg  mt-4">ย้อนกลับ</a>
                        <button type="button" class="btn btn-success btn-lg me-md-2" id="save">บันทึก</button>
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
$('#main').addClass('active');
});
</script>
</html>