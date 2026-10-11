# TAXpedia project guidance

Applies to the entire repository.

## Development and scope

- This is a PHP/HTML/CSS/JavaScript website, developed on Windows and hosted on Linux.
- Run locally from the project root: `php -S 127.0.0.1:8000` (currently PHP 8.5.11).
- Keep changes scoped to the requested task. Use `PLAN.md` for future work, not as authorization.
- Preserve existing page content, organization links, navigation and Italian/English translations.
- Prefer native CSS and JavaScript. Do not add frameworks or external libraries without a concrete need.
- Follow surrounding formatting; save text as UTF-8 without a BOM.
- Escape dynamic HTML with `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')`.
- Keep page translations local where already used; retain the shared `i18n/i18n.php` language mechanism.

## Paths and assets

- Use `/` in web URLs and exact filename/extension casing. Never embed Windows filesystem paths in website code.
- Preserve valid existing relative and root-relative URL conventions.
- Use `__DIR__` for filesystem dependencies where practical; do not assume the CLI working directory.
- Store About Us organization logos in `aboutus/imm/logo/` and portraits in `aboutus/imm/people/`.
- Keep official branding authentic; do not generate, crop, stretch or replace partner logos.
- Search the entire repository before moving/removing assets, including PHP data, metadata, CSS and articles.
- Delete duplicates only after byte comparisons and reference verification. Keep article assets when their URLs remain in use.
- `1.TESTER/` is currently empty and unreferenced. Future dashboard experiments belong there and must not enter production navigation without explicit authorization.

## Git and production safety

- Never modify hosting configuration, deploy, or change production without explicit approval.
- Never upload `.git/` metadata or local verification artifacts to web hosting.
- Never commit credentials, private keys, local logs or temporary testing artifacts.
- The GitHub repository is public; inspect changes for sensitive data before publishing.
- Preserve history and branches. Never force push or rewrite history without separate explicit approval.
- The original remote main is preserved on `backup/pre-sync-2026-10-11`; the synchronized baseline is `5f08c9d`.
- Implementation commits remain local until separately approved for pushing.

## Verification

- Run `php -l` on every changed PHP file and `git diff --check` before delivery.
- Check every affected local image URL and its exact path casing against the filesystem.
- Exercise affected pages in both Italian and English, including linked team profiles and related articles.
- Verify carousel looping, desktop/mobile layout, keyboard access, pause behavior, reduced motion and the no-JavaScript fallback.
- Confirm navigation still works. Report browser testing only when actually performed, with any unverified behavior stated.
- Do not alter tax data or implement comparator/dashboard fixes as part of the About Us task.
