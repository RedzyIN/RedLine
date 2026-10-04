<?php
$error = $error ?? '';
$name  = $name ?? '';

if ($error !== ''): 
?>
    <p id="<?= htmlspecialchars($name) ?>-error" class="mt-1 text-xs text-red-600">
        <?= htmlspecialchars($error) ?>
    </p>
<?php endif; ?>