function getID(id) {return document.getElementById(id);} // Get elem by ID

var drawJeju = debounce(function() {
  var canvas = getID("jeju");
  var ctx = canvas.getContext("2d");
  
  // Clear
  ctx.fillStyle="#000000";
  ctx.fillRect(0, 0, 1024, 1024);
  
  // Get Image
  var bgImg = new Image();
  bgImg.crossOrigin = "Anonymous";
  
  bgImg.onload = function() {
    // Auto Scale, Auto Center Photo
    var bgHRatio = 1,
    bgWRatio = 1;

    if( bgImg.width > bgImg.height ) {
      bgWRatio = bgImg.width / bgImg.height;
    } else {
      bgHRatio = bgImg.height / bgImg.width;
    }
    
    ctx.drawImage(bgImg, 0, 0, 1024 * bgWRatio, 1024 * bgHRatio);

    // Step - Turn image to black/white
    var bgData = ctx.getImageData(0, 0, 1024, 1024);
    var bgPixel = bgData.data;
    for (var i = 0, n = bgPixel.length; i < n; i += 4) {
      var grayscale = bgPixel[i] * .3 + bgPixel[i+1] * .59 + bgPixel[i+2] * .11;
      bgPixel[i] = grayscale; 	// red
      bgPixel[i+1] = grayscale; 	// green
      bgPixel[i+2] = grayscale; 	// blue
      // alpha
    }
    ctx.putImageData(bgData, 0, 0);
    
    // Get Text / Value
    var line1 = getID('line1').value;
    var line2 = getID('line2').value;
    var line3 = getID('line3').value;

    var font1 = getID('font1').value;
    var font2 = getID('font2').value;
    var font3 = getID('font3').value;
    var imgopacity = getID('imgopacity').value;

    // Step - Draw Overlay
    imgopacity = imgopacity / 100;
    ctx.fillStyle="rgba(0,0,0," + imgopacity + ")";
    ctx.fillRect(0, 0, 1024, 1024);
    
    // Step - Draw Text - Line 1
    ctx.font = font1 + "px TH Sarabun New";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.textBaseline = "top";
    ctx.fillText(line1, canvas.width/2, 10);

    // Step - Draw Text - Line 2
    ctx.font = font2 + "px TH Sarabun New";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.textBaseline = "bottom";
    ctx.fillText(line2, canvas.width/2, canvas.height-150);

    // Step - Draw Text - Line 3
    ctx.font = font3 + "px TH Sarabun New";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.textBaseline = "bottom";
    ctx.fillText(line3, canvas.width/2, canvas.height-80);

    // Step - Draw Text - Credit Line
    ctx.font = "48px TH Sarabun New";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.textBaseline = "bottom";
    ctx.fillText("สร้างรูปของคุณเองได้ที่ http://www.designil.com/jeju", canvas.width/2, canvas.height-30);
  }

  // Get Image SRC
  var uploadInput = getID('uploadinput');
  if ( uploadInput.files && uploadInput.files[0] ) {
    // Has Image Uploaded
    var fileReader = new FileReader();
    fileReader.onload = function(e) {
       bgImg.src = e.target.result;
    };       
    fileReader.readAsDataURL( uploadInput.files[0] );
  } else {
    // No Image Uploaded
    bgImg.src = 'http://i.imgur.com/igNeJQw.jpg';
  }
}, 10); // End DrawJeju (Debounced)

drawJeju();

// ------------------------------------------------------------------

// - All Event Listeners (Trigger redraw when value change)
// Detect Input Change
var lineInputs = document.querySelectorAll('#line1, #line2, #line3');
for(var i=0; i<lineInputs.length; i++) {
  lineInputs[i].addEventListener('input', function() { drawJeju(); });
}

// Opacity Change
var opInputs = document.querySelectorAll('input[type="range"]')
for(var i=0; i<opInputs.length; i++) {
  opInputs[i].addEventListener('input', function() { drawJeju(); });
}

// Detect Uplaod Image
var uploadInput = getID('uploadinput');
uploadInput.addEventListener('change', function() {
  drawJeju();
});

// Download Image
var uploadInput = getID('download');
uploadInput.addEventListener('click', function() {
  var line1 = getID('line1').value;
  var line2 = getID('line2').value;
  var line3 = getID('line3').value;
  // Generate Image
  var dataURL = getID('jeju').toDataURL();
  window.open(dataURL);
});

// ------------------------------------------------------------------

// Debounce function
// Ref: https://davidwalsh.name/javascript-debounce-function
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};