<?php
// includes/footer.php
if (!defined('SITE_NAME')) { http_response_code(403); exit; }
?>
<footer class="site-footer">
  <div class="footer-inner">
    <span class="footer-logo">Study<span>Arch</span></span>
    <span class="footer-copy">Read-only academic portal · All content is for study purposes only.</span>
    <span class="footer-ver">v<?= SITE_VERSION ?></span>
  </div>
</footer>
<script src="<?= BASE_URL ?>/assets/js/app.js"></script>
</body>
</html>
