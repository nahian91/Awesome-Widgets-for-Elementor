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
    }

    public function general_page() {
        ?>
        <div class="awea-wrap">
            <h1>Awesome Widgets - General Settings</h1>
<p><strong>Awesome Widgets for Elementor</strong> is your ultimate toolkit for designing professional, engaging, and visually stunning websites. Built specifically for Elementor, this plugin offers a wide variety of feature-rich widgets that seamlessly integrate with your design workflow.</p>
<p>Whether you're building a business website, portfolio, online store, or post, Awesome Widgets empowers you with the flexibility to customize every detail without touching a single line of code. Each widget is thoughtfully crafted to be fully responsive, ensuring your site looks perfect on any device.</p>
<p>From creative layouts to advanced interactive elements, Awesome Widgets helps you transform your ideas into reality — faster, easier, and better than ever before.</p>

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
                                <span class="awea-switch-label"><?php echo ucfirst(str_replace('-', ' ', $widget)); ?></span>
                                <span class="awea-switch">
                                    <input type="checkbox" 
                                           id="awea_<?php echo esc_attr($widget); ?>" 
                                           name="awea_widgets_enabled[<?php echo esc_attr($widget); ?>]" 
                                           value="1" <?php checked($checked, 1); ?> />
                                    <span class="awea-slider"></span>
                                </span>
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
}
