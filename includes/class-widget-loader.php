<?php

class AWEA_Widget_Loader {

    private $widgets;

    public function __construct($widgets) {
        $this->widgets = $widgets;

        if (did_action('elementor/loaded') && $this->are_widgets_enabled()) {
            add_action('elementor/widgets/register', [$this, 'register_widgets']);
            add_action('elementor/elements/categories_registered', [$this, 'add_elementor_category']);
        }
    }

    public function are_widgets_enabled() {
        $options = get_option('awea_widgets_enabled');
        return !empty($options);
    }

    public function register_widgets($widgets_manager) {
        $options = get_option('awea_widgets_enabled', []);
        foreach ($this->widgets as $widget) {
            if (isset($options[$widget]) && $options[$widget] == 1) {
                require_once AWEA_PATH . "widgets/{$widget}.php";
                $class_name = "Elementor\\Widget_" . str_replace('-', '_', ucwords($widget, '-'));
                if (class_exists($class_name)) {
                    $widgets_manager->register(new $class_name());
                }
            }
        }
    }

    public function add_elementor_category($elements_manager) {
        $elements_manager->add_category(
            'awesome-widgets-elementor',
            [
                'title' => esc_html__('Awesome Widgets', 'awesome-widgets-elementor'),
            ],
            1
        );
    }
}
