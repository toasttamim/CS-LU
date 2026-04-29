<?php
require_once __DIR__ . '/includes/config.php';
http_response_code(404);
$page_title = '404 — Not Found';
$active_course = null;
require_once __DIR__ . '/includes/header.php';
?>
<div class="page">
  <div class="empty-state">
    <div class="empty-icon">🌌</div>
    <div class="empty-title">Page not found</div>
    <div class="empty-desc">The page you're looking for doesn't exist or has been moved.</div>
    <a href="<?= BASE_URL ?>/" class="btn">Back to courses</a>
  </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
