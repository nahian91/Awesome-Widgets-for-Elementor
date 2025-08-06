<?php
/**
 * Awesome Price Widget.
 *
 * Elementor widget that inserts a price into the page
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
class Widget_Awesome_Price extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve price widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-price';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve price widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Price', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve price widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
		return [ 'price', 'table', 'awesome'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// Start of the price Content Tab Section
	   	$this->start_controls_section(
	       'awea_price_box_header',
		    [
		        'label' => esc_html__('Header', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Price Title
		$this->add_control(
			'awea_price_box_title',
			[
				'label' => esc_html__( 'Price Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Standard', 'awesome-widgets-elementor' ),
			]
		);

		// Price Title
		$this->add_control(
			'awea_price_box_desc',
			[
				'label' => esc_html__( 'Price Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet.', 'awesome-widgets-elementor' ),
			]
		);

		$this->end_controls_section();

		// Start of the price Content Tab Section
		$this->start_controls_section(
			'awea_price_box_amount_content',
			 [
				 'label' => esc_html__('Amount', 'awesome-widgets-elementor'),
				 'tab'   => Controls_Manager::TAB_CONTENT		   
			 ]
		 );

		// Price Currency
		$this->add_control(
			'awea_price_box_amount_currency',
			[
				'label' => esc_html__( 'Price Currency', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '$', 'awesome-widgets-elementor' ),
			]
		);

		// Price Amount
		$this->add_control(
			'awea_price_box_amount',
			[
				'label' => esc_html__( 'Price Amount', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '25', 'awesome-widgets-elementor' ),
			]
		);

		// Price Plan
		$this->add_control(
			'awea_price_box_amount_plan',
			[
				'label' => esc_html__( 'Price Plan', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Month', 'awesome-widgets-elementor' ),
			]
		);

		$this->end_controls_section();

		// Start of the price Content Tab Section
		$this->start_controls_section(
			'awea_price_box_features',
			 [
				 'label' => esc_html__('Features', 'awesome-widgets-elementor'),
				 'tab'   => Controls_Manager::TAB_CONTENT		   
			 ]
		 );

		$repeater = new Repeater();

// Icon Control (Font Awesome)
$repeater->add_control(
	'awea_price_box_icon',
	[
		'label' => esc_html__( 'Icon', 'awesome-widgets-elementor' ),
		'type' => Controls_Manager::ICONS,
		'label_block' => true,
		'default' => [
			'value' => 'fas fa-check-circle',
			'library' => 'fa-solid',
		],
	]
);

// Text Control
$repeater->add_control(
	'awea_price_box_features',
	[
		'label' => esc_html__( 'Features Title', 'awesome-widgets-elementor' ),
		'type' => Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__( 'Add New Feature' , 'awesome-widgets-elementor' ),
	]
);

// Add repeater to widget
$this->add_control(
	'awea_price_box_features_list',
	[
		'label' => esc_html__( 'Features List', 'awesome-widgets-elementor' ),
		'type' => Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
	[
		'awea_price_box_icon' => [
			'value' => 'fas fa-check-circle',
			'library' => 'fa-solid',
		],
		'awea_price_box_features' => esc_html__( 'Responsive Web Design', 'awesome-widgets-elementor' ),
	],
	[
		'awea_price_box_icon' => [
			'value' => 'fas fa-check-circle',
			'library' => 'fa-solid',
		],
		'awea_price_box_features' => esc_html__( 'SEO Optimization', 'awesome-widgets-elementor' ),
	],
	[
		'awea_price_box_icon' => [
			'value' => 'fas fa-check-circle',
			'library' => 'fa-solid',
		],
		'awea_price_box_features' => esc_html__( 'Cloud Hosting Setup', 'awesome-widgets-elementor' ),
	],
	[
		'awea_price_box_icon' => [
			'value' => 'fas fa-check-circle',
			'library' => 'fa-solid',
		],
		'awea_price_box_features' => esc_html__( 'E-commerce Integration', 'awesome-widgets-elementor' ),
	],
	[
		'awea_price_box_icon' => [
			'value' => 'fas fa-check-circle',
			'library' => 'fa-solid',
		],
		'awea_price_box_features' => esc_html__( 'Security & SSL Setup', 'awesome-widgets-elementor' ),
	],
],
		'title_field' => '{{{ awea_price_box_features }}}',
	]
);
$this->end_controls_section();

		// Start of the price Content Tab Section
		$this->start_controls_section(
			'awea_price_box_button',
			 [
				 'label' => esc_html__('Button', 'awesome-widgets-elementor'),
				 'tab'   => Controls_Manager::TAB_CONTENT		   
			 ]
		 );

		// Price Plan Button Text
		$this->add_control(
			'awea_price_box_button_text',
			[
				'label' => esc_html__( 'Button Text', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Purchase Now', 'awesome-widgets-elementor' ),
			]
		);

		// Price Plan Button Link
		$this->add_control(
			'awea_price_box_button_link',
			[
				'label' => __( 'Button Link', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
					'url' => 'http://devnahian.com'
				],
			]
		);

		// Price Alignment
		$this->add_control(
			'awea_price_alignment',
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
					'{{WRAPPER}} .awea-price' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		// End of the price Content Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_price_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-elementor-widgets'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_price_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Awesome Widgets for Elementor Premium is coming soon with more widgets, features, and customization options.', 'awesome-elementor-widgets')
				)
			]  
		);
		$this->end_controls_section();
		
		// Price Layout
		$this->start_controls_section(
			'awea_price_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Background Color
		$this->add_control(
			'awea_price_background_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Price Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_price_border',
				'selector' => '{{WRAPPER}} .awea-price',
			]
		);	

		// Price Border Radius
		$this->add_control(
			'awea_price_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Price Padding
		$this->add_control(
			'awea_price_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Price Title Style
		$this->start_controls_section(
			'awea_price_heading_style',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_price_title_options',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Price Title Color
		$this->add_control(
			'awea_price_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_price_title_typography',
				'selector' => '{{WRAPPER}} .awea-price h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_price_desc_options',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Price Title Color
		$this->add_control(
			'awea_price_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_price_desc_typography',
				'selector' => '{{WRAPPER}} .awea-price p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Price Amount Style
		$this->start_controls_section(
			'awea_price_amount_style',
			[
				'label' => esc_html__( 'Amount', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Amount Background
		$this->add_control(
			'awea_price_amount_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-amount' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_price_amount_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-price-amount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_price_amount_margin',
			[
				'label' => esc_html__( 'Margin', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-price-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Price Amount Currency
		$this->add_control(
			'awea_price_amount_currency',
			[
				'label' => esc_html__( 'Currency', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Price Amount Color
		$this->add_control(
			'awea_price_currency_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-amount span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Amount Title
		$this->add_control(
			'awea_price_amount_price',
			[
				'label' => esc_html__( 'Price', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Price Amount Color
		$this->add_control(
			'awea_price_amount_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-amount' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Amount Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_price_amount_typography',
				'selector' => '{{WRAPPER}} .awea-price-amount',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Price Amount Suffix
		$this->add_control(
			'awea_price_amount_suffix',
			[
				'label' => esc_html__( 'Suffix', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Price Amount Color
		$this->add_control(
			'awea_price_amount_suffix_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-amount sub' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Amount Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_price_amount_suffix_typography',
				'selector' => '{{WRAPPER}} .awea-price-amount sub',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);
		
		$this->end_controls_section();

		// Price Features Style
		$this->start_controls_section(
			'awea_price_features_style',
			[
				'label' => esc_html__( 'Features', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Feature Color
		$this->add_control(
			'awea_price_feature_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-features ul li' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Feature Color
		$this->add_control(
			'awea_price_feature_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-features ul li i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Feature Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_price_feature_typography',
				'selector' => '{{WRAPPER}} .awea-price-features ul li',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Price Feature Border Color
		$this->add_control(
			'awea_price_feature_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-features ul li' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_price_feature__alignment',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elmentor' ),
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
					'{{WRAPPER}} .awea-price-features ul li' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_price_btn_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'awea_price_btn_style_tabs'
		);

		// Price Button Normal Tab
		$this->start_controls_tab(
			'awea_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_price_button_typography',
				'selector' => '{{WRAPPER}} .awea-price-btn a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Price Button Color
		$this->add_control(
			'awea_price_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-btn a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Button Border Color
		$this->add_control(
			'awea_price_btn_bg_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-btn a' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Price Border Radius
		$this->add_control(
			'awea_price_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-price-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Price Padding
		$this->add_control(
			'awea_price_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-price-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Price Button Hover Tab
		$this->start_controls_tab(
			'awea_price_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Price Button Hover Icon Color
		$this->add_control(
			'awea_price_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-btn a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Button Hover Background Color
		$this->add_control(
			'awea_price_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-price-btn a:hover' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section


	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$awea_price_box_title = $settings['awea_price_box_title'];
		$awea_price_box_desc = $settings['awea_price_box_desc'];
		$awea_price_box_amount_currency = $settings['awea_price_box_amount_currency'];
		$awea_price_box_amount = $settings['awea_price_box_amount'];
		$awea_price_box_amount_plan = $settings['awea_price_box_amount_plan'];
		$awea_price_box_features_list = $settings['awea_price_box_features_list'];
		$awea_price_box_button_text = $settings['awea_price_box_button_text'];
		$awea_price_box_button_link = $settings['awea_price_box_button_link']['url'];
       ?>
			<div class="awea-price">
				<div class="awea-price-header">
					<h4><?php echo $awea_price_box_title;?></h4>
					<p><?php echo $awea_price_box_desc;?></p>
				</div>
				<div class="awea-price-amount">
					<span><?php echo $awea_price_box_amount_currency;?></span><?php echo $awea_price_box_amount;?><sub>/<?php echo $awea_price_box_amount_plan;?></sub>
				</div>
				<div class="awea-price-features">
					<ul class="features">
						<?php 
							foreach($awea_price_box_features_list as $list) {
								?>
									<li><i class="<?php echo $list['awea_price_box_icon']['value'];?>"></i> <?php echo $list['awea_price_box_features']; ?></li>						
								<?php
							}
						?>						
					</ul>
				</div>
				<div class="awea-price-btn">
					<a href="<?php echo $awea_price_box_button_link;?>"><?php echo $awea_price_box_button_text;?></a>
				</div>
			</div>
       <?php
	}
}