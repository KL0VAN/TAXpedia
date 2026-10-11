<?php require_once __DIR__ . '/../i18n/i18n.php';?>

<style>
.social-mini {
  display: flex;
  align-items: center;
  gap: 12px;
}

.social-icon {
  display: inline-block;
  width: 35px;
  height: 35px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  user-select: none;
  -webkit-user-select: none;
  -webkit-user-drag: none;
}

.social-icon--linkedin {
  background-image: url("/imm/linkedin.png");
}

.social-icon--instagram {
  background-image: url("/imm/instagram.png");
}

.social-icon--threads {
  background-image: url("/imm/threads.png");
}

.social-icon:hover {
  opacity: 0.8;
}
</style>

<footer class="site-footer site-footer--eu" role="contentinfo">
  <div class="container footer-grid">
    <div class="footer-left">
      <a class="logo-text footer-logo" href="/index.php" aria-label="TAXpedia homepage">TAXpedia</a>
      <p class="foot-note"><?php echo e('footer_note'); ?></p>
    </div>

    <div class="footer-right">
      <div class="social-mini">
        <a 
          class="social-icon social-icon--linkedin" 
          href="https://linkedin.com/company/taxpedia-eu" 
          aria-label="LinkedIn TAXpedia"
          target="_blank"
          rel="noopener"
        ></a>

        <a 
          class="social-icon social-icon--instagram" 
          href="https://www.instagram.com/taxpedia.eu/" 
          aria-label="Instagram TAXpedia"
          target="_blank"
          rel="noopener"
        ></a>

        <a 
          class="social-icon social-icon--threads" 
          href="https://www.threads.com/@taxpedia.eu" 
          aria-label="Threads TAXpedia"
          target="_blank"
          rel="noopener"
        ></a>
      </div>
    </div>
  </div>

  <div class="container legal">
    <small>© 2026 TAXpedia. <?php echo e('footer_rights'); ?>
      <ul class="foot-links" role="list">
        <li>
          <a href="/aboutus/privacy.php" aria-label="Privacy Policy" target="_blank" rel="noopener">
            <?php echo e('footer_privacy'); ?>
          </a>
        </li>
      </ul>
    </small>
  </div>
</footer>