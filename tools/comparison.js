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
  const metrics = Array.isArray(bootstrap.metrics) ? bootstrap.metrics : [];
  const countries = bootstrap.countries && typeof bootstrap.countries === "object" ? bootstrap.countries : {};

  const elA = document.getElementById("countryA");
  const elB = document.getElementById("countryB");
  const errSame = document.getElementById("sameCountryError");
  const rows = document.getElementById("rows");
  const cardsWrap = document.getElementById("compareCards");
  const tableWrap = document.getElementById("compareTable");
  const cardATitle = document.getElementById("cardATitle");
  const cardBTitle = document.getElementById("cardBTitle");
  const cardASub = document.getElementById("cardASub");
  const cardBSub = document.getElementById("cardBSub");
  const cardAFlag = document.getElementById("cardAFlag");
  const cardBFlag = document.getElementById("cardBFlag");
  const thA = document.getElementById("thA");
  const thB = document.getElementById("thB");

  if (!elA || !elB || !errSame || !rows || !cardsWrap || !tableWrap || !cardATitle || !cardBTitle || !cardASub || !cardBSub || !cardAFlag || !cardBFlag || !thA || !thB) {
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

    const unit = unitKey ? t(unitKey) : "";
    const numericValue = Number(value);
    if (Number.isNaN(numericValue)) return t("nodata");

    if (fmtKey === "pct1") return numericValue.toFixed(1) + " " + unit;
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

    img.src = country.flag_path;
    img.addEventListener("error", function handleError() {
      chip.classList.add("is-fallback");
    }, { once: true });

    return chip;
  }

  function renderSummary(cardRefs, country) {
    const title = cardRefs.title;
    const subtitle = cardRefs.subtitle;
    const flag = cardRefs.flag;

    title.textContent = country ? country.name : "";
    subtitle.textContent = country ? t("note") : "";
    flag.innerHTML = "";

    if (country) {
      flag.appendChild(createFlagChip(country, { large: true }));
    }
  }

  function hideAll() {
    errSame.style.display = "none";
    rows.innerHTML = "";
    setVisible(cardsWrap, false);
    setVisible(tableWrap, false);
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
    setVisible(cardsWrap, true);
    setVisible(tableWrap, true);

    renderSummary({ title: cardATitle, subtitle: cardASub, flag: cardAFlag }, countryA);
    renderSummary({ title: cardBTitle, subtitle: cardBSub, flag: cardBFlag }, countryB);

    thA.textContent = countryA.name;
    thB.textContent = countryB.name;

    const fragment = document.createDocumentFragment();

    metrics.forEach((metric) => {
      const row = document.createElement("tr");

      const labelCell = document.createElement("td");
      const unitLabel = metric.unit_key ? t(metric.unit_key) : "";
      labelCell.textContent = unitLabel ? (t(metric.label_key) + " (" + unitLabel + ")") : t(metric.label_key);
      row.appendChild(labelCell);

      const valueACell = document.createElement("td");
      valueACell.className = "num";
      valueACell.textContent = fmt(getMetric(a, metric.key), metric.fmt, metric.unit_key);
      row.appendChild(valueACell);

      const valueBCell = document.createElement("td");
      valueBCell.className = "num";
      valueBCell.textContent = fmt(getMetric(b, metric.key), metric.fmt, metric.unit_key);
      row.appendChild(valueBCell);

      fragment.appendChild(row);
    });

    rows.innerHTML = "";
    rows.appendChild(fragment);

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
    menu.hidden = true;

    const optionButtons = [];

    Object.keys(countries).forEach((code) => {
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
