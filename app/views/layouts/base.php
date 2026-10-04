<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title ?? 'RedBlood') ?></title>
  <link rel="stylesheet" href="/assets/css/output.css">
</head>
<body class="bg-gray-50 text-gray-800">
  <?php require __DIR__ . '/../partials/flash.php'; ?>
  <?= $content ?? '' ?>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="/assets/js/app.js"></script>
  <script>
    lucide.createIcons();
  </script>
</body>
</html>