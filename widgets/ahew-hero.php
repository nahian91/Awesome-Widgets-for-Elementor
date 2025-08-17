<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class AHEW_Hero extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ahew-hero';
    }

    public function get_title() {
        return __( 'Hero', 'al-hasana-elementor-widget' );
    }

    public function get_icon() {
        return 'eicon-code'; // Elementor default icon
    }

    public function get_categories() {
        return [ 'ahew-category' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'al-hasana-elementor-widget' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __( 'Title', 'al-hasana-elementor-widget' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Hello World from Widget 1', 'al-hasana-elementor-widget' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<h2>' . esc_html( $settings['title'] ) . '</h2>';
    }
}
