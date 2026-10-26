# Country Profiles migration — local implementation report

Date: 26 October 2026. Starting branch: `main`.
Starting HEAD: `6ef5e479087826b427944b9ef21d0fc4c87c26eb`.

Follow-up, 26 October 2026: the two Git objects described below were subsequently
repaired using identical, hash-verified objects from an independent GitHub mirror.
Ordinary `git fsck --full --strict` and `git diff --check` now pass. The migration
results and limitations below remain a historical record of that implementation.

## Implemented

The shared dashboard prototype is now public-route code under `dashboard/`.
Its 27 fixed national entry points, one layout, six existing indicators,
sources, periods, calculator links and comparator links were preserved.
The index retains its simple flag-card design. No calculator script is loaded
by a dashboard. Public pages no longer carry the prototype's noindex directive.

`partials/header.php` has a translated Country Profiles entry pointing to
`/dashboard/index.php`. Its existing shared navigation and drawer mechanism
remain in place; Calculator and the separately inserted Comparison entry are
preserved. The footer was not modified.

`article/article_helpers.php` centralizes registry loading, publication/file
eligibility, language availability, country matching, topics, search,
publication sorting, pagination and archive URLs. `article/articoli.php` now
uses server-rendered GET forms, twelve cards per page and bounded pagination
links. Submitting a filter starts at page one. Links preserve filters/language;
invalid values produce a localized empty/error state. Search handles case and
common Latin diacritics without requiring mbstring or intl. The old DOM-only
filter implementation was removed to avoid filtering only a paginated subset.

National profiles include at most four newest editorial/sector entries with an
explicit matching country code, thumbnails when available and a filtered
archive link. EU scope alone does not imply all 27 country associations.
Tools remain in the unfiltered archive and are excluded from country results.

The five older public profiles under `article/` retain their content, indicators,
tax tables and layouts. Their duplicated article-selection functions now use
the shared helper, and their archive links use stable country codes. Homepage
and four author-list consumers use shared publication/file eligibility while
retaining their display policies. A one-line guard in the shared language
normalizer safely rejects non-string language inputs.

## Metadata audit and repairs

- All 35 existing registry cards and their existing text, authors, links,
  images, localized dates and visibility fields were retained.
- 34 placeholder/inconsistent ISO dates were synchronized to the agreeing
  displayed Italian and English dates. This uses existing editorial metadata;
  no publication dates were inferred from filesystem timestamps.
- The sector page `/article/italia/istruzione_ricerca.php` now has ID
  `article_italia_istruzione_ricerca_sectorphp`. The research feature retains
  `article_italia_istruzione_ricercaphp`. Both URLs remain unchanged and all IDs
  are now unique.
- Explicit content type, country codes, scope, topics, status and languages
  were added. Existing `area`, display labels and historical homepage fields
  remain compatible. Current editorial counts are Italy 21 and EU scope 11;
  there are also three tool cards.
- The France-labelled card is a calculator promotion, not an editorial article.
  France correctly has zero eligible editorial cards in both profile systems
  and in its filtered archive. No Italian article was assigned to France.
- Rail Baltica is an unregistered candidate requiring an editorial publication
  decision and verified publication date/associations. It was not registered.
  Contrary to one statement in the preliminary audit, the regional-election
  article is already registered and remains so. Example/template files were
  not registered.

## Files and migration

Created:

- `dashboard/index.php`.
- `dashboard/countries/*/index.php`: 27 existing country slugs.
- `dashboard/shared/`: bootstrap, country adapter, country template, page top,
  page bottom and stylesheet.
- `dashboard/README.md` with route table and publishing/release guidance.
- `article/article_helpers.php`.
- This report.

Modified:

- `article/article_data.php`, `article/articoli.php`, `article/stylearticoli.css`.
- `article/italia/italy.php`, `article/france/france.php`,
  `article/germany/germany.php`, `article/belgium/belgium.php`,
  `article/netherlands/netherlands.php` (article selection/links only).
- `partials/header.php`, `partials/new-article.php`.
- `i18n/it.php`, `i18n/en.php`, `i18n/i18n.php`.
- The article-list loading blocks in author profiles for Francesco Calabrese
  Vallino, Tommaso Prever, Ottilia Ogliari and Francesca Ricciuti.
- `README.md` and the existing article publishing instructions.

The former `1.TESTER/DASHBOARD/` tree was relocated outside the website root
only after HTTP, metadata, preservation and path checks passed. Its 95 legacy
calculator files were byte-identical to the production calculator copies.
Ignored `.qa/` artifacts and the remaining tester files were preserved too.
The working tree now records removal of the old tracked tester files; their
history is untouched. `1.TESTER/` is empty locally, without a `.gitkeep`.
No active PHP, JavaScript or CSS references the former tester path.

All 27 routes follow `/dashboard/countries/<slug>/index.php`; the full code/slug
table is in `dashboard/README.md`. Examples:

- Local: `http://127.0.0.1:8000/dashboard/index.php`.
- Local: `http://127.0.0.1:8000/dashboard/countries/france/index.php?lang=en`.
- Expected public: `https://taxpedia.eu/dashboard/index.php`.
- Expected public: `https://taxpedia.eu/dashboard/countries/france/index.php`.
- Filtered archive: `/article/articoli.php?country=IT&topic=infrastructure`.

## Preservation and verification

A complete non-Git file snapshot, starting Git status/diffs, hashes, preserved
tester tree and verification artifacts are outside the public project root in
the local backup directory named `taxpedia-migration-dfudpzwi`.

Preserved pre-existing work:

- The registry's gambling-article changes, including its title, dates, author
  association, visibility and hyphenated URL.
- Deleted `article/italia/gioco_azzardo.php` remains deleted.
- Untracked `article/italia/gioco-azzardo.php` remains byte-identical to the
  starting file and remains untracked.
- Untracked Francesca Ricciuti profile remains untracked; only its article
  loading block changed as required by the approved plan.

Executed successfully:

- PHP lint on all 50 changed/new PHP files in the implementation scope.
- 243 helper/metadata assertions, including multi-country FR/DE fixtures,
  draft and missing-file exclusion, invalid parameter types/values, impossible
  dates, unavailable languages, thumbnail fallback, accent search, stable date
  ordering, pagination and URL preservation. Fixtures stayed outside the site.
- 473 HTTP checks in total: 399 before cleanup and 74 after cleanup. Coverage
  included all 27 dashboards and calculators in both languages, archive pages
  and filters, all registered destinations, five older public profiles, four
  author profiles, homepage and referenced assets.
- Exact-case checks on all registry/dashboard destinations and assets, plus
  101 unique local paths extracted from rendered dashboard links/assets.
- 145 protected existing files, including calculators, fiscal datasets and
  relevant assets, matched their starting hashes. Existing profile tax content
  and layout were compared with the backup and preserved.
- UTF-8 without BOM for changed text files; empty tester and absent runtime
  tester dependencies verified after relocation.
- `git diff --check` passed before cleanup and passed for the final diff using
  the external exact-object verification overlay described below.

Browser interaction/visual tests were not executed: Computer Use stopped
before opening the preview because URL-policy enforcement is unsupported for
the current Windows browser. Desktop/mobile appearance, keyboard interaction,
language switching in-browser, back/forward behavior, console errors, live
no-JavaScript interaction and the existing carousel's interaction/reduced-motion
behavior therefore remain unverified. HTTP checks establish server-rendered
filter results without executing JavaScript; they are not browser tests.
Aruba/Linux runtime testing was not performed.

## Existing Git object corruption

After cleanup, Git needed to read objects that unchanged working files had
previously allowed it to avoid. Two existing loose-object streams are truncated:

- `190d3852fcd501579daee57daa82acc6e694372f` (tree).
- `7c2bb2e84c143130128a4af71f12be7e75ba55f2` (Finland calculator blob).

Their decoded payloads are complete and match their object IDs exactly. They
were recompressed into an external temporary object directory for diff
verification only. With that directory taking precedence and the repository's
objects as an alternate, `git diff --check` passes. The repository's `.git/`,
branches and history were not modified. Ordinary Git operations that read
those damaged streams still require a separate repository repair; do not
assume the repository is healthy or attempt a release before addressing this.

## Rollback and release review

No commit, push or deployment was performed. Starting HEAD/branch are unchanged.
To roll back, use the saved starting snapshot and manifest to restore only
task-modified files and the preserved tester tree, remove only task-created
paths, and retain the initial article rename/deletion/untracked state. Avoid
blanket `git reset`, `git clean` or restore commands, particularly while Git's
existing objects need repair. Preserve any user edits made after the snapshot.

Before a production release:

1. Repair and verify the existing Git object store separately.
2. Complete the browser checks listed above in both languages, including the
   existing shared navigation and carousel.
3. Confirm Aruba PHP/extensions and test exact-case routes/assets on Linux.
4. Review existing differences between older profile tax tables and calculator
   versions through a separate fiscal/content task; this migration changes none.
5. Note that older author archive `authors=` links remain an existing unsupported
   filter; adding that optional feature was outside this implementation.
6. Review backup and upload/delete manifests. Exclude `.git/`, local backups,
   tester experiments and all verification artifacts.
7. Obtain explicit authorization for any GitHub push or Aruba deployment.

No framework, dependency, fiscal formula, comparator dataset, hosting
configuration, article body or partner branding was changed.
