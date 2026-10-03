<?php
/** @var array $data */
$text    = $data['text'];
$variant = $data['variant'] ?? 'neutral';

if ($variant === 'success') {
    $color = 'bg-green-100 text-green-800';
} elseif ($variant === 'warning') {
    $color = 'bg-yellow-100 text-yellow-800';
} elseif ($variant === 'danger') {
    $color = 'bg-red-100 text-red-800';
} else {
    $color = 'bg-gray-100 text-gray-700';
}
?>

<div class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium <?= $color ?>">
    <?= htmlspecialchars($text) ?>
</div>