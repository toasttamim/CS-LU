(function () {
  'use strict';

  // Chapter accordion
  document.querySelectorAll('.chapter-header').forEach(function (header) {
    header.addEventListener('click', function () {
      var modules = header.nextElementSibling;
      if (!modules) return;
      var isOpen = header.classList.toggle('open');
      modules.classList.toggle('open', isOpen);
    });
  });

  // Auto-open first chapter
  var firstHeader = document.querySelector('.chapter-header');
  if (firstHeader && !document.querySelector('.chapter-header.open')) {
    firstHeader.click();
  }

  // Animate progress bar
  var bar = document.getElementById('module-progress-fill');
  if (bar) { setTimeout(function () { bar.style.opacity = '1'; }, 100); }

})();
