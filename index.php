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
  <?php 
  echo "<pre>";print_r($_SESSION);echo "</pre>";
  ?>
    <?php if ($_SESSION['FBID']): ?>
    <!--  After user login  -->
    <div class="container">
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
            บรรทัดที่ 1: <input type="text" id="line1" value="Test L2">
          </div>
          <div class="col-right">
            ขนาดตัวหนังสือ 1: <div class="slider-wrap"><em>10px</em> <input type="range" min="10" max="200" value="122" id="font1" step="1"> <em>200px</em></div>
          </div>
        </div>
        <div class="row">
          <div class="col-left">
            บรรทัดที่ 2: <input type="text" id="line2" value="Test L2">
          </div>
          <div class="col-right">
            ขนาดตัวหนังสือ 2: <div class="slider-wrap"><em>10px</em> <input type="range" min="10" max="200" value="122" id="font2" step="1"> <em>200px</em></div>
          </div>
        </div>
        <div class="row">
          <div class="col-left">
            บรรทัดที่ 3: <input type="text" id="line3" value="TEST L3">
          </div>
          <div class="col-right">
            ขนาดตัวหนังสือ 3: <div class="slider-wrap"><em>10px</em> <input type="range" min="10" max="200" value="70" id="font3" step="1"> <em>200px</em></div>
          </div>
        </div>
        <hr>
        ความโปร่งใสรูป: <div class="slider-wrap"><em>0 (ทึบ)</em> <input type="range" min="0" max="100" value="20" id="imgopacity" step="1"> <em>100 (โปร่ง)</em></div>
        <hr>
        <div class="">
          <a href="#" class="btn btn-primary" id="download">ดาวน์โหลดรูป</a>
          <p>ทดสอบใน Chrome, Firefox เรียบร้อยแล้ว ไม่ควรใช้ Internet Explorer</p>
        </div>
        <?php if ($_SESSION['FBID']){ ?>
        <input type="hidden" name="fbid" id="fbid" value="true">
        <input type="hidden" name="img_fb" id="img_fb" value="https://graph.facebook.com/<?php echo $_SESSION['FBID'];?>/picture?height=1024&width=1024">
        <?php }else{ ?>
           <input type="hidden" name="fbid" id="fbid" value="false">
        <?php } ?>
      </div>
    </div>
    <div><a href="logout.php">logout</a></div>
    <?php else: ?>
    <!-- Before login --> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2>Login with Facebook</h2>
             <button class="btn btn-primary">
              <a href="login_fb.php" style="color:white;">Login with Facebook</a>
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>
    <script src="./assets/js/script.js"></script>
  </body>
</html>