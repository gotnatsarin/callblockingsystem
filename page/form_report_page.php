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
          <div class="card border col-6 mb-4">
            <div class="card-header text-center">
              รายงานเบอร์โดนบล็อค
            </div>
              <div class="card-body">
                <div class="card-text">
                  <canvas id="reportChart" style="width:100%;max-width:600px;"></canvas>
                </div>
              </div>
            </div>
          </div>
        <div class="row mt-4">
          <div class="col-2">
          </div>
            <div class="col-8">
              <table class="table table-hover border">
                <thead>
                  <tr>
                    <th class="col-2">ลำดับที่</th>
                    <th class=" col-4 text-center">หมายเลขโทรศัพท์</th>
                    <th class=" col-2 text-center">จำนวน/ครั้ง</th>
                    <th class="text-center">timeStamp</th>
                  </tr>
                </thead>
                <tbody id="tablebody">
                  <!-- <tr class="text-center">
                    <th scope="row" class="text-end">1</th>
                    <td>0987290448</td>
                    <td>2</td>
                    <td>2021/11/22 22:05:49</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
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