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
      <div class="mt-4">
        <h5>ตั้งค่าระบบ</h5>
      </div>
      <div class="row">
        <div class="col-3">
        </div>
        <div class="card col-6 border mt-4">
          <div class="card-header text-center">
            ตั้งค่าระบบ
          </div>
            <div class="card-body">
            <div class="card-text">
              <form method="post" enctype="multipart/form-data" id="myform">
                <div class="row text-end mb-4">
                <label class="mb-2">Inbound Trunk</label>
                  <div class="col-1">
                    <lable>IP</lable>
                  </div>
                  <div class="col-7 text-end">
                      <input type="text" class="form-control" name="inbound" id="inbound_trunk" placeholder="IP sip trunk" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                  </div>
                  <div class="col-1 text-center">
                    <b>:</b>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="username" id="1Port" placeholder="Port" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                  </div>
                </div>
                <div class="row text-end mb-4">
                <label class="mb-2">Outbound Trunk</label>
                  <div class="col-1">
                    <lable>IP</lable>
                  </div>
                  <div class="col-7 text-end">
                      <input type="text" class="form-control" name="inbound" id="outbound_trunk" placeholder="IP sip trunk" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                  </div>
                  <div class="col-1 text-center">
                    <b>:</b>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="username" id="2Port" placeholder="Port" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                  </div>
                </div>
                <div class="row text-end mb-4">
                <label class="mb-2">Failover Trunk</label>
                  <div class="col-1">
                    <lable>IP</lable>
                  </div>
                  <div class="col-7 text-end" >
                      <input type="text" class="form-control" name="inbound" id="failover_trunk" placeholder="IP sip trunk" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                  </div>
                  <div class="col-1 text-center">
                    <b>:</b>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="username" id="3Port" placeholder="Port" maxlength="255" aria-label="name"  aria-describedby="email-addon">
                  </div>
                </div>
                <div class="row text-end mb-4">
                <label class="mb-2">Status Trunk</label>
                  <div class="col-1">
                  </div>
                  <div class="col-12 text-end">
                      <textarea id="text_area" class="md-textarea form-control mt-2" rows="2" cols="50"> venice </textarea>
                  </div> 
                </div>
              </form>
          </div> 
        </div>

          
</body>

<script>
    $(document).ready(function() {
    $('#command_page').addClass('active');
    });
</script>

</html>