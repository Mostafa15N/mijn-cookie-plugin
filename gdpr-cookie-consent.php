<?php
/**
 * Plugin Name: Cookie Plugin
 * Plugin URI: https://example.com
 * Description: Lightweight GDPR/AVG cookie consent plugin for WordPress.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: mijn-cookie-plugin
 * Domain Path: /languages
 *
 * @package GDPRCookieConsent
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Plugin version.
 */
define( 'GCC_VERSION', '1.0.0' );

/**
 * Plugin path.
 */
define( 'GCC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin URL.
 */
define( 'GCC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Plugin basename.
 */
define( 'GCC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Load required files.
 */
require_once GCC_PLUGIN_PATH . 'includes/class-gcc-activator.php';
require_once GCC_PLUGIN_PATH . 'includes/class-gcc-deactivator.php';
require_once GCC_PLUGIN_PATH . 'includes/class-gcc-plugin.php';

/**
 * Plugin activation.
 */
register_activation_hook( __FILE__, array( 'GCC_Activator', 'activate' ) );

/**
 * Plugin deactivation.
 */
register_deactivation_hook( __FILE__, array( 'GCC_Deactivator', 'deactivate' ) );

/**
 * Initialize plugin.
 *
 * @return void
 */
function gcc_init_plugin() {

    $plugin = new GCC_Plugin();
    $plugin->run();
}

add_action( 'plugins_loaded', 'gcc_init_plugin' );
