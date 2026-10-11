/* Preserve the main About Us cards' initials fallback on image load errors. */
(function () {
  'use strict';

  document.querySelectorAll('.member-avatar-photo').forEach(function (image) {
    function showFallback() {
      image.hidden = true;
      image.parentElement.setAttribute('role', 'img');
      image.parentElement.setAttribute('aria-label', image.dataset.fallbackLabel);
    }
    image.addEventListener('error', showFallback);
    if (image.complete && image.naturalWidth === 0) showFallback();
  });
})();
