<?php
/** @var array $data */
$name  = $data['name'];
$label = $data['label'] ?? '';
$type  = $data['type'] ?? 'text';
$value = $data['value'] ?? '';
$placeholder = $data['placeholder'] ?? '';
$error = $data['error'] ?? '';

$border = $error !== '' ? 'border-red-500' : 'border-gray-300';
?>

<div class="mb-4">
    <?php if ($label !== ''): ?>
        <label for="<?= $name ?>" class="mb-1 block text-sm font-medium text-gray-700">
            <?= htmlspecialchars($label) ?>
        </label>
    <?php endif; ?>

    <input id="<?= $name ?>" name="<?= $name ?>" type="<?= $type ?>"
           value="<?= htmlspecialchars($value) ?>" placeholder="<?=htmlspecialchars($placeholder)?>"
           class="w-full rounded-lg border px-3 py-2 text-sm <?= $border ?>">

    <?php if ($error !== ''): ?>
        <p class="mt-1 text-xs text-red-600"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</div>