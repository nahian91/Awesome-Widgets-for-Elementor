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

if ( ! defined('ABSPATH') ) {
    exit;
}

// Define plugin constants
define('AWEA_VERSION', '1.3');
define('AWEA_FILE', __FILE__);
define('AWEA_PATH', plugin_dir_path(__FILE__));
define('AWEA_URL', plugin_dir_url(__FILE__));

// Load Freemius (if applicable)
require_once AWEA_PATH . 'includes/freemius-init.php';

// Load core plugin class
require_once AWEA_PATH . 'includes/class-plugin-core.php';

// Load widget loader and settings classes
require_once AWEA_PATH . 'includes/class-widget-loader.php';
require_once AWEA_PATH . 'includes/class-settings.php';

// ✅ Auto-detect widget folders
$widget_folders = glob(AWEA_PATH . 'widgets/*', GLOB_ONLYDIR);
$widget_slugs   = array_map('basename', $widget_folders);

// ✅ Initialize settings with widget slugs
new AWEA_Settings($widget_slugs);

// ✅ Initialize loader
new AWEA_Widget_Loader();

// ✅ Initialize plugin (core class boot)
add_action('after_setup_theme', ['AWEA', 'instance']);
