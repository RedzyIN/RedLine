<?php
require __DIR__ . '/../../app/core/helpers.php';
$title = 'RedLine';

ob_start(); ?>
<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
  
  <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Registrasi Pendonor</h2>
    
    <form>
      <div class="mb-8">
        <?php partial('input', ['name' => 'name', 'label' => 'Nama Lengkap', 'type' => 'email', 'placeholder' => 'Fullname']) ?>
      </div>
      <div class="mb-8">
        <?php partial('input', ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'youremail@gmail.com']) ?>
      </div>
      <div class="mb-8">
        <?php partial('input', ['name' => 'telpon', 'label' => 'No. Telpon', 'type' => 'tel', 'placeholder' => '+622134567890']) ?>
      </div>
      <div class="mb-8">
        <?php partial('input', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'placeholder' => 'Masukkan Password']) ?>
      </div>
      <div class="mb-8">
        <?php partial('input', ['name' => 'cPassword', 'label' => 'Konfirmasi Password', 'type' => 'password', 'placeholder' => 'Masukkan Ulang Password']) ?>
      </div>
      <div class="mb-8">
        <?php partial('input', ['name' => 'agreement', 'label' => 'Saya memberikan persetujuan atas pemrosesan data pribadi saya sesuai dengan <a href="https://jdih.komdigi.go.id/produk_hukum/view/id/832/t/undangundang+nomor+27+tahun+2022">Kebijakan Privasi</a> yang berlaku.', 'type' => 'checkbox']) ?>
      </div>
        <?php partial('button', ['label' => 'Daftar', 'type' => 'submit', 'variant' => 'red', 'href' => '../donor/complete_profile.php'])?>
    </form>
    
    <div class="flex items-center my-5">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-3 text-sm text-gray-500">Atau</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>

    <?php partial('button', ['label' => 'Sudah Memiliki Akun?', 'variant' => 'login', 'href' => 'login.php'])?>
  </div>

</div>
<?php
$content = ob_get_clean();

require __DIR__ . '/../../app/views/layouts/base.php';