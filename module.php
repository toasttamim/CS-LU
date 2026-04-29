<?php
require_once __DIR__ . '/includes/config.php';

$course_id = trim($_GET['course'] ?? '');
$module_id = trim($_GET['id']     ?? '');

// Validate course
if (!isset($COURSES[$course_id])) {
    http_response_code(404);
    $page_title = '404'; $active_course = null;
    require_once __DIR__ . '/includes/header.php';
    echo '<div class="page"><div class="empty-state"><div class="empty-icon">🔍</div><div class="empty-title">Course not found</div><a href="' . BASE_URL . '/" class="btn">Home</a></div></div>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$course = $COURSES[$course_id];
$mod    = find_module($course_id, $module_id);

if (!$mod) {
    http_response_code(404);
    $page_title = '404'; $active_course = $course_id;
    require_once __DIR__ . '/includes/header.php';
    echo '<div class="page"><div class="empty-state"><div class="empty-icon">📄</div><div class="empty-title">Module not found</div><a href="' . BASE_URL . '/course.php?id=' . urlencode($course_id) . '" class="btn">Back to course</a></div></div>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

// Prev / next
$nav = prev_next_modules($course_id, $module_id);
$progress_pct = round((($nav['index'] + 1) / $nav['total']) * 100);

// Find which chapter this module belongs to (for breadcrumb)
$active_chapter = null;
foreach ($course['chapters'] as $ch_id => $ch) {
    if (isset($ch['modules'][$module_id])) { $active_chapter = $ch_id; break; }
}

$page_title    = $mod['title'] . ' — ' . $course['code'];
$active_course = $course_id;

require_once __DIR__ . '/includes/header.php';
?>

<div class="page page-wide" style="padding-top:28px;">
<div class="module-layout">

  <!-- ── Sidebar ─────────────────────────────────────────────────────────── -->
  <aside class="module-sidebar">
    <div class="sidebar-header"><?= htmlspecialchars($course['code']) ?> — Modules</div>

    <?php foreach ($course['chapters'] as $ch_id => $ch): ?>
      <div class="sidebar-chapter-label"><?= htmlspecialchars($ch['title']) ?></div>
      <?php $i = 1; foreach ($ch['modules'] as $mid => $m): ?>
        <a href="<?= BASE_URL ?>/module.php?course=<?= urlencode($course_id) ?>&id=<?= urlencode($mid) ?>"
           class="sidebar-module-link <?= $mid === $module_id ? 'active' : '' ?>">
          <span class="sidebar-module-num"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></span>
          <?= htmlspecialchars($m['title']) ?>
        </a>
      <?php $i++; endforeach; ?>
    <?php endforeach; ?>
  </aside>

  <!-- ── Content ─────────────────────────────────────────────────────────── -->
  <main>
    <div class="module-content-wrap">

      <!-- Progress bar -->
      <div class="module-progress">
        <div class="module-progress-fill" id="module-progress-fill"
             style="width: <?= $progress_pct ?>%; opacity:0;"></div>
      </div>

      <!-- Header -->
      <div class="module-content-header">
        <div class="module-content-eyebrow">
          <?= htmlspecialchars($course['code']) ?> &middot;
          Module <?= str_pad($nav['index'] + 1, 2, '0', STR_PAD_LEFT) ?>
          of <?= $nav['total'] ?>
          &middot; <?= $progress_pct ?>% through course
        </div>
        <div class="module-content-title"><?= htmlspecialchars($mod['title']) ?></div>
      </div>

      <!-- Module body (included from its own file) -->
      <div class="module-content-body">
        <div class="content">
          <?php
          $module_file = __DIR__ . '/' . $mod['file'];
          if (file_exists($module_file)) {
              include $module_file;
          } else {
              echo '<div class="empty-state"><div class="empty-icon">🚧</div><div class="empty-title">Coming soon</div><div class="empty-desc">This module hasn\'t been written yet.</div></div>';
          }
          ?>
        </div>
      </div>

      <!-- Prev / Next nav -->
      <div class="module-nav">
        <?php if ($nav['prev']): ?>
          <a href="<?= BASE_URL ?>/module.php?course=<?= urlencode($course_id) ?>&id=<?= urlencode($nav['prev']['id']) ?>"
             class="module-nav-btn prev">
            <span>‹</span>
            <span>
              <span class="module-nav-btn-label">Previous</span>
              <span class="module-nav-btn-title"><?= htmlspecialchars($nav['prev']['title']) ?></span>
            </span>
          </a>
        <?php endif; ?>
        <?php if ($nav['next']): ?>
          <a href="<?= BASE_URL ?>/module.php?course=<?= urlencode($course_id) ?>&id=<?= urlencode($nav['next']['id']) ?>"
             class="module-nav-btn next">
            <span>
              <span class="module-nav-btn-label">Next</span>
              <span class="module-nav-btn-title"><?= htmlspecialchars($nav['next']['title']) ?></span>
            </span>
            <span>›</span>
          </a>
        <?php endif; ?>
      </div>

    </div>
  </main>

</div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
