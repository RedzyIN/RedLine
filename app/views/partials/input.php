<?php
/** @var array $data */
$name        = $data['name'];                  
$label       = $data['label'] ?? '';
$type        = $data['type'] ?? 'text';
$value       = $data['value'] ?? '';
$placeholder = $data['placeholder'] ?? '';
$error       = $data['error'] ?? '';
$options     = $data['options'] ?? [];         
$required    = !empty($data['required']);      
$checked     = !empty($data['checked']);      

$border = $error !== '' ? 'border-red-500' : 'border-gray-300';
$inputClass = "w-full rounded-lg border px-3 py-2 text-sm $border";
?>

<div class="mb-4">

    <?php if ($type === 'checkbox'): ?>
        <div class="flex items-start gap-2.5">
            <input id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" type="checkbox"
                   value="1"
                   <?= $checked ? 'checked' : '' ?>
                   class="mt-0.5 h-4 w-4 rounded border-gray-300">
            <label for="<?= htmlspecialchars($name) ?>" class="text-xs text-gray-600">
                <?= $label ?>
            </label>
        </div>

    <?php else: ?>
        <?php if ($label !== ''): ?>
            <label for="<?= htmlspecialchars($name) ?>" class="mb-1 block text-sm font-medium text-gray-700">
                <?= htmlspecialchars($label) ?>
                <?php if ($required): ?><span class="text-red-600">*</span><?php endif; ?>
            </label>
        <?php endif; ?>

        <?php if ($type === 'select'): ?>
            <select id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>"
                    class="<?= $inputClass ?>">
                <option value="">Pilih...</option>
                <?php foreach ($options as $optValue => $optLabel): ?>
                    <option value="<?= htmlspecialchars($optValue) ?>"
                            <?= $value == $optValue ? 'selected' : '' ?>>
                        <?= htmlspecialchars($optLabel) ?>
                    </option>
                <?php endforeach; ?>
            </select>

        <?php elseif ($type === 'password'): ?>
            <div class="relative">
                <input id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>"
                       type="password"
                       placeholder="<?= htmlspecialchars($placeholder) ?>"
                       class="<?= $inputClass ?> pr-10">

                <button type="button" onclick="togglePassword('<?= htmlspecialchars($name) ?>', this)"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <i data-lucide="eye-off" class="h-4 w-4"></i>
                </button>
            </div>

        <?php else: ?>
            <input id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>"
                   type="<?= htmlspecialchars($type) ?>" value="<?= htmlspecialchars($value) ?>"
                   placeholder="<?= htmlspecialchars($placeholder) ?>" class="<?= $inputClass ?>">
        <?php endif; ?>
    <?php endif; ?>

    <?php include __DIR__ . '/field_error.php'; ?>
</div>