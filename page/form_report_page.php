<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <title>หน้าจัดการผู้ใช้</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
    <br>
      <div class="container">
        <div class="mt-4">
          <h5>รายงาน</h5>
        </div>
        <br>
        <div class="row mb-4">
          <div class="col-3">
          </div>
          <div class="col-8">
            <canvas id="reportChart" style="width:100%;max-width:600px;"></canvas>
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
                <tbody id="tablebody">
                <tr class="text-center">
                  <th scope="row">1</th>
                  <td>0987290448</td>
                  <td>ระงับการใช้งาน</td>
                  <td>
                    <a class="btn btn-danger">ระงับการใช้งาน</a> &nbsp;
                       <button type="button" value="" id="btn_des" class="btn btn-success">ใช้งานได้</button>
                    </td>
                </tr>
                </tbody>
              </table>
          </div>
      </div>
</body>

<script src="ajax/showReportChart.js"></script>
<script>
$(document).ready(function() {
$('#report_page').addClass('active');
});
</script>

</html>