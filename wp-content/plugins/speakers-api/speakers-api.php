<?php
/**
 * Plugin Name:     Speakers Api
 * Plugin URI:      https://cumbre.tech
 * Description:     Plugin to get speakers form rainfocus api
 * Author:          Iván Moreno - Cumbre Tech
 * Author URI:      https://www.linkedin.com/in/iv%C3%A1n-moreno-c/
 * Text Domain:     speakers-api
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Speakers_Api
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path(__FILE__) . '/includes/Speaker.php';
require_once plugin_dir_path(__FILE__) . '/metabox/metabox.php';
require_once plugin_dir_path(__FILE__) . '/admin/admin.php';


add_action( 'wp_head', 'my_header_scripts' );
function my_header_scripts(){
    phpinfo();
    /*$speaker = new Speaker();
    $speaker->start();*/
}