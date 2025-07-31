<?php

class AWEA_Settings {

    private $widgets;

    public function __construct($widgets) {
        $this->widgets = $widgets;

        add_action('admin_init', [$this, 'settings_init']);
        register_activation_hook(AWEA_FILE, [$this, 'set_default_options']);
    }

    public function set_default_options() {
        $default_options = array_fill_keys($this->widgets, 1); // enable all by default
        update_option('awea_widgets_enabled', $default_options);
    }

    public function settings_init() {
        // Register widget toggle settings
        register_setting('awesomeWidgets', 'awea_widgets_enabled');

        add_settings_section(
            'awea_section',
            'Widgets Settings',
            null,
            'awesome-widgets-elementor'
        );

        foreach ($this->widgets as $widget) {
            add_settings_field(
                "awea_{$widget}_enabled",
                ucfirst(str_replace('-', ' ', $widget)),
                [$this, 'checkbox_render'],
                'awesome-widgets-elementor',
                'awea_section',
                ['widget' => $widget]
            );
        }

        // General settings
        register_setting('awesomeWidgetsGeneral', 'awea_general_options');

        add_settings_section(
            'awea_general_section',
            'General Settings',
            null,
            'awesome-widgets-general'
        );

        add_settings_field(
            'awea_general_field',
            'General Option',
            function () {
                $options = get_option('awea_general_options');
                ?>
                <input type="text" name="awea_general_options[general_field]" 
                       value="<?php echo isset($options['general_field']) ? esc_attr($options['general_field']) : ''; ?>" />
                <?php
            },
            'awesome-widgets-general',
            'awea_general_section'
        );
    }

    public function checkbox_render($args) {
        $widget = $args['widget'];
        $options = get_option('awea_widgets_enabled', []);
        $checked = isset($options[$widget]) ? $options[$widget] : 0;
        ?>
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
        <?php
    }
}
