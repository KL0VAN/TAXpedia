/* Progressive enhancement: the original partner list remains usable without JS. */
(function () {
  'use strict';

  var carousel = document.querySelector('[data-partner-carousel]');
  if (!carousel) return;

  var viewport = carousel.querySelector('.partner-viewport');
  var track = carousel.querySelector('.partner-track');
  var group = carousel.querySelector('.partner-group');
  var toggle = carousel.querySelector('.partner-toggle');
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  var paused = false;

  // Equal-width groups include their trailing gap, so -50% lands exactly at
  // the next group's first logo. Copies stay clickable but are not tab stops.
  var copy = group.cloneNode(true);
  copy.setAttribute('aria-hidden', 'true');
  copy.querySelectorAll('a').forEach(function (link) {
    link.setAttribute('tabindex', '-1');
  });
  copy.querySelectorAll('img').forEach(function (img) {
    img.alt = '';
  });
  track.appendChild(copy);

  function updateMotion() {
    carousel.classList.toggle('is-animated', !reducedMotion.matches);
    carousel.classList.toggle('is-paused', paused);
    toggle.hidden = reducedMotion.matches;
    toggle.setAttribute('aria-pressed', paused ? 'true' : 'false');
    toggle.textContent = paused ? toggle.dataset.resumeLabel : toggle.dataset.pauseLabel;
  }

  toggle.addEventListener('click', function () {
    paused = !paused;
    updateMotion();
  });

  // A wrapped, stationary original list ensures keyboard-focused links are
  // visible even when the animation had carried them outside the viewport.
  viewport.addEventListener('focusin', function () {
    carousel.classList.add('has-focus');
  });
  viewport.addEventListener('focusout', function (event) {
    if (!viewport.contains(event.relatedTarget)) carousel.classList.remove('has-focus');
  });

  if (reducedMotion.addEventListener) reducedMotion.addEventListener('change', updateMotion);
  else reducedMotion.addListener(updateMotion);

  updateMotion();
})();
