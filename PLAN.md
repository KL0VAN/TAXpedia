# TAXpedia development plan

## Current baseline and audit

- GitHub: `KL0VAN/TAXpedia` (public), `main` synchronized to the authoritative 270-file local snapshot at `5f08c9d`.
- Previous remote main: `2d249e3`, preserved remotely on `backup/pre-sync-2026-10-11`.
- Main entry points: `index.php`, `aboutus/aboutus.php`, country calculators, `article/articoli.php`, individual articles, `glossary/glossario.php` and `tools/*.php`.
- Shared dependencies: `i18n/i18n.php` with Italian/English dictionaries; `partials/header.php`, `footer.php`, `new-article.php` and `web-awards.php`. Articles use `article/article_data.php`; comparison uses `tools/comparison_data.php` and `country_data.php`.
- No Composer/npm manifest or existing test suite. Shared styling uses `styleIndex.css`, EU blue/gold CSS variables, page-specific overrides and responsive media queries. JavaScript uses native DOM APIs and immediately invoked functions.
- About Us defines page translations and team data in PHP, renders three team levels, then organization links. Profiles share AboutUs CSS with page-local profile styles.
- Loose About Us images duplicate the dedicated logo/people folders exactly. DemocraSeeds and rethink_uni also have identical article copies that are still referenced by articles; preserve these article URLs.
- Linux risks: exact `Alessandro.jpg`, `Ludovico.jpg` and `AboutUs.css` casing matters; some legacy article templates still refer to old image locations. Fix only affected references in this task.
- Three team profiles have directory-only portrait URLs despite existing portraits. Tommaso has a directory-only image URL and no matching supplied portrait; use a named initials fallback.
- `1.TESTER/` is empty, has no source-code references and is not tracked by Git. No hosting/deployment configuration is present. Local Git disables automatic line-ending conversion to preserve the authoritative snapshot.

## 1. About Us asset organization and carousel — current task

- Point About Us/profile references to the existing canonical folders; remove only verified loose duplicates.
- Retain `aboutus/imm/map.png`, unused canonical portraits/formats and article-owned logos.
- Include DemocraSeeds, rethink_uni, Gioventù Federalista Europea, Trasporta Milano and Controverso (CVN), using the supplied authentic files. Preserve the four existing external links; do not invent a CVN destination.
- Build a modest continuous carousel with native CSS/JS, consistent contain-fit logo slots, seamless duplicated groups, hover pause and a translated pause control.
- Keep duplicate content out of the accessibility tree/tab sequence; expose all original logos for keyboard interaction, reduced motion and no JavaScript.
- Validate syntax, affected asset URLs/casing, bilingual pages, profile/article rendering, navigation, responsive layout and accessibility. Keep implementation commits local.

## 2. Portugal and Slovenia comparator fixes — future, not authorized here

- Reproduce comparator failures and inspect country identifiers, data mappings, calculator inputs and translations.
- Make scoped fixes with representative regression cases; preserve unrelated country behavior.

## 3. Tester-only multi-country dashboard — future, not authorized here

- Define requirements, inputs, sources and UI with the user; prototype under `1.TESTER/`.
- Keep experiments out of public navigation and production pages; validate cross-country comparability.

## 4. Remaining photography and asset optimization — future, not authorized here

- Inventory other images and missing portraits, check rights/authenticity, then propose compression and responsive formats.
- Audit legacy image references and metadata before changing shared paths. Do not substitute unrelated portraits or generate official logos.

## 5. Regression testing and production-release preparation — future

- Test all country calculators, comparison, articles, glossary, language switching, navigation, forms and mobile layouts.
- Validate on a case-sensitive Linux filesystem and confirm production PHP/browser support.
- Prepare release/rollback notes and a reviewed deployment manifest. Obtain separate approval for any push or production deployment.
