# EU country dashboard prototype

Preview: `http://127.0.0.1:8000/1.TESTER/DASHBOARD/index.php`.
Run `php -S 127.0.0.1:8000` from the project root if needed.

## Structure

- `index.php`: simple flag/name menu for all 27 EU countries, in the existing calculator menu order.
- `countries/<existing-calculator-slug>/index.php`: a country code and one shared-template include.
- `shared/countries-data.php`: explicit code/slug/calculator mapping, reading names, flags, indicators and metadata from `tools/country_data.php`.
- `shared/bootstrap.php`: existing IT/EN language mechanism, escaping, formatting and related-article filtering.
- `shared/country-template.php`: country heading, flag and six facts, calculator/comparison links, yellow tax-information section and related content.
- `shared/page-top.php`, `shared/page-bottom.php`: reuse the site's header/footer without modifying public navigation. Pages are marked `noindex, nofollow`.
- `shared/dashboard.css`: prototype-only layout, inspired by `calculator/menu.php` and `article/italia/italy.php`.

Existing files, including `menu.php`, copied calculator folders, scripts, styles and maps, are preserved byte-for-byte. They are legacy experiments, not dependencies of the new prototype. Their existing routes are not redirected or repaired by this task. The new menu always opens `countries/` profiles; calculator buttons point to the existing `/calculator/` pages.

## Content and boundaries

Country facts are reused from the current comparator dataset, with units, reference periods, provisional debt status, definitions and source links. Null figures are displayed as unavailable (for example the Netherlands' comparable salary); they never become zero. No new fiscal or economic verification is claimed. Tax content uses each country's existing employment-income classification and its scope/source metadata; no Italian bracket table is copied to other countries.

Related cards come from `article/article_data.php`, filtered by explicit country codes or exact localized country names. Only existing `/article/` files marked for the archive are eligible. Up to four cards retain archive editorial ordering; dates and translations remain unchanged. Generic EU articles and calculator cards are excluded. Missing country articles show a neutral coming-soon state.

No dashboard JavaScript or calculator runtime is needed. The existing header/footer retain their own scripts. Italian and English are available using the standard language switch or `?lang=it` / `?lang=en`.

The prototype is separate by route and has no links added to public navigation. `noindex` is not access control: uploading this folder to hosting would make its URLs accessible. No upload or deployment is part of this task. It remains dependent on the surrounding project assets/data, not a standalone export.

## Validation

Lint the new PHP files; verify all 27 country routes, flags and calculator destinations in both languages. Check desktop/tablet/mobile, keyboard focus, data periods, null-value fallbacks and article country filtering. Paths use forward slashes and existing exact-case filenames. Temporary local QA artifacts belong in the ignored `.qa/` directory and should not be uploaded.
