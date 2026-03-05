(function(){
    var LS_KEY = 'cookieConsent';
    var BANNER = document.getElementById('cookie-banner');
    var MODAL = document.getElementById('cookie-modal');
    
    
    function readConsent(){ try{ var v = localStorage.getItem(LS_KEY); return v ? JSON.parse(v) : null }catch(_){ return null } }
    function writeConsent(obj){ try{ localStorage.setItem(LS_KEY, JSON.stringify(obj)); }catch(_){} }
    
    
    function enableDeferredScripts(consent){
    var nodes = document.querySelectorAll('script[type="text/plain"][data-consent]');
    nodes.forEach(function(s){
    var cat = s.getAttribute('data-consent');
    if(consent && consent[cat] && !s.dataset.enabled){
    var real = document.createElement('script');
    if(s.dataset.src){ real.src = s.dataset.src; real.async = true; }
    else { real.text = s.textContent; }
    s.insertAdjacentElement('afterend', real);
    s.dataset.enabled = 'true';
    }
    });
    }
    
    
    function showBanner(){ if(BANNER) BANNER.hidden = false; }
    function hideBanner(){ if(BANNER) BANNER.hidden = true; }
    function openModal(){ if(MODAL){ MODAL.setAttribute('aria-hidden','false'); }}
    function closeModal(){ if(MODAL){ MODAL.setAttribute('aria-hidden','true'); }}
    
    
    // Riferimenti UI
    var btnAccept = document.getElementById('btn-accept');
    var btnReject = document.getElementById('btn-reject');
    var btnSettings = document.getElementById('btn-settings');
    var btnManage = document.getElementById('btn-manage-cookies');
    var modalSave = document.getElementById('modal-save');
    var modalCancel = document.getElementById('modal-cancel');
    var cAnalytics = document.getElementById('c-analytics');
    
    
    if(btnAccept) btnAccept.addEventListener('click', function(){
    var consent = { essential:true, analytics:true, marketing:false };
    writeConsent(consent); enableDeferredScripts(consent); hideBanner(); closeModal();
    });
    if(btnReject) btnReject.addEventListener('click', function(){
    writeConsent({ essential:true, analytics:false, marketing:false }); hideBanner(); closeModal();
    });
    if(btnSettings) btnSettings.addEventListener('click', openModal);
    if(modalCancel) modalCancel.addEventListener('click', closeModal);
    if(modalSave) modalSave.addEventListener('click', function(){
    var consent = { essential:true, analytics: !!(cAnalytics && cAnalytics.checked), marketing:false };
    writeConsent(consent); enableDeferredScripts(consent); closeModal(); hideBanner();
    });
    if(btnManage) btnManage.addEventListener('click', function(){
    openModal();
    var existing = readConsent() || {essential:true,analytics:false,marketing:false};
    if(cAnalytics) cAnalytics.checked = !!existing.analytics;
    });
    
    
    // Chiudi modale su click fuori pannello o ESC
    if(MODAL){
    MODAL.addEventListener('click', function(e){ if(e.target === MODAL) closeModal(); });
    document.addEventListener('keydown', function(e){ if(e.key === 'Escape') closeModal(); });
    }
    
    
    // Inizializzazione: se consenso già presente, abilita eventuali script e non mostrare banner
    var existing = readConsent();
    if(existing){ enableDeferredScripts(existing); hideBanner(); }
    else { showBanner(); }
    })();


    