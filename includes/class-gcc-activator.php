<?php
/**
 * Plugin activator.
 *
 * @package GDPRCookieConsent
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Activation class.
 */
class GCC_Activator {

    /**
     * Run activation tasks.
     *
     * @return void
     */
    public static function activate() {

        $default_settings = array(
            'banner_enabled' => 1,
            'privacy_page'   => 0,
        );

        if ( false === get_option( 'gcc_settings' ) ) {
            add_option( 'gcc_settings', $default_settings );
        }
    }
}
