# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-10-16

### Added
- Global custom product tab (title + WYSIWYG content) applied to every WooCommerce product page.
- Settings page under **Products → Global Tab** with settings-API nonce and `manage_woocommerce` capability gate.
- `wp_kses_post` sanitization for tab content; shortcode support inside the tab.
- Tab skipped entirely when content is empty (no performance cost).
