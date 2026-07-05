# Estatein – Premium Real Estate WordPress Theme

A production-ready custom WordPress theme for a real estate company, built to demonstrate senior-level WordPress engineering, clean architecture, and agency-quality code standards.

![Theme Version](https://img.shields.io/badge/version-1.0.0-blue)
![WordPress](https://img.shields.io/badge/WordPress-6.x-blue)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple)
![License](https://img.shields.io/badge/license-GPL--2.0-green)

---

## Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Theme Setup](#theme-setup)
5. [Folder Structure](#folder-structure)
6. [Architecture](#architecture)
7. [Custom Post Types](#custom-post-types)
8. [Page Templates](#page-templates)
9. [ACF Field Groups](#acf-field-groups)
10. [Design System](#design-system)
11. [Development Notes](#development-notes)
12. [Build Process](#build-process)
13. [Local Development](#local-development)
14. [Deployment](#deployment)
15. [Performance](#performance)
16. [Accessibility](#accessibility)
17. [Browser Support](#browser-support)

---

## Features

- **Dark-themed modern design** with purple accent colors
- **5 Custom Post Types**: Properties, Services, Testimonials, FAQs, Team Members
- **3 Custom Taxonomies**: Property Type, Property Location, Property Category
- **5 Page Templates**: About, Services, Contact, Properties Archive, Single Property
- **Reusable template parts** for DRY, maintainable code
- **ACF Pro integration** with graceful fallbacks
- **Mobile-first responsive** design with 4 breakpoints
- **CSS Custom Properties** design token system
- **Accessibility-first** with ARIA labels, skip links, keyboard navigation
- **SEO-optimized** with Schema.org structured data
- **Translation-ready** with proper i18n functions
- **WordPress Coding Standards** compliant
- **No page builder dependency** – pure WordPress engineering

---

## Requirements

| Requirement | Version |
|-------------|---------|
| WordPress   | 6.0+    |
| PHP         | 8.0+    |
| MySQL       | 5.7+    |

---

## Installation

1. Download or clone this repository
2. Upload the `estatein` folder to `/wp-content/themes/`
3. Activate the theme in **Appearance → Themes**
4. Install recommended plugins (see below)
5. Import ACF field groups if using ACF Pro
6. Create required pages and assign templates

```bash
# Clone to themes directory
cd /path/to/wordpress/wp-content/themes/
git clone <repository-url> estatein

# Or upload via WordPress admin
# Appearance → Themes → Add New → Upload Theme
```


---

## Theme Setup

After activation:

1. **Create Pages** and assign templates:
   - About Us → Template: "About Us"
   - Services → Template: "Services"
   - Contact Us → Template: "Contact Us"

2. **Set Front Page**:
   - Settings → Reading → "A static page"
   - Homepage: Select your front page

3. **Configure Menus**:
   - Appearance → Menus
   - Create "Primary Navigation" menu
   - Create footer menus (Home, About Us, Properties, Services, Contact Us)

4. **Add Content**:
   - Add Properties via the Properties CPT
   - Add Team Members, Testimonials, FAQs
   - Configure Customizer settings

---

## Folder Structure

```
estatein/
├── style.css                          # Theme metadata (WordPress requirement)
├── functions.php                      # Lean bootstrapper
├── front-page.php                     # Homepage template
├── page.php                           # Default page template
├── single.php                         # Default single post template
├── single-property.php                # Single property template
├── archive-property.php               # Properties archive template
├── search.php                         # Search results template
├── 404.php                            # 404 error template
├── index.php                          # Fallback template (WordPress requirement)
├── header.php                         # Global header
├── footer.php                         # Global footer
├── screenshot.png                     # Theme screenshot (1200×900)
│
├── inc/                               # PHP includes (modular architecture)
│   ├── theme-setup.php                # Theme supports, menus, image sizes
│   ├── enqueue.php                    # Script/style registration
│   ├── post-types.php                 # CPT & taxonomy registration
│   ├── template-tags.php             # Helper functions & SVG icons
│   ├── customizer.php                 # Theme Customizer settings
│   └── acf-fields.php                 # ACF Pro field group registration
│
├── page-templates/                    # Custom page templates
│   ├── about.php                      # About Us page
│   ├── services.php                   # Services page
│   └── contact.php                    # Contact Us page
│
├── template-parts/                    # Reusable template parts
│   ├── components/
│   │   ├── section-header.php         # Section header with title/desc/CTA
│   │   ├── property-card.php          # Property listing card
│   │   ├── testimonial-card.php       # Testimonial review card
│   │   ├── faq-card.php               # FAQ question card
│   │   ├── team-card.php              # Team member card
│   │   ├── cta-banner.php             # Call-to-action banner
│   │   └── breadcrumb.php             # Breadcrumb navigation
│   └── header/
│       ├── announcement-bar.php       # Top announcement bar
│       └── navigation.php             # Primary navigation
│
├── assets/
│   ├── css/
│   │   ├── main.css                   # Main stylesheet (imports all modules)
│   │   ├── base/
│   │   │   ├── reset.css              # CSS reset/normalize
│   │   │   ├── tokens.css             # Design tokens (custom properties)
│   │   │   └── typography.css         # Typography system
│   │   ├── components/
│   │   │   ├── buttons.css            # Button variants
│   │   │   ├── cards.css              # Card components
│   │   │   ├── forms.css              # Form elements
│   │   │   └── navigation.css         # Navigation styles
│   │   └── pages/
│   │       ├── front-page.css         # Homepage-specific styles
│   │       ├── about.css              # About page styles
│   │       ├── properties.css         # Properties page styles
│   │       ├── services.css           # Services page styles
│   │       └── contact.css            # Contact page styles
│   ├── js/
│   │   ├── navigation.js             # Mobile nav & announcement bar
│   │   └── main.js                    # Lazy loading & smooth scroll
│   └── images/
│       └── icons/                     # SVG icon assets (if needed)
│
└── README.md                          # This file
```

---

## Architecture

### Design Principles

1. **Separation of Concerns**: Each PHP file handles one responsibility
2. **DRY (Don't Repeat Yourself)**: Reusable template parts for all repeated UI
3. **Progressive Enhancement**: Works without JavaScript, enhanced with it
4. **Graceful Degradation**: ACF fallbacks ensure theme works without plugins
5. **Mobile-First**: All CSS starts from mobile and scales up

### Template Hierarchy

```
front-page.php          → Homepage
archive-property.php    → Properties listing
single-property.php     → Individual property
page-templates/about.php    → About Us (assigned via template)
page-templates/services.php → Services (assigned via template)
page-templates/contact.php  → Contact Us (assigned via template)
page.php                → Default pages
single.php              → Default posts
search.php              → Search results
404.php                 → Not found
```

### CSS Architecture

- **Tokens Layer**: CSS Custom Properties for all design values
- **Base Layer**: Reset, typography, global styles
- **Components Layer**: Reusable UI patterns (buttons, cards, forms)
- **Pages Layer**: Page-specific layouts and overrides
- **BEM Naming**: `.block__element--modifier` convention

---

## Custom Post Types

### Properties (`property`)
- **Archive**: `/properties/`
- **Single**: `/properties/{slug}/`
- **Supports**: Title, Editor, Thumbnail, Excerpt, Custom Fields
- **Taxonomies**: Property Type, Property Location

### Services (`service`)
- **Slug**: `/services/`
- **Supports**: Title, Editor, Thumbnail, Excerpt, Custom Fields

### Testimonials (`testimonial`)
- **Slug**: `/testimonials/`
- **Supports**: Title, Editor, Thumbnail, Custom Fields

### FAQs (`faq`)
- **Slug**: `/faqs/`
- **Supports**: Title, Editor, Custom Fields

### Team Members (`team_member`)
- **Slug**: `/team/`
- **Supports**: Title, Editor, Thumbnail, Custom Fields

---

## Page Templates

| Template | File | Usage |
|----------|------|-------|
| About Us | `page-templates/about.php` | Company story, values, team |
| Services | `page-templates/services.php` | Service offerings |
| Contact Us | `page-templates/contact.php` | Contact form & office locations |

---

## ACF Field Groups

When ACF Pro is active, the following field groups are registered:

| Field Group | Location | Fields |
|-------------|----------|--------|
| Property Details | Property CPT | Price, Bedrooms, Bathrooms, Area, Year Built, Gallery, Features, Pricing Details |
| Team Member Details | Team Member CPT | Role, Twitter URL |
| Testimonial Details | Testimonial CPT | Rating, Client Location |
| About Page Settings | About template | Hero Title, Description, Stats, Values |
| Services Page Settings | Services template | Hero Title, Description |
| Contact Page Settings | Contact template | Office Locations (repeater) |
| Global Settings | Options Page | Footer Newsletter, CTA Banner |

### ACF Import

If provided with an ACF JSON export:
1. Navigate to **Custom Fields → Tools**
2. Import the JSON file
3. Field groups will be automatically linked to their locations

---

## Design System

### Color Palette

| Token | Value | Usage |
|-------|-------|-------|
| `--est-color-bg-primary` | `#1A1A2E` | Main background |
| `--est-color-bg-secondary` | `#141414` | Darker sections |
| `--est-color-bg-card` | `#262626` | Card surfaces |
| `--est-color-brand-primary` | `#703BF7` | Primary purple |
| `--est-color-brand-hover` | `#8B5CF6` | Hover state |
| `--est-color-text-primary` | `#FFFFFF` | Headings |
| `--est-color-text-secondary` | `#999999` | Body text |

### Typography

- **Font Family**: Urbanist (Google Fonts)
- **Scale**: Modular scale ~1.25 (12px to 56px)
- **Weights**: Regular (400), Medium (500), Semibold (600), Bold (700), Extrabold (800)

### Spacing

- **Base unit**: 8px
- **Scale**: 4px, 8px, 12px, 16px, 20px, 24px, 32px, 40px, 48px, 64px, 80px, 96px

### Breakpoints

| Name | Value | Target |
|------|-------|--------|
| Mobile | Default | 0–767px |
| Tablet | `768px` | 768–1023px |
| Laptop | `1024px` | 1024–1439px |
| Desktop | `1440px` | 1440px+ |

---

## Development Notes

### Coding Standards

- PHP follows [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
- CSS follows BEM methodology with utility classes
- JavaScript uses ES6+ with no framework dependencies
- All strings are translation-ready with `__()`, `_e()`, `_x()`, `esc_html__()`

### Security

- All output is escaped with appropriate functions (`esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`)
- Form submissions use WordPress nonces (`wp_nonce_field()`)
- Database queries use prepared statements
- User input is sanitized before storage

### Helper Functions

| Function | Purpose |
|----------|---------|
| `estatein_icon()` | Renders inline SVG icons |
| `estatein_section_header()` | Renders section header component |
| `estatein_get_property_meta()` | Returns property meta data |
| `estatein_format_price()` | Formats price for display |
| `estatein_get_field()` | ACF field with fallback |
| `estatein_is_acf_active()` | Checks ACF Pro availability |

---

## Build Process

This theme intentionally avoids a complex build pipeline to demonstrate clean, readable source code. In a production environment, the following would be added:

```bash
# Recommended production build tools:
# - PostCSS for CSS concatenation and minification
# - Terser for JavaScript minification
# - ImageOptim for image optimization

# Example with PostCSS:
npx postcss assets/css/main.css -o assets/css/main.min.css --no-map
npx terser assets/js/main.js -o assets/js/main.min.js
npx terser assets/js/navigation.js -o assets/js/navigation.min.js
```

For the assessment, CSS `@import` statements are used for clarity. The trade-off (additional HTTP requests) is documented and would be resolved with a bundler in production.

---

## Local Development

### Recommended Setup

1. **Local by Flywheel** or **wp-env** for WordPress environment
2. **PHP 8.0+** with Xdebug for debugging
3. **Node.js 18+** if adding build tools

```bash
# Using wp-env (requires Docker)
npx @wordpress/env start

# Or with Local by Flywheel
# 1. Create new site
# 2. Symlink theme: ln -s /path/to/estatein /path/to/local-site/wp-content/themes/estatein
```

### Development Workflow

1. Make changes to PHP/CSS/JS files
2. Refresh browser (no build step required)
3. Test across breakpoints using browser DevTools
4. Validate with WordPress Coding Standards:

```bash
# Install PHPCS with WordPress standards
composer require --dev squizlabs/php_codesniffer wp-coding-standards/wpcs
./vendor/bin/phpcs --standard=WordPress estatein/
```

---

## Deployment

### Manual Deployment

1. Zip the theme folder (excluding development files)
2. Upload via **Appearance → Themes → Add New → Upload Theme**

```bash
# Create deployment package
cd wp-content/themes/
zip -r estatein.zip estatein/ \
  -x "estatein/.git/*" \
  -x "estatein/node_modules/*" \
  -x "estatein/.DS_Store"
```

### Git Deployment

```bash
# Push to production
git push production main

# Or use deployment tools like:
# - WP Pusher
# - DeployBot
# - GitHub Actions
```

---

## Performance

### Optimizations Implemented

- **Lazy loading** for below-fold images (`loading="lazy"`)
- **Priority hints** for hero images (`fetchpriority="high"`)
- **Responsive images** via WordPress srcset
- **Minimal JavaScript** – no framework overhead
- **CSS Custom Properties** – single source of truth, no redundancy
- **SVG icons** – inline, no additional HTTP requests
- **Font display swap** – prevents FOIT (Flash of Invisible Text)

### Recommended Server Optimizations

- Enable GZIP/Brotli compression
- Set appropriate cache headers
- Use a CDN for static assets
- Enable HTTP/2 or HTTP/3

---

## Accessibility

### WCAG 2.1 AA Compliance

- **Skip link** for keyboard navigation
- **ARIA labels** on all interactive elements
- **Semantic HTML5** elements (`<nav>`, `<main>`, `<article>`, `<section>`)
- **Focus indicators** on all interactive elements
- **Color contrast** meets AA requirements
- **Screen reader text** for icon-only buttons
- **Keyboard navigable** menus and forms
- **Reduced motion** respected via `prefers-reduced-motion`

---

## Browser Support

| Browser | Version |
|---------|---------|
| Chrome | Last 2 versions |
| Firefox | Last 2 versions |
| Safari | Last 2 versions |
| Edge | Last 2 versions |

---

## License

This theme is licensed under the [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.html) or later.

---

## Credits

- **Design**: Estatein Figma Design System
- **Typography**: [Urbanist](https://fonts.google.com/specimen/Urbanist) by Coconnor
- **Icons**: Custom SVG icon set (inline)
- **Images**: [Unsplash](https://unsplash.com) (demo only)

---

*Built with ❤️ as a Senior WordPress Developer Technical Assessment*
