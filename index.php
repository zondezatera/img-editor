<?php session_start(); ?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="th_TH">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="fb:app_id" content="">
    <meta property="og:image" content="">
    <title>IMG editor</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>
    <?php if ($_SESSION['FBID']): ?>
    <!--  After user login  -->
    <div class="container">
     <!--  <div class="hero-unit">
        <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>
        <p>Welcome to "facebook login" tutorial</p>
      </div>
      <div class="span4">
        <ul class="nav nav-list">
          <li class="nav-header">Image</li>
    	     <li>
            <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture">
          </li>
          <li class="nav-header">Facebook ID</li>
          <li><?php echo  $_SESSION['FBID']; ?></li>
          <li class="nav-header">Facebook fullname</li>
          <li><?php echo $_SESSION['FULLNAME']; ?></li>
          <li class="nav-header">Facebook Email</li>
          <li><?php echo $_SESSION['EMAIL']; ?></li>
          <div>
            <a href="logout.php">Logout</a>
          </div>
        </ul>
      </div> -->
      <div class="logo-wrapper">
        <div class="page-wrapper">
          <a href="http://www.designil.com/" title="สอนเว็บดีไซน์ HTML CSS">
            <img src="./Jeju Editor - ทำรูปสไตล์เจ๊จูในรูปแบบของคุณเอง_files/logo-thai3.png" alt="">
          </a>
          <div class="head-note">
            Jeju Editor - สร้างรูปสไตล์​เจ๊จูในรูปแบบของคุณเอง
          </div>
        </div>
      </div>

      <div class="page-wrapper">
        <div class="canvas-wrapper">
          <div class="mobile-note">
            <p>สำหรับผู้ใช้ทางมือถือ:<br>
            </p><ul>
              <li>หากพบว่าฟ้อนต์ในรูปดูพัง ๆ กรุณา Refresh 1 รอบ</li>
              <li>ถ้าเปิดจาก App Facebook กรุณาเปิดลิงค์นี้ใหม่ใน Browser แทน</li>
            </ul>
          </div>
          <canvas id="jeju" width="1024" height="1024"></canvas>
        </div>
        <div class="button-row">
          <label for="uploadinput" id="upload">อัพโหลดรูป
          <input type="file" id="uploadinput" accept="image/*"></label> (JPG หรือ PNG ขนาดแนะนำ: 1024x1024 px)
        </div>
        <div class="row">
          <div class="col-left">
            บรรทัดที่ 1: <input type="text" id="line1" value="Hi เป็นประโยคบอกทัก">
          </div>
          <div class="col-right">
            ขนาดตัวหนังสือ 1: <div class="slider-wrap"><em>10px</em> <input type="range" min="10" max="200" value="122" id="font1" step="1"> <em>200px</em></div>
          </div>
        </div>
        <div class="row">
          <div class="col-left">
            บรรทัดที่ 2: <input type="text" id="line2" value="แต่ รัก เป็นประโยคบอกเธอ">
          </div>
          <div class="col-right">
            ขนาดตัวหนังสือ 2: <div class="slider-wrap"><em>10px</em> <input type="range" min="10" max="200" value="122" id="font2" step="1"> <em>200px</em></div>
          </div>
        </div>
        <div class="row">
          <div class="col-left">
            บรรทัดที่ 3: <input type="text" id="line3" value="(เจ้แทน รับปรึกษาปัญหาหัวใจ 08X XXX XXXX)">
          </div>
          <div class="col-right">
            ขนาดตัวหนังสือ 3: <div class="slider-wrap"><em>10px</em> <input type="range" min="10" max="200" value="70" id="font3" step="1"> <em>200px</em></div>
          </div>
        </div>
        <hr>
        ความโปร่งใสรูป: <div class="slider-wrap"><em>0 (ทึบ)</em> <input type="range" min="0" max="100" value="20" id="imgopacity" step="1"> <em>100 (โปร่ง)</em></div>
        <hr>
        <div class="button-row">
          <a href="http://designil.com/jeju/#" id="download">ดาวน์โหลดรูป</a>
          <p>ทดสอบใน Chrome, Firefox เรียบร้อยแล้ว ไม่ควรใช้ Internet Explorer</p>
        </div>
      </div>
    </div>
    <?php else: ?>
    <!-- Before login --> 
    <div class="container">
      <h1>Login with Facebook</h1> Not Connected
      <div>
        <!-- <a href="fbconfig.php">Login with Facebook</a> -->
        <a href="login_fb.php">Login with Facebook</a>
      </div>
    </div>
    <?php endif ?>
    <script src="./assets/js/script.js"></script>
  </body>
</html>