# TAXpedia Task 1 delivery — 2026-10-11

## GitHub baseline

- Repository: [KL0VAN/TAXpedia](https://github.com/KL0VAN/TAXpedia), public.
- Original main: `2d249e34edd232377429f1bf4a5117943d9d5b17`.
- Verified remote backup: [backup/pre-sync-2026-10-11](https://github.com/KL0VAN/TAXpedia/tree/backup/pre-sync-2026-10-11), pointing to that original commit.
- Synchronized baseline: `5f08c9da56a6170e4be52aa47510fbae1d16b5c6`, pushed to main with explicit approval, using a normal fast-forward push. All existing history was preserved.
- Before implementation, all 270 local files matched the baseline commit byte for byte and by exact path casing. Changes from the old main: 91 additions, 40 modifications, 28 deletions, 139 unchanged files (without rename detection).
- Automated credential-pattern and sensitive-filename scans found no candidates. Existing site contact information and team portraits are part of the public baseline.
- Implementation is committed only on local branch `task1/about-us-carousel`. Remote main remains the approved baseline. No hosting changes or deployment were performed.

## Changes

- About Us now uses the existing canonical logo and portrait folders. All retained image bytes remain unchanged.
- The continuous carousel includes DemocraSeeds, rethink_uni, Gioventù Federalista Europea, Trasporta Milano and Controverso (CVN). The four existing organization links are preserved; no CVN URL was invented.
- Uniform contain-fit logo slots preserve aspect ratios. Two equal-width groups with a trailing gap provide a seamless loop, at approximately 23 pixels/second on desktop and 21 on mobile.
- Hover and an Italian/English pause control stop motion. Keyboard interaction exposes the stationary original list. Reduced motion and disabled JavaScript retain a complete stationary gallery; copies are excluded from the accessibility tree and tab sequence.
- Corrected the portrait URLs for Alessandro, Ludovico and Ottilia. Tommaso has no supplied portrait, so his broken directory-only image now has a named TP initials fallback.
- Updated founder portrait URLs, including Francesco's social/structured metadata, and the two articles using About Us GFE/TM assets.
- About Us width is constrained to the viewport; its existing footer stacks on small screens to prevent horizontal overflow.
- Root guidance, audit/future plan and local preview documentation were added. Comparator, dashboard, tax data and other future tasks were not implemented.

## File inventory

Created (4):

- `AGENTS.md`
- `PLAN.md`
- `TASK1_REPORT.md`
- `aboutus/partner-carousel.js`

Modified (12):

- `README.md`
- `aboutus/AboutUs.css`
- `aboutus/aboutus.php`
- `aboutus/team/alessandro-marangoni.php`
- `aboutus/team/francesco-calabrese-vallino.php`
- `aboutus/team/ludovico-prunster.php`
- `aboutus/team/luka-ribic.php`
- `aboutus/team/ottilia-ogliari.php`
- `aboutus/team/riccardo-cervillio.php`
- `aboutus/team/tommaso-prever.php`
- `article/europe/european-union/the-cost-of-a-divided-europe.php`
- `article/italia/infrastrutture/il-biglietto-non-basta.php`

Removed (11), only after byte comparisons and full-repository reference checks:

- `aboutus/imm/Alessandro.jpg`
- `aboutus/imm/calabrese.jpg`
- `aboutus/imm/cervillio.jpg`
- `aboutus/imm/lorenzo.jpg`
- `aboutus/imm/Ludovico.jpg`
- `aboutus/imm/ottilia.jpg`
- `aboutus/imm/ribic.jpg`
- `aboutus/imm/logo-cvn.png`
- `aboutus/imm/logo-gfe.png`
- `aboutus/imm/logo-gfe.webp`
- `aboutus/imm/logo-tm.jpg`

No image moves or renames were necessary: their byte-identical canonical copies already existed. `aboutus/imm/map.png`, both GFE formats, unused portraits and the two article-owned logos are retained. The latter remain referenced by existing articles.

## Validation

- PHP 8.5.11 syntax checks: all 10 modified PHP files passed.
- `git diff --check`: passed. Local Git recognizes CRLF line endings and disables automatic conversion; no global Git settings were changed.
- HTTP: all 26 bilingual page requests passed (About Us, seven profiles and five related articles), with no PHP warning/error text.
- All 15 local image URLs appearing in those rendered pages returned image content matching the files. Decoding and exact case-sensitive path-component checks passed.
- All 26 retained images (canonical assets, article images and the map) were compared against their baseline SHA-256 hashes and remained identical.
- Isolated headless Google Chrome on Windows: five partner logos decoded, original external destinations preserved, equal logo slots, equal group widths and adequate looping runway. Loop-boundary drift measured below 0.1 pixel.
- Actual animation advancement, hover pause, persistent pause/resume, keyboard traversal of all four original links and exclusion of copies passed.
- Layout widths: 1440, 1024, 768, 375 and 320 pixels passed without About Us page overflow.
- Reduced motion (including live preference changes), and JavaScript-disabled fallback at 320 pixels passed.
- Italian/English control labels and language-switch clicks, menu open/Escape-close and all six header navigation destinations passed.
- Seven profiles and five related articles rendered in Chrome with decoded main-content images; no JavaScript exceptions occurred.
- Desktop/mobile/reduced-motion carousel screenshots were visually inspected. Automated test scripts/results/screenshots are local `.git/` metadata, not website dependencies.

## Limits and remaining work

- Browser tests blocked external requests, including fonts and analytics, and used system font fallbacks. External services and organization destinations were not tested.
- Firefox, Safari, physical touch devices, assistive technology and the production Linux runtime were not tested. Exact URL casing was checked against filesystem directory entries to emulate Linux case sensitivity.
- Tommaso's authentic portrait is still needed. Lorenzo/Francesca profile pages remain in preparation as before.
- Existing legacy article-template image references and the empty partner alt text in `article/italia/costo_regionali.php` are recorded for later audit; no new broken references were introduced by this task.
- `1.TESTER/` remains empty and unreferenced; Git does not store empty directories.
- Any implementation push or production release requires separate explicit approval. Never upload `.git/` to hosting.

## Preview

From the project root, use the existing local server or start:

```powershell
php -S 127.0.0.1:8000
```

Open [Italian About Us](http://127.0.0.1:8000/aboutus/aboutus.php?lang=it) or [English About Us](http://127.0.0.1:8000/aboutus/aboutus.php?lang=en), and scroll to the collaboration section. Hover, use the pause control, or Tab through organization links. Enable reduced motion in your OS/browser to see the stationary gallery.
