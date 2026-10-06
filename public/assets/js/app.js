// Register Institusi
const insForm = document.getElementById('institutionForm');

if (insForm) {
  const steps = [...insForm.querySelectorAll('[data-step]')];
  const bars = document.querySelectorAll('#stepIndicator > div');
  const label = document.getElementById('stepLabel');
  const labels = [
    'Registrasi Data Institusi',
    'Registrasi Data Pejabat/Operator',
    'Dokumen Administrasi',
  ];
  let current = 0;

  function updateIndicator(i) {
    bars.forEach((bar, idx) => {
      bar.classList.remove('bg-gray-200', 'bg-green-600', 'bg-teal-300');
      if (idx < i) bar.classList.add('bg-green-600');       // sudah dilewati
      else if (idx === i) bar.classList.add('bg-teal-300'); // langkah aktif
      else bar.classList.add('bg-gray-200');                // belum
    });
    if (label) label.textContent = labels[i];
  }

  function show(i) {
    steps.forEach((s, idx) => s.classList.toggle('hidden', idx !== i));
    current = i;
    updateIndicator(i);
  }

  function stepValid(i) {
    if (i === 1) {
      const pw = insForm.querySelector('[name="password"]');
      const cpw = insForm.querySelector('[name="cPassword"]');
      if (pw.value !== cpw.value) {
        cpw.setCustomValidity('Konfirmasi password tidak cocok');
        cpw.reportValidity();
        cpw.setCustomValidity('');
        return false;
      }
    }
    const fields = steps[i].querySelectorAll('input, select, textarea');
    for (const f of fields) {
      if (!f.checkValidity()) { f.reportValidity(); return false; }
    }
    return true;
  }

  insForm.addEventListener('click', (e) => {
    const next = e.target.closest('[data-next]');
    const prev = e.target.closest('[data-prev]');
    if (next && stepValid(current)) show(current + 1);
    if (prev) show(current - 1);
  });

  show(0);
}

// Icon Mata
function togglePassword(inputId, button) {
  const input = document.getElementById(inputId);
  const hidden = input.type === 'password';
  input.type = hidden ? 'text' : 'password';
  button.innerHTML = hidden
    ? '<i data-lucide="eye" class="h-4 w-4"></i>'
    : '<i data-lucide="eye-off" class="h-4 w-4"></i>';
  lucide.createIcons();
}

// Upload File
document.querySelectorAll('[data-file-field]').forEach((wrap) => {
  const input = wrap.querySelector('input[type="file"]');
  const list  = wrap.querySelector('[data-file-list]');
  const errEl = wrap.querySelector('[data-file-error]');
  const maxMb = Number(input.dataset.maxMb || 2);
  const multiple = input.multiple;
  const dt = new DataTransfer();   // penampung file yang valid

  const fmt = (b) => b < 1048576
    ? (b / 1024).toFixed(0) + ' KB'
    : (b / 1048576).toFixed(1) + ' MB';

  function showError(msg) {
    errEl.textContent = msg;
    errEl.classList.toggle('hidden', !msg);
  }

  function render() {
    list.innerHTML = '';
    [...dt.files].forEach((file, i) => {
      const li = document.createElement('li');
      li.className = 'flex items-center justify-between rounded-lg border border-gray-200 bg-gray-50 p-3';

      const left = document.createElement('div');
      left.className = 'min-w-0';
      const nameEl = document.createElement('p');
      nameEl.className = 'truncate text-sm font-medium text-gray-800';
      nameEl.textContent = file.name;            // textContent: aman dari XSS
      const sizeEl = document.createElement('p');
      sizeEl.className = 'text-xs text-gray-500';
      sizeEl.textContent = fmt(file.size);
      left.append(nameEl, sizeEl);

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'ml-2 shrink-0 rounded-md p-1.5 text-gray-400 hover:text-red-500';
      btn.setAttribute('aria-label', 'Hapus file');
      btn.textContent = '✕';
      btn.addEventListener('click', () => {
        const next = new DataTransfer();
        [...dt.files].forEach((f, idx) => idx !== i && next.items.add(f));
        dt.items.clear();
        [...next.files].forEach((f) => dt.items.add(f));
        input.files = dt.files;
        render();
      });

      li.append(left, btn);
      list.append(li);
    });
  }

  function addFiles(files) {
    showError('');
    if (!multiple) dt.items.clear();
    for (const f of files) {
      if (f.size > maxMb * 1048576) {
        showError(`"${f.name}" melebihi ${maxMb} MB.`);
        continue;
      }
      dt.items.add(f);
    }
    input.files = dt.files;   // supaya ikut terkirim saat form di-submit
    render();
  }

  input.addEventListener('change', () => addFiles(input.files));

  // drag & drop
  const zone = wrap.querySelector('label');
  ['dragover', 'drop'].forEach((ev) =>
    zone.addEventListener(ev, (e) => {
      e.preventDefault();
      if (ev === 'drop') addFiles(e.dataTransfer.files);
    })
  );
});

//Konfirmasi Password Baru
function showError(input, box, message) {
  box.textContent = message;
  box.classList.remove('hidden');
  input.classList.add('border-red-500');
}

function clearError(input, box) {
  box.textContent = '';
  box.classList.add('hidden');
  input.classList.remove('border-red-500');
}

function validatePassword(input, box) {
  if (input.value.length < 8) {
    showError(input, box, 'Kata sandi minimal 8 karakter.');
    return false;
  }
  clearError(input, box);
  return true;
}

function validateConfirm(input, confirmInput, box) {
  if (confirmInput.value !== input.value) {
    showError(confirmInput, box, 'Konfirmasi kata sandi tidak cocok.');
    return false;
  }
  clearError(confirmInput, box);
  return true;
}

function setupPasswordValidation({ formId, pwId, confirmId }) {
  const form = document.getElementById(formId);
  const pw = document.getElementById(pwId);
  const confirm = document.getElementById(confirmId);
  const pwError = document.getElementById(pwId + '-error');
  const confirmError = document.getElementById(confirmId + '-error');

  // Jika form ini tidak ada di halaman, lewati
  if (!form || !pw || !confirm || !pwError || !confirmError) return;

  pw.addEventListener('input', () => {
    validatePassword(pw, pwError);
    if (confirm.value !== '') validateConfirm(pw, confirm, confirmError);
  });

  confirm.addEventListener('input', () => {
    validateConfirm(pw, confirm, confirmError);
  });

  form.addEventListener('submit', (e) => {
    const okPw = validatePassword(pw, pwError);
    const okConfirm = validateConfirm(pw, confirm, confirmError);
    if (!okPw || !okConfirm) e.preventDefault();
  });
}

// Daftarkan semua form. Yang tidak ada di halaman otomatis dilewati.
setupPasswordValidation({ formId: 'resetForm',    pwId: 'newPassword', confirmId: 'cNewPassword' });
setupPasswordValidation({ formId: 'donorForm',    pwId: 'password',    confirmId: 'cPassword' });
setupPasswordValidation({ formId: 'institutionForm', pwId: 'password', confirmId: 'cPassword' });