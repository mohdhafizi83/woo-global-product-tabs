<?php
/**
 * Plugin Name:       Woo Global Product Tabs
 * Plugin URI:        https://github.com/mohdhafizi83/woo-global-product-tabs
 * Description:       Add a global custom tab (like Shipping or Return Policy) to all your WooCommerce products instantly.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Tested up to:      6.9.4
 * Requires PHP:      7.4
 * WC requires at least: 8.0
 * WC tested up to:   8.7
 * Author:            Mohd Hafizi
 * Author URI:        https://github.com/mohdhafizi83
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woo-global-product-tabs
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Security: block direct access
}

/**
 * 1. WooCommerce dependency check.
 */
function wgpt_init() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    // Register admin settings and frontend display hooks.
    add_action( 'admin_init', 'wgpt_register_settings' );
    add_action( 'admin_menu', 'wgpt_add_settings_page' );
    add_filter( 'woocommerce_product_tabs', 'wgpt_add_global_tab' );
}
add_action( 'plugins_loaded', 'wgpt_init' );

/**
 * 2. Register settings with safe sanitization (wp_kses_post).
 */
function wgpt_register_settings() {
    register_setting(
        'wgpt_settings_group',
        'wgpt_global_tab_content',
        'wp_kses_post' // Critical: strips dangerous scripts (XSS) while allowing basic HTML
    );
    register_setting(
        'wgpt_settings_group',
        'wgpt_global_tab_title',
        'sanitize_text_field' // Tab title only needs plain text
    );
}

/**
 * 3. Build the settings page under the "Products" menu.
 */
function wgpt_add_settings_page() {
    add_submenu_page(
        'edit.php?post_type=product', // Place under the Products menu
        esc_html__( 'Global Tab Settings', 'woo-global-product-tabs' ),
        esc_html__( 'Global Tab', 'woo-global-product-tabs' ),
        'manage_woocommerce', // Security: only admins/shop managers can access
        'wgpt-global-tab',
        'wgpt_render_settings_page'
    );
}

function wgpt_render_settings_page() {
    if ( ! current_user_can( 'manage_woocommerce' ) ) {
        return;
    }

    $tab_title   = get_option( 'wgpt_global_tab_title', 'Shipping Info' );
    $tab_content = get_option( 'wgpt_global_tab_content', '' );
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'WooCommerce Global Product Tab', 'woo-global-product-tabs' ); ?></h1>
        <form method="post" action="options.php">
            <?php
            // Outputs the settings nonce field automatically for the form.
            settings_fields( 'wgpt_settings_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e( 'Tab Title', 'woo-global-product-tabs' ); ?></th>
                    <td>
                        <input type="text" name="wgpt_global_tab_title" value="<?php echo esc_attr( $tab_title ); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e( 'Tab Content', 'woo-global-product-tabs' ); ?></th>
                    <td>
                        <?php
                        // Use the real WordPress WYSIWYG editor.
                        wp_editor( $tab_content, 'wgpt_global_tab_content', array( 'textarea_rows' => 15 ) );
                        ?>
                        <p class="description"><?php esc_html_e( 'This content will appear on EVERY product page.', 'woo-global-product-tabs' ); ?></p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * 4. Inject the tab into the product page (frontend).
 */
function wgpt_add_global_tab( $tabs ) {
    $tab_title   = get_option( 'wgpt_global_tab_title' );
    $tab_content = get_option( 'wgpt_global_tab_content' );

    // Performance: don't add the tab if the admin left the content empty.
    if ( ! empty( $tab_content ) ) {
        $tabs['wgpt_global_tab'] = array(
            'title'    => esc_html( $tab_title ? $tab_title : 'Global Info' ),
            'priority' => 50, // Appears after Description (10) and Reviews (30)
            'callback' => 'wgpt_global_tab_display_content'
        );
    }
    return $tabs;
}

/**
 * Render the tab body.
 */
function wgpt_global_tab_display_content() {
    $content = get_option( 'wgpt_global_tab_content' );

    // Sanitize once more on output. do_shortcode lets admins embed other
    // shortcodes inside the tab.
    echo '<div class="wgpt-global-tab-wrapper">';
    echo do_shortcode( wp_kses_post( $content ) );
    echo '</div>';
}
