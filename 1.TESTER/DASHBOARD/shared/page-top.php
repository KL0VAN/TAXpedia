<!doctype html>
<html lang="<?php echo dash_h($DASH_LANG); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title><?php echo dash_h($dashboardTitle); ?> — TAXpedia</title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css">
  <link rel="stylesheet" href="<?php echo dash_h($DASH_BASE); ?>/shared/dashboard.css?v=<?php echo (int) filemtime(__DIR__ . '/dashboard.css'); ?>">
</head>
<body>
  <?php require $dashboardSiteRoot . '/partials/header.php'; ?>
