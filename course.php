<?php
require_once __DIR__ . '/includes/config.php';

$course_id = trim($_GET['id'] ?? '');

if (!isset($COURSES[$course_id])) {
    http_response_code(404);
    $page_title    = '404 — Course Not Found';
    $active_course = null;
    require_once __DIR__ . '/includes/header.php';
    echo '<div class="page"><div class="empty-state"><div class="empty-icon">🔍</div><div class="empty-title">Course not found</div><div class="empty-desc">That course doesn\'t exist or hasn\'t been added yet.</div><a href="' . BASE_URL . '/" class="btn">Back to all courses</a></div></div>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$course         = $COURSES[$course_id];
$page_title     = $course['code'] . ' — ' . $course['title'];
$active_course  = $course_id;
$active_chapter = null;

require_once __DIR__ . '/includes/header.php';

$mod_count = count(course_modules_flat($course_id));
?>

<div class="page">

  <!-- Course header banner -->
  <div class="course-header">
    <div class="course-header-icon"><?= $course['icon'] ?></div>
    <div class="course-header-info">
      <div class="course-header-code"><?= htmlspecialchars($course['code']) ?></div>
      <div class="course-header-title"><?= htmlspecialchars($course['title']) ?></div>
      <div class="course-header-desc"><?= htmlspecialchars($course['description']) ?></div>
    </div>
  </div>

  <div class="section-label"><?= count($course['chapters']) ?> Chapters &middot; <?= $mod_count ?> Modules</div>

  <!-- Chapters accordion -->
  <div class="chapters-list">
    <?php $ch_num = 1; foreach ($course['chapters'] as $ch_id => $chapter): ?>
    <div class="chapter-block">

      <div class="chapter-header" role="button" tabindex="0"
           aria-expanded="false"
           onkeydown="if(event.key==='Enter'||event.key===' ')this.click()">
        <span class="chapter-num">CH <?= str_pad($ch_num, 2, '0', STR_PAD_LEFT) ?></span>
        <div>
          <div class="chapter-title"><?= htmlspecialchars($chapter['title']) ?></div>
          <div class="chapter-desc"><?= htmlspecialchars($chapter['desc']) ?></div>
        </div>
        <div class="chapter-toggle" aria-hidden="true">▾</div>
      </div>

      <div class="chapter-modules" role="list">
        <?php $mod_num = 1; foreach ($chapter['modules'] as $mod_id => $mod): ?>
        <a href="<?= BASE_URL ?>/module.php?course=<?= urlencode($course_id) ?>&id=<?= urlencode($mod_id) ?>"
           class="module-item" role="listitem">
          <span class="module-item-num"><?= str_pad($mod_num, 2, '0', STR_PAD_LEFT) ?></span>
          <span class="module-item-title"><?= htmlspecialchars($mod['title']) ?></span>
          <span class="module-item-arrow">›</span>
        </a>
        <?php $mod_num++; endforeach; ?>
      </div>

    </div>
    <?php $ch_num++; endforeach; ?>
  </div>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
