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
$rows        = $data['rows'] ?? 4;


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
            <div class="relative w-full">
                <select id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" class="appearance-none pr-10 cursor-pointer <?= $inputClass ?>" <?= $required ? 'required' : '' ?>>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($options as $optValue => $optLabel): ?>
                        <option value="<?= htmlspecialchars($optValue) ?>"
                            <?= $value == $optValue ? 'selected' : '' ?>>
                            <?= htmlspecialchars($optLabel) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <i data-lucide="chevron-down" class="h-4 w-4"></i>
                </div>
            </div>
        <?php elseif ($type === 'textarea'): ?>
            <!-- Tambahan untuk Textarea -->
            <textarea id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" rows="<?= (int) $rows ?>" placeholder="<?= htmlspecialchars($placeholder) ?>" class="<?= $inputClass ?> resize-y" <?= $required ? 'required' : '' ?>><?= htmlspecialchars($value) ?></textarea>

        <?php elseif ($type === 'password'): ?>
            <div class="relative">
                <input id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>"
                    type="password"
                    placeholder="<?= htmlspecialchars($placeholder) ?>"
                    class="<?= $inputClass ?> pr-10" <?= $required ? 'required' : '' ?>>

                <button type="button" onclick="togglePassword('<?= htmlspecialchars($name) ?>', this)"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <i data-lucide="eye-off" class="h-4 w-4"></i>
                </button>
            </div>

        <?php elseif ($type === 'file'): ?>
            <?php $accept = $data['accept'] ?? '.pdf,.jpg'; ?>
            <div class="w-full" data-file-field>
                <label for="<?= htmlspecialchars($name) ?>"
                    class="group flex h-36 w-full cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed bg-gray-50 transition-all hover:bg-gray-100/80  <?= $border ?>">
                    <div class="flex flex-col items-center justify-center px-4 text-center">
                        <div class="mb-3 rounded-full bg-white p-2.5 shadow-sm transition-transform group-hover:scale-110">
                            <i data-lucide="upload-cloud" class="h-6 w-6 text-gray-500"></i>
                        </div>
                        <p class="mb-1 text-sm font-medium text-gray-700">
                            <div><div class="font-semibold text-red-600">Klik untuk unggah</div> atau seret file ke sini</div>
                        </p>
                        <p class="text-xs text-gray-400">
                            <?= htmlspecialchars($data['hint'] ?? 'Surat tugas SK/izin, PDF atau JPG (maks. 2 MB)') ?>
                        </p>
                    </div>
                    <input id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?><?= !empty($data['multiple']) ? '[]' : '' ?>" type="file" class="hidden" accept="<?= htmlspecialchars($accept) ?>" data-max-mb="<?= (int) ($data['max_mb'] ?? 2) ?>" <?= !empty($data['multiple']) ? 'multiple' : '' ?> <?= $required ? 'required' : '' ?>>
                </label>

                <ul class="mt-3 space-y-2" data-file-list></ul>
                <p class="mt-1 hidden text-xs text-red-600" data-file-error></p>
            </div>


        <?php else: ?>
            <input id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" type="<?= htmlspecialchars($type) ?>" value="<?= htmlspecialchars($value) ?>" placeholder="<?= htmlspecialchars($placeholder) ?>" class="<?= $inputClass ?>" <?= $required ? 'required' : '' ?>>
        <?php endif; ?>
    <?php endif; ?>

    <?php include __DIR__ . '/field_error.php'; ?>
</div>