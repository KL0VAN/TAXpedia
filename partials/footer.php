<?php require_once __DIR__ . '/../i18n/i18n.php';?>

<footer class="site-footer site-footer--eu" role="contentinfo">
  <div class="container footer-grid">
    <div class="footer-left">
      <a class="logo-text footer-logo" href="/index.php" aria-label="TAXpedia homepage">TAXpedia</a>
      <p class="foot-note"><?php echo e('footer_note'); ?></p>
    </div>

    <div class="footer-right">
      <div class="social-mini">
        <a href="https://linkedin.com/company/taxpedia-eu" aria-label="LinkedIn TAXpedia">
          <img src="/imm/linkedin.png" width="35" height="35">
        </a>
        <a href="https://www.instagram.com/taxpedia.eu/" aria-label="Instagram TAXpedia">
          <img src="/imm/instagram.png" width="35" height="35">
        </a>
        <a href="https://www.threads.com/@taxpedia.eu" aria-label="Threads TAXpedia">
          <img src="/imm/threads.png" width="35" height="35">
        </a>
      </div>
    </div>
  </div>

  <div class="container legal">
    <small>© 2026 TAXpedia. <?php echo e('footer_rights'); ?>
      <ul class="foot-links" role="list">
        <a href="/aboutus/privacy.php" aria-label="Privacy Policy" target="_blank" rel="noopener"><?php echo e('footer_privacy'); ?></a>
      </ul>
    </small>
  </div>
</footer>
