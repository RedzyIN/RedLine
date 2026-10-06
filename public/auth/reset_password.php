<?php
require __DIR__ . '/../../app/core/helpers.php';
$title = 'RedLine';
$state = $_GET['state'] ?? 'form'; // TODO: ganti dengan pengecekan token

ob_start(); ?>
<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
  
  <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">

    <div class="flex justify-center mb-4">
        <img src="/assets/img/brand/redline_auth.png" alt="Logo RedLine" class="h-12 w-auto">
    </div>
    <?php if ($state === 'form'): ?>
    <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Buat Password Baru</h2>
    <form id='resetForm' action='post' novalidate>
      <div class="mb-8">
        <?php partial('input', ['name' => 'newPassword', 'label' => 'Password Baru', 'type' => 'password', 'placeholder' => 'Masukkan Password Baru', 'required' => true, 'error' => $_SESSION['errors']['newPassword'] ?? '']) ?>
      </div>
      <div class="mb-8">
        <?php partial('input', ['name' => 'cNewPassword', 'label' => 'Konfirmasi Password Baru', 'type' => 'password', 'placeholder' => 'Masukkan Ulang Password', 'required' => true]) ?>
      </div>
        <?php partial('button', ['label' => 'Simpan Kata Sandi Baru', 'type' => 'submit', 'variant' => 'login'])?>
    </form>

    <?php elseif ($state === 'invalid'): ?>
        <h2 class="text-2xl font-bold text-center text-slate-800 mb-3">Tautan tidak valid</h2>
        <p class="mb-4 text-gray-600 text-center">Tautan sudah kedaluwarsa atau sudah dipakai.</p>
        <?php partial('button', ['label' => 'Minta Tautan Baru', 'variant' => 'login', 'href' => 'forgot_password.php'])?>


    <?php elseif ($state === 'success'): ?>
        <h2 class="text-2xl font-bold text-center text-slate-800 mb-3">Berhasil!</h2>
        <p class="mb-4 text-gray-600 text-center">Kata sandi berhasil diubah</p>
        <?php partial('button', ['label' => 'Kembali Ke Log In', 'variant' => 'login', 'href' => 'login.php'])?>
    <?php endif; ?>
  </div>

</div>
<?php
$content = ob_get_clean();

require __DIR__ . '/../../app/views/layouts/base.php';