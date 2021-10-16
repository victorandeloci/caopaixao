const headerTrigger = 100;
var headerLoaded = false;
//const apiUrl = 'https://' + window.location.host;
const apiUrl = 'http://localhost/caopaixao/';

function docReady(fn) {
  // see if DOM is already available
  if (document.readyState === "complete" || document.readyState === "interactive") {
    // call on next available tick
    setTimeout(fn, 1);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}

function getFormValues(element) {
  let formData = new FormData();

  element.querySelectorAll('input, textarea, select').forEach((item, i) => {
    formData.append(item.getAttribute('name'), item.value);
  });

  return formData;
}

async function sendByAction(method, action, formData) {
  formData.append('action', action);
  let response = await fetch(apiUrl, {
    method: method,
    body: formData
  })
  .then(function(response) {
    return response.json();
  });

  return response;
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

  if (document.getElementById('contactForm')) {

    let form = document.getElementById('contactForm');
    let submitBtn = form.querySelector('button[type="submit"]');

    //honeypot
    submitBtn.addEventListener('click', function() {
      form.querySelector('input[name="annon_edhellen_edro_hi_ammen"]').value = 'mellon';
    });

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      submitBtn.classList.add('loading');
      submitBtn.disabled = true;

      let data = getFormValues(this);
      sendByAction('POST', 'contactForm', data).then(function(response) {

        if (response.status) {

          submitBtn.classList.remove('loading');
          submitBtn.classList.add('done');
          submitBtn.innerHTML = 'Enviado';

        } else {
          submitBtn.disabled = false;
        }

      });

    });
  }

  if (document.getElementById('volunteerForm')) {

    let form = document.getElementById('volunteerForm');
    let submitBtn = form.querySelector('button[type="submit"]');

    //honeypot
    submitBtn.addEventListener('click', function() {
      form.querySelector('input[name="annon_edhellen_edro_hi_ammen"]').value = 'mellon';
    });

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      submitBtn.classList.add('loading');
      submitBtn.disabled = true;

      let data = getFormValues(this);
      data.append('subject', 'volunteer');
      sendByAction('POST', 'contactForm', data).then(function(response) {

        if (response.status) {

          submitBtn.classList.remove('loading');
          submitBtn.classList.add('done');
          submitBtn.innerHTML = 'Enviado';

        } else {
          submitBtn.disabled = false;
        }

      });

    });
  }

});
