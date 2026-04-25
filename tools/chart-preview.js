(function () {
  "use strict";

  const chartEl = document.getElementById("previewChart");
  const legendEl = document.getElementById("previewLegend");
  const activeLabel = document.getElementById("activeLabel");
  const activeValue = document.getElementById("activeValue");
  const totalEl = document.getElementById("previewTotal");

  if (!chartEl || !legendEl || !activeLabel || !activeValue || !totalEl) return;

  const totalTax = 8420;
  const colors = {
    welfare: "#003399",
    economy: "#1D4ED8",
    interest: "#64748B",
    health: "#0F766E",
    education: "#7C3AED",
    defence: "#B45309",
    eu: "#FFCC00",
    infrastructure: "#0284C7",
    security: "#BE123C",
    environment: "#16A34A",
    justice: "#475569",
    culture: "#DB2777",
    other: "#94A3B8"
  };

  const sectors = [
    { id: "economy", name: "Politiche economiche", value: 20.9, color: colors.economy },
    { id: "welfare", name: "Protezione sociale", value: 20.6, color: colors.welfare },
    { id: "interest", name: "Interessi", value: 11.6, color: colors.interest },
    { id: "health", name: "Sanita", value: 10.1, color: colors.health },
    { id: "admin", name: "Pubblica amministrazione", value: 8.6, color: "#334155" },
    { id: "education", name: "Istruzione e ricerca", value: 7.9, color: colors.education },
    { id: "other", name: "Altro", value: 5.1, color: colors.other },
    { id: "defence", name: "Difesa", value: 3.4, color: colors.defence },
    { id: "eu", name: "Bilancio UE", value: 2.5, color: colors.eu },
    { id: "infrastructure", name: "Infrastrutture", value: 2.5, color: colors.infrastructure },
    { id: "security", name: "Sicurezza", value: 2.5, color: colors.security },
    { id: "environment", name: "Ambiente", value: 2.4, color: colors.environment },
    { id: "justice", name: "Giustizia", value: 1.3, color: colors.justice },
    { id: "culture", name: "Cultura", value: 0.6, color: colors.culture }
  ];

  const euro = new Intl.NumberFormat("it-IT", {
    style: "currency",
    currency: "EUR",
    maximumFractionDigits: 0
  });

  function sectorAmount(sector) {
    return totalTax * (sector.value / 100);
  }

  function setActive(sector) {
    if (!sector) {
      activeLabel.textContent = "Seleziona un settore";
      activeValue.textContent = "Passa sul grafico o sulla legenda";
      return;
    }

    activeLabel.textContent = sector.name;
    activeValue.textContent = `${euro.format(sectorAmount(sector))} · ${sector.value.toFixed(1)}%`;

    legendEl.querySelectorAll(".preview-legend-item").forEach((item) => {
      item.classList.toggle("is-active", item.dataset.id === sector.id);
    });
  }

  function renderLegend(chart) {
    const fragment = document.createDocumentFragment();

    sectors.forEach((sector, index) => {
      const button = document.createElement("button");
      button.type = "button";
      button.className = "preview-legend-item";
      button.dataset.id = sector.id;

      const dot = document.createElement("span");
      dot.className = "legend-dot";
      dot.style.background = sector.color;
      dot.setAttribute("aria-hidden", "true");

      const label = document.createElement("span");
      label.className = "legend-label";
      label.textContent = sector.name;

      const value = document.createElement("span");
      value.className = "legend-value";
      value.textContent = euro.format(sectorAmount(sector));

      button.append(dot, label, value);

      button.addEventListener("mouseenter", () => {
        chart.dispatchAction({ type: "highlight", seriesIndex: 0, dataIndex: index });
        chart.dispatchAction({ type: "showTip", seriesIndex: 0, dataIndex: index });
        setActive(sector);
      });

      button.addEventListener("mouseleave", () => {
        chart.dispatchAction({ type: "downplay", seriesIndex: 0, dataIndex: index });
        chart.dispatchAction({ type: "hideTip" });
      });

      button.addEventListener("focus", () => {
        chart.dispatchAction({ type: "highlight", seriesIndex: 0, dataIndex: index });
        setActive(sector);
      });

      button.addEventListener("blur", () => {
        chart.dispatchAction({ type: "downplay", seriesIndex: 0, dataIndex: index });
      });

      fragment.appendChild(button);
    });

    legendEl.innerHTML = "";
    legendEl.appendChild(fragment);
  }

  function renderChart() {
    if (!window.echarts) {
      setTimeout(renderChart, 50);
      return;
    }

    totalEl.textContent = euro.format(totalTax);

    const chart = window.echarts.init(chartEl, null, { renderer: "canvas" });
    const option = {
      color: sectors.map((sector) => sector.color),
      tooltip: {
        trigger: "item",
        borderWidth: 0,
        backgroundColor: "rgba(15, 23, 42, .94)",
        padding: [10, 12],
        textStyle: {
          color: "#fff",
          fontFamily: "Inter, system-ui, sans-serif",
          fontSize: 13
        },
        formatter(params) {
          const sector = sectors[params.dataIndex];
          return [
            `<strong>${sector.name}</strong>`,
            `${euro.format(sectorAmount(sector))}`,
            `${sector.value.toFixed(1)}% del totale`
          ].join("<br>");
        }
      },
      series: [
        {
          name: "Spesa pubblica",
          type: "pie",
          radius: ["54%", "78%"],
          center: ["50%", "52%"],
          avoidLabelOverlap: true,
          minAngle: 4,
          padAngle: 1.5,
          itemStyle: {
            borderColor: "#fff",
            borderWidth: 2,
            borderRadius: 8
          },
          label: {
            show: true,
            color: "#334155",
            fontFamily: "Inter, system-ui, sans-serif",
            fontWeight: 700,
            formatter(params) {
              return params.value >= 5 ? `${params.name}\n${Number(params.value).toFixed(1)}%` : "";
            }
          },
          labelLine: {
            length: 14,
            length2: 10,
            lineStyle: {
              color: "#94a3b8"
            }
          },
          emphasis: {
            scale: true,
            scaleSize: 8,
            itemStyle: {
              shadowBlur: 22,
              shadowColor: "rgba(15, 23, 42, .24)"
            },
            label: {
              color: "#003399"
            }
          },
          data: sectors.map((sector) => ({
            value: sector.value,
            name: sector.name,
            itemStyle: { color: sector.color }
          }))
        }
      ],
      graphic: [
        {
          type: "group",
          left: "center",
          top: "center",
          children: [
            {
              type: "text",
              style: {
                text: "Totale",
                fill: "#64748b",
                font: "700 13px Inter"
              },
              left: "center",
              top: -24
            },
            {
              type: "text",
              style: {
                text: euro.format(totalTax),
                fill: "#003399",
                font: "800 25px Inter"
              },
              left: "center",
              top: -3
            },
            {
              type: "text",
              style: {
                text: "demo",
                fill: "#94a3b8",
                font: "700 12px Inter"
              },
              left: "center",
              top: 30
            }
          ]
        }
      ]
    };

    chart.setOption(option);
    renderLegend(chart);
    setActive(null);

    chart.on("mouseover", (params) => {
      if (params.componentType === "series") setActive(sectors[params.dataIndex]);
    });

    window.addEventListener("resize", () => chart.resize());
  }

  renderChart();
})();
