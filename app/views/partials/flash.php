<?php
$flash = $_SESSION['flash'] ?? null;

if ($flash !== null):
    $type    = $flash['type'] ?? 'success';
    $message = $flash['message'] ?? '';
    $cTitle  = $flash['fTitle'] ?? null;

    unset($_SESSION['flash']);

    if ($type === 'warning') {
        $role     = 'alert';
        $duration = 8000;
        $fTitle   = $cTitle ?? 'Peringatan!';
        $color    = 'bg-amber-50 text-amber-900 border-amber-500 shadow-amber-500/20';
        $iconBg   = 'bg-amber-500 ring-amber-500/30';
        $icon     = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>';
    } elseif ($type === 'error') {
        $role     = 'alert';
        $duration = 8000;
        $fTitle   = $cTitle ?? 'Error!';
        $color    = 'bg-red-50 text-red-900 border-red-500 shadow-red-500/20';
        $iconBg   = 'bg-red-500 ring-red-500/30';
        $icon     = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>';
    } elseif ($type === 'info') {
        $role     = 'status';
        $duration = 5000;
        $fTitle   = $cTitle ?? 'Informasi';
        $color    = 'bg-blue-50 text-blue-900 border-blue-500 shadow-blue-500/20';
        $iconBg   = 'bg-blue-500 ring-blue-500/30';
        $icon     = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>';
    } else {
        $role     = 'status';
        $duration = 4000;
        $fTitle   = $cTitle ?? 'Berhasil!';
        $color    = 'bg-green-50 text-green-900 border-green-500 shadow-green-500/20';
        $iconBg   = 'bg-green-500 ring-green-500/30';
        $icon     = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>';
    }
?>

<!-- Kotak flash melayang di pojok kanan atas -->
<div id="flash_box" role="<?= $role ?>"
     class="fixed left-4 right-4 top-4 z-50 sm:left-auto sm:w-full sm:max-w-sm
            flex items-center justify-between gap-3 rounded-xl border p-4 shadow-sm
            transition-all duration-300 <?= $color ?>">

  <div class="flex items-center gap-3">
    <div class="flex-shrink-0">
      <div class="flex h-10 w-10 items-center justify-center rounded-full text-white
                  ring-4 ring-offset-2 ring-offset-white shadow-sm <?= $iconBg ?>">
        <?= $icon ?>
      </div>
    </div>
    <div>
      <h4 class="text-sm font-bold"><?= htmlspecialchars($fTitle) ?></h4>
      <p class="text-xs"><?= htmlspecialchars($message) ?></p>
    </div>
  </div>

  <!-- Tombol tutup -->
  <button type="button" onclick="this.closest('#flash_box').remove()" class="flex-shrink-0 rounded-md bg-black/5 p-1 opacity-60 transition-colors hover:opacity-100">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
  </button>
</div>

<!-- Hilang otomatis -->
<script>
(function () {
    const box = document.getElementById('flash_box');
    const duration = <?= (int) $duration ?>;

    if (!box || duration <= 0) return;

    setTimeout(function () {
        box.classList.add('opacity-0', 'translate-x-4');
        setTimeout(function () {
            box.remove();
        }, 300);
    }, duration);
})();
</script>

<?php endif; ?>