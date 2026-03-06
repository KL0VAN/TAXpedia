<?php require_once __DIR__ . '/../i18n/i18n.php';?>

<header class="site-header site-header--eu">
  <div class="container nav-wrap">
    <button id="menuButton" class="hamburger" aria-label="Apri menu" aria-controls="drawer" aria-expanded="false">
      <span class="hamburger__box"><span class="hamburger__inner"></span></span>
    </button>

    <a class="logo-text" href="/index.php" aria-label="Homepage TAXpedia">TAXpedia</a>

    <!-- Switch lingua -->
    <div class="tp-lang-switch" aria-label="<?php echo e('lang_label'); ?>">
      <a class="tp-lang-pill <?php echo (tp_lang() === 'it') ? 'is-active' : ''; ?>" href="<?php echo tp_lang_url('it'); ?>" hreflang="it" lang="it">IT</a>
      <a class="tp-lang-pill <?php echo (tp_lang() === 'en') ? 'is-active' : ''; ?>" href="<?php echo tp_lang_url('en'); ?>" hreflang="en" lang="en">EN</a>
    </div>

    <nav class="main-nav" aria-label="Menu principale">
      <ul>
        <li><a href="/index.php"><?php echo e('nav_home'); ?></a></li>
        <li><a href="/calculator/menu.php"><?php echo e('nav_calculator'); ?></a></li>
        <li><a href="/article/articoli.php"><?php echo e('nav_article'); ?></a></li>
        <li><a href="/glossary/glossario.php"><?php echo e('nav_glossary'); ?></a></li>
        <li><a href="/tools/program.php"><?php echo e('nav_lessons'); ?></a></li>
        <li><a href="/aboutus/aboutus.php"><?php echo e('nav_about'); ?></a></li>
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
/* 
  SCRIPT CENTRALE DI PERSISTENZA LINGUA
  Propaga automaticamente ?lang=... a tutti i link interni
  Garantisce che la lingua si mantenga tra le pagine senza modificare i singoli file
*/
(function(){
  try{
    var url = new URL(window.location.href);
    var supported = ['it','en'];
    var maxAge = 31536000; // 1 anno

    function normalizeLang(v){
      v = (v || '').toString().toLowerCase().trim();
      return supported.indexOf(v) !== -1 ? v : '';
    }

    function getCookie(name){
      var escaped = name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      var m = document.cookie.match(new RegExp('(?:^|;\\s*)' + escaped + '=([^;]*)'));
      if (!m || !m[1]) return '';
      try { return decodeURIComponent(m[1]); } catch (e) { return ''; }
    }

    function setLangCookies(lang){
      var base = '; Max-Age=' + maxAge + '; Path=/; SameSite=Lax';
      var secure = (window.location.protocol === 'https:') ? '; Secure' : '';
      document.cookie = 'tp_lang=' + encodeURIComponent(lang) + base + secure;
      document.cookie = 'site_lang=' + encodeURIComponent(lang) + base + secure;
    }

    var currentLang = normalizeLang(url.searchParams.get('lang'));
    if(!currentLang) currentLang = normalizeLang(getCookie('tp_lang'));
    if(!currentLang) currentLang = normalizeLang(getCookie('site_lang'));
    if(!currentLang) currentLang = normalizeLang(document.documentElement.lang);
    if(!currentLang) currentLang = 'it';

    // Garantisce persistenza anche quando PHP non puo piu inviare header/cookie.
    setLangCookies(currentLang);

    // Rimuovi ?lang=... dalla URL visibile (il cookie lo ricorda)
    if(url.searchParams.has('lang')){
      url.searchParams.delete('lang');
      var newUrl = url.pathname;
      if(url.search) newUrl += url.search;
      if(url.hash) newUrl += url.hash;
      window.history.replaceState({}, '', newUrl);
    }

    // Aggiungi ?lang=... a tutti i link interni
    var links = document.querySelectorAll('a[href]');
    var origin = window.location.origin;

    for(var i = 0; i < links.length; i++){
      var href = links[i].getAttribute('href');
      if(!href) continue;

      if(/^(https?:|mailto:|tel:|javascript:)/.test(href)) continue;
      if(/^#/.test(href)) continue;

      try{
        var linkUrl = new URL(href, origin);
        if(linkUrl.origin !== origin) continue;

        if(!linkUrl.searchParams.has('lang')){
          linkUrl.searchParams.set('lang', currentLang);
          var newHref = linkUrl.pathname;
          if(linkUrl.search) newHref += linkUrl.search;
          if(linkUrl.hash) newHref += linkUrl.hash;
          links[i].setAttribute('href', newHref);
        }
      }catch(e){
        // Ignora link malformati
      }
    }
  }catch(e){
    // Silently fail
  }
})();
</script>

<!-- Menu di lato -->
<script>
(function(){
  var btn = document.getElementById('menuButton');
  var drawer = document.getElementById('drawer');
  var list = document.getElementById('drawerList');
  var backdrop = document.getElementById('drawerBackdrop');

  var candidates = ['.main-nav a','header nav a','.site-header nav a'];
  var links = [];
  for (var i = 0; i < candidates.length; i++){
    var found = Array.prototype.slice.call(document.querySelectorAll(candidates[i]));
    if(found.length){ links = found; break; }
  }

  list.innerHTML = '';
  var here = location.pathname.replace(/\/index\.html?$/i,'/');
  links.forEach(function(a){
    var li = document.createElement('li');
    var link = document.createElement('a');
    link.href = a.getAttribute('href');
    link.textContent = (a.textContent || a.innerText || '').trim() || a.getAttribute('aria-label') || 'Voce';
    try{
      var linkPath = new URL(link.href, location.origin).pathname.replace(/\/index\.html?$/i,'/');
      if(linkPath === here) link.setAttribute('aria-current','page');
    }catch(e){}
    li.appendChild(link);
    list.appendChild(li);
    link.addEventListener('click', close);
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
