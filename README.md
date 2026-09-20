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

## License

GPL v2 or later.
