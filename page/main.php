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
    <input type="hidden" id="room_id" value="#"></input>
    <br>
      <div class="container">
        <div>
          <h5>รายการเบอร์โทรศัพท์</h5>
        </div>
        <div class="row">
          <div class="col-10 mt-4">
            <a href="form_add_phone.php" class="btn btn-success">Add Phone</a>
          </div>
          <div class="col-2 mt-4">
            <input type="search" id="searchphone" class="form-control" placeholder="ค้นหาเบอร์โทรศัพท์"/>
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
                    <td><input type="checkbox" checked data-toggle="toggle" data-size="sm" data-onstyle="success" data-offstyle="danger"></td>
                    <td>
                      <a type="button" id="#" href="form_edit_phone.php" class="btn btn-warning">แก้ไข</a> &nbsp;
                      <button type="button" id="#" class="btn btn-danger">ลบ</button> 
                    </td>
                  </tr> -->
                </tbody>
              </table>
          </div>
      </div>

</body>

<script src="ajax/list_phone.js"></script>

<script>
$(document).ready(function() {
$('#main').addClass('active');
});
</script>
</html>