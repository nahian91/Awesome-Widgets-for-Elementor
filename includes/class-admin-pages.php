<?php

class AWEA_Admin_Pages {

    private $widgets;

    public function __construct($widgets) {
        $this->widgets = $widgets;

        add_action('admin_menu', [$this, 'add_admin_menu']);
    }

    public function add_admin_menu() {
        add_menu_page(
            'Awesome Widgets', 
            'Awesome Widgets', 
            'manage_options', 
            'awesome-widgets-elementor', 
            [$this, 'general_page'], 
            '', 
            59
        );

        add_submenu_page(
            'awesome-widgets-elementor',
            'General Settings',
            'General',
            'manage_options',
            'awesome-widgets-elementor',
            [$this, 'general_page']
        );

        add_submenu_page(
            'awesome-widgets-elementor',
            'Widgets Settings',
            'Widgets',
            'manage_options',
            'awesome-widgets-widgets',
            [$this, 'widgets_page']
        );

        add_submenu_page(
            'awesome-widgets-elementor',
            'System Info',
            'System Info',
            'manage_options',
            'awesome-widgets-system-info',
            [$this, 'system_info_page']
        );
    }

    public function general_page() {
        ?>
        <div class="awea-wrap">
            <h1>Awesome Widgets - General Settings</h1>
            <p><strong>Awesome Widgets for Elementor</strong> is a powerful and versatile plugin designed to supercharge your Elementor experience.</p>

            <h3>🌟 Key Features:</h3>
            <ul>
                <li><strong>Exclusive Widgets</strong> for design and functionality</li>
                <li><strong>Fully Customizable</strong> with Elementor controls</li>
                <li><strong>Responsive Design</strong> for all screen sizes</li>
                <li><strong>Lightweight & Fast</strong> codebase</li>
                <li><strong>Frequent Updates</strong> and new widgets</li>
            </ul>

            <h3>🚀 Widgets Included:</h3>
            <ul>
                <?php foreach ($this->widgets as $widget): ?>
                    <li><?php echo ucfirst(str_replace('-', ' ', $widget)); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }

    public function widgets_page() {
        if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
            add_settings_error('awea_widgets_messages', 'awea_widgets_message', 'Settings saved successfully.', 'updated');
        }

        $options = get_option('awea_widgets_enabled', []);
        $total_widgets = count($this->widgets);
        $active_widgets = count(array_filter($options));
        $deactive_widgets = $total_widgets - $active_widgets;

        ?>
        <div class="awea-wrap">
            <h1>Awesome Widgets Settings</h1>
            <p>Enable or disable the widgets for your Elementor design needs.</p>

            <div class="awea-widget-counts" style="margin: 20px 0; padding: 15px; background: #f9f9f9; border: 1px solid #ddd; display: flex; gap: 30px; font-size: 16px;">
                <div><strong>Total Widgets:</strong> <?php echo esc_html($total_widgets); ?></div>
                <div><strong>Active:</strong> <?php echo esc_html($active_widgets); ?></div>
                <div><strong>Inactive:</strong> <?php echo esc_html($deactive_widgets); ?></div>
            </div>

            <?php settings_errors('awea_widgets_messages'); ?>

            <div class="awea-toggle-all-container">
                <label for="awea_toggle_all" class="awea-switch-container">
                    <span class="awea-switch">
                        <input type="checkbox" id="awea_toggle_all" />
                        <span class="awea-slider"></span>
                    </span>
                    <span class="awea-switch-label">Toggle All On/Off</span>
                </label>
            </div>

            <form action='options.php' method='post' class="awea-settings-form">
                <?php settings_fields('awesomeWidgets'); ?>
                <ul class="awea-widgets-list">
                    <?php foreach ($this->widgets as $widget): ?>
                        <?php $checked = isset($options[$widget]) ? $options[$widget] : 0; ?>
                        <li class="awea-widgets-list-item">
                            <label for="awea_<?php echo esc_attr($widget); ?>" class="awea-switch-container">
                                <span class="awea-switch">
                                    <input type="checkbox" 
                                           id="awea_<?php echo esc_attr($widget); ?>" 
                                           name="awea_widgets_enabled[<?php echo esc_attr($widget); ?>]" 
                                           value="1" <?php checked($checked, 1); ?> />
                                    <span class="awea-slider"></span>
                                </span>
                                <span class="awea-switch-label"><?php echo ucfirst(str_replace('-', ' ', $widget)); ?></span>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="awea-button-container">
                    <?php submit_button('Save Changes', 'primary', 'submit', true, ['class' => 'awea-button']); ?>
                </div>
            </form>
        </div>
        <?php
    }

    public function system_info_page() {
        $system_info = [
            'PHP Version'        => phpversion(),
            'WordPress Version'  => get_bloginfo('version'),
            'Active Theme'       => wp_get_theme()->get('Name'),
            'Elementor Version'  => defined('ELEMENTOR_VERSION') ? ELEMENTOR_VERSION : 'Not installed',
            'WP Memory Limit'    => ini_get('memory_limit'),
            'WP Debug Mode'      => (defined('WP_DEBUG') && WP_DEBUG) ? 'Enabled' : 'Disabled',
            'Server Software'    => $_SERVER['SERVER_SOFTWARE'] ?? '',
            'PHP SAPI'           => php_sapi_name(),
        ];

        echo '<div class="awea-wrap"><h1>Awesome Widgets - System Info</h1>';
        echo '<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">';
        echo '<thead><tr><th>Information</th><th>Details</th></tr></thead><tbody>';
        foreach ($system_info as $label => $value) {
            echo "<tr><td>{$label}</td><td>{$value}</td></tr>";
        }
        echo '</tbody></table></div>';
    }
}
