<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class AHEW_Contact_Info extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ahew-contact-info';
    }

    public function get_title() {
        return __( 'Contact Info', 'al-hasana-elementor-widget' );
    }

    public function get_icon() {
        return 'eicon-star'; // Different icon
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
            'description',
            [
                'label'   => __( 'Description', 'al-hasana-elementor-widget' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'This is Hello World Widget 2', 'al-hasana-elementor-widget' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<p>' . esc_html( $settings['description'] ) . '</p>';
    }
}
