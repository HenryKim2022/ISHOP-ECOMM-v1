var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
var viewportHeight =
  window.innerHeight || document.documentElement.clientHeight;
console.log("Viewport width: " + viewportWidth);
console.log("Viewport height: " + viewportHeight);



var footerMiddleLogo = document.getElementById("footer_middle_logo");
function isSmartphone() {
  if (window.innerWidth < 768) {
    return "smartphone"; // Adjust the threshold as needed
  }
}
// Apply or remove classes based on device type
if (footerMiddleLogo) {
  if (isSmartphone() == "smartphone") {
    if (!footerMiddleLogo.classList.contains("h-0")) {
      footerMiddleLogo.classList.add("h-0");
    }
  } else {
    if (footerMiddleLogo.classList.contains("h-0")) {
      footerMiddleLogo.classList.remove("h-0");
    }
  }
}

