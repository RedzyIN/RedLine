<?php
$error = $error ?? '';
$name  = $name ?? '';
?>
<p id="<?= htmlspecialchars($name) ?>-error"
   class="mt-1 text-xs text-red-600 <?= $error === '' ? 'hidden' : '' ?>">
    <?= htmlspecialchars($error) ?>
</p>