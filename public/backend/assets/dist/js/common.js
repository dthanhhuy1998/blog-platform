// Preview Image
var filePreview = function(event) {
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('preview');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

// Delay keyup
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

// Number Format
function number_format(number) {
  var parts = number.toString().split(".");
  const numberPart = parts[0];
  const decimalPart = parts[1];
  const thousands = /\B(?=(\d{3})+(?!\d))/g;
  return numberPart.replace(thousands, ",") + (decimalPart ? "." + decimalPart : "");
}

function removeCommas(str) {
  while (str.search(",") >= 0) {
    str = (str + "").replace(',', '');
  }

  return str;
}