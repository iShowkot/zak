# ishratzakia.com rebuild plan

A hand-coded WordPress theme ("zak") replacing Kirki and the Hostinger AI theme.
Audit date: 27 November 2026.

## Goal

More booked weddings for Ishrat, from a site that stays fast and needs no attention for years.

- **Conversion:** one action counts, a qualified email inquiry.
- **Mood:** sweet, warm and romantic; the paintings are the brightest thing on the page.
- **Durability:** no page builder, no outside scripts, almost no plugins.
- **Editor:** Showkot only. Ishrat only ever reads her email.

## Audit summary

Measured on the live site, logged in (cache bypassed), at 1084px, 768px and 390px.

### Conversion

| Finding | Where |
|---|---|
| Placeholder testimonial "Sophie Blanc, November 2024" repeated six times | Home |
| Only one real testimonial on the whole site | Home |
| Photographer template copy ("through our lens", "cut through the noise") | Home, Packages |
| "Explore more" links to `/works`, a 404 | Home |
| "About Me" button links to Contact | Home |
| Empty "newsletter" label | Footer |
| No form, prices or tap-to-call outside the Contact page | All pages |
| Form has no package or guest-count field | Contact |
| Terms packed into one paragraph | Packages |

### Design

- Black, hot magenta and heavy geometric type read as nightlife or agency, and dull the paintings.
- Long empty black stretches; the homepage is about 9,000px tall for six sections.
- Body text is set in Title Case, which slows reading.
- Finished paintings appear small and late.

### Responsiveness

- No horizontal scroll at 390px or 768px; mobile menu present.
- About half of links and buttons are under 40px tall on phones.
- Form inputs are 14px, so iPhones zoom on focus.
- Decorative text overflows at 768px; hero video is cropped hard on phones.

### Speed

| Measure | Now | Target |
|---|---|---|
| Homepage weight | 2.7 MB, 29 requests | under 600 KB |
| Largest paint | 3.1 s | under 1.8 s on mobile |
| HTML per page | about 1.6 MB (1.5 MB inline SVG) | under 50 KB |
| Scripts | 491 KB (Kirki alone 480 KB) | under 25 KB |
| Styles and fonts | 1.39 MB | under 110 KB |
| Hero image | 990 KB, lazy-loaded | under 200 KB, prioritized |

### Media library

57 items: 28 live guest illustrations, 14 post-wedding paintings, 13 site images, 2 videos.
52 of 55 images are portrait. 55 have no alt text. Only about five show the flagship live wedding painting.

## Decisions

| # | Decision |
|---|---|
| 1 | Conversion is the email inquiry: a three-step form behind a sticky "Check my date" button, with tap-to-text as the secondary path on phones. No calendar or call booking. |
| 2 | Interactivity where it earns its place: gallery, journey, testimonials, inquiry flow. Small hand-written scripts, loaded only where used. |
| 3 | Warm light theme: ivory background, blush and rose palette sampled from the paintings, berry rose accent, serif headings with a clean sans body. |
| 4 | Showkot is the only editor. Two built-in content types: Paintings and Couple stories. |
| 5 | Built for zero maintenance: self-hosted fonts, no external services, spam protection without reCAPTCHA, every inquiry emailed and saved. |
| 6 | Use the existing media library for launch. Features without real material are cut, not faked. |
| 7 | Packages stay exactly as Ishrat defined them. Only the presentation changes. |
| 8 | Same six pages at the same addresses. `/works` redirects to `/gallery/`. |
| 9 | Additions: service area section, thank-you page, privacy page, friendly 404. Newsletter label removed. |
| 10 | Theme lives in this repo; updates arrive through the WordPress admin. Staging first, then a quiet-hour switch with a two-week rollback window. |

## Design direction

- **Colour:** ivory ground, soft blush surfaces, deep warm ink for text, berry rose for buttons and links. All text meets AA contrast.
- **Type:** an elegant serif for headings and a humanist sans for body, both open-licensed and self-hosted as subset WOFF2. Sentence case throughout.
- **Layout:** built around tall images. Generous but purposeful spacing, no dead stretches.
- **Motion:** gentle and sparse. Everything respects the reduced-motion setting.
- **Voice:** first person, warm and plain, in Ishrat's words.

## Site structure

| Page | Address | Purpose |
|---|---|---|
| Home | `/` | The main selling page |
| Packages | `/packages/` | Prices, inclusions, terms, service area |
| Gallery | `/gallery/` | Filterable work with full-screen viewer |
| FAQs | `/faqs/` | Objection handling |
| About | `/about/` | Ishrat's story |
| Contact | `/contact/` | Inquiry form and direct contact |
| Thank you | `/thank-you/` | Next steps; counts conversions |
| Privacy | `/privacy/` | What the form collects |

### Homepage order

1. Hero: one finished painting, headline, "Check my date".
2. The journey: three-step scroll sequence.
3. Selected paintings: the strongest five.
4. Packages preview: two groups with starting prices.
5. Featured couple quote with its painting.
6. About Ishrat, short.
7. Top three FAQs.
8. Inquiry form.

## Interactive pieces

| Piece | Behaviour | Without JavaScript |
|---|---|---|
| Gallery | Filter by type with smooth reshuffle; full-screen viewer with swipe and keyboard | Plain grid, images link to full size |
| Journey | One canvas fills in across three steps as the visitor scrolls | Three stacked steps with images |
| Testimonials | One featured quote; becomes swipeable at three or more | Stacked quotes |
| Inquiry flow | Date and venue, then package, then contact details, with progress | One long form |
| Before/after slider | Cut for launch; slot reserved in the theme | n/a |

## Technical approach

- **Theme:** classic PHP theme, standard WordPress features only. No build step required to run.
- **Content types:** Paintings (with a type: live wedding, post-wedding, guest illustration) and Couple stories (names, venue, month, quote, linked painting).
- **Settings:** one screen for prices, phone, email and social links, so each value is edited once.
- **Inquiry form:** handled inside the theme. Hidden trap field and timing check for spam. Sent through the existing mail plugin, saved in the site as a backup, with a visible fallback if sending fails.
- **Images:** WordPress responsive sizes, lazy loading below the fold, hero prioritized.
- **Search:** local business and FAQ structured data, page descriptions, share images, alt text for all 55 images.
- **Accessibility:** WCAG 2.1 AA, visible focus, 44px tap targets, 16px inputs.
- **Updates:** the theme checks this repo's releases and offers updates in the WordPress admin.
- **Plugins after launch:** cache, Site Kit, mail delivery. Nothing else.

## Build order

| Step | Scope | Review |
|---|---|---|
| 0 | Theme skeleton, colour and type tokens, fonts, header, footer, sticky button | Style preview page |
| 1 | Content types, settings screen, admin updater | Admin screens |
| 2 | Inquiry form, email, storage, thank-you page | Test inquiry |
| 3 | Homepage | Phone and desktop |
| 4 | Gallery with filter and viewer | Phone and desktop |
| 5 | Packages, FAQs, About, Contact, Privacy, 404 | Each page |
| 6 | Search, accessibility and speed pass | Measured against targets |
| 7 | Staging, content entry, launch, rollback window, Kirki removal | Live check |

## Launch checklist

- Every page checked at 390px, 768px and desktop.
- Real test inquiry arrives in Ishrat's inbox and is saved in the site.
- `/works` redirects; no broken links.
- Speed targets met with cache on.
- Old theme and Kirki kept inactive for two weeks, then removed.

## Measuring success

- Inquiries per month, counted by thank-you page views in Site Kit, compared with the months before launch.
- Largest paint and page weight against the targets above.

## Open items

- Confirm whether the hosting plan offers a staging copy; otherwise test with a hidden preview on the live site.
- More flagship live wedding paintings would lift the top of the site; five is workable but thin.
- More real testimonials, and photo-and-painting pairs for the slider, whenever available.
