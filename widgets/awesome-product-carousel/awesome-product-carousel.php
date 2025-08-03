<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Awesome_Product_Carousel extends Widget_Base {

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
		return esc_html__( 'Products Carousel', 'webbricks-addons' );
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
		return 'wb-icon eicon-carousel-loop';
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
		return [ 'products', 'carousel', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Products Carousel Section Heading Layout
		$this->start_controls_section(
			'wbea_products_carousel_section_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Products Carousel Section Heading Show
		$this->add_control(
			'wbea_products_carousel_section_heading_show',
			[
				'label' => esc_html__( 'Show Section Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		// Products Carousel Section Sub Heading Box
		$this->start_controls_section(
			'wbea_products_carousel_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_products_carousel_section_heading_show' => 'yes'
				],
			]
		);

		// Products Carousel Section Sub Heading Show?
		$this->add_control(
			'wbea_products_carousel_section_subheading_show',
			[
				'label' => esc_html__( 'Show Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		// Products Carousel Sub Heading
		$this->add_control(
		    'wbea_products_carousel_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Products Carousel', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_products_carousel_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Section Heading Box
		$this->start_controls_section(
			'wbea_products_carousel_section_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_products_carousel_section_heading_show' => 'yes'
				],
			]
		);
		
		// Products Carousel Section Heading
		$this->add_control(
		    'wbea_products_carousel_section_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Are Your One Door To Solve It All', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_products_carousel_section_heading_tag',
			[
				'label' => __( 'Html Tag', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'webbricks-addons' ),
					'h2' => __( 'H2', 'webbricks-addons' ),
					'h3' => __( 'H3', 'webbricks-addons' ),
					'h4' => __( 'H4', 'webbricks-addons' ),
					'h5' => __( 'H5', 'webbricks-addons' ),
					'h6' => __( 'H6', 'webbricks-addons' ),
					'p' => __( 'P', 'webbricks-addons' ),
					'span' => __( 'Span', 'webbricks-addons' ),
					'div' => __( 'Div', 'webbricks-addons' ),
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();

		// Products Carousel Section Description
		$this->start_controls_section(
			'wbea_products_carousel_section_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_products_carousel_section_heading_show' => 'yes'
				],
			]
		);

		// Products Carousel Section Heading Description Show?
		$this->add_control(
			'wbea_products_carousel_section_desc_show',
			[
				'label' => esc_html__( 'Show Description', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Products Carousel Section Heading Description
		$this->add_control(
		    'wbea_products_carousel_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => __('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_products_carousel_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_products_carousel_content',
			[
				'label' => esc_html__('Products Carousel', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		 // Products Number
		$this->add_responsive_control(
			'wbea_products_carousel_number',
			[
				'label' 		=> __('Number of Products', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Products Category
		// $this->add_control(
		// 	'wbea_products_carousel_category',
		// 	[
		// 		'label' => __('Product Category', 'webbricks-addons'),
		// 		'type' => Controls_Manager::SELECT2,
		// 		'options' => $this->get_product_categories(),
		// 		'multiple' => true,
		// 	]
		// );

		// Products Order
		$this->add_control(
			'wbea_products_carousel_order',
			[
				'label' 		=> __('Order', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'webbricks-addons'),
					'DESC' 		=> __('DESCENDING', 'webbricks-addons'),
					'ASC' 		=> __('ASCENDING', 'webbricks-addons'),
				],
			]
		);

		// Products Orderby
		$this->add_control(
			'wbea_products_carousel_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					''               => __('Default', 'webbricks-addons'),
					'date'           => __('Date', 'webbricks-addons'),
					'title'          => __('Title', 'webbricks-addons'),
					'name'           => __('Name', 'webbricks-addons'),
					'rand'           => __('Random', 'webbricks-addons'),
					'comment_count'  => __('Comment Count', 'webbricks-addons'),
					'menu_order'     => __('Menu Order', 'webbricks-addons'),
					'best_selling'   => __('Best Selling', 'webbricks-addons'),
					'on_sale'        => __('On Sale', 'webbricks-addons'),
					'latest_products' => __('Latest Products', 'webbricks-addons'),
				],
			]
		);
		 
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_products_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Number
		$this->add_control(
			'wbea_products_carousel_slide_number',
			[
                'label'     => esc_html__( 'No. of items per slide', 'webbricks-addons' ),
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
			'wbea_products_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Loops
		$this->add_control(
			'wbea_products_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Autoplay
		$this->add_control(
			'wbea_products_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Pause
		$this->add_control(
			'wbea_products_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Autoplay Speed
		$this->add_control(
			'wbea_products_carousel_autoplay_speed',
			[
				'label' => esc_html__( 'Speed', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks-addons' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks-addons' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks-addons' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks-addons' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks-addons' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks-addons' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks-addons' ),
				],
			]
		);

		// Animation Speed
		$this->add_control(
			'wbea_products_carousel_autoplay_animation',
			[
				'label' => esc_html__( 'Timeout', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks-addons' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks-addons' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks-addons' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks-addons' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks-addons' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks-addons' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks-addons' ),
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_products_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_products_carousel_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Web Bricks Premium is coming soon with more widgets, features, and customization options.', 'webbricks-addons')
				)
			]  
		);
		$this->end_controls_section();

		// Service Section Heading Style
		$this->start_controls_section(
			'wbea_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_products_carousel_section_heading_show' => 'yes',
					'wbea_products_carousel_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'wbea_products_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Section Heading Separator Style
		$this->add_control(
			'wbea_section_heading_separator_variation',
			[
				'label' => __( 'Style', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'webbricks-addons' ),
					'round' => __( 'Round', 'webbricks-addons' ),
					'square' => __( 'Square', 'webbricks-addons' ),
					'circle' => __( 'Circle', 'webbricks-addons' ),
					'custom' => __( 'Custom', 'webbricks-addons' ),
					'none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'default',
			]
		);

		// Service Section Bullet Color
		$this->add_control(
			'wbea_product_carousel_sep_bg',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Service Section Bullet Round
		$this->add_control(
			'wbea_service_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wbea_product_carousel_sep_bg' => 'custom', 
				],
			]
		);

		$this->add_control(
			'wbea_pproducts_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Service Section Sub Heading Color
		$this->add_control(
			'wbea_service_section_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_service_section_subheading_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Heading Options
		$this->start_controls_section(
			'wbea_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_products_carousel_section_heading_show' => 'yes'
				],
			]
		);

		// Service Section Heading Color
		$this->add_control(
			'wbea_section_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title .wbea-section-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Service Section Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_section_title_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title .wbea-section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Description Options
		$this->start_controls_section(
			'wbea_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_products_carousel_section_heading_show' => 'yes',
					'wbea_products_carousel_section_desc_show' => 'yes'
				],
			]
		);

		// Service Section Description Color
		$this->add_control(
			'wbea_section_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Service Section Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_section_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Products Carousel Layout
		$this->start_controls_section(
			'wbea_products_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Background
		$this->add_control(
			'wbea_products_carousel_layout_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-product' => 'background-color: {{VALUE}}',
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
				'name' => 'wbea_products_carousel_layout_border',
				'selector' => '{{WRAPPER}} .wbea-single-product',
			]
		);	

		// Products Carousel Padding
		$this->add_control(
			'wbea_product_layout_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-single-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Carousel Border Radius
		$this->add_control(
			'wbea_products_carousel_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-single-product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Start of the Products Content Tab Section
		$this->start_controls_section(
			'wbea_products_image',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_STYLE		   
			]
		);

		// Products Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_product_image_border',
				'selector' => '{{WRAPPER}} .wbea-product-img',
			]
		);	

		// Products Image Border
		$this->add_control(
			'wbea_product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
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
					'{{WRAPPER}} .wbea-product-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Image Width
		$this->add_control(
			'wbea_products_image_width',
			[
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-product-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Title
		$this->start_controls_section(
			'wbea_products_carousel_title_style',
			[
				'label' => esc_html__( 'Product Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Title Color
		$this->add_control(
			'wp_products_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-product h4 a' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .wbea-single-product h4 a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Products Carousel Meta
		$this->start_controls_section(
			'wbea_products_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Meta Price
		$this->add_control(
			'wbea_products_carousel_meta_price_style',
			[
				'label' => esc_html__( 'Price', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Meta Price Color
		$this->add_control(
			'wp_products_carousel_meta_price_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-price-bottom p span' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .wbea-price-bottom p span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Sale
		$this->add_control(
			'wbea_products_carousel_meta_sale_style',
			[
				'label' => esc_html__( 'Sale', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Meta Sale Color
		$this->add_control(
			'wp_products_carousel_meta_price_sale_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-product span.wbea-sale' => 'color: {{VALUE}}',
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
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-product span.wbea-sale' => 'background-color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .wbea-single-product span.wbea-sale',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);
 
		// Products Carousel Meta Sale Border Radius
		$this->add_control(
			'wbea_products_carousel_meta_sale_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
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
					'{{WRAPPER}} .wbea-single-product span.wbea-sale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Button
		$this->start_controls_section(
			'wbea_products_carousel_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
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
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Products Carousel Button Color
		$this->add_control(
			'wp_products_carousel_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border svg path' => 'fill: {{VALUE}}',
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
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'border-color: {{VALUE}}',
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
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->end_controls_tab();

		// Products Carousel Button Hover Tab
		$this->start_controls_tab(
			'wp_products_carousel_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'wp_products_carousel_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover svg path' => 'fill: {{VALUE}}',
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
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover:after' => 'background-color: {{VALUE}}',
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
			'wbea_products_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
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
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Products Carousel Arrow Color
		$this->add_control(
			'wbea_products_carousel_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Arrow Border Color
		$this->add_control(
			'wbea_products_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Carousel Arrow Background Color
		$this->add_control(
			'wbea_products_carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Product Carousel Arrow Padding
		$this->add_control(
			'wbea_products_carousel_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Product Carousel Arrow Round
		$this->add_control(
			'wbea_products_carousel_arrow_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Products Carousel Arrow Hover Tab
		$this->start_controls_tab(
			'wp_service_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Products Carousel Arrow Hover Icon Color
		$this->add_control(
			'wbea_products_carousel_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Arrow Border Color
		$this->add_control(
			'wbea_product_carousel_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Arrow Round
		$this->add_control(
			'wbea_products_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:after' => 'background-color: {{VALUE}}',
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
		$wbea_products_carousel_section_heading_show = $settings['wbea_products_carousel_section_heading_show'];
		$wbea_products_carousel_number = $settings['wbea_products_carousel_number'];
		$wbea_products_carousel_order = $settings['wbea_products_carousel_order'];
		$wbea_products_carousel_orderby = $settings['wbea_products_carousel_orderby'];
		$wbea_products_carousel_slide_number = $settings['wbea_products_carousel_slide_number'];
		$wbea_products_carousel_loop = $settings['wbea_products_carousel_loop'];
		$wbea_products_carousel_autoplay = $settings['wbea_products_carousel_autoplay'];
		$wbea_products_carousel_arrows = $settings['wbea_products_carousel_arrows'];
		$wbea_products_carousel_pause = $settings['wbea_products_carousel_pause'];
		$wbea_products_carousel_autoplay_speed = $settings['wbea_products_carousel_autoplay_speed'];
		$wbea_products_carousel_autoplay_animation = $settings['wbea_products_carousel_autoplay_animation'];
	
		?>
		<?php if ($wbea_products_carousel_section_heading_show === 'yes') {
			$wbea_products_carousel_section_subheading_show = $settings['wbea_products_carousel_section_subheading_show'];
			$wbea_products_carousel_section_subheading = $settings['wbea_products_carousel_section_subheading'];
			$wbea_section_heading_separator_variation = $settings['wbea_section_heading_separator_variation'];
			$wbea_products_carousel_section_heading = $settings['wbea_products_carousel_section_heading'];
			$wbea_products_carousel_section_heading_tag = $settings['wbea_products_carousel_section_heading_tag'];
			$wbea_products_carousel_section_desc_show = $settings['wbea_products_carousel_section_desc_show'];
			$wbea_products_carousel_section_desc = $settings['wbea_products_carousel_section_desc'];
		?>
			<div class="wbea-section-title wbea-service-title">
				<?php if($wbea_products_carousel_section_subheading_show == 'yes') { ?>
					<span class="<?php echo esc_attr($wbea_section_heading_separator_variation); ?> wbea-section-subheading"><?php echo esc_html($wbea_products_carousel_section_subheading);?></span>
				<?php } ?>
				<<?php echo esc_attr($wbea_products_carousel_section_heading_tag); ?>  class="wbea-section-heading"><?php echo esc_html($wbea_products_carousel_section_heading);?></<?php echo esc_attr($wbea_products_carousel_section_heading_tag); ?>>
				
				<?php if($wbea_products_carousel_section_desc_show == 'yes'){ ?>
					<p><?php echo wp_kses_post($wbea_products_carousel_section_desc);?></p>
				<?php } ?>
			</div>
		<?php } ?>
	
		<div class="wbea-products-carousel owl-carousel <?php echo $wbea_products_carousel_arrows === 'yes' ? 'wbea-carousel-top-arrows' : ''; ?> <?php echo $wbea_products_carousel_section_heading_show === 'yes' ? 'heading-top' : ''; ?>"  wbea-products-scroll="<?php echo esc_attr( $wbea_products_carousel_slide_number ); ?>" wbea-products-loop= "<?php echo esc_attr( $wbea_products_carousel_loop ); ?>" wbea-products-autoplay="<?php echo esc_attr( $wbea_products_carousel_autoplay ); ?>" wbea-products-pause="<?php echo esc_attr( $wbea_products_carousel_pause ); ?>" wbea-products-arrows="<?php echo esc_attr( $wbea_products_carousel_arrows ); ?>" wbea-products-animation="<?php echo esc_attr( $wbea_products_carousel_autoplay_animation ); ?>" wbea-products-speed="<?php echo esc_attr( $wbea_products_carousel_autoplay_speed ); ?>">
		<?php
			// WP_Query arguments to retrieve products
			$args = array(
				'posts_per_page' => $wbea_products_carousel_number,
				'post_type' => 'product',
				'order' => $wbea_products_carousel_order,
				'orderby' => $wbea_products_carousel_orderby,
			);
	
			// WP_Query
			$query = new \WP_Query($args);
	
			if(class_exists( 'woocommerce' )) {
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post();
					$product = wc_get_product(get_the_ID());
					$sale = get_post_meta( get_the_ID(), '_sale_price', true);
		?>
					<div class="wbea-single-product">
						<?php 
							// Display Sale label if the product is on sale
							if($sale) {
						?>
							<span class="wbea-sale"><?php echo esc_html('Sale', 'webbricks-addons'); ?></span>
						<?php } ?>
						<div class="wbea-product-img" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url());?>')"></div>
						<h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></h4>
						<div class="wbea-price-bottom">
							<p><?php echo wp_kses_post(wc_price($product->get_price())); ?></p>
							<a href="<?php echo esc_url($product->add_to_cart_url());?>" class="wbea-icon-border">
							<svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M3.375 0.25C3.76172 0.25 4.11328 0.566406 4.18359 0.953125L4.25391 1.375H19.0195C19.7578 1.375 20.3203 2.11328 20.1094 2.81641L18.2109 9.56641C18.0703 10.0586 17.6484 10.375 17.1211 10.375H5.97656L6.29297 12.0625H17.1562C17.6133 12.0625 18 12.4492 18 12.9062C18 13.3984 17.6133 13.75 17.1562 13.75H5.58984C5.20312 13.75 4.85156 13.4688 4.78125 13.082L2.67188 1.9375H0.84375C0.351562 1.9375 0 1.58594 0 1.09375C0 0.636719 0.351562 0.25 0.84375 0.25H3.375ZM9.5625 6.57812H11.1094V8.125C11.1094 8.51172 11.3906 8.82812 11.8125 8.82812C12.1992 8.82812 12.5156 8.51172 12.5156 8.125V6.57812H14.0625C14.4492 6.57812 14.7656 6.26172 14.7656 5.875C14.7656 5.48828 14.4492 5.17188 14.0625 5.17188H12.5156V3.625C12.5156 3.23828 12.1992 2.92188 11.8125 2.92188C11.3906 2.92188 11.1094 3.23828 11.1094 3.625V5.17188H9.5625C9.14062 5.17188 8.85938 5.48828 8.85938 5.875C8.85938 6.26172 9.14062 6.57812 9.5625 6.57812ZM4.5 16.5625C4.5 15.6484 5.23828 14.875 6.1875 14.875C7.10156 14.875 7.875 15.6484 7.875 16.5625C7.875 17.5117 7.10156 18.25 6.1875 18.25C5.23828 18.25 4.5 17.5117 4.5 16.5625ZM18 16.5625C18 17.5117 17.2266 18.25 16.3125 18.25C15.3633 18.25 14.625 17.5117 14.625 16.5625C14.625 15.6484 15.3633 14.875 16.3125 14.875C17.2266 14.875 18 15.6484 18 16.5625Z" fill="#004851"/>
							</svg>

							</a>
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