<!-- Image and text -->
<nav class="navbar" style="background-color:grey;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../page/main.php">
      <img
        src="../img/logo.png"
        class="me-2"
        height="40"
        alt=""
        loading="lazy"
      />
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
      <i class="fas fa-bars"></i>
    </button>
    <div class="text-start">
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <div class="row">
          <div class="col-12">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li id="nav_main" class="nav-item">
                <a class="nav-link" id="main" href="#">หน้าหลัก</a>
              </li>
              <li id="nav_booking" class="nav-item">
                <a class="nav-link" aria-current="page" href="#">command</a>
              </li>
              <li id="form_result" class="nav-item">
                <a class="nav-link"  href="#">report</a>
              </li>
              <?php
                if($s_login_isadmin==0){
              ?>
              <li class="nav-item" id="manage_room">
                <a class="nav-link"  href="#">เปลียนรหัสผ่าน</a>
              </li>
              <?php 
                }
              ?>
              <li class="nav-item">
                <a class="nav-link"  href="query/logout.php">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="nav-link text-light" aria-current="page" >
      <?php require('time.php'); ?>
    </div>
  </div>
</nav>

