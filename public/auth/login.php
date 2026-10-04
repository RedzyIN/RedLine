<?php
require __DIR__ . '/../../app/core/helpers.php';
$title = 'RedLine';
session_start();

ob_start(); ?>
<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
  
  <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Login</h2>
    
    <form>
      <div class="mb-8">
        <?php partial('input', ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'youremail@gmail.com']) ?>
        <div id="emailError"></div>
      </div>
      <div class="mb-12">
        <?php partial('input', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'placeholder' => '********']) ?>
        <div class="flex justify-between font-small">
          <a href="">Lupa Password?</a>
          <div id="passwordError"></div>
        </div>
      </div>

      <?php partial('button', ['label' => 'Login', 'type' => 'submit', 'variant' => 'form'])?>
      <p class="font-small">Belum punya akun? <a href="forgot_password.php" class="text-blue-700">Daftar</a></p>
    </form>

    <div class="flex items-center my-5">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-3 text-sm text-gray-500">Atau</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>
    <?php partial('button', ['label' => 'Daftar Sebagai Pendonor', 'variant' => 'donorUser', 'href' => 'register_donor.php'])?>
    <?php partial('button', ['label' => 'Daftar Sebagai Institusi', 'variant' => 'medical', 'href' => 'register_institution.php'])?>
  </div>

</div>
<?php
$content = ob_get_clean();

require __DIR__ . '/../../app/views/layouts/base.php';