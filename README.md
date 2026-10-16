# Woo Global Product Tabs

Add a global custom tab (Shipping Info, Return Policy, Warranty…) to **every** WooCommerce product page at once — edit the content in one place, see it everywhere.

## Features

- **One setting, all products** — define a tab title + rich content once; it appears on every product page.
- **WYSIWYG editor** — full WordPress editor with formatting, links, images.
- **Shortcode-friendly** — embed other shortcodes inside the tab content.
- **Performance-aware** — the tab is not registered at all when content is empty.
- **Secure by design** — `wp_kses_post` sanitization (XSS-safe), `manage_woocommerce` capability gate, settings API nonce.

## Requirements

| | Minimum | Tested |
|---|---|---|
| WordPress | 6.0 | 6.9 |
| WooCommerce | 8.0 | 8.7 |
| PHP | 7.4 | 8.4 |

## Install & usage

1. Install and activate the plugin.
2. Go to **Products → Global Tab**.
3. Set a title (e.g. "Shipping & Returns") and content, then save.
4. The tab now appears on every product page (priority 50 — after Description and Reviews).

## Installation

### Upload the zip (recommended)

1. Download `woo-global-product-tabs.zip` from the [latest release](https://github.com/mohdhafizi83/woo-global-product-tabs/releases/latest).
2. In wp-admin, go to **Plugins → Add New → Upload Plugin**.
3. Choose the zip, click **Install Now**, then **Activate**.

### WP-CLI

```bash
wp plugin install --activate https://github.com/mohdhafizi83/woo-global-product-tabs/releases/latest/download/woo-global-product-tabs.zip
```

### Manual

Copy the plugin folder into `wp-content/plugins/` and activate it under **Plugins → Installed Plugins**.

## Configuration

1. Go to **Products → Global Tab** in wp-admin.
2. Set the **tab title** (e.g. "Shipping & Returns") and the **tab content** using the WYSIWYG editor.
3. Save. The tab appears on every product page at priority 50 (after Description and Reviews).

Details:

- Stored as the `wgpt_global_tab_title` and `wgpt_global_tab_content` options.
- Content is sanitized with `wp_kses_post`, so standard formatting, links, and images are allowed — and you can embed other shortcodes.
- Only users with the `manage_woocommerce` capability can view/save the settings.
- When the content is empty, the tab is not registered at all (no performance cost).

## FAQ

**Can I add more than one global tab?**
This plugin manages a single global tab by design. For multiple per-product tabs, use WooCommerce's built-in custom tabs.

**Can I use shortcodes inside the tab content?**
Yes — the content is sanitized with `wp_kses_post` and shortcodes in the tab content are rendered.

**Why don't I see the tab on my products?**
Check that the tab content is not empty (empty content = no tab) and that WooCommerce is active.

**Who can edit the global tab?**
Users with the `manage_woocommerce` capability (administrators and shop managers).

## Screenshots

Screenshot (add your own)

_No screenshot assets are committed to this repository yet. Drop an image at `assets/screenshots/screenshot-1.png` and replace this placeholder — do not hotlink invented screenshots._

## License

GPL v2 or later.
