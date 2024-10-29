<?php
/**
 * Plugin Name:       Aliexpress Affiliate
 * Plugin URI:        https://wordpress.org/plugins/aliexpress-affiliate/
 * Description:       Plugin for Aliexpress Affiliate
 * Version:           1.0.0
 * Author:            Nilambar Sharma
 * Author URI:        http://www.nilambar.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aliexpress-affiliate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}
// Define
define( 'ALIEXPRESS_AFFILIATE_NAME', 'Aliexpress Affiliate' );
define( 'ALIEXPRESS_AFFILIATE_SLUG', 'aliexpress-affiliate' );
define( 'ALIEXPRESS_AFFILIATE_BASENAME', basename( dirname( __FILE__ ) ) );
define( 'ALIEXPRESS_AFFILIATE_PLUGIN_BASENAME', plugin_basename(__FILE__) );
define( 'ALIEXPRESS_AFFILIATE_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'ALIEXPRESS_AFFILIATE_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'ALIEXPRESS_AFFILIATE_INC_DIR', ALIEXPRESS_AFFILIATE_DIR . '/inc' );

require_once ALIEXPRESS_AFFILIATE_DIR . '/npf-framework/init.php';
require_once ALIEXPRESS_AFFILIATE_DIR . '/inc/init.php';
require_once ALIEXPRESS_AFFILIATE_DIR . '/inc/plugin-option.php';
require_once ALIEXPRESS_AFFILIATE_DIR . '/inc/core.php';
require_once ALIEXPRESS_AFFILIATE_DIR . '/inc/hooks.php';
require_once ALIEXPRESS_AFFILIATE_DIR . '/inc/shortcodes.php';
