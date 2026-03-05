/* tp-i18n-local.js — helper condiviso (IT/EN) */
(function (w) {
  if (w.tpI18n) return;

  function tpGetLang() {
    // 1) URL param ?lang=
    try {
      const sp = new URLSearchParams(w.location.search || "");
      const q = (sp.get("lang") || "").toLowerCase().trim();
      if (q === "it" || q === "en") return q;
    } catch (e) { /* ignore */ }

    // 2) cookie tp_lang
    const m = document.cookie.match(/(?:^|;\s*)tp_lang=([^;]+)/);
    if (m && m[1]) {
      const c = decodeURIComponent(m[1]).toLowerCase().trim();
      if (c === "it" || c === "en") return c;
    }
    return "it";
  }

  const lang = tpGetLang();

  // Testi JS (non-PHP): errore input + box spiegazione + tooltip
  const I18N = {
    it: {
      error_income_invalid:
        "Inserisci un reddito valido (maggiore di zero). Puoi usare spazi, punti o virgole come separatori delle migliaia.",
      expl_default: "Tocca sul grafico per i dettagli.",
      tooltip_label: (label, amount, percent) => `${label}: ${amount} (${percent}%)`,
    },
    en: {
      error_income_invalid:
        "Enter a valid income (greater than zero). You may use spaces, dots, or commas as thousands separators.",
      expl_default: "Tap the chart for details.",
      tooltip_label: (label, amount, percent) => `${label}: ${amount} (${percent}%)`,
    },
  };

  // Mapping rapido per etichette “stringa” (se non vuoi trasformare subito SETTORI in {it,en})
  const LABEL_EN = {
    "Politiche economiche": "Economic policies",
    "Protezione sociale": "Social protection",
    "Sanità": "Healthcare",
    "Sanita": "Healthcare",
    "Interessi": "Interest payments",
    "Interessi del debito pubblico": "Interest payments",
    "Pubblica amministrazione": "Public administration",
    "Istruzione e ricerca": "Education and research",
    "Infrastrutture e trasporti": "Infrastructure and transport",
    "Sicurezza e ordine pubblico": "Public security",
    "Protezione ambientale": "Environmental protection",
    "Giustizia": "Justice",
    "Difesa": "Defence",
    "Bilancio UE": "EU budget",
    "Cultura e sport": "Culture and sport",
    "Altro": "Other",

    // UE
    "Coesione, resilienza e valori": "Cohesion, resilience and values",
    "Risorse naturali e ambiente": "Natural resources and environment",
    "Mercato unico, innovazione e agenda digitale": "Single market, innovation and digital",
    "Rapporti con il vicinato e con il mondo": "Neighbourhood and the world",
    "Pubblica amministrazione europea": "European public administration",
    "Strumenti speciali": "Special instruments",
    "Migrazione e gestione delle frontiere": "Migration and border management",
    "Sicurezza e Difesa": "Security and defence",
  };

  function t(key) {
    const L = I18N[lang] ? lang : "it";
    if (Object.prototype.hasOwnProperty.call(I18N[L], key)) return I18N[L][key];
    if (Object.prototype.hasOwnProperty.call(I18N.it, key)) return I18N.it[key];
    return "";
  }

  // label() accetta: string oppure {it:'', en:''}
  function label(v) {
    if (v == null) return "";
    if (typeof v === "object") {
      const it = v.it || "";
      const en = v.en || "";
      return (lang === "en" ? (en || it) : (it || en)) || "";
    }
    const s = String(v);
    return lang === "en" ? (LABEL_EN[s] || s) : s;
  }

  w.tpI18n = { lang, t, label };
})(window);
