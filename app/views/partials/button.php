<?php
/** @var array $data */
$label   = $data['label'];
$type    = $data['type'] ?? 'button';
$variant = $data['variant'] ?? 'primary';
$href    = $data['href'] ?? '';
$attrs   = $data['attrs'] ?? [];
$half    = !empty($data['half']);

if ($variant === 'secondary') {
    $color = 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50';
} elseif ($variant === 'danger') {
    $color = 'bg-red-100 text-red-700 hover:bg-red-200';
} elseif ($variant === 'login') {
    $color = 'w-full bg-red-600 text-white rounded-lg hover:bg-red-700';
} elseif ($variant === 'red') {
    $color = 'w-full bg-white text-red-600 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white';
} elseif ($variant === 'medical') {
    $color = 'w-full bg-teal-50 text-teal-700 border border-teal-300 rounded-lg hover:bg-teal-100';
} elseif ($variant === 'continue') {
    if ($half){
        $color = 'w-1/2 bg-blue-50 text-blue-700 border border-blue-300 rounded-lg hover:bg-blue-100';
    } else {
        $color = 'w-full bg-blue-50 text-blue-700 border border-blue-300 rounded-lg hover:bg-blue-100';
    }
} elseif ($variant === 'back') {
    if ($half){
        $color = 'w-1/2 bg-red-50 text-red-700 border border-red-300 rounded-lg hover:bg-red-100';
    } else {
        $color = 'w-full bg-red-50 text-red-700 border border-red-300 rounded-lg hover:bg-red-100';
    }
} else {
    $color = 'bg-blue-600 text-white hover:bg-blue-700';
}

$class = "inline-flex justify-center items-center rounded-lg mb-3 px-4 py-2.5 text-sm font-medium transition-colors $color";

$attrHtml = '';
foreach ($attrs as $key => $value) {
    if ($value === true) {
        $attrHtml .= ' ' . htmlspecialchars($key);
    } elseif ($value !== false && $value !== null) {
        $attrHtml .= ' ' . htmlspecialchars($key) . '="' . htmlspecialchars((string) $value) . '"';
    }
}
?>

<?php if ($href !== ''): ?>
    <a href="<?= htmlspecialchars($href) ?>" class="<?= $class ?>"<?= $attrHtml ?>><?= htmlspecialchars($label) ?></a>
<?php else: ?>
    <button type="<?= htmlspecialchars($type) ?>" class="<?= $class ?>"<?= $attrHtml ?>><?= htmlspecialchars($label) ?></button>
<?php endif; ?>