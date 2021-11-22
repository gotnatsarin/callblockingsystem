<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>
  
  <title>หน้าหลัก</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
  <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">กรุณายืนยัน</h5>
        </div>
        <div class="modal-body">
          ท่านต้องการลบเบอร์โทรศัพท์นี้ใช่หรือไม่ ?
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" class="btn btn-danger" >ยกเลิก</button>
          <button type="button" id="confirmdelete" class="btn btn-success">ยืนยันการลบ</button>
        </div>
      </div>
    </div>
  </div>
    <br>
      <div class="container">
        <div>
          <h5>รายการเบอร์โทรศัพท์</h5>
        </div>
        <div class="row">
          <div class="col-10 mt-4">
            <a href="form_add_phone.php" class="btn btn-success">เพิ่มหมายเลขโทรศัพท์</a>
          </div>
          <div class="col-2 mt-4">
            <input type="search"  name="searchphone" id="searchphone" class="form-control" placeholder="ค้นหาเบอร์โทรศัพท์"/>
            <label style="color: red;font-size: 10px;" id="search_error"></label>
          </div>
          </div>
            <div>
              <table class="table table-hover border">
                <thead>
                  <tr>
                    <th class="col-1">ลำดับที่</th>
                    <th class=" col-4 text-center">หมายเลขโทรศัพท์</th>
                    <th class=" col-4 text-center">สถานะ</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="table_phone">
                  <!-- <tr class="text-center">
                    <th scope="row">1</th>
                    <td>0987290448</td>
                    <td>
                      <button class="btn btn-success" id="Toggle">สถานะ</button>
                    </td>
                    <td>
                      <a type="button" id="#" href="form_edit_phone.php" class="btn btn-warning">แก้ไข</a> &nbsp;
                      <button type="button" id="#" class="btn btn-danger">ลบ</button> 
                    </td>
                  </tr> -->
                </tbody>
              </table>
          </div>
      </div>
        <div class="toast bg-danger text-white" data-bs-animation="true" id="noID" data-bs-delay="2000" data-bs-autohide="true">
            <div class="toast-header bg-danger text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
            </div>
            <div class="toast-body">
            ไม่พบเบอร์โทรศัพท์นี้ กรุณาลองใหม่อีกครั้ง
            </div>
        </div>
</body>

<script src="ajax/list_phone.js"></script>

</html>