<?php
require __DIR__ . '/../../app/core/helpers.php';
session_start();

const RESET_COOLDOWN = 60;

function maskEmail(string $email): string
{
    [$name, $domain] = explode('@', $email, 2);
    return $name[0] . '***@' . $domain;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $_SESSION['flash_error'] = 'Format email tidak valid.';
    } elseif (time() >= ($_SESSION['reset_until'] ?? 0)) {
        $_SESSION['reset_until'] = time() + RESET_COOLDOWN;
        $_SESSION['flash_sent']  = maskEmail($email);
        // TODO backend: buat token, simpan hash, kirim email via PHPMailer
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$sentTo    = $_SESSION['flash_sent']  ?? null;
$error     = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_sent'], $_SESSION['flash_error']);

$remaining = max(0, ($_SESSION['reset_until'] ?? 0) - time());

$state = $_GET['state'] ?? 'form'; // TODO: ganti dengan pengecekan token
$title = 'RedLine';

ob_start(); ?>
<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">

    <div class="flex justify-center mb-4">
        <img src="/assets/img/brand/redline_auth.png" alt="Logo RedLine" class="h-12 w-auto">
     </div>

    <?php if ($state === 'form'): ?>
        <a href="/auth/login.php" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-800 transition-colors mb-6">
        <i data-lucide="arrow-left" class="h-4 w-4"></i>
        <div>Kembali</div>
        </a>

        <div class="flex justify-center mb-4">
        <div class="rounded-full bg-sky-500/15 p-3.5">
            <i data-lucide="rotate-ccw-key" class="h-7 w-7 text-sky-600"></i>
        </div>
        </div>

        <h2 class="text-2xl font-bold text-center text-slate-800 mb-2">Lupa Password</h2>
        <p class="text-sm text-center text-slate-500 mb-6">
        Masukkan email akunmu. Kami akan mengirim tautan untuk membuat kata sandi baru.
        </p>

        <?php if ($sentTo): ?>
        <div class="mb-6 flex gap-2 rounded-lg bg-green-50 p-3 text-sm text-green-700" role="status">
            <i data-lucide="mail-check" class="h-5 w-5 shrink-0"></i>
            <p>
            Jika <strong><?= htmlspecialchars($sentTo) ?></strong> terdaftar, tautan reset sudah dikirim.
            Periksa kotak masuk dan folder spam.
            </p>
        </div>
        <?php elseif ($error): ?>
        <div class="mb-6 rounded-lg bg-red-50 p-3 text-sm text-red-700" role="alert">
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="post" id="reset-form" data-cooldown="<?= $remaining ?>">
        <div class="mb-6">
            <?php partial('input', ['name' => 'email', 'label' => 'Verifikasi Email', 'type' => 'email', 'placeholder' => 'youremail@gmail.com', 'required' => true
            ]) ?>
        </div>

        <?php partial('button', ['label' => 'Kirim Tautan Reset', 'variant' => 'login', 'type' => 'submit']) ?>

        <p id="cooldown-note" class="mt-3 hidden text-center text-sm text-slate-500"></p>
        </form>

        <?php elseif ($state === 'sent'): ?>
            <a href="/auth/login.php" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-800 transition-colors mb-6">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                <div>Kembali</div>
            </a>

            <h3 class="text-2xl font-bold text-center text-slate-800 mb-2">Tautan Reset Dikirim</h3>
            <p class="text-md text-center text-slate-800">Jika email terdaftar, tautan reset telah dikirim.</p>
        <?php endif;?>
    </div>
</div>

<script src="/assets/js/cooldown.js" defer></script>
<script>lucide.createIcons();</script>
<?php
$content = ob_get_clean();

require __DIR__ . '/../../app/views/layouts/base.php';