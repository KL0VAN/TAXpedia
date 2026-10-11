# Portugal and Slovenia comparator audit

Checked locally on 11 October 2026. No deployment or GitHub push.

## Finding and correction

`comparison_data.php` contains **spending-allocation percentage points**, not income-tax brackets. `comparison.php` combines these with the economic indicators in `country_data.php`. `comparison.js` formats those percentages and sets bar widths; it has no income input or personal-tax calculation.

Before this change, Portugal's entire 14-category allocation equalled Slovenia's. It also equalled the Slovenian calculator's `SETTORI`. Portugal's calculator has a different allocation. This establishes a wrongly duplicated Portugal entry; the historical cause of the duplication cannot be proven from the current files.

Portugal now uses `SETTORI.percentuale * 100` from `calculator/portugal/calculatorPortugal.js`. Slovenia's values already match `calculator/slovenia/calculatorSlovenia.js` and remain unchanged. Both allocations total 100%. No normalization, invented residual category, or new fiscal formula was introduced. All other country entries, economic indicators, comparison rendering and individual calculators remain unchanged.

| Spending category | Portugal before | Portugal after | Slovenia, unchanged |
| --- | ---: | ---: | ---: |
| Economic policies | 6.1% | 6.3% | 6.1% |
| Social protection | 36.7% | 39.5% | 36.7% |
| Health | 17.2% | 18.2% | 17.2% |
| Debt interest | 2.7% | 4.8% | 2.7% |
| Public administration | 3.9% | 14.1% | 3.9% |
| Education and research | 13.1% | 5.5% | 13.1% |
| Defence | 3.0% | 1.3% | 3.0% |
| EU budget | 2.0% | 1.8% | 2.0% |
| Infrastructure | 7.1% | 2.7% | 7.1% |
| Public order | 2.0% | 1.2% | 2.0% |
| Environment | 1.5% | 3.0% | 1.5% |
| Justice | 1.3% | 1.1% | 1.3% |
| Culture | 3.2% | 0.5% | 3.2% |
| Other | 0.2% | 0.0% | 0.2% |

## Calculation methodology

Both individual calculators apply a marginal progressive schedule to the **entire entered amount**, starting from zero, and round total tax to cents. For these tests the same annual gross euro amounts were entered into both calculators. Their simplified model treats this amount directly as the taxable base: it does not deduct social security, allowances or other deductions, apply household adjustments, or convert monthly pay to annual pay. Marginal rates below are not effective rates; the latter equal modeled tax divided by input income.

| Portugal upper threshold (EUR) | Marginal rate | Slovenia upper threshold (EUR) | Marginal rate |
| ---: | ---: | ---: | ---: |
| 8,342 | 12.5% | 9,721.43 | 16% |
| 12,587 | 15.7% | 28,592.44 | 26% |
| 17,838 | 21.2% | 57,184.88 | 33% |
| 23,089 | 24.1% | 82,346.23 | 39% |
| 29,397 | 31.1% | No upper limit | 50% |
| 43,090 | 34.9% | | |
| 46,566 | 43.1% | | |
| 86,634 | 44.6% | | |
| No upper limit | 48% | | |

The comparator has no second tax model to reconcile with these schedules. For every test scenario, its percentage for each category, divided by 100 and multiplied by the individual calculator's total, reproduces that calculator's unrounded allocation. Chart amounts round each category separately to cents, so their sum can differ from the tax total by rounding. The comparator itself displays percentages, not these euro allocations.

## Executed regression checks

Real local pages were tested in headless Windows Chrome. Actual calculator forms and both Chart.js 4.4.1 charts were exercised; the existing chart library was downloaded from the page's configured CDN and served unchanged during isolated testing. External fonts and analytics were blocked.

| Annual input (EUR) | Portugal modeled tax (EUR) | Slovenia modeled tax (EUR) | France regression (EUR) | Spain regression (EUR) |
| ---: | ---: | ---: | ---: | ---: |
| 20,000 | 3,343.47 | 4,227.86 | 935.33 | 2,088.75 |
| 40,000 | 9,750.15 | 10,226.39 | 5,165.48 | 5,250.75 |
| 70,000 | 22,778.28 | 20,895.29 | 14,165.48 | 11,200.75 |
| 100,000 | 36,612.73 | 34,537.21 | 24,944.95 | 17,950.75 |

- All totals checked against independent decimal marginal-bracket arithmetic.
- All 14 allocation mappings checked at every income for all four countries.
- Exact thresholds and one cent either side checked for all four schedules.
- Italian/English comparator labels, numerical formatting, rendered bar widths, country selection and same-country rejection checked.
- Desktop, tablet and mobile rendering inspected; all other comparator datasets compared with their starting snapshot.
- No normal local HTTP failures or browser JavaScript exceptions observed; changed PHP passed syntax checking.

## Fiscal verification and remaining limits

The existing Portugal bracket thresholds and marginal rates match the official [Portuguese tax authority's Article 68 table](https://info.portaldasfinancas.gov.pt/pt/informacao_fiscal/codigos_tributarios/cirs_rep/Pages/irs68.aspx). Slovenia's schedule matches the 2026 table in [Official Gazette 104/2025, printed page 11918 / PDF page 28](https://www.uradni-list.si/_pdf/2025/Ur/u2025104.pdf#page=28). Those schedules concern taxable income, not an unadjusted gross salary. This is partial fiscal verification, not validation of the calculators as complete liability estimators.

Portugal's calculator omits the additional solidarity charge above EUR 80,000 of taxable income described in [Article 68-A](https://info.portaldasfinancas.gov.pt/pt/informacao_fiscal/codigos_tributarios/cirs_rep/Pages/irs68a.aspx). Neither calculator models the deductions and allowances needed for a complete gross-to-tax computation. These are existing simplifications, reported rather than silently changed in an allocation-data correction.

**Internal allocation consistency is verified. Real-world accuracy and reference periods of the spending shares are not verified.** Their existing calculator constants provide the internal source of truth; this audit does not invent a budget year or claim that different national classifications are fully comparable. France/Spain checks establish regression consistency, not a fiscal audit of those countries. No Linux hosting or other browser engine was tested.
