<?php
/** @var array $data */
$label   = $data['label'];
$type    = $data['type'] ?? 'button';
$variant = $data['variant'] ?? 'primary';
$href    = $data['href'] ?? '';

if ($variant === 'secondary') {
    $color = 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50';
} elseif ($variant === 'danger') {
    $color = 'bg-red-100 text-red-700 hover:bg-red-200';
} elseif ($variant === 'form') {
    $color = 'w-full bg-red-600 text-white font-medium py-2.5 rounded-lg hover:bg-red-700';
} else {
    $color = 'bg-blue-600 text-white hover:bg-blue-700';
}

$class = "inline-flex justify-center items-center rounded-lg mb-3 px-4 py-2.5 text-sm font-medium $color";
?>

<?php if ($href !== ''): ?>
    <a href="<?= htmlspecialchars($href) ?>" class="<?= $class ?>"><?= htmlspecialchars($label) ?></a>
<?php else: ?>
    <button type="<?= $type ?>" class="<?= $class ?>"><?= htmlspecialchars($label) ?></button>
<?php endif; ?>