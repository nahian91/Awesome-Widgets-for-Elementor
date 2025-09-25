<?php
/**
 * Awesome Heading Widget.
 *
 * Elementor widget that inserts a heading into the page
 *
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Checkout extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-checkout';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve about widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Checkout', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-heading';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'awesome-widgets-elementor' ];
	}

	public function get_keywords() {
		return [ 'heading', 'title', 'awesome'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
		$this->start_controls_section(
			'awea_heading_contents',
			 [
				'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);

		// Heading Sub Heading
		$this->add_control(
			'awea_sub_heading',
			[
				'label' => esc_html__( 'Sub Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dummy Text', 'awesome-widgets-elementor' ),
			]
		);

		// Heading
		$this->add_control(
			'awea_heading',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading', 'awesome-widgets-elementor' ),
			]
		);

		// Heading Description
		$this->add_control(
			'awea_heading_desc',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'awesome-widgets-elementor' ),
			]
		);

		// Heading Alignment
		$this->add_control(
			'awea_heading_alignment',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'awesome-widgets-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'awesome-widgets-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'awesome-widgets-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_heading_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_heading_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Awesome Widgets for Elementor Premium is coming soon with more widgets, features, and customization options.', 'awesome-widgets-elementor')
				)
			]  
		);
		$this->end_controls_section();

		// start of the Heading Style
		$this->start_controls_section(
			'awea_checkout_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_checkout_section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_section_heading_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_section_heading_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Contact Info Background Color
		$this->add_control(
			'awea_checkout_section_heading_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_section_heading_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_section_heading_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Heading Style
		$this->start_controls_section(
			'awea_checkout_form_style',
			[
				'label' => esc_html__( 'Form', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Heading Style
		$this->start_controls_section(
			'awea_checkout_order_summary_style',
			[
				'label' => esc_html__( 'Order Summary', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_layout',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_checkout_order_summary_border',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info',
			]
		);	

		$this->add_control(
			'awea_checkout_order_summary_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_image',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_checkout_order_summary_image_border',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info',
			]
		);	

		$this->add_control(
			'awea_checkout_order_summary_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_order_summary_title_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_price',
			[
				'label' => esc_html__( 'Price', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_order_summary_price_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_price_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_subtotal_total',
			[
				'label' => esc_html__( 'Subtotal & Total', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_order_summary_subtotal_total_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_subtotal_total_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_checkout_order_summary_subtotal_total_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Heading Style
		$this->start_controls_section(
			'awea_checkout_payment_style',
			[
				'label' => esc_html__( 'Payment', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_checkout_payment_layout',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_checkout_payment_border',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info',
			]
		);	

		$this->add_control(
			'awea_checkout_payment_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_payment_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_payment_content',
			[
				'label' => esc_html__( 'Content', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_payment_content_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_payment_content_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs(
			'awea_checkout_payment_btn_style_tabs'
		);

		$this->start_controls_tab(
			'awea_checkout_payment_btn_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_payment_btn_normal_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn_normal_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn_normal_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_checkout_payment_btn_normal_border',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info',
			]
		);	

		$this->add_control(
			'awea_checkout_payment_btn_normal_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn_normal_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'awea_checkout_payment_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_checkout_payment_btn_hover_typography',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn_hover_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon i' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_checkout_payment_btn_hover_border',
				'selector' => '{{WRAPPER}} .awea-single-awesome-widget-contact-info',
			]
		);	

		$this->add_control(
			'awea_checkout_payment_btn_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_checkout_payment_btn_hover_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-awesome-widget-contact-info .awea-single-awesome-widget-contact-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->end_controls_section();
		// end of the Style tab section
		
	}

	protected function render() {
    // Get widget settings
    $settings = $this->get_settings_for_display();

    // WooCommerce checkout instance
    if ( ! class_exists('WooCommerce') ) return;
    $checkout = WC()->checkout();
    ?>

    <div class="awea-checkout">
        <div class="awea-grid-row">

            <!-- Billing & Shipping Section -->
            <div class="awea-grid-desktop-8">
                <div class="awea-checkout-title">
                    <h4><?php esc_html_e('Billing Details', 'awesome-widgets-elementor'); ?></h4>
                </div>

                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

                    <?php if ( $checkout->get_checkout_fields() ) : ?>
                        <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                        <div class="checkout-customer-details">
                            <!-- Billing Fields -->
                            <div class="checkout-billing">
                                <?php do_action('woocommerce_checkout_billing'); ?>
                            </div>

                            <!-- Shipping Fields -->
                            <div class="checkout-shipping">
                                <?php do_action('woocommerce_checkout_shipping'); ?>
                            </div>
                        </div>

                        <?php do_action('woocommerce_checkout_after_customer_details'); ?>
                    <?php endif; ?>

                </form>
            </div>

            <!-- Order Summary Section -->
            <div class="awea-grid-desktop-4">
                <div class="awea-checkout-order-summary">
                    <div class="awea-checkout-title">
                        <h4><?php esc_html_e('Your Order', 'awesome-widgets-elementor'); ?></h4>
                    </div>

                    <div class="awea-checkout-right-sidebar">
                        <div class="awea-checkout-right-sidebar-items">
                            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $_product   = $cart_item['data'];
                                $product_id = $cart_item['product_id'];
                                ?>
                                <div class="awea-checkout-item">
                                    <div class="awea-checkout-item-thumb">
                                        <?php echo $_product->get_image('thumbnail'); ?>
										
                                    <div class="awea-checkout-item-content-name">
                                        <a href="<?php echo esc_url(get_permalink($product_id)); ?>">
                                            <?php echo esc_html($_product->get_name()); ?>
                                        </a>
                                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                                    </div>
                                    </div>
									<div class="awea-checkout-item-price">
										<?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?>
									</div>
                                </div>
                            <?php endforeach; ?>

							<!-- Totals / Coupons -->
                        	<div class="awea-checkout-totals-wrapper">
                            <div class="awea-checkout-subtotal">
                                <span><?php esc_html_e('Subtotal', 'awesome-widgets-elementor'); ?>:</span>
                                <span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                            </div>

                            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                                <div class="awea-checkout-shipping">
                                    <?php wc_cart_totals_shipping_html(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="awea-checkout-order-total">
                                <span><?php esc_html_e('Total', 'awesome-widgets-elementor'); ?>:</span>
                                <span><?php wc_cart_totals_order_total_html(); ?></span>
                            	</div>
                        	</div>
                        </div>

                        <!-- Payment Methods -->
                        <div class="awea-checkout-payment-wrapper">
                            <?php if ( WC()->cart->needs_payment() ) : ?>
                                <?php foreach ( WC()->payment_gateways()->get_available_payment_gateways() as $gateway ) : ?>
                                    <div class="awea- payment_method_<?php echo esc_attr( $gateway->id ); ?>">
                                        <input id="awea_payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="awea-input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> />
                                        <label for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
                                            <?php echo wp_kses_post( $gateway->get_title() ); ?>
                                            <?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
                                                <div class="awea_payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>" style="display:none;">
                                                    <?php $gateway->payment_fields(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
<!-- Terms & Place Order -->
                        <div class="awea-woocommerce-terms-and-conditions-wrapper">
                            <?php wc_get_template( 'checkout/terms.php' ); ?>
                        </div>

						<div class="awea-form-row awea-place-order">
                            <?php
                            wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' );
                            echo apply_filters( 'woocommerce_order_button_html',
                                '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' .
                                esc_attr__('Place order', 'awesome-widgets-elementor') . '">' .
                                esc_html__('Place order', 'awesome-widgets-elementor') .
                                '</button>'
                            );
                            ?>
                        </div>

                        </div>

                        

                

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
}
}