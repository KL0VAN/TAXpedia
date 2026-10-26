# Public Country Profiles

The country selector is `/dashboard/index.php`. Profiles use
`/dashboard/countries/<slug>/index.php`; append `?lang=it` or `?lang=en`.

| Code | Slug | Code | Slug | Code | Slug |
| --- | --- | --- | --- | --- | --- |
| IT | italia | FR | france | DE | germany |
| ES | spain | BE | belgium | NL | netherlands |
| LU | luxembourg | AT | austria | HR | croatia |
| PL | poland | PT | portugal | SI | slovenia |
| BG | bulgaria | CZ | czech | DK | denmark |
| GR | greece | HU | hungary | IE | ireland |
| RO | romania | SE | sweden | LV | latvia |
| EE | estonia | LT | lithuania | SK | slovakia |
| FI | finland | CY | cyprus | MT | malta |

## Structure and dependencies

- `index.php`: existing simple flag-card country selector.
- `countries/*/index.php`: fixed country code and shared-template include.
- `shared/country-template.php`: all national profile markup.
- `shared/countries-data.php`: existing route mapping and adapter over
  `tools/country_data.php`; no independent statistics dataset.
- `shared/bootstrap.php`: language, URLs, escaping and metric formatting.
- `shared/page-top.php`, `shared/page-bottom.php`: shared public header/footer.
- `shared/dashboard.css`: profile styles; no calculator runtime is loaded.
- `/imm/flags/`: existing public flag assets.
- `article/article_helpers.php`: shared article eligibility and selection.

Calculator links still open `/calculator/<slug>/<slug>.php`. Comparison links
open `/tools/comparison.php?a=<CODE>`. Country data, definitions, reference
periods, source URLs and unavailable-value handling are preserved. No fiscal
formula or figure was changed or independently verified by the migration.

The five existing profiles under `article/` retain their routes, layouts and
tax content; only their article selection and filtered archive links changed.
They are not redirects or dependencies of these new profiles.

## Articles and publishing

`article/article_data.php` remains the single card registry, including its
existing tool promotions. Register valid metadata once; no national page needs
editing when a new article is published.

Required classification fields:

```php
'content_type' => 'article', // article, sector or tool
'countries' => array('FR', 'DE'),
'scope' => 'multi-country', // country, multi-country, eu or general
'topics' => array('economy'), // IDs from tp_article_topics()
'status' => 'published', // published or draft
'languages' => array('it', 'en'),
```

Also retain a unique stable `id`, existing root-relative `link` and `thumb`,
accurate publication `date_iso`, agreeing localized dates, localized titles and
descriptions, authors where applicable, and archive visibility.

Public listings require published status, archive visibility, a valid date and
an existing local destination. Missing thumbnails fall back gracefully. Draft
status excludes a card from archive, homepage, author lists and country lists;
it does not restrict direct access to an uploaded PHP file.

Profiles show at most four newest articles/sector explanations whose explicit
`countries` contain their code. Tools are excluded. EU scope alone never assigns
an article to all countries. Date ties use archive order and then unique ID.

The archive has GET forms and twelve results per page:

- `/article/articoli.php?country=FR&lang=en`
- `/article/articoli.php?country=IT&topic=infrastructure&lang=it`
- `/article/articoli.php?country=EU&type=sector&page=2&lang=en`
- `/article/articoli.php?q=sanita&lang=it`

Filters support country, topic, content type and case/diacritic-insensitive
search. Newest-first is the default and sole sort mode. Links preserve filters
and language; submitting filters starts at page one. Legacy localized country
names are accepted. Invalid filters produce a localized empty/error state.
Filtering and pagination are rendered by PHP and do not require JavaScript.
The small metadata array is loaded once per request; article bodies are never
loaded for filtering. No database, search service or external library is used.

See `article/STANDARD Creazione Articoli/STANDARD_README_INSERIMENTO_ARTICOLI.md`
for the editorial workflow. Homepage retains its automatic latest-five policy;
author lists retain their existing ordering and limits.

## France and editorial follow-up

The existing France-labelled archive entry links to its calculator and is a
tool, not an editorial article. There are currently no registered French
editorial articles, so both French profiles and the filtered editorial archive
show an empty state. The promotion remains in the unfiltered archive.

Rail Baltica (`article/europe/infrastructure/rail-baltica.php`) is an unregistered
editorial candidate; publication/date and any country associations need an
editorial decision. It was not automatically registered. The regional-election
article (`article/italia/costo_regionali.php`) is already registered. Standard
and example files remain excluded.

## Local preview and release review

Run `php -S 127.0.0.1:8000` from the project root, then open
`http://127.0.0.1:8000/dashboard/index.php`.

Expected public routes use the same paths under `https://taxpedia.eu`.
Creating these local files does not deploy them.

Before release:

- Review `DASHBOARD_MIGRATION_REPORT.md` for executed checks and limitations.
- Confirm Aruba's configured PHP version and extensions; local PHP is 8.5.11.
  Search works without mbstring/intl. Do not change hosting configuration as
  part of this migration.
- Complete browser checks in both languages: desktop/tablet/mobile layout,
  drawer and keyboard focus, language switching, filters, pagination,
  back/forward navigation, images, console errors and no-JavaScript behavior.
  Check the existing About Us carousel's looping, pause and reduced motion.
- Verify all 27 routes, flags, calculator/comparator links and case-sensitive
  asset paths on the actual Linux runtime.
- Preserve a production backup and review the exact upload/delete manifest.
- Exclude `.git/`, local backups, verification artifacts and the former tester
  directory from any upload. No `.gitkeep` is needed for an empty tester.
- Obtain separate authorization before pushing or deploying. No release was
  performed by this task.
