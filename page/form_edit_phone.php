<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>
  <title>แก้ไขหมายเลขโทรศัพท์</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
    <br>
      <div class="container">
        <div class="mt-2">
          <h5>แก้ไขหมายเลขโทรศัพท์</h5>
        </div>
          <div>
          <form method="post" enctype="multipart/form-data" id="myform">
              <div class="row">
                <div class="col-2">
                </div>
                <div class="card col-8 border mt-4">
                  <div class="card-header text-center">
                    แก้ไขหมายเลขโทรศัพท์
                  </div>
                  <div class="card-body">
                    <div class="card-text text-center">
                      <form method="post" enctype="multipart/form-data" id="myform">
                        <input type="text" class="form-control" name="Phone" id="phonenum" placeholder="เบอร์โทรศัพท์" aria-label="name" aria-describedby="email-addon">
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="add_phone_error"></label>
                      </div>
                      <div class="text-center">
                        <input type="text" class="form-control" name="owner" id="owner" placeholder="ชื่อเจ้าของเบอร์" aria-label="name" aria-describedby="email-addon">
                      </div>
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="add_phone_error"></label>
                      </div> 
                      <div class="text-center">
                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                          <option selected>สถานะ</option>
                          <option value="0">ระงับการใช้งาน</option>
                          <option value="1">ใช้งานได้</option>
                        </select>
                      </div> 
                      </br>
                      <div class="text-start mb-2">
                      <a href="main.php" class="btn btn-danger btn-lg  mt-4">ย้อนกลับ</a>
                      <button class="btn btn-success btn-lg me-md-2" type="submit" id="save">บันทึก</button>
                    </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
        <div class="toast bg-success text-white" data-bs-animation="true" id="editSuccessToast" data-bs-autohide="true">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>สำเร็จ</strong>
            </div>
          <div class="toast-body">
            แก้ไขหมายเลขโทรศัพท์สำเร็จแล้ว
          </div>
        </div>

        <div class="toast bg-danger text-white" data-bs-animation="true" id="editFailToast" data-bs-delay="2000" data-bs-autohide="true">
            <div class="toast-header bg-danger text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
            </div>
            <div class="toast-body">
              ไม่สามารถแก้ไขหมายเลขโทรศัพท์ได้ กรุณาลองใหม่อีกครั้ง
            </div>
        </div>

        <div class="toast bg-danger text-white" data-bs-animation="true" id="duplicatenumbertoast" data-bs-delay="2000" data-bs-autohide="true">
            <div class="toast-header bg-danger text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
            </div>
            <div class="toast-body">
              หมายเลขโทรศัพท์ซ้ำ กรุณาลองใหม่อีกครั้ง
            </div>
        </div>

</body>
<script src="ajax/editroom.js"></script>
</html>