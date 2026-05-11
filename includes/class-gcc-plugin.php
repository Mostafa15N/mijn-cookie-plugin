<?php
/**
 * Main plugin class.
 *
 * @package GDPRCookieConsent
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main plugin bootstrap class.
 */
class GCC_Plugin {

    /**
     * Admin class instance.
     *
     * @var GCC_Admin
     */
    private $admin;

    /**
     * Initialize plugin functionality.
     *
     * @return void
     */
    public function run() {

        $this->load_dependencies();
        $this->register_hooks();
    }

    /**
     * Load required files.
     *
     * @return void
     */
    private function load_dependencies() {

        require_once GCC_PLUGIN_PATH . 'admin/class-gcc-admin.php';

        $this->admin = new GCC_Admin();
    }

    /**
     * Register WordPress hooks.
     *
     * @return void
     */
    private function register_hooks() {

        add_action( 'init', array( $this, 'load_textdomain' ) );

        add_action(
            'admin_menu',
            array( $this->admin, 'register_admin_menu' )
        );

        add_action(
            'admin_init',
            array( $this->admin, 'register_settings' )
        );
    }

    /**
     * Load plugin translations.
     *
     * @return void
     */
    public function load_textdomain() {

        load_plugin_textdomain(
            'mijn-cookie-plugin',
            false,
            dirname( GCC_PLUGIN_BASENAME ) . '/languages'
        );
    }
}
