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

        // Future includes.
    }

    /**
     * Register WordPress hooks.
     *
     * @return void
     */
    private function register_hooks() {

        add_action( 'init', array( $this, 'load_textdomain' ) );
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
