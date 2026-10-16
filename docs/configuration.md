# Configuration — Woo Global Product Tabs

1. Go to **Products → Global Tab** in wp-admin.
2. Set the **tab title** (e.g. "Shipping & Returns") and the **tab content** using the WYSIWYG editor.
3. Save. The tab appears on every product page at priority 50 (after Description and Reviews).

Details:

- Stored as the `wgpt_global_tab_title` and `wgpt_global_tab_content` options.
- Content is sanitized with `wp_kses_post`, so standard formatting, links, and images are allowed — and you can embed other shortcodes.
- Only users with the `manage_woocommerce` capability can view/save the settings.
- When the content is empty, the tab is not registered at all (no performance cost).
