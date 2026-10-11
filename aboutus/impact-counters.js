(() => {
  'use strict';

  // Approved cumulative figures; no analytics requests or live data.
  const counters = Array.from(document.querySelectorAll('[data-counter-target]'));
  if (!counters.length) return;

  const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
  if (motion.matches || !window.IntersectionObserver || !window.requestAnimationFrame) return;

  const duration = 3000;
  const formatter = new Intl.NumberFormat('it-IT');
  const states = counters.map(element => ({
    element,
    value: element.querySelector('.impact-counter-value'),
    target: Number(element.dataset.counterTarget),
    finalText: element.querySelector('.impact-counter-value').textContent,
    started: false,
    startTime: null,
    complete: false
  }));
  let frame = null;
  let observer;

  const finish = () => {
    if (frame !== null) window.cancelAnimationFrame(frame);
    frame = null;
    if (observer) observer.disconnect();
    states.forEach(state => {
      state.value.textContent = state.finalText;
      state.complete = true;
    });
  };

  const update = timestamp => {
    frame = null;
    try {
      states.forEach(state => {
        if (!state.started || state.complete) return;
        if (state.startTime === null) state.startTime = timestamp;
        const progress = Math.min((timestamp - state.startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const text = progress === 1 ? state.finalText : formatter.format(Math.floor(state.target * eased)) + '+';
        if (state.value.textContent !== text) state.value.textContent = text;
        state.complete = progress === 1;
      });
      if (states.some(state => state.started && !state.complete)) {
        frame = window.requestAnimationFrame(update);
      }
    } catch (error) {
      // Restore the server-rendered final numbers if animation cannot continue.
      finish();
    }
  };

  try {
    observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const state = states.find(candidate => candidate.element === entry.target);
        if (!state || state.started || state.complete) return;
        state.started = true;
        state.value.textContent = '0+';
        observer.unobserve(state.element);
      });
      // A shared frame clock starts counters together when both are visible.
      if (frame === null && states.some(state => state.started && !state.complete)) {
        frame = window.requestAnimationFrame(update);
      }
    }, { threshold: 0.15 });

    // Observe the animated metrics within the statistics section, including on mobile.
    states.forEach(state => observer.observe(state.element));
    motion.addEventListener('change', event => {
      if (event.matches) finish();
    });
  } catch (error) {
    finish();
  }
})();
