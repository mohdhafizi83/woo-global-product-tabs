=== Woo Global Product Tabs ===
Contributors: mohdhafizi83
Tags: woocommerce, product tabs, global tabs, custom tabs, shipping tab
Requires at least: 6.0
Tested up to: 6.9.4
Requires PHP: 7.4
WC requires at least: 8.0
WC tested up to: 8.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easily add a global custom tab (like Shipping Information or Return Policies) to all your WooCommerce products from one central settings page.

== Description ==

Managing identical information across hundreds of WooCommerce products is a nightmare. If you need to update your Return Policy or Shipping Information, editing every single product manually is not an option.

**Woo Global Product Tabs** solves this by letting you create one universal tab that instantly appears on every product page in your store.

**Features:**
* **Centralized Management:** Add your global content once under `Products > Global Tab`. It instantly reflects across your entire catalog.
* **Rich Text Editor:** Uses the native WordPress visual editor (WYSIWYG), allowing you to easily add bold text, lists, links, or images.
* **Shortcode Support:** Want to embed a contact form or a gallery inside the global tab? You can! The plugin fully renders shortcodes.
* **Zero Database Bloat:** Unlike other plugins that save redundant metadata to every single product post, this plugin saves the data only *once* in your options table, resulting in zero performance degradation.

== Installation ==

1. Ensure WooCommerce is installed and active.
2. Upload the `woo-global-product-tabs` folder to your `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Go to `Products > Global Tab` in your WordPress dashboard.
5. Enter your desired Tab Title (e.g., "Shipping & Returns") and your content.
6. Click "Save Changes" and check any of your product pages to see the new tab!

== Frequently Asked Questions ==

= Does this slow down my product pages? =
Not at all. The global tab content is fetched from the WordPress Options table, which is autoloaded into memory by default. This means it requires 0 additional database queries to display on the frontend.

= Can I hide the tab on specific products? =
For Version 1.0, this is a strictly global tab designed for maximum performance and simplicity. If the content field is empty, the tab automatically hides itself site-wide.

== Security ==

This plugin follows WordPress security best practices:

* The settings page requires the `manage_woocommerce` capability (shop managers and admins only).
* Settings form submissions are protected by the WordPress settings nonce (`settings_fields()`).
* Tab content is sanitized with `wp_kses_post()` on save and re-sanitized on output; the tab title uses `sanitize_text_field()` and is escaped with `esc_html()`/`esc_attr()`.
* Direct file access is blocked with an `ABSPATH` guard.
* No secrets or API keys are stored in the plugin code.

== Changelog ==

= 1.0.0 =
* Initial release on the WordPress repository.
* Added native WP Editor integration for tab content.
* Implemented `wp_kses_post` for strict HTML security.
* Added WooCommerce dependency safety checks.