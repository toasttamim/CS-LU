<?php
require_once __DIR__ . '/includes/config.php';

$page_title    = 'Home';
$active_course = null;
require_once __DIR__ . '/includes/header.php';
?>

<div class="page">
  <div class="hero">
    <div class="hero-eyebrow">Academic Learning Portal</div>
    <h1>Study smarter,<br><em>not harder.</em></h1>
    <p>Pick a course, choose a chapter, and dive into your modules — fully organized and read-only.</p>
  </div>

  <div class="section-label">Available Courses</div>

  <div class="courses-grid">
    <?php foreach ($COURSES as $id => $course):
      $ch_count  = count($course['chapters']);
      $mod_count = count(course_modules_flat($id));
    ?>
    <a href="<?= BASE_URL ?>/course.php?id=<?= urlencode($id) ?>"
       class="course-card"
       style="--course-color: <?= htmlspecialchars($course['color']) ?>">
      <div class="course-card-icon"><?= $course['icon'] ?></div>
      <div>
        <div class="course-card-code"><?= htmlspecialchars($course['code']) ?></div>
        <div class="course-card-title"><?= htmlspecialchars($course['title']) ?></div>
      </div>
      <div class="course-card-desc"><?= htmlspecialchars($course['description']) ?></div>
      <div class="course-card-meta">
        <span><?= $ch_count ?> chapters</span>
        &middot;
        <span><?= $mod_count ?> modules</span>
        <div class="course-card-arrow">›</div>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
