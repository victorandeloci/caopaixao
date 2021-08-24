const headerTrigger = 100;
var headerLoaded = false;

function docReady(fn) {
  // see if DOM is already available
  if (document.readyState === "complete" || document.readyState === "interactive") {
    // call on next available tick
    setTimeout(fn, 1);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}

docReady(function() {

  // ========== STICKY HEADER CONTROLLER ==========

  if (isHome) {
    window.onscroll = function(ev) {
      if (!headerLoaded)
        if (window.scrollY >= headerTrigger) {
          // after trigger Y position on scroll
          if (document.querySelector('header'))
            document.querySelector('header').classList.add('fix');
          if (document.querySelector('#about'))
            document.querySelector('#about').classList.add('show');
          headerLoaded = true;
        }
    };
  }

});
