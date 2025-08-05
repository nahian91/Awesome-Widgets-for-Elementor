<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Product_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-product-carousel';
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
		return esc_html__( 'Products Carousel', 'awesome-widgets-elementor' );
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
		return 'awea-icon eicon-carousel-loop';
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

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'products', 'carousel', 'awea'];
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
			'awea_products_carousel_content',
			[
				'label' => esc_html__('Products Carousel', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		 // Products Number
		$this->add_responsive_control(
			'awea_products_carousel_number',
			[
				'label' 		=> __('Number of Products', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Products Category
		// $this->add_control(
		// 	'awea_products_carousel_category',
		// 	[
		// 		'label' => __('Product Category', 'awesome-widgets-elementor'),
		// 		'type' => Controls_Manager::SELECT2,
		// 		'options' => $this->get_product_categories(),
		// 		'multiple' => true,
		// 	]
		// );

		// Products Order
		$this->add_control(
			'awea_products_carousel_order',
			[
				'label' 		=> __('Order', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'awesome-widgets-elementor'),
					'DESC' 		=> __('DESCENDING', 'awesome-widgets-elementor'),
					'ASC' 		=> __('ASCENDING', 'awesome-widgets-elementor'),
				],
			]
		);

		// Products Orderby
		$this->add_control(
			'awea_products_carousel_orderby',
			[
				'label' 		=> __('Order By', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					''               => __('Default', 'awesome-widgets-elementor'),
					'date'           => __('Date', 'awesome-widgets-elementor'),
					'title'          => __('Title', 'awesome-widgets-elementor'),
					'name'           => __('Name', 'awesome-widgets-elementor'),
					'rand'           => __('Random', 'awesome-widgets-elementor'),
					'comment_count'  => __('Comment Count', 'awesome-widgets-elementor'),
					'menu_order'     => __('Menu Order', 'awesome-widgets-elementor'),
					'best_selling'   => __('Best Selling', 'awesome-widgets-elementor'),
					'on_sale'        => __('On Sale', 'awesome-widgets-elementor'),
					'latest_products' => __('Latest Products', 'awesome-widgets-elementor'),
				],
			]
		);
		 
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_products_carousel_settings',
			[
				'label' => esc_html__('Settings', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Number
		$this->add_control(
			'awea_products_carousel_slide_number',
			[
                'label'     => esc_html__( 'No. of items per slide', 'awesome-widgets-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ],
				'default' => '3',
                'frontend_available' => true,
            ]
		);

		// Arrows
		$this->add_control(
			'awea_products_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Loops
		$this->add_control(
			'awea_products_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Autoplay
		$this->add_control(
			'awea_products_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Pause
		$this->add_control(
			'awea_products_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Autoplay Speed
		$this->add_control(
			'awea_products_carousel_autoplay_speed',
			[
				'label' => esc_html__( 'Speed', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'awesome-widgets-elementor' ),
					'2000' => esc_html__( '2 Seconds', 'awesome-widgets-elementor' ),
					'3000' => esc_html__( '3 Seconds', 'awesome-widgets-elementor' ),
					'4000' => esc_html__( '4 Seconds', 'awesome-widgets-elementor' ),
					'5000' => esc_html__( '5 Seconds', 'awesome-widgets-elementor' ),
					'6000' => esc_html__( '6 Seconds', 'awesome-widgets-elementor' ),
					'7000' => esc_html__( '7 Seconds', 'awesome-widgets-elementor' ),
					'8000' => esc_html__( '8 Seconds', 'awesome-widgets-elementor' ),
					'9000' => esc_html__( '9 Seconds', 'awesome-widgets-elementor' ),
					'10000' => esc_html__( '10 Seconds', 'awesome-widgets-elementor' ),
				],
			]
		);

		// Animation Speed
		$this->add_control(
			'awea_products_carousel_autoplay_animation',
			[
				'label' => esc_html__( 'Timeout', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'awesome-widgets-elementor' ),
					'2000' => esc_html__( '2 Seconds', 'awesome-widgets-elementor' ),
					'3000' => esc_html__( '3 Seconds', 'awesome-widgets-elementor' ),
					'4000' => esc_html__( '4 Seconds', 'awesome-widgets-elementor' ),
					'5000' => esc_html__( '5 Seconds', 'awesome-widgets-elementor' ),
					'6000' => esc_html__( '6 Seconds', 'awesome-widgets-elementor' ),
					'7000' => esc_html__( '7 Seconds', 'awesome-widgets-elementor' ),
					'8000' => esc_html__( '8 Seconds', 'awesome-widgets-elementor' ),
					'9000' => esc_html__( '9 Seconds', 'awesome-widgets-elementor' ),
					'10000' => esc_html__( '10 Seconds', 'awesome-widgets-elementor' ),
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_products_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'awea_products_carousel_pro_message_notice', 
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

		// Products Carousel Layout
		$this->start_controls_section(
			'awea_products_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Background
		$this->add_control(
			'awea_products_carousel_layout_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-product' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Products Carousel Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_products_carousel_layout_border',
				'selector' => '{{WRAPPER}} .awea-single-product',
			]
		);	

		// Products Carousel Padding
		$this->add_control(
			'awea_product_layout_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Carousel Border Radius
		$this->add_control(
			'awea_products_carousel_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Start of the Products Content Tab Section
		$this->start_controls_section(
			'awea_products_image',
			[
				'label' => esc_html__('Images', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_STYLE		   
			]
		);

		// Products Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_product_image_border',
				'selector' => '{{WRAPPER}} .awea-product-img',
			]
		);	

		// Products Image Border
		$this->add_control(
			'awea_product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => '12',
					'right' => '12',
					'bottom' => '12',
					'left' => '12',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Image Width
		$this->add_control(
			'awea_products_image_width',
			[
				'label' => esc_html__( 'Width', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Title
		$this->start_controls_section(
			'awea_products_carousel_title_style',
			[
				'label' => esc_html__( 'Product Title', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Title Color
		$this->add_control(
			'wp_products_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-product h4 a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_products_carousel_title_typography',
				'selector' => '{{WRAPPER}} .awea-single-product h4 a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Products Carousel Meta
		$this->start_controls_section(
			'awea_products_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Meta Price
		$this->add_control(
			'awea_products_carousel_meta_price_style',
			[
				'label' => esc_html__( 'Price', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Meta Price Color
		$this->add_control(
			'wp_products_carousel_meta_price_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-bottom p span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Price Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_products_carousel_meta_typography',
				'selector' => '{{WRAPPER}} .awea-price-bottom p span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Sale
		$this->add_control(
			'awea_products_carousel_meta_sale_style',
			[
				'label' => esc_html__( 'Sale', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Meta Sale Color
		$this->add_control(
			'wp_products_carousel_meta_price_sale_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-product span.awea-sale' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Products Carousel Meta Sale Background
		$this->add_control(
			'wp_products_carousel_meta_sale_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-product span.awea-sale' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Sale Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_products_carousel_meta_sale_typography',
				'selector' => '{{WRAPPER}} .awea-single-product span.awea-sale',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);
 
		// Products Carousel Meta Sale Border Radius
		$this->add_control(
			'awea_products_carousel_meta_sale_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'default' => [
					'top' => '0',
					'right' => '12',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .awea-single-product span.awea-sale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Button
		$this->start_controls_section(
			'awea_products_carousel_button_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_products_carousel_btn_style_tab'
		);

		// Products Carousel Button Normal Tab
		$this->start_controls_tab(
			'wp_products_carousel_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Products Carousel Button Color
		$this->add_control(
			'wp_products_carousel_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Button Border
		$this->add_control(
			'wp_products_carousel_btn_border',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Button Background
		$this->add_control(
			'wp_products_carousel_btn_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->end_controls_tab();

		// Products Carousel Button Hover Tab
		$this->start_controls_tab(
			'wp_products_carousel_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'wp_products_carousel_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Products Carousel Button Hover Background
		$this->add_control(
			'wp_products_carousel_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Products Carousel Arrow Style
		$this->start_controls_section(
			'awea_products_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_service_arrow_style_tabs'
		);

		// Products Carousel Arrow Normal Tab
		$this->start_controls_tab(
			'wp_service_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Products Carousel Arrow Color
		$this->add_control(
			'awea_products_carousel_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Arrow Border Color
		$this->add_control(
			'awea_products_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Carousel Arrow Background Color
		$this->add_control(
			'awea_products_carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Product Carousel Arrow Padding
		$this->add_control(
			'awea_products_carousel_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Product Carousel Arrow Round
		$this->add_control(
			'awea_products_carousel_arrow_round',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Products Carousel Arrow Hover Tab
		$this->start_controls_tab(
			'wp_service_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Products Carousel Arrow Hover Icon Color
		$this->add_control(
			'awea_products_carousel_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Arrow Border Color
		$this->add_control(
			'awea_product_carousel_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Arrow Round
		$this->add_control(
			'awea_products_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	// Helper function to get product categories
	private function get_product_categories() {
		// Retrieve product categories
		$categories = get_terms(array('taxonomy' => 'product_cat'));
		
		// Initialize options array
		$options = array();
		
		// Check if categories were retrieved successfully
		if (!empty($categories) && !is_wp_error($categories)) {
			// Loop through categories
			foreach ($categories as $category) {
				// Check if category is an object and has required properties
				if (is_object($category) && isset($category->term_id) && isset($category->name)) {
					// Assign category ID as key and category name as value in options array
					$options[$category->term_id] = $category->name;
				}
			}
		}
		
		// Return options array
		return $options;
	}
	
	protected function render() {
		// Get input from the widget settings
		$settings = $this->get_settings_for_display();
		$awea_products_carousel_number = $settings['awea_products_carousel_number'];
		$awea_products_carousel_order = $settings['awea_products_carousel_order'];
		$awea_products_carousel_orderby = $settings['awea_products_carousel_orderby'];
		$awea_products_carousel_slide_number = $settings['awea_products_carousel_slide_number'];
		$awea_products_carousel_loop = $settings['awea_products_carousel_loop'];
		$awea_products_carousel_autoplay = $settings['awea_products_carousel_autoplay'];
		$awea_products_carousel_arrows = $settings['awea_products_carousel_arrows'];
		$awea_products_carousel_pause = $settings['awea_products_carousel_pause'];
		$awea_products_carousel_autoplay_speed = $settings['awea_products_carousel_autoplay_speed'];
		$awea_products_carousel_autoplay_animation = $settings['awea_products_carousel_autoplay_animation'];
	
		?>
	
		<div class="awea-products-carousel owl-carousel <?php echo $awea_products_carousel_arrows === 'yes' ? 'awea-carousel-top-arrows' : ''; ?> <?php echo $awea_products_carousel_section_heading_show === 'yes' ? 'heading-top' : ''; ?>"  awea-products-scroll="<?php echo esc_attr( $awea_products_carousel_slide_number ); ?>" awea-products-loop= "<?php echo esc_attr( $awea_products_carousel_loop ); ?>" awea-products-autoplay="<?php echo esc_attr( $awea_products_carousel_autoplay ); ?>" awea-products-pause="<?php echo esc_attr( $awea_products_carousel_pause ); ?>" awea-products-arrows="<?php echo esc_attr( $awea_products_carousel_arrows ); ?>" awea-products-animation="<?php echo esc_attr( $awea_products_carousel_autoplay_animation ); ?>" awea-products-speed="<?php echo esc_attr( $awea_products_carousel_autoplay_speed ); ?>">
		<?php
			// WP_Query arguments to retrieve products
			$args = array(
				'posts_per_page' => $awea_products_carousel_number,
				'post_type' => 'product',
				'order' => $awea_products_carousel_order,
				'orderby' => $awea_products_carousel_orderby,
			);
	
			// WP_Query
			$query = new \WP_Query($args);
	
			if(class_exists( 'woocommerce' )) {
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post();
					$product = wc_get_product(get_the_ID());
					$sale = get_post_meta( get_the_ID(), '_sale_price', true);
		?>
					<div class="awea-single-product">
						<?php 
							// Display Sale label if the product is on sale
							if($sale) {
						?>
							<span class="awea-sale"><?php echo esc_html('Sale', 'awesome-widgets-elementor'); ?></span>
						<?php } ?>
						<div class="awea-product-img" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url());?>')"></div>
						<h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></h4>
						<div class="awea-price-bottom">
							<p><?php echo wp_kses_post(wc_price($product->get_price())); ?></p>
							<a href="<?php echo esc_url($product->add_to_cart_url());?>" class="awea-icon-border">Cart</a>
						</div>
					</div>
			<?php 
					endwhile;
				}
			}
			wp_reset_postdata();
		?>
		</div>
		<?php
	}	
}