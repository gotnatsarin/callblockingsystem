<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>
  <title>หน้าจัดการผู้ใช้</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
    <br>
      <div class="container">
        <div class="mt-4">
          <h5>จัดการผู้ใช้</h5>
        </div>
        <br>
        <div class="row">
          <div class="col-1">
          </div>
          <div class="col-10">
            <div class="mb-4">
              <a href="form_add_user.php" class="btn btn-success">Add user</a>
            </div>
            <table class="table table-hover border">
              <thead>
                <tr>
                  <th class="col-2">ลำดับที่</th>
                  <th class=" col-5 text-center">ชื่อผู้ใช้</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody id="tbuser">
              </tbody>
            </table>
          </div> 
        </div>
      </div>
</body>
<script src="ajax/list_user.js"></script>
<script>
$(document).ready(function() {
$('#user').addClass('active');
});
</script>
</html>