<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Product_Category_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve about widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	*/
	public function get_name() {
		return 'awesome-product-category-carousel';
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
		return esc_html__( 'Products Category Carousel', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve about widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'awea-icon eicon-nested-carousel';
	}	

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the about widget belongs to.
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
		return [ 'category', 'products', 'carousel', 'awea'];
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
			'awea_product_categories_carousel_contents',
			[
				'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Product Categories
		$this->add_control(
			'awea_product_categories_carousel',
			[
				'label' => esc_html__('Select Category', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_all_product_categories(),
				'label_block' => true,
				'multiple' => true, // Set to true for multiple selections
			]
		);
 
		 // Show Product Category Count
		 $this->add_control(
			'awea_product_categories_carousel_count',
			[
				'label' => esc_html__( 'Show Products Count', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'Hide', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
 
		 // Show Product Category Button
		 $this->add_control(
			'awea_product_categories_carousel_btn_show',
			[
				'label' => esc_html__( 'Show Button', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'Hide', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
 
		// Product Category Alignment
		$this->add_control(
			'awea_product_categories_carousel_alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elementor' ),
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .product-category-content' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);
		
		$this->end_controls_section();
		// end of the Products Category Carousel Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_product_category_carousel_settings',
			[
				'label' => esc_html__('Settings', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// Product Category Carousel Number
		$this->add_control(
			'awea_product_category_carousel_number',
			[
				'label' 		=> __('Number of Product Category', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Product Category Carousel Arrows
		$this->add_control(
			'awea_product_category_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Loops
		$this->add_control(
			'awea_product_category_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Pause
		$this->add_control(
			'awea_product_category_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Autoplay
		$this->add_control(
			'awea_product_category_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Autoplay Speed
		$this->add_control(
			'awea_product_category_carousel_autoplay_speed',
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

		// Product Category Carousel Animation Speed
		$this->add_control(
			'awea_product_category_carousel_autoplay_animation',
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
			'awea_products_category_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_products_category_carousel_pro_message_notice', 
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
		
		// Product Category Section Heading Style
		$this->start_controls_section(
			'awea_product_category_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_product_category_product_category_show' => 'yes',
					'awea_product_category_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'awea_product_category_separator_options',
			[
				'label' => esc_html__( 'Bullet', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Product Category Section Heading Separator Style
		$this->add_control(
			'awea_product_category_separator_variation',
			[
				'label' => __( 'Style', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'awesome-widgets-elementor' ),
					'round' => __( 'Round', 'awesome-widgets-elementor' ),
					'square' => __( 'Square', 'awesome-widgets-elementor' ),
					'circle' => __( 'Circle', 'awesome-widgets-elementor' ),
					'custom' => __( 'Custom', 'awesome-widgets-elementor' ),
					'none' => __( 'None', 'awesome-widgets-elementor' ),
				],
				'default' => 'default',
			]
		);

		// Product Category Section Bullet Color
		$this->add_control(
			'awea_product_category_section_sep_bg',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title span:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Product Category Section Bullet Round
		$this->add_control(
			'awea_product_category_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'awea_product_category_separator_variation' => 'custom', 
				],
			]
		);

		$this->add_control(
			'awea_product_category_section_subheading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Product Category Section Sub Heading Color
		$this->add_control(
			'awea_product_category_section_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_category_section_subheading_typography',
				'selector' => '{{WRAPPER}} .awea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Product Category Section Heading Options
		$this->start_controls_section(
			'awea_product_category_product_category_style',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_product_category_product_category_show' => 'yes'
				],
			]
		);

		// Product Category Section Heading Color
		$this->add_control(
			'awea_section_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title .awea-section-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Product Category Section Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_section_title_typography',
				'selector' => '{{WRAPPER}} .awea-section-title .awea-section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Product Category Section Description Options
		$this->start_controls_section(
			'awea_product_category_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_product_category_product_category_show' => 'yes',
					'awea_product_category_section_desc_show' => 'yes'
				],
			]
		);

		// Product Category Section Description Color
		$this->add_control(
			'awea_section_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Section Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_section_desc_typography',
				'selector' => '{{WRAPPER}} .awea-section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_product_categories_carousel_layouts_section',
			[
				'label' => esc_html__( 'Layouts', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Category Border Radius
		$this->add_control(
			'awea_product_categories_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-product-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Product Category Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_product_categories_carousel_border',
				'selector' => '{{WRAPPER}} .awea-product-category',
			]
		);	

		// Product Category Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'awea_product_categories_bg',
				'types' => [ 'gradient'],
				'selector' => '{{WRAPPER}} .awea-product-category::before',
			]
		);	

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_product_category_carousel_title_section',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Category Title Color
		$this->add_control(
			'awea_product_category_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-content h4 a' => 'color: {{VALUE}}',
				],
			]
		);

		// Product Category Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_category_carousel_title_typography',
				'selector' => '{{WRAPPER}} .awea-product-category-content h4 a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_affiliate_title_section',
			[
				'label' => esc_html__( 'Count', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_product_categories_carousel_count' => 'yes'
				],
			]
		);

		// Product Category Title Color
		$this->add_control(
			'awea_product_categories_count_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-content span' => 'color: {{VALUE}}',
				],
			]
		);

		// Product Category Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_categories_count_typography',
				'selector' => '{{WRAPPER}} .awea-product-category-content span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// Product Category Carousel Box Button Style
		$this->start_controls_section(
			'awea_product_category_carousel_btn_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_product_categories_carousel_btn_show' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'awea_product_category_carousel_btn_style_tabs'
		);

		// Product Category Carousel Box Button Normal Tab
		$this->start_controls_tab(
			'awea_product_category_carousel_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Product Category Button Color
		$this->add_control(
			'awea_product_categories_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-icon svg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Border Color
		$this->add_control(
			'awea_product_categories_carousel_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-icon' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tab();

		// Product Category Carousel Box Button Hover Tab
		$this->start_controls_tab(
			'awea_product_category_carousel_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Product Category Button Hover Color
		$this->add_control(
			'awea_product_categories_carousel_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-icon:hover svg' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Hover Border Color
		$this->add_control(
			'awea_product_categories_carousel_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-icon:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Hover BG Color
		$this->add_control(
			'awea_product_categories_carousel_btn_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-icon:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Product Category Arrow Style
		$this->start_controls_section(
			'awea_products_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'awea_product_category_arrow_style_tabs'
		);

		// Product Category Arrow Normal Tab
		$this->start_controls_tab(
			'awea_product_category_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Product Category Arrow Color
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

		// Product Category Arrow Border Color
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

		// Product Category Background Color
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

		// Product Category Padding
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

		// Product Category Round
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

		// Product Category Arrow Hover Tab
		$this->start_controls_tab(
			'awea_product_category_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Product Category Arrow Hover Icon Color
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
			'awea_products_carousel_arrow_hover_border_color',
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

		// Product Category Arrow Round
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

	/**
 * Get all product categories for the select field options
 */
private function get_all_product_categories() {
    $product_categories = get_terms('product_cat');
    $options = [];

    if ($product_categories && !is_wp_error($product_categories)) {
        foreach ($product_categories as $category) {
            $options[$category->term_id] = $category->name;
        }
    }
    return $options;
}

protected function render() {
    // Get the widget settings
    $settings = $this->get_settings_for_display();
    $awea_product_categories_carousel = $settings['awea_product_categories_carousel'];
    $awea_product_categories_carousel_count = $settings['awea_product_categories_carousel_count'];
    $awea_product_categories_carousel_btn_show = $settings['awea_product_categories_carousel_btn_show'];
    $awea_product_category_carousel_items = $settings['awea_product_category_carousel_number'];
    $awea_product_category_carousel_arrows = $settings['awea_product_category_carousel_arrows'];
    $awea_product_category_carousel_loops = $settings['awea_product_category_carousel_loop'];
    $awea_product_category_carousel_pause = $settings['awea_product_category_carousel_pause'];
    $awea_product_category_carousel_autoplay = $settings['awea_product_category_carousel_autoplay'];
    $awea_product_category_carousel_autoplay_speed = $settings['awea_product_category_carousel_autoplay_speed'];
    $awea_product_category_carousel_autoplay_animation = $settings['awea_product_category_carousel_autoplay_animation'];
    
    ?>
   
    <div class="awea-product-category-carousel owl-carousel <?php echo $awea_product_category_carousel_arrows === 'yes' ? 'awea-carousel-top-arrows' : ''; ?> <?php echo $awea_product_category_product_category_show === 'yes' ? 'heading-top' : ''; ?>" 
	awea-product-category-carousel-items="<?php echo esc_attr( $awea_product_category_carousel_items ); ?>" 
	awea-product-category-carousel-arrows= "<?php echo esc_attr( $awea_product_category_carousel_arrows );?>" 
	awea-product-category-carousel-loops="<?php echo esc_attr( $awea_product_category_carousel_loops ); ?>" 
	awea-product-category-carousel-pause="<?php echo esc_attr( $awea_product_category_carousel_pause ); ?>" 
	awea-product-category-carousel-autoplay="<?php echo esc_attr( $awea_product_category_carousel_autoplay ); ?>" 
	awea-product-category-carousel-autoplay-speed="<?php echo esc_attr( $awea_product_category_carousel_autoplay_speed ); ?>" 
	awea-product-category-carousel-autoplay-animation="<?php echo esc_attr( $awea_product_category_carousel_autoplay_animation ); ?>">
        
        <?php
        // $selected_category_ids
        $selected_category_ids = $awea_product_categories_carousel;
        // Loop through each selected category ID
        if($selected_category_ids) {
            foreach ($selected_category_ids as $selected_category_id) {
                // Get the category object by ID
                $category = get_term($selected_category_id, 'product_cat');
                // Check if the category object exists and is not an error
                if ($category && !is_wp_error($category)) {			
                    // Display category image if available
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_image_src($thumbnail_id, 'medium');
                    ?>
                    <div class="awea-product-category">
                        <?php 
                        if($image) {
                            ?>
                            <div class="awea-product-category-img" style="background-image:url('<?php echo esc_url($image[0]); ?>')"></div>
                        <?php
                        } else {
                            ?>
                            <svg class="awea-fallback-svg" viewBox="0 0 370 300" preserveAspectRatio="none">
                                <rect width="370" height="300" style="fill:#f2f2f2;"></rect>
                            </svg>
                        <?php 
                        }
                        ?>
                        <?php 
                        if($awea_product_categories_carousel_btn_show === 'yes') {
                            ?>
                            <div class="awea-product-category-icon">
                                <a href="<?php echo esc_url(get_term_link($category));?>">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.33337 9.33329V6.66663C9.33337 4.45749 11.1242 2.66663 13.3334 2.66663C14.3579 2.66663 15.2923 3.05177 16 3.68516C16.7078 3.05176 17.6423 2.66663 18.6667 2.66663C20.8759 2.66663 22.6667 4.45749 22.6667 6.66663V9.33329H24.6667C25.7712 9.33329 26.6667 10.2287 26.6667 11.3333V24.6733C26.6667 27.2469 24.5803 29.3333 22.0067 29.3333H10.6667C7.72119 29.3333 5.33337 26.9454 5.33337 24V11.3333C5.33337 10.2287 6.2288 9.33329 7.33337 9.33329H9.33337ZM18.18 27.3333C17.6547 26.579 17.3467 25.6621 17.3467 24.6733V11.3333H7.33337V24C7.33337 25.8409 8.82576 27.3333 10.6667 27.3333H18.18ZM15.3334 9.33329V6.66663C15.3334 5.56205 14.4379 4.66663 13.3334 4.66663C12.2288 4.66663 11.3334 5.56205 11.3334 6.66663V9.33329H15.3334ZM17.3334 9.33329H20.6667V6.66663C20.6667 5.56205 19.7712 4.66663 18.6667 4.66663C18.0467 4.66663 17.4927 4.94871 17.1259 5.39153C17.2604 5.792 17.3334 6.2208 17.3334 6.66663V9.33329ZM19.3467 24.6733C19.3467 26.1424 20.5376 27.3333 22.0067 27.3333C23.4758 27.3333 24.6667 26.1424 24.6667 24.6733V11.3333H19.3467V24.6733Z" fill="currentColor"/>
                                    </svg> 
                                </a>
                            </div>
                        <?php } ?>
                        <div class="awea-product-category-content">
                            <h4>
                                <a href="<?php echo esc_url(get_term_link($category));?>">
                                    <?php echo esc_html($category->name);?>
                                </a>
                            </h4>
                            <?php 
                            if($awea_product_categories_carousel_count === 'yes') {
                                ?>
                                <span><?php echo esc_html($category->count);?> <?php echo esc_html(' Products', 'awesome-widgets-elementor');?></span>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>

    <?php
}
}