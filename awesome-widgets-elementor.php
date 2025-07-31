<?php
/**
 * Plugin Name: Awesome Widgets for Elementor
 * Description: Easily create stunning websites with advanced design options and increased functionality.
 * Version: 1.3
 * Author: Abdullah Nahian
 * Text Domain: awesome-widgets-elementor
 * Domain Path: /languages
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit;

define('AWEA_VERSION', '1.0.1');
define('AWEA_FILE', __FILE__);
define('AWEA_PATH', plugin_dir_path(__FILE__));
define('AWEA_URL', plugin_dir_url(__FILE__));

// Freemius
require_once AWEA_PATH . 'includes/freemius-init.php';

// Load main plugin class
require_once AWEA_PATH . 'includes/class-plugin-core.php';

// Boot plugin
add_action('after_setup_theme', ['AWEA', 'instance']);
