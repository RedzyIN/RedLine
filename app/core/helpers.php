<?php
function partial(string $name, array $data = []): void {
    include __DIR__ . '/../views/partials/' . $name . '.php';
}
?>