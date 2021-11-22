<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require('mdb_js.php'); ?>
    <?php require('mdb_css.php'); ?>

    <title>Command Page</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
    <br>
    <div class="container">
        <div class="toast bg-danger text-white" data-bs-animation="true" id="command_failed" data-bs-delay="2000" data-bs-autohide="true">
          <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="bi-gift-fill"></i>ผิดพลาด</strong>
          </div>
          <div class="toast-body">
            กรุณาตรวจสอบอีกครั้ง
          </div>
        </div>

        <div class="toast bg-success text-white" data-bs-animation="true" id="command_success" data-bs-delay="2000" data-bs-autohide="true">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto"><i class="bi-gift-fill"></i>สำเร็จ</strong>
            </div>
          <div class="toast-body">
            บันทึกเรียบร้อย
          </div>
        </div>

    <div class="container">
      <div class="mt-4">
        <h5>ตั้งค่าระบบ</h5>
      </div>
      <div class="row">
        <div class="col-3">
        </div>
        <div class="card col-6 border text-center mt-4">
          <div class="card-header mt-2">
                ตั้งค่าระบบ
              <div class=" text-start">
                <button class="btn btn-success" type="button" id="save">บันทึก</button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-text">
              <form method="post" enctype="multipart/form-data" id="myform">
                <div class="row text-end">
                <label class="mb-2">Inbound Trunk</label>
                  <div class="col-1">
                    <lable>IP</lable>
                  </div>
                  <div class="col-7 text-end">
                      <input type="text" class="form-control" name="inbound" id="inbound_trunk" placeholder="IP sip trunk" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                      <div class="text-center">
                        <label class="text-center" style="color: red;font-size: 13px;" id="inbound_error">
                        </label>
                      </div>
                    </div>
                  <div class="col-1 text-center">
                    <b>:</b>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="port_inbound" id="Port1" placeholder="Port" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                    <div class="text-center">
                      <label style="color: red;font-size: 13px;" id="port_inbound_error">
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row text-end mb-2">
                <label class="mb-2">Outbound Trunk</label>
                  <div class="col-1">
                    <lable>IP</lable>
                  </div>
                  <div class="col-7 text-end">
                    <input type="text" class="form-control" name="outbound" id="outbound_trunk" placeholder="IP sip trunk" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                      <div class="text-center" >
                        <label style="color: red;font-size: 13px;" id="outbound_error"></label>
                      </div>
                  </div>
                  <div class="col-1 text-center">
                    <b>:</b>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="port_outbound" id="Port2" placeholder="Port" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                      <div class="text-center" >
                          <label style="color: red;font-size: 13px;" id="port_outbound_error"></label>
                      </div> 
                  </div>
                </div>
                <hr>
                <div class="row text-end mb-4">
                  <label class="mb-2">Status Trunk</label>
                  <div class="col-1">
                  </div>
                  <div class="col-12 text-end">
                    <div class="text-center">
                      <button class="btn btn-primary " type="button" onclick="focusScrollMethod()" data-mdb-toggle="collapse" data-mdb-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                       แสดง
                      </button>
                      <div class="collapse multi-collapse mt-3 " id="multiCollapseExample2">
                          <lable>test1 : 6001 1</lable> <br>
                          <lable>test1 : 6001 1</lable> <br>
                          <lable>test1 : 6001 1</lable> <br>
                          <lable>test1 : 6001 1</lable> <br>
                          <lable>test1 : 6001 1</lable> <br>
                          <lable>test1 : 6001 1</lable> <br>
                      </div>
                    </div>
                  </div> 
                </div>
              </form> 
          </div> 
        </div>     
</body>

<script>
  focusScrollMethod = function getFocus() {
  document.getElementById("myButton").focus({preventScroll:false});
}
</script>
<script src="ajax/command.js"></script>
<script>
    $(document).ready(function() {
    $('#command_page').addClass('active');
    });
</script>

</html>