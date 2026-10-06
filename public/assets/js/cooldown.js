(() => {
  const form = document.querySelector('form[data-cooldown]');
  if (!form) return;

  const button = form.querySelector('button[type="submit"], button:not([type])');
  const note = document.getElementById('cooldown-note');
  const defaultLabel = button.textContent.trim();
  const deadline = Date.now() + Number(form.dataset.cooldown) * 1000;

  const setLocked = (locked) => {
    button.disabled = locked;
    button.classList.toggle('opacity-60', locked);
    button.classList.toggle('cursor-not-allowed', locked);
    note.classList.toggle('hidden', !locked);
  };

  const formatTime = (ms) => {
    const total = Math.ceil(ms / 1000);
    const m = String(Math.floor(total / 60)).padStart(2, '0');
    const s = String(total % 60).padStart(2, '0');
    return `${m}:${s}`;
  };

  const tick = () => {
    const left = deadline - Date.now();

    if (left <= 0) {
      clearInterval(timer);
      button.textContent = defaultLabel;
      setLocked(false);
      return;
    }

    note.textContent = `Kirim ulang tautan dalam ${formatTime(left)}`;
    button.textContent = 'Tautan terkirim';
  };

  if (deadline <= Date.now()) return;

  setLocked(true);
  tick();
  const timer = setInterval(tick, 250);
})();