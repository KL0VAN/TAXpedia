(function () {
  "use strict";

  const dataNode = document.getElementById("comparison-bootstrap");
  if (!dataNode) return;

  let bootstrap = null;
  try {
    bootstrap = JSON.parse(dataNode.textContent || "{}");
  } catch (error) {
    console.error("Invalid comparison bootstrap", error);
    return;
  }

  const lang = typeof bootstrap.lang === "string" ? bootstrap.lang : "it";
  const dict = bootstrap.dict && typeof bootstrap.dict === "object" ? bootstrap.dict : {};
  const overviewMetrics = Array.isArray(bootstrap.overviewMetrics) ? bootstrap.overviewMetrics : [];
  const spendingMetrics = Array.isArray(bootstrap.spendingMetrics) ? bootstrap.spendingMetrics : [];
  const countries = bootstrap.countries && typeof bootstrap.countries === "object" ? bootstrap.countries : {};

  const metricMetadata = bootstrap.metricMetadata || {};
  const sources = bootstrap.sources || {};
  const valueLabels = bootstrap.valueLabels || {};
  const spendingAvailability = document.getElementById("spendingAvailability");

  const elA = document.getElementById("countryA");
  const elB = document.getElementById("countryB");
  const errSame = document.getElementById("sameCountryError");
  const comparisonResults = document.getElementById("comparisonResults");
  const cardsWrap = document.getElementById("compareCards");
  const overviewGrid = document.getElementById("overviewGrid");
  const spendingLegend = document.getElementById("spendingLegend");
  const spendingRows = document.getElementById("spendingRows");
  const cardATitle = document.getElementById("cardATitle");
  const cardBTitle = document.getElementById("cardBTitle");
  const cardASub = document.getElementById("cardASub");
  const cardBSub = document.getElementById("cardBSub");
  const cardAFlag = document.getElementById("cardAFlag");
  const cardBFlag = document.getElementById("cardBFlag");

  if (!elA || !elB || !errSame || !comparisonResults || !cardsWrap || !overviewGrid || !spendingLegend || !spendingRows || !cardATitle || !cardBTitle || !cardASub || !cardBSub || !cardAFlag || !cardBFlag) {
    return;
  }

  function t(key) {
    const currentDict = dict[lang] && typeof dict[lang] === "object" ? dict[lang] : {};
    const fallbackDict = dict.it && typeof dict.it === "object" ? dict.it : {};
    return currentDict[key] || fallbackDict[key] || key;
  }

  function getCountry(code) {
    if (!code || !countries[code]) return null;
    return countries[code];
  }

  function setVisible(element, isVisible) {
    element.classList.toggle("is-hidden", !isVisible);
  }

  function fmt(value, fmtKey, unitKey) {
    if (value === null || value === undefined || value === "") return t("nodata");
    if (fmtKey === "text") return String(value);
    if (fmtKey === "translated_text") return (valueLabels[value] || {})[lang] || t(String(value));

    const unit = unitKey ? t(unitKey) : "";
    const numericValue = Number(value);
    if (!Number.isFinite(numericValue)) return t("nodata");

    if (fmtKey === "pct1") {
      const formattedValue = new Intl.NumberFormat(
        lang === "en" ? "en-GB" : "it-IT",
        { minimumFractionDigits: 1, maximumFractionDigits: 1 }
      ).format(numericValue);
      return formattedValue + " " + unit;
    }
    if (fmtKey === "eur0") {
      const formattedValue = new Intl.NumberFormat(
        lang === "en" ? "en-GB" : "it-IT",
        { maximumFractionDigits: 0 }
      ).format(numericValue);
      return formattedValue + " " + unit;
    }

    return String(numericValue) + (unit ? (" " + unit) : "");
  }

  function getMetric(countryCode, key) {
    const country = getCountry(countryCode);
    if (!country || !country.metrics) return null;
    return Object.prototype.hasOwnProperty.call(country.metrics, key) ? country.metrics[key] : null;
  }

  function setUrlParams(a, b) {
    const url = new URL(window.location.href);
    if (a) url.searchParams.set("a", a);
    else url.searchParams.delete("a");
    if (b) url.searchParams.set("b", b);
    else url.searchParams.delete("b");
    window.history.replaceState({}, "", url.toString());
  }

  function buildFlagAlt(country) {
    return t("flag_of") + " " + country.name;
  }

  function createFlagChip(country, options) {
    const isDecorative = !!(options && options.decorative);
    const chip = document.createElement("span");
    chip.className = "flag-chip";
    if (options && options.large) chip.classList.add("flag-chip-large");

    const img = document.createElement("img");
    img.className = "flag-chip-image";
    img.alt = isDecorative ? "" : buildFlagAlt(country);
    img.decoding = "async";
    img.loading = "lazy";

    const fallback = document.createElement("span");
    fallback.className = "flag-chip-fallback";
    fallback.textContent = country.code || "";

    chip.appendChild(img);
    chip.appendChild(fallback);

    if (!country.flag_path) {
      chip.classList.add("is-fallback");
      return chip;
    }

    img.addEventListener("error", function handleError() {
      chip.classList.add("is-fallback");
    }, { once: true });
    img.src = country.flag_path;

    return chip;
  }

  function renderSummary(cardRefs, country) {
    const title = cardRefs.title;
    const subtitle = cardRefs.subtitle;
    const flag = cardRefs.flag;

    title.textContent = country ? country.name : "";
    subtitle.textContent = country ? country.code : "";
    flag.innerHTML = "";

    if (country) {
      flag.appendChild(createFlagChip(country, { large: true }));
    }
  }

  function hideAll() {
    errSame.style.display = "none";
    overviewGrid.innerHTML = "";
    spendingLegend.innerHTML = "";
    spendingRows.innerHTML = "";
    setVisible(comparisonResults, false);
  }

  function metricValue(countryCode, metric) {
    const value = getMetric(countryCode, metric.key);
    const meta = ((getCountry(countryCode) || {}).metric_meta || {})[metric.key] || {};
    if (value == null && meta.status === "not_available_in_comparable_series") return t("not_comparable");
    return fmt(value, metric.fmt, metric.unit_key);
  }

  function appendCountryValue(parent, country, value, side) {
    const item = document.createElement("div");
    item.className = "metric-country metric-country-" + side;

    const name = document.createElement("span");
    name.className = "metric-country-name";
    name.textContent = country.name;

    const strong = document.createElement("strong");
    strong.className = "metric-country-value";
    strong.textContent = value;

    item.appendChild(name);
    item.appendChild(strong);
    parent.appendChild(item);
  }

  function periodLabel(period) {
    if (!period) return "";
    const text = String(period);
    if (/^\d{4}-Q[1-4]$/.test(text)) return lang === "en" ? text.slice(5) + " " + text.slice(0, 4) : text.slice(6) + "° trimestre " + text.slice(0, 4);
    if (/^\d{4}-\d{2}(-\d{2})?$/.test(text)) {
      return new Intl.DateTimeFormat(lang === "en" ? "en-GB" : "it-IT", {
        month: "long", year: "numeric", ...(text.length === 10 ? { day: "numeric" } : {}), timeZone: "UTC"
      }).format(new Date(text.length === 7 ? text + "-01T00:00:00Z" : text + "T00:00:00Z"));
    }
    return text;
  }

  function appendMetricDetails(card, metric, countryA, countryB) {
    const meta = metricMetadata[metric.key] || {};
    const period = document.createElement("p");
    period.className = "metric-period";
    const date = meta.checked_on || meta.as_of || meta.period || metric.period;
    period.textContent = (meta.checked_on || meta.as_of ? t("verified_on") : t("reference_period")) + ": " + periodLabel(date);
    if (meta.status === "provisional") period.textContent += " · " + t("provisional");
    card.appendChild(period);

    const shortNotes = { reddito_medio: "salary_note", taxation_type: "tax_note", valuta: "currency_note" };
    if (shortNotes[metric.key]) {
      const note = document.createElement("p");
      note.className = "metric-note";
      note.textContent = t(shortNotes[metric.key]);
      card.appendChild(note);
    }
    const details = document.createElement("details");
    details.className = "metric-details";
    const summary = document.createElement("summary");
    summary.textContent = t("methodology");
    details.appendChild(summary);
    const definition = meta["definition_" + lang];
    if (definition) {
      const p = document.createElement("p"); p.textContent = definition; details.appendChild(p);
    }
    function addSource(url, label) {
      if (typeof url !== "string" || !/^https:\/\//.test(url)) return;
      const p = document.createElement("p");
      const link = document.createElement("a"); link.href = url; link.textContent = label;
      link.target = "_blank"; link.rel = "noopener noreferrer"; p.appendChild(link); details.appendChild(p);
    }
    const ids = meta.retrieval_sources || (meta.source_id ? [meta.source_id] : []);
    ids.forEach(id => { const source = sources[id]; if (source) addSource(source.url, source.publisher || t("source")); });
    if (metric.key === "reddito_medio") {
      const p = document.createElement("p"); p.textContent = t("salary_sources_note"); details.appendChild(p);
    }
    [countryA, countryB].forEach(country => {
      const local = (country.metric_meta || {})[metric.key] || {};
      if (local["note_" + lang]) {
        const p = document.createElement("p"); p.textContent = country.name + ": " + local["note_" + lang]; details.appendChild(p);
      }
      if (local.source_url) addSource(local.source_url, country.name + " — " + t("source"));
    });
    card.appendChild(details);
  }

  function renderOverview(a, b, countryA, countryB) {
    const fragment = document.createDocumentFragment();

    overviewMetrics.forEach((metric) => {
      const card = document.createElement("article");
      card.className = "metric-card";

      const title = document.createElement("h3");
      title.textContent = metric["label_" + lang] || t(metric.label_key);

      const values = document.createElement("div");
      values.className = "metric-values";
      appendCountryValue(values, countryA, metricValue(a, metric), "a");

      const divider = document.createElement("span");
      divider.className = "metric-divider";
      divider.setAttribute("aria-hidden", "true");
      values.appendChild(divider);

      appendCountryValue(values, countryB, metricValue(b, metric), "b");
      card.appendChild(title);
      card.appendChild(values);
      appendMetricDetails(card, metric, countryA, countryB);
      fragment.appendChild(card);
    });

    overviewGrid.innerHTML = "";
    overviewGrid.appendChild(fragment);
  }

  function createLegendItem(country, side) {
    const item = document.createElement("span");
    item.className = "legend-item legend-item-" + side;

    const swatch = document.createElement("span");
    swatch.className = "legend-swatch";
    swatch.setAttribute("aria-hidden", "true");

    const label = document.createElement("span");
    label.textContent = country.name;

    item.appendChild(swatch);
    item.appendChild(label);
    return item;
  }

  function barWidth(value) {
    const number = Number(value);
    if (!Number.isFinite(number)) return 0;
    return Math.min(100, Math.max(0, number));
  }

  function appendSpendingBar(parent, country, rawValue, formattedValue, side) {
    const line = document.createElement("div");
    line.className = "spending-country spending-country-" + side;

    const meta = document.createElement("div");
    meta.className = "spending-country-meta";

    const name = document.createElement("span");
    name.textContent = country.name;

    const value = document.createElement("strong");
    value.textContent = formattedValue;

    const track = document.createElement("div");
    track.className = "spending-track";
    track.setAttribute("aria-hidden", "true");

    const bar = document.createElement("span");
    bar.className = "spending-bar";
    bar.style.width = barWidth(rawValue) + "%";

    meta.appendChild(name);
    meta.appendChild(value);
    track.appendChild(bar);
    line.appendChild(meta);
    if (rawValue !== null && rawValue !== undefined && rawValue !== "" && Number.isFinite(Number(rawValue))) line.appendChild(track);
    parent.appendChild(line);
  }

  function renderSpending(a, b, countryA, countryB) {
    spendingLegend.innerHTML = "";
    spendingLegend.appendChild(createLegendItem(countryA, "a"));
    spendingLegend.appendChild(createLegendItem(countryB, "b"));

    const fragment = document.createDocumentFragment();
    const available = value => value !== null && value !== undefined && value !== "" && Number.isFinite(Number(value));
    const visibleMetrics = spendingMetrics.filter(metric => available(getMetric(a, metric.key)) || available(getMetric(b, metric.key)));
    const partial = visibleMetrics.length < spendingMetrics.length || visibleMetrics.some(metric => !available(getMetric(a, metric.key)) || !available(getMetric(b, metric.key)));
    if (spendingAvailability) spendingAvailability.textContent = !visibleMetrics.length ? t("no_spending") : partial ? t("partial_spending") : "";
    spendingLegend.classList.toggle("is-hidden", !visibleMetrics.length);
    visibleMetrics.forEach((metric) => {
      const rawA = getMetric(a, metric.key);
      const rawB = getMetric(b, metric.key);
      const row = document.createElement("article");
      row.className = "spending-row";

      const title = document.createElement("h3");
      title.textContent = metric["label_" + lang] || t(metric.label_key);
      row.appendChild(title);

      appendSpendingBar(row, countryA, rawA, available(rawA) ? fmt(rawA, metric.fmt, metric.unit_key) : t("missing_value"), "a");
      appendSpendingBar(row, countryB, rawB, available(rawB) ? fmt(rawB, metric.fmt, metric.unit_key) : t("missing_value"), "b");
      fragment.appendChild(row);
    });

    spendingRows.innerHTML = "";
    spendingRows.appendChild(fragment);
  }

  function render() {
    const a = elA.value ? String(elA.value) : "";
    const b = elB.value ? String(elB.value) : "";

    if (!a || !b) {
      hideAll();
      setUrlParams(a, b);
      return;
    }

    if (a === b) {
      hideAll();
      errSame.style.display = "block";
      setUrlParams(a, b);
      return;
    }

    const countryA = getCountry(a);
    const countryB = getCountry(b);

    if (!countryA || !countryB) {
      hideAll();
      setUrlParams(a, b);
      return;
    }

    errSame.style.display = "none";
    setVisible(comparisonResults, true);

    renderSummary({ title: cardATitle, subtitle: cardASub, flag: cardAFlag }, countryA);
    renderSummary({ title: cardBTitle, subtitle: cardBSub, flag: cardBFlag }, countryB);

    renderOverview(a, b, countryA, countryB);
    renderSpending(a, b, countryA, countryB);

    setUrlParams(a, b);
  }

  function createCustomSelect(selectElement, labelElementId) {
    const root = selectElement.closest("[data-custom-select]");
    if (!root) return null;

    const labelElement = document.getElementById(labelElementId);
    const menuId = selectElement.id + "Menu";
    const placeholder = t("select_country");

    const ui = document.createElement("div");
    ui.className = "custom-select-ui";

    const trigger = document.createElement("button");
    trigger.type = "button";
    trigger.className = "custom-select-trigger";
    trigger.setAttribute("aria-haspopup", "listbox");
    trigger.setAttribute("aria-expanded", "false");
    trigger.setAttribute("aria-controls", menuId);
    if (labelElement) trigger.setAttribute("aria-labelledby", labelElement.id);

    const triggerValue = document.createElement("span");
    triggerValue.id = selectElement.id + "Value";
    if (labelElement) trigger.setAttribute("aria-labelledby", labelElement.id + " " + triggerValue.id);
    triggerValue.className = "custom-select-value";

    const chevron = document.createElement("span");
    chevron.className = "custom-select-chevron";
    chevron.setAttribute("aria-hidden", "true");
    chevron.textContent = "v";

    trigger.appendChild(triggerValue);
    trigger.appendChild(chevron);

    const menu = document.createElement("div");
    menu.id = menuId;
    menu.className = "custom-select-menu";
    menu.setAttribute("role", "listbox");
    if (labelElement) menu.setAttribute("aria-labelledby", labelElement.id);
    menu.hidden = true;

    const optionButtons = [];

    Object.keys(countries).sort((a, b) => countries[a].name.localeCompare(countries[b].name, lang)).forEach((code) => {
      const country = getCountry(code);
      if (!country) return;

      const option = document.createElement("button");
      option.type = "button";
      option.className = "custom-select-option";
      option.setAttribute("role", "option");
      option.dataset.value = code;

      const optionLabel = document.createElement("span");
      optionLabel.className = "custom-select-option-label";
      optionLabel.appendChild(createFlagChip(country, { decorative: true }));

      const optionText = document.createElement("span");
      optionText.className = "custom-select-option-text";
      optionText.textContent = country.name;
      optionLabel.appendChild(optionText);

      option.appendChild(optionLabel);

      option.addEventListener("click", function handleSelect() {
        if (selectElement.value !== code) {
          selectElement.value = code;
          selectElement.dispatchEvent(new Event("change", { bubbles: true }));
        } else {
          sync();
        }

        close(true);
      });

      option.addEventListener("keydown", function handleKeydown(event) {
        const currentIndex = optionButtons.indexOf(option);

        if (event.key === "ArrowDown") {
          event.preventDefault();
          const nextIndex = currentIndex + 1 < optionButtons.length ? currentIndex + 1 : 0;
          optionButtons[nextIndex].focus();
        } else if (event.key === "ArrowUp") {
          event.preventDefault();
          const previousIndex = currentIndex - 1 >= 0 ? currentIndex - 1 : optionButtons.length - 1;
          optionButtons[previousIndex].focus();
        } else if (event.key === "Escape") {
          event.preventDefault();
          close(true);
        }
      });

      optionButtons.push(option);
      menu.appendChild(option);
    });

    ui.appendChild(trigger);
    ui.appendChild(menu);
    root.appendChild(ui);
    root.classList.add("is-enhanced");

    selectElement.tabIndex = -1;
    selectElement.setAttribute("aria-hidden", "true");

    function sync() {
      const selectedCountry = getCountry(selectElement.value);
      triggerValue.innerHTML = "";

      if (selectedCountry) {
        trigger.classList.remove("is-placeholder");
        triggerValue.appendChild(createFlagChip(selectedCountry, { decorative: true }));

        const label = document.createElement("span");
        label.className = "custom-select-text";
        label.textContent = selectedCountry.name;
        triggerValue.appendChild(label);
      } else {
        trigger.classList.add("is-placeholder");

        const label = document.createElement("span");
        label.className = "custom-select-text";
        label.textContent = placeholder;
        triggerValue.appendChild(label);
      }

      optionButtons.forEach((option) => {
        const isSelected = option.dataset.value === selectElement.value;
        option.setAttribute("aria-selected", isSelected ? "true" : "false");
        option.classList.toggle("is-selected", isSelected);
      });
    }

    function open() {
      menu.hidden = false;
      root.classList.add("is-open");
      trigger.setAttribute("aria-expanded", "true");

      const selectedOption = optionButtons.find((option) => option.dataset.value === selectElement.value);
      (selectedOption || optionButtons[0] || trigger).focus();
    }

    function close(returnFocus) {
      menu.hidden = true;
      root.classList.remove("is-open");
      trigger.setAttribute("aria-expanded", "false");
      if (returnFocus) trigger.focus();
    }

    trigger.addEventListener("click", function handleToggle() {
      if (menu.hidden) open();
      else close(false);
    });

    trigger.addEventListener("keydown", function handleTriggerKeys(event) {
      if (event.key === "ArrowDown" || event.key === "ArrowUp" || event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        open();
      } else if (event.key === "Escape") {
        event.preventDefault();
        close(false);
      }
    });

    sync();

    return { root, sync, close };
  }

  const customControls = [
    createCustomSelect(elA, "countryALabel"),
    createCustomSelect(elB, "countryBLabel"),
  ].filter(Boolean);

  document.addEventListener("click", function handleDocumentClick(event) {
    customControls.forEach((control) => {
      if (!control.root.contains(event.target)) control.close(false);
    });
  });

  document.addEventListener("keydown", function handleDocumentKeydown(event) {
    if (event.key !== "Escape") return;
    customControls.forEach((control) => control.close(false));
  });

  function syncCustomControls() {
    customControls.forEach((control) => control.sync());
  }

  elA.addEventListener("change", function handleAChange() {
    syncCustomControls();
    render();
  });

  elB.addEventListener("change", function handleBChange() {
    syncCustomControls();
    render();
  });

  syncCustomControls();
  render();
})();
