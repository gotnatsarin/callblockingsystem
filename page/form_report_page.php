<?php 
require('query/checklogin.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head></head>
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
          <h5>รายงานเบอร์ที่โดนบล็อค 10 อับดับ</h5>
        </div>
        <br>
        <div class="row">
          <div class="col-4">
          </div>
          <div class="col-4 mt-2">
            <div class="text-end mb-4">
              <lable>เดือน</lable>
              <input type="month" class="form-control mt-2" name="date" id="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : date('Y-m'); ?>" aria-label="name" >
            </div>
          </div>
        </div>
        <br>
        <div class="row mb-4">
          <div class="col-2">
          </div>
          
          <div class="card border col-8 mb-4">
            <div class="card-header text-center">
              รายงานเบอร์โดนบล็อค
            </div>
              <div class="card-body">
                <div class="card-text" >
                  <canvas id="reportChart" style="width:100%;max-width:1000px;"></canvas>
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