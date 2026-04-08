<?php
require_once __DIR__ . '/../i18n/i18n.php';

$tp_main_nav = array(
  array('href' => '/index.php', 'label' => e('nav_home')),
  array('href' => '/calculator/menu.php', 'label' => e('nav_calculator')),
  array('href' => '/article/articoli.php', 'label' => e('nav_article')),
  array('href' => '/glossary/glossario.php', 'label' => e('nav_glossary')),
  array('href' => '/tools/program.php', 'label' => e('nav_lessons')),
  array('href' => '/aboutus/aboutus.php', 'label' => e('nav_about')),
);

$tp_drawer_comparison_href = '/tools/comparison.php';
$tp_drawer_comparison_label = t('nav_comparison');
?>

<header class="site-header site-header--eu">
  <div class="container nav-wrap">
    <button id="menuButton" class="hamburger" aria-label="Apri menu" aria-controls="drawer" aria-expanded="false">
      <span class="hamburger__box"><span class="hamburger__inner"></span></span>
    </button>

    <a class="logo-text" href="/index.php" aria-label="Homepage TAXpedia">TAXpedia</a>

    <!-- Switch lingua -->
    <div class="tp-lang-switch" aria-label="<?php echo e('lang_label'); ?>">
      <a class="tp-lang-pill <?php echo (tp_lang() === 'it') ? 'is-active' : ''; ?>" href="<?php echo tp_lang_url('it'); ?>" data-lang="it" hreflang="it" lang="it"<?php echo (tp_lang() === 'it') ? ' aria-current="true"' : ''; ?>>IT</a>
      <a class="tp-lang-pill <?php echo (tp_lang() === 'en') ? 'is-active' : ''; ?>" href="<?php echo tp_lang_url('en'); ?>" data-lang="en" hreflang="en" lang="en"<?php echo (tp_lang() === 'en') ? ' aria-current="true"' : ''; ?>>EN</a>
    </div>

    <nav class="main-nav" aria-label="Menu principale">
      <ul>
        <?php foreach ($tp_main_nav as $tp_nav_item): ?>
        <li><a href="<?php echo htmlspecialchars($tp_nav_item['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo $tp_nav_item['label']; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>

<aside id="drawer" class="drawer" aria-hidden="true">
  <nav aria-label="Menu principale">
    <ul id="drawerList" class="drawer__list"></ul>
  </nav>
</aside>

<div id="drawerBackdrop" class="drawer__backdrop" hidden></div>

<script>
/* Sincronizzazione lingua condivisa: stessa sorgente per PHP, JS e link client-side. */
(function(){
  var supported = ['it', 'en'];
  var maxAge = 31536000; // 1 anno

  function normalizeLang(v){
    v = (v || '').toString().toLowerCase().trim();
    return supported.indexOf(v) !== -1 ? v : '';
  }

  function onReady(fn){
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
    else fn();
  }

  function getCookie(name){
    var escaped = name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    var m = document.cookie.match(new RegExp('(?:^|;\\s*)' + escaped + '=([^;]*)'));
    if (!m || !m[1]) return '';
    try { return decodeURIComponent(m[1]); } catch (e) { return ''; }
  }

  function setLangCookie(lang){
    lang = normalizeLang(lang);
    if (!lang) return;

    var base = '; Max-Age=' + maxAge + '; Path=/; SameSite=Lax';
    var secure = (window.location.protocol === 'https:') ? '; Secure' : '';
    document.cookie = 'tp_lang=' + encodeURIComponent(lang) + base + secure;
  }

  function currentLang(){
    return normalizeLang(window.tpCurrentLang)
      || normalizeLang(getCookie('tp_lang'))
      || normalizeLang(getCookie('site_lang'))
      || normalizeLang(document.documentElement.lang)
      || 'it';
  }

  function localizeUrl(href){
    if (!href || /^(mailto:|tel:|javascript:)/i.test(href) || href.charAt(0) === '#') return href;

    try {
      var url = new URL(href, window.location.href);
      if (url.origin !== window.location.origin) return href;

      url.searchParams.set('lang', currentLang());

      var localized = url.pathname;
      if (url.search) localized += url.search;
      if (url.hash) localized += url.hash;
      return localized;
    } catch (e) {
      return href;
    }
  }

  function localizeAnchors(root){
    if (!root || !root.querySelectorAll) return;

    var links = root.querySelectorAll('a[href]');
    for (var i = 0; i < links.length; i++) {
      var a = links[i];
      if (a.classList && a.classList.contains('tp-lang-pill')) continue;
      var href = a.getAttribute('href');
      if (!href) continue;
      a.setAttribute('href', localizeUrl(href));
    }
  }

  function getPillTargetLang(a){
    if (!a) return '';

    var explicit = normalizeLang(a.getAttribute('data-lang'))
      || normalizeLang(a.getAttribute('lang'))
      || normalizeLang(a.getAttribute('hreflang'))
      || normalizeLang(a.textContent);
    if (explicit) return explicit;

    try {
      var url = new URL(a.href, window.location.origin);
      var byQuery = normalizeLang(url.searchParams.get('lang'));
      if (byQuery) return byQuery;
    } catch (e) {}
    return '';
  }

  function syncPills(){
    var lang = currentLang();
    var pills = document.querySelectorAll('.tp-lang-pill');
    for (var i = 0; i < pills.length; i++) {
      var isActive = getPillTargetLang(pills[i]) === lang;
      pills[i].classList.toggle('is-active', isActive);
      if (isActive) pills[i].setAttribute('aria-current', 'true');
      else pills[i].removeAttribute('aria-current');
    }
  }

  try {
    var url = new URL(window.location.href);
    var lang = normalizeLang(url.searchParams.get('lang'))
      || normalizeLang(getCookie('tp_lang'))
      || normalizeLang(getCookie('site_lang'))
      || normalizeLang(document.documentElement.lang)
      || 'it';

    window.tpCurrentLang = lang;
    window.tpLangUrl = localizeUrl;

    document.documentElement.lang = lang;
    if (normalizeLang(getCookie('tp_lang')) !== lang) setLangCookie(lang);

    if (url.searchParams.has('lang')) {
      url.searchParams.delete('lang');
      var cleanUrl = url.pathname;
      if (url.search) cleanUrl += url.search;
      if (url.hash) cleanUrl += url.hash;
      window.history.replaceState({}, '', cleanUrl);
    }
  } catch (e) {
    window.tpCurrentLang = currentLang();
    window.tpLangUrl = localizeUrl;
  }

  onReady(function(){
    localizeAnchors(document);
    syncPills();

    document.addEventListener('click', function(e){
      var pill = e.target && e.target.closest ? e.target.closest('.tp-lang-pill') : null;
      if (!pill) return;

      var targetLang = getPillTargetLang(pill);
      if (!targetLang) return;

      if (targetLang === currentLang()) {
        e.preventDefault();
        return;
      }

      window.tpCurrentLang = targetLang;
      document.documentElement.lang = targetLang;
      setLangCookie(targetLang);
      syncPills();
    }, false);
  });
})();
</script>

<!-- Menu di lato -->
<script>
(function(){
  var btn = document.getElementById('menuButton');
  var drawer = document.getElementById('drawer');
  var list = document.getElementById('drawerList');
  var backdrop = document.getElementById('drawerBackdrop');
  var calculatorHref = '/calculator/menu.php';
  var comparisonHref = <?php echo json_encode($tp_drawer_comparison_href, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
  var comparisonLabel = <?php echo json_encode($tp_drawer_comparison_label, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

  var candidates = ['.main-nav a','header nav a','.site-header nav a'];
  var links = [];
  for (var i = 0; i < candidates.length; i++){
    var found = Array.prototype.slice.call(document.querySelectorAll(candidates[i]));
    if(found.length){ links = found; break; }
  }

  list.innerHTML = '';
  var here = location.pathname.replace(/\/index\.html?$/i,'/');

  function appendDrawerLink(rawHref, text){
    var li = document.createElement('li');
    var link = document.createElement('a');
    link.href = (window.tpLangUrl && rawHref) ? window.tpLangUrl(rawHref) : rawHref;
    link.textContent = text || 'Voce';
    try{
      var linkPath = new URL(link.href, location.origin).pathname.replace(/\/index\.html?$/i,'/');
      if(linkPath === here) link.setAttribute('aria-current','page');
    }catch(e){}
    li.appendChild(link);
    list.appendChild(li);
    link.addEventListener('click', close);
  }

  var drawerItems = links.map(function(a){
    return {
      href: a.getAttribute('href') || '',
      text: (a.textContent || a.innerText || '').trim() || a.getAttribute('aria-label') || 'Voce'
    };
  });

  var hasComparison = drawerItems.some(function(item){
    return item.href === comparisonHref;
  });

  if (!hasComparison) {
    var calculatorIndex = drawerItems.findIndex(function(item){
      return item.href === calculatorHref;
    });

    var comparisonItem = { href: comparisonHref, text: comparisonLabel };
    if (calculatorIndex >= 0) drawerItems.splice(calculatorIndex + 1, 0, comparisonItem);
    else drawerItems.push(comparisonItem);
  }

  drawerItems.forEach(function(item){
    appendDrawerLink(item.href, item.text);
  });

  function open(){
    drawer.classList.add('open');
    backdrop.hidden = false;
    btn.setAttribute('aria-expanded','true');
    drawer.setAttribute('aria-hidden','false');
    var first = drawer.querySelector('a'); if(first) try{ first.focus({preventScroll:true}); }catch(_){ }
    document.documentElement.style.overflow='hidden';
  }
  function close(){
    drawer.classList.remove('open');
    backdrop.hidden = true;
    btn.setAttribute('aria-expanded','false');
    drawer.setAttribute('aria-hidden','true');
    try{ btn.focus({preventScroll:true}); }catch(_){ }
    document.documentElement.style.overflow='';
  }
  function toggle(){ drawer.classList.contains('open') ? close() : open(); }

  if(btn){ btn.addEventListener('click', toggle); }
  if(backdrop){ backdrop.addEventListener('click', close); }
  window.addEventListener('keydown', function(e){ if(e.key === 'Escape') close(); });

  var host = document.querySelector('.nav-wrap') || document.querySelector('.site-header') || document.querySelector('header');
  if (host && !host.contains(btn)) host.prepend(btn);
})();
</script>
