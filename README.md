# Zak

Hand-coded WordPress theme for [ishratzakia.com](https://ishratzakia.com), a live wedding painter.
No page builder and no external dependencies. See `PLAN.md` for the audit, decisions and build order.

## Status

Step 0 of 7: foundation (tokens, fonts, header, footer, sticky action bar, style preview).

## Structure

| Path | Purpose |
|---|---|
| `functions.php`, `inc/` | Setup, assets, site options, template helpers |
| `header.php`, `footer.php` | Site chrome and the phone action bar |
| `assets/css/base.css` | Tokens, type, layout and components |
| `assets/js/site.js` | Menu, header state, action bar, reveal on scroll |
| `assets/fonts/` | Fraunces and Figtree, self-hosted (SIL Open Font License) |
| `templates/style-preview.php` | "Style preview" page template |

## Previewing

Create a private page and assign the "Style preview" template, or use Live Preview under Appearance, Themes.
Do not activate on the live site until step 7.
