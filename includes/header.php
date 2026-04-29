<?php
if (!defined('SITE_NAME')) { http_response_code(403); exit; }
$page_title     = $page_title    ?? SITE_NAME;
$active_course  = $active_course ?? null;
$active_chapter = $active_chapter ?? null;
$base = BASE_URL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?> — <?= SITE_NAME ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
</head>
<body>
<header class="topbar">
  <a href="<?= $base ?>/" class="topbar-logo">
    <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
      <rect width="26" height="26" rx="7" fill="#5b8fff" opacity="0.15"/>
      <path d="M7 19V10l6-4 6 4v9" stroke="#5b8fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
      <rect x="10" y="14" width="6" height="5" rx="1" stroke="#5b8fff" stroke-width="1.8"/>
    </svg>
    Study<span>Arch</span>
  </a>
  <nav class="topbar-nav">
    <?php if ($active_course): global $COURSES; $c = $COURSES[$active_course] ?? null; ?>
      <span class="topbar-sep">›</span>
      <a href="<?= $base ?>/course.php?id=<?= urlencode($active_course) ?>" class="topbar-crumb">
        <?= htmlspecialchars($c['code'] ?? $active_course) ?>
      </a>
      <?php if ($active_chapter && $c): $ch = $c['chapters'][$active_chapter] ?? null; ?>
        <span class="topbar-sep">›</span>
        <span class="topbar-crumb active"><?= htmlspecialchars($ch['title'] ?? $active_chapter) ?></span>
      <?php endif; ?>
    <?php endif; ?>
  </nav>
  <div class="topbar-right">
    <span class="topbar-badge">Read-only</span>
  </div>
</header>
