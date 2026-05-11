<?php
/**
 * Admin functionality.
 *
 * @package GDPRCookieConsent
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Admin class.
 */
class GCC_Admin {

    /**
     * Register admin menu.
     *
     * @return void
     */
    public function register_admin_menu() {

        add_options_page(
            __( 'Cookie Plugin', 'mijn-cookie-plugin' ),
            __( 'Cookie Plugin', 'mijn-cookie-plugin' ),
            'manage_options',
            'mijn-cookie-plugin',
            array( $this, 'render_settings_page' )
        );
    }

    /**
     * Register plugin settings.
     *
     * @return void
     */
    public function register_settings() {

        register_setting(
            'gcc_settings_group',
            'gcc_settings',
            array( $this, 'sanitize_settings' )
        );

        add_settings_section(
            'gcc_general_section',
            __( 'General Settings', 'mijn-cookie-plugin' ),
            '__return_false',
            'mijn-cookie-plugin'
        );

        add_settings_field(
            'banner_enabled',
            __( 'Enable Cookie Banner', 'mijn-cookie-plugin' ),
            array( $this, 'render_banner_enabled_field' ),
            'mijn-cookie-plugin',
            'gcc_general_section'
        );
    }

    /**
     * Sanitize settings.
     *
     * @param array $input Raw settings.
     *
     * @return array
     */
    public function sanitize_settings( $input ) {

        $sanitized = array();

        $sanitized['banner_enabled'] = isset( $input['banner_enabled'] )
            ? 1
            : 0;

        return $sanitized;
    }

    /**
     * Render banner enabled field.
     *
     * @return void
     */
    public function render_banner_enabled_field() {

        $options = get_option( 'gcc_settings' );

        $value = isset( $options['banner_enabled'] )
            ? (int) $options['banner_enabled']
            : 0;
        ?>

        <label for="gcc_banner_enabled">
            <input
                type="checkbox"
                id="gcc_banner_enabled"
                name="gcc_settings[banner_enabled]"
                value="1"
                <?php checked( $value, 1 ); ?>
            />

            <?php esc_html_e(
                'Enable the cookie consent banner',
                'mijn-cookie-plugin'
            ); ?>
        </label>

        <?php
    }

    /**
     * Render settings page.
     *
     * @return void
     */
    public function render_settings_page() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        ?>

        <div class="wrap">

            <h1>
                <?php esc_html_e( 'Cookie Plugin', 'mijn-cookie-plugin' ); ?>
            </h1>

            <form method="post" action="options.php">

                <?php
                settings_fields( 'gcc_settings_group' );

                do_settings_sections( 'mijn-cookie-plugin' );

                submit_button();
                ?>

            </form>

        </div>

        <?php
    }
}
