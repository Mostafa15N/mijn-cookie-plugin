<?php
/**
 * Uninstall plugin.
 *
 * @package GDPRCookieConsent
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

/**
 * Remove plugin options.
 */
delete_option( 'gcc_settings' );
