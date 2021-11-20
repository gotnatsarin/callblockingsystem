<nav class="navbar" style="background-color:grey;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../page/main.php">
      <i class="fas fa-phone-alt"></i> &nbsp;&nbsp;
      <small class=" text-light">Call Blocking System</small>
</a>
    <h5 class=" text-light">ยินดีต้อนรับคุณ : <?php echo $s_login_username; ?></h5>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarLeftAlignExample"
      aria-controls="navbarLeftAlignExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
      >
      <i class="fas fa-phone fa-4x"></i>
    </button>
    <div class="text-start">
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <div class="row">
          <div class="col-12">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li id="nav_main" class="nav-item">
                <a class="nav-link" id="main" href="main.php">หน้าหลัก</a>
              </li>
              <li id="nav_booking" class="nav-item">
                <a class="nav-link" aria-current="page" id="command_page" href="form_command_page.php">หน้าตั้งค่าระบบ</a>
              </li>
              <li id="form_result" class="nav-item">
                <a class="nav-link"  id="report_page" href="form_report_page.php">หน้ารายงาน</a>
              </li>
              <?php
                if($s_login_isadmin==0){
              ?>
              <li class="nav-item">
                <a class="nav-link"  id="user" href="form_user.php">หน้าจัดการผู้ใช้</a>
              </li>
              <?php 
                }
              ?>
              <li class="nav-item">
                <a class="nav-link"  id="form_changepassword_page" href="form_changepassword_page.php">เปลียนรหัสผ่าน</a>
              </li> 
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="nav-item navbar-nav" aria-current="page" >
      <a class="nav-link"  href="query/logout.php">ออกจากระบบ</a>
    </div>
  </div>
</nav>

