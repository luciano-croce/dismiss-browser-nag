<?php 
/*
Plugin Name:       Dismiss Browser Nag
Plugin URI:        https://github.com/luciano-croce/dismiss-browser-nag/
Description:       Dismiss "<strong>Browser Update</strong>" nag, dashboard widget, when is activated, or automatically, if it is in mu-plugins directory.
Version:           1.0.1
Requires at least: 3.8
Tested up to:      5.0
Requires PHP:      5.2.4
Author:            Luciano Croce
Author URI:        https://github.com/luciano-croce/
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:       dismiss-browser-nag
Domain Path:       /languages
Network:           true
GitHub Plugin URI: https://github.com/luciano-croce/dismiss-browser-nag/
GitHub Branch:     master
Requires WP:       3.8
 *
 * Copyright 2013-2017 Luciano Croce (luciano.croce@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, on an "AS IS", but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This program is written with the intent of being helpful,
 * but you are responsible for its use or actions on your own website.
 *
 * Tips - A neat trick, is to put this single file dismiss-browser-nag.php (not its parent directory)
 * in the /wp-content/mu-plugins/ directory (create it if not exists) so you won't even have to enable it,
 * and will be loaded by default, also, since first step installation of WordPress setup!
 */

	/**
	 * Dismiss Browser Nag
	 *
	 * Automatically Dismiss Dashboard Widget Browser Update Nag
	 *
	 * PHPDocumentor
	 *
	 * @package    WordPress\Plugin
	 * @subpackage Dashboard\Dismiss Browser Update Nag
	 * @link       https://wordpress.org/plugins/dismiss-browser-nag/ - Plugin hosted on wordpress.org repository
	 *
	 * @version    1.0.1 (Build 2017-11-13) Stable
	 * @since      1.0.0 (Build 2013-12-12) 1st Release
	 *
	 * @author     Luciano Croce <luciano.croce@gmail.com>
	 * @copyright  2017 - Luciano Croce
	 * @license    https://www.gnu.org/licenses/gpl-2.0.html - GPLv2 or later
	 *
	 * @todo       Preemptive support for WordPress 5.0-alpha
	 */

/**
 * Prevent direct file access to plugin files
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( !defined( 'ABSPATH' ) ) exit;
if ( !defined( 'WPINC' ) ) exit;

if ( !function_exists( 'add_action' ) )	{
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/1.2 403 Forbidden' );
	header( 'HTTP/1.3 403 Forbidden' );
	header( 'Status: 403 Forbidden'  );
		exit;
}

/**
 * Make sure that run under PHP 5.2.4 or greater
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( version_compare( PHP_VERSION, '5.2.4', '<' ) ) {
// wp_die( __( 'This plugin requires PHP 5.2.4 or greater: Activation Stopped! Please note that a good choice is PHP 5.6+ ~ 7.0+ (previous stable branch) or PHP 7.1+ (current stable branch).', 'dismiss-browser-nag' ) );   # uncomment it if you prefer die notification

function ddwbun_psd_php_version_init() {
	deactivate_plugins( plugin_basename( __FILE__ ) );
}
add_action( 'admin_init', 'ddwbun_psd_php_version_init', 0 );

/**
 * Show Admin Notice when PHP version not meet minimum requirements requested
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
function ddwbun_ant_php_version_init() {
?>
<div class="notice notice-error is-dismissible">
<p>
<?php _e( 'This plugin requires PHP 5.2.4 or greater: please note that a good choice is PHP 5.6+ ~ 7.0+ (previous stable branch) or PHP 7.1+ (current stable branch).', 'dismiss-browser-nag' );?>
</p>
</div>
<div class="notice notice-warning is-dismissible">
<p>
<?php _e( 'Plugin Dismiss Browser Update Nag <strong>deactivated</strong>.', 'dismiss-browser-nag' );?>
<script>window.jQuery && jQuery( function( $ ) { $( 'div#message.updated' ).remove(); } );</script>                                                                                                                           <!-- This script remove update message when plugin is auto deactivated -->
</p>
</div>
<?php 
}
add_action( 'admin_notices', 'ddwbun_ant_php_version_init' );
}
else {

/**
 * Make sure that run under WP 3.8+ or greater
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
global $wp_version;
include( ABSPATH . WPINC . '/version.php' );
$version = str_replace( '-src', '', $wp_version );

if ( version_compare( $version, '3.8', '<' ) ) {
// wp_die( __( 'This plugin requires WordPress 3.8+ or greater: Activation Stopped! Please note that the Browser Update Dashboard Widget Nag was introduced since WordPress 3.5+', 'dismiss-browser-nag' ) );                 # uncomment it if you prefer die notification

function ddwbun_psd_wp_version_init() {
	deactivate_plugins( plugin_basename( __FILE__ ) );
}
add_action( 'admin_init', 'ddwbun_psd_wp_version_init', 0 );

/**
 * Show Admin Notice when WP version not meet minimum requirements requested
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
function ddwbun_ant_wp_version_init() {
?>
<div class="notice notice-error is-dismissible">
<p>
<?php _e( 'This plugin requires WordPress 3.8+ or greater: please note that the Browser Update Dashboard Widget Nag was introduced since WordPress 3.5+', 'dismiss-browser-nag' );?>
</p>
</div>
<div class="notice notice-warning is-dismissible">
<p>
<?php _e( 'Plugin Dismiss Browser Update Nag <strong>deactivated</strong>.', 'dismiss-browser-nag' );?>
<script>window.jQuery && jQuery( function( $ ) { $( 'div#message.updated' ).remove(); } );</script>                                                                                                                           <!-- This script remove update message when plugin is auto deactivated -->
</p>
</div>
<?php 
}
add_action( 'admin_notices', 'ddwbun_ant_wp_version_init' );
}
else {

/**
 * Load Plugin Textdomain
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
function ddwbun_load_plugin_textdomain() {
	load_plugin_textdomain( 'dismiss-browser-nag', false, basename( dirname( __FILE__ ) ) . '/languages' );
	load_muplugin_textdomain( 'dismiss-welcome-nag', basename( dirname( __FILE__ ) ) . '/languages' );
}
add_filter( 'plugins_loaded', 'ddwbun_load_plugin_textdomain' );

/**
 * Adds Plugin Row Meta Build
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
*/
function ddwbun_adds_row_meta_build( $plugin_meta, $plugin_file ) {
	if ( $plugin_file == plugin_basename( __FILE__ ) )
		{
			$plugin_meta[ 0 ] .= ' | ' . __( 'Build', 'dismiss-browser-nag' ) . ' ' . __( '2017-11-13', 'dismiss-browser-nag' );
		}
	return $plugin_meta;
}
add_filter( 'plugin_row_meta', 'ddwbun_adds_row_meta_build', 10, 4 );                                                                                                                                                         # comment or uncomment to enable or disable this customization

/**
 * Adds Plugin Row Meta Links
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
*/
function ddwbun_adds_row_meta_links( $plugin_meta, $plugin_file ) {
	if ( $plugin_file == plugin_basename( __FILE__ ) )
		{
			$plugin_meta[] .= '<a href="https://github.com/luciano-croce/dismiss-browser-nag/">' . __( 'Visit plugin site', 'dismiss-browser-nag' ) . '</a>';
		}
	return $plugin_meta;
}
add_filter( 'plugin_row_meta', 'ddwbun_adds_row_meta_links', 10, 2 );                                                                                                                                                         # comment or uncomment to enable or disable this customization

/**
 * Adds Plugin Action Links
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
*/
function ddwbun_adds_action_links( $plugin_meta, $plugin_file ) {
		{
			$plugin_meta[] .= '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'dismiss-browser-nag' ) . '</a>';
		}
	return $plugin_meta;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ddwbun_adds_action_links', 10, 4 );                                                                                                                        # comment or uncomment to enable or disable this customization
add_filter( 'network_admin_plugin_action_links_' . plugin_basename( __FILE__ ), 'ddwbun_adds_action_links', 10, 4 );                                                                                                          # comment or uncomment to enable or disable this customization

/**
 * Dismiss Dashboard Widget "Browser Update" Nag - ddwbun
 *
 * This, is different from the other similar plugins, because uses the filter hook, and not the action hook.
 *
 * Filters should filter information, thus receiving information/data, applying the filter and returning information/data,
 * and then used. However, filters are still action hooks. WordPress defines add_filter/remove_filter as "hooks a function
 * to a specific filter action", and add_action/remove_action as "hooks a function on to a specific action".
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-11-13)
 * @since   1.0.0 (Build 2013-12-12)
 */
function dismiss_dashboard_widget_browser_update_nag() {
	remove_filter( 'dashboard_browser_nag', 'wp_dashboard_browser_nag' );

	if ( empty( $_SERVER[ 'HTTP_USER_AGENT' ] ) ) {
		exit;
	}

	$ddwbun = md5( $_SERVER[ 'HTTP_USER_AGENT' ] );
	add_filter( 'pre_site_transient_browser_' . $ddwbun, '__return_null' );
}
add_filter( 'admin_init', 'dismiss_dashboard_widget_browser_update_nag' );

}
}
