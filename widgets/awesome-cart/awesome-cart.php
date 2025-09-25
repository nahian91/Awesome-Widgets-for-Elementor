<?php
/**
 * Awesome Cart Widget.
 *
 * Elementor widget that inserts a cart into the page
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

class Widget_Awesome_Cart extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve cart widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-cart';
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
		return esc_html__( 'Cart', 'awesome-widgets-elementor' );
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
		return 'eicon-cart';
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
	protected function register_controls() {
		
		// start of the Content tab section
		$this->start_controls_section(
			'awea_cart_contents',
			 [
				'label' => esc_html__('Layout', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
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
			'awea_cart_items_style',
			[
				'label' => esc_html__( 'Cart Items', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_cart_items_layout_options',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_items_layout_border',
				'selector' => '{{WRAPPER}} .awea-cart tr, .awea-cart td, .awea-cart-box-bottom',
			]
		);

		$this->add_control(
			'awea_cart_items_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr, .awea-cart td' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_layout_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr, .awea-cart td, .awea-cart-box-bottom' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_layout_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr, .awea-cart td, .awea-cart-box-bottom' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_heading_options',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_items_heading_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_heading_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr th' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_items_heading_typography',
				'selector' => '{{WRAPPER}} .awea-cart tr th',
			]
		);

		$this->add_control(
			'awea_cart_items_heading_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_image_options',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_items_image_border',
				'selector' => '{{WRAPPER}} .awea-cart tr td img',
			]
		);

		$this->add_control(
			'awea_cart_items_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr td img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_title_options',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_items_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_items_title_typography',
				'selector' => '{{WRAPPER}} .awea-cart tr h4',
			]
		);

		$this->add_control(
			'awea_cart_items_price_options',
			[
				'label' => esc_html__( 'Price', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_items_price_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart tr td span.amount' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_items_price_typography',
				'selector' => '{{WRAPPER}} .awea-cart tr td span.amount',
			]
		);

		$this->add_control(
			'awea_cart_items_quantity_options',
			[
				'label' => esc_html__( 'Quantity', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_items_quantity_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_quantity_icon_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_quantity_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_items_subtotal_options',
			[
				'label' => esc_html__( 'Subtotal', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_items_subtotal_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-subtotal .woocommerce-Price-amount.amount' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_items_subtotal_typography',
				'selector' => '{{WRAPPER}} .awea-cart-subtotal .woocommerce-Price-amount.amount',
			]
		);

		$this->add_control(
			'awea_cart_items_remove_options',
			[
				'label' => esc_html__( 'Remove', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_items_remove_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart .remove.awea-remove-item' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Heading Style
		$this->start_controls_section(
			'awea_cart_coupon_style',
			[
				'label' => esc_html__( 'Coupon', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_cart_coupon_btn_input_options',
			[
				'label' => esc_html__( 'Input', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_coupon_btn_input_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="text"]' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_coupon_btn_input_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_coupon_btn_input_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="text"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_coupon_btn_options',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs(
			'awea_cart_coupon_style_tabs'
		);

		$this->start_controls_tab(
			'awea_cart_coupon_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_coupon_typography',
				'selector' => '{{WRAPPER}} .awea-cart-coupon input[type="submit"]',
			]
		);

		$this->add_control(
			'awea_cart_coupon_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_coupon_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_coupon_border',
				'selector' => '{{WRAPPER}} .awea-cart-coupon input[type="submit"]',
			]
		);

		$this->add_control(
			'awea_cart_coupon_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_coupon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'awea_cart_coupon_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_control(
			'awea_cart_coupon_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_coupon_hover_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_coupon_hover_border',
				'selector' => '{{WRAPPER}} .awea-cart-coupon input[type="submit"]:hover',
			]
		);

		$this->add_control(
			'awea_cart_coupon_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-coupon input[type="submit"]:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Heading Style
		$this->start_controls_section(
			'awea_cart_update_style',
			[
				'label' => esc_html__( 'Update Cart', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'awea_cart_update_style_tabs'
		);

		$this->start_controls_tab(
			'awea_cart_update_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_update_typography',
				'selector' => '{{WRAPPER}} .awea-cart-update-btn',
			]
		);

		$this->add_control(
			'awea_cart_update_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_update_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_update_border',
				'selector' => '{{WRAPPER}} .awea-cart-update-btn',
			]
		);

		$this->add_control(
			'awea_cart_update_paddin',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_update_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'awea_cart_update_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_control(
			'awea_cart_update_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_update_hover_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_update_hover_border',
				'selector' => '{{WRAPPER}} .awea-cart-update-btn:hover',
			]
		);

		$this->add_control(
			'awea_cart_update_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-update-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Heading Style
		$this->start_controls_section(
			'awea_cart_totals_style',
			[
				'label' => esc_html__( 'Cart Totals', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_cart_totals_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_totals_layout_border',
				'selector' => '{{WRAPPER}} .awea-cart-summary',
			]
		);

		$this->add_control(
			'awea_cart_totals_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_totals_layout_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_totals_title_style',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_totals_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_totals_title_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary h4' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_totals_title_typography',
				'selector' => '{{WRAPPER}} .awea-cart-summary h4',
			]
		);

		$this->add_control(
			'awea_cart_totals_title_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_totals_subtitle_style',
			[
				'label' => esc_html__( 'Subtitle', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_totals_subtitle_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_totals_subtitle_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'awea_cart_totals_content_style',
			[
				'label' => esc_html__( 'Content', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_cart_totals_content_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_totals_content_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'awea_cart_totals_button_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs(
			'awea_cart_total_btn_style_tabs'
		);

		$this->start_controls_tab(
			'awea_cart_total_btn_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_cart_total_btn_typography',
				'selector' => '{{WRAPPER}} .awea-cart-summary-buttons a',
			]
		);

		$this->add_control(
			'awea_cart_total_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_total_btn_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_total_btn_border',
				'selector' => '{{WRAPPER}} .awea-cart-summary-buttons a',
			]
		);

		$this->add_control(
			'awea_cart_total_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_cart_total_btn_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'awea_cart_total_btn_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_control(
			'awea_cart_total_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_cart_total_btn_hover_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_cart_total_btn_hover_border',
				'selector' => '{{WRAPPER}} .awea-cart-summary-buttons a:hover',
			]
		);

		$this->add_control(
			'awea_cart_total_btn_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-cart-summary-buttons a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	protected function render() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {

    // ✅ Show notice only inside Elementor editor
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        echo '<p>' . esc_html__( 'WooCommerce is not active or cart is unavailable.', 'awesome-widgets-elementor' ) . '</p>';
    }

    return; // Always stop rendering if WooCommerce/cart is missing
}

	$cart = WC()->cart;
	$cart_totals = $cart->get_totals(); // Get all totals dynamically
	?>
	<div class="awea-grid-row">
		<div class="awea-grid-desktop-8 awea-grid-tablet-6 awea-grid-mobile-12">
			<div class="awea-cart-box">
				<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				<table class="awea-cart">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Thumbnail', 'awesome-widgets-elementor' ); ?></th>
							<th><?php esc_html_e( 'Product', 'awesome-widgets-elementor' ); ?></th>
							<th><?php esc_html_e( 'Price', 'awesome-widgets-elementor' ); ?></th>
							<th><?php esc_html_e( 'Quantity', 'awesome-widgets-elementor' ); ?></th>
							<th><?php esc_html_e( 'Subtotal', 'awesome-widgets-elementor' ); ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) :
						$product = $cart_item['data'];
						if ( ! $product || ! $product->exists() ) continue;

						$product_name      = $product->get_name();
						$product_price     = wc_price( $product->get_price() );
						$product_subtotal  = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
						$product_url       = $product->is_visible() ? $product->get_permalink( $cart_item ) : '';
						$thumbnail         = $product->get_image( 'woocommerce_thumbnail' );
					?>
						<tr>
							<td>
								<?php if ( $product_url ) : ?>
									<a href="<?php echo esc_url( $product_url ); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
								<?php else : ?>
									<?php echo wp_kses_post( $thumbnail ); ?>
								<?php endif; ?>
							</td>
							<td>
								<h4><a href="<?php echo esc_url( $product_url ); ?>"><?php echo esc_html( $product_name ); ?></a></h4>
							</td>
							<td><?php echo wp_kses_post( $product_price ); ?></td>
							<td class="awea-qty">
								<span class="awea-qty-minus">-</span>
								<input type="number"
									   class="awea-quantity-input"
									   name="cart[<?php echo esc_attr( $cart_item_key ); ?>][qty]"
									   value="<?php echo esc_attr( $cart_item['quantity'] ); ?>"
									   min="0">
								<span class="awea-qty-plus">+</span>
							</td>
							<td><div class="awea-cart-subtotal"><?php echo wp_kses_post( $product_subtotal ); ?></div></td>
							<td>
								<a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>"
								   class="remove awea-remove-item"
								   aria-label="<?php esc_attr_e( 'Remove this item', 'awesome-widgets-elementor' ); ?>">×</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

				<div class="awea-grid-row">
					<div class="awea-grid-desktop-12 awea-grid-mobile-12">
						<div class="awea-cart-box-bottom">
							<div class="awea-grid-row">
								<div class="awea-grid-desktop-9  awea-grid-tablet-6 awea-grid-mobile-12">
									<div class="awea-cart-coupon">
										<input type="text" name="coupon_code" placeholder="<?php esc_attr_e( 'Coupon Code', 'awesome-widgets-elementor' ); ?>">
										<input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'awesome-widgets-elementor' ); ?>">
									</div>
								</div>
								<div class="awea-grid-desktop-3  awea-grid-tablet-6 awea-grid-mobile-12">
									<input type="submit" class="button awea-cart-update-btn" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'awesome-widgets-elementor' ); ?>">
									<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>

		<div class="awea-grid-desktop-4 awea-grid-tablet-6 awea-grid-mobile-12">
			<div class="awea-cart-summary">
    <h4><?php esc_html_e( 'Cart Totals', 'awesome-widgets-elementor' ); ?></h4>

    <?php if ( WC()->cart ) : 
        WC()->cart->calculate_totals(); // Ensure totals are calculated
        $cart_totals = WC()->cart->get_totals();
        $packages = WC()->shipping()->get_packages();
        $available_methods = $packages[0]['rates'] ?? [];
    ?>
        <table class="awea-cart-totals">
            <tr>
                <th><?php esc_html_e( 'Subtotal', 'awesome-widgets-elementor' ); ?></th>
                <td><?php echo wp_kses_post( wc_price( $cart_totals['subtotal'] ) ); ?></td>
            </tr>
            <tr>
                <th><?php esc_html_e( 'Total', 'awesome-widgets-elementor' ); ?></th>
                <td><strong><?php echo wp_kses_post( wc_price( $cart_totals['total'] ) ); ?></strong></td>
            </tr>
        </table>

        <div class="awea-cart-summary-buttons">
            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout-button"><?php esc_html_e( 'Proceed to Checkout', 'awesome-widgets-elementor' ); ?></a>
        </div>
    <?php else : ?>
        <p><?php esc_html_e( 'Your cart is empty.', 'awesome-widgets-elementor' ); ?></p>
    <?php endif; ?>
</div>

		</div>
	</div>
	<?php
}
}