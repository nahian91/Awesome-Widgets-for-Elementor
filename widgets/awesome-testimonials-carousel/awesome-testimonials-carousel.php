<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Testimonials_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve cta widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-testimonials-carousel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve cta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial Carousel', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'awea-icon eicon-testimonial-carousel';
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
		return [ 'awea', 'reviews', 'testimonials', 'carousel' ];
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
	       'testimonial_content',
		    [
		        'label' => esc_html__('Content', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Testimonial
		$repeater = new Repeater();

		$repeater->add_control(
			'awea_testimonial_image',
			[
				'label' => esc_html__( 'Client Image', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/client-1-web-bricks.webp',
				]
			]
		);

		// Testimonial Client Name
		$repeater->add_control(
			'awea_testimonial_name',
			[
				'label' => esc_html__( 'Client Name', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Esther Howard', 'awesome-widgets-elementor' ),
				'label_block' => true
			]
		);

		// Testimonial Client Designation
		$repeater->add_control(
			'awea_testimonial_desg',
			[
				'label' => esc_html__( 'Client Designation', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Businessman', 'awesome-widgets-elementor' ),
				'label_block' => true
			]
		);

		// Testimonial Client Speech
		$repeater->add_control(
			'awea_testimonial_speech',
			[
				'label' => esc_html__( 'Client Speech', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'awesome-widgets-elementor' ),
			]
		);

		// Testimonial Client Star
		$repeater->add_control(
			'awea_testimonial_rating',
			[
				'label' => esc_html__( 'Rating (Fraction)', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5,
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
			]
		);

		// Testimonial List
		$this->add_control(
			'awea_testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ awea_testimonial_name }}}',
				'separator' => 'before',
				'default' => [
					[
						'awea_testimonial_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/client-1-web-bricks.webp',
							]
						],
						'awea_testimonial_name' => esc_html__( 'Esther Howard', 'awesome-widgets-elementor' ),
						'awea_testimonial_desg' => esc_html__( 'Businessman', 'awesome-widgets-elementor' ),
						'awea_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'awesome-widgets-elementor' ),
						'awea_testimonial_rating' => esc_html__('5', 'awesome-widgets-elementor')
					],
					[
						'awea_testimonial_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/client-2-web-bricks.webp',
							]
						],
						'awea_testimonial_name' => esc_html__( 'Maria Sauks', 'awesome-widgets-elementor' ),
						'awea_testimonial_desg' => esc_html__( 'Web Developer', 'awesome-widgets-elementor' ),
						'awea_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'awesome-widgets-elementor' ),
						'awea_testimonial_rating' => esc_html__('5', 'awesome-widgets-elementor')
					],
					[
						'awea_testimonial_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/client-3-web-bricks.webp',
							]
						],
						'awea_testimonial_name' => esc_html__( 'Sarah Heinsed', 'awesome-widgets-elementor' ),
						'awea_testimonial_desg' => esc_html__( 'Blogger', 'awesome-widgets-elementor' ),
						'awea_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'awesome-widgets-elementor' ),
						'awea_testimonial_rating' => esc_html__('5', 'awesome-widgets-elementor')
					],
					[
						'awea_testimonial_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/client-4-web-bricks.webp',
							]
						],
						'awea_testimonial_name' => esc_html__( 'Mithc Hodge', 'awesome-widgets-elementor' ),
						'awea_testimonial_desg' => esc_html__( 'Photographer', 'awesome-widgets-elementor' ),
						'awea_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'awesome-widgets-elementor' ),
						'awea_testimonial_rating' => esc_html__('5', 'awesome-widgets-elementor')
					]
				]
			]
		);
		
		$this->end_controls_section();

		 // start of the Content tab section
		 $this->start_controls_section(
			'awea_testimonials_settings',
			[
				'label' => esc_html__('Settings', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		 );

		 // Dots
		$this->add_control(
			'awea_testimonials_dots',
			[
				'label' => esc_html__( 'Dots', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Loops
		$this->add_control(
			'awea_testimonials_loops',
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
			'awea_testimonials_autoplay',
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
			'awea_testimonials_pause',
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
			'awea_testimonials_autoplay_speed',
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
			'awea_testimonials_autoplay_animation',
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
			'awea_testimonials_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_testimonials_pro_message_notice', 
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
		
		// Testimonial Image
		$this->start_controls_section(
			'awea_testimonial_image_style',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_testimonial_image_border',
				'selector' => '{{WRAPPER}} .awea-testimonial-image',
			]
		);	

		// Testimonial Image Round
		$this->add_control(
			'awea_testimonial_image_round',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Testimonial Image Width
		$this->add_control(
			'awea_testimonial_image_width',
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
					'{{WRAPPER}} .awea-testimonial-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);		

		// Testimonial Image Height
		$this->add_control(
			'awea_testimonial_image_height',
			[
				'label' => esc_html__( 'Height', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-image' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);		

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Name
		$this->start_controls_section(
			'testimonial_name_style',
			[
				'label' => esc_html__( 'Name', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Name Color
		$this->add_control(
			'awea_testimonial_name_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-author-top .awea-author-name' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Testimonial Client Name Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .awea-author-top .awea-author-name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'awea_testimonial_name_tag',
			[
				'label' => __( 'Html Tag', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'awesome-widgets-elementor' ),
					'h2' => __( 'H2', 'awesome-widgets-elementor' ),
					'h3' => __( 'H3', 'awesome-widgets-elementor' ),
					'h4' => __( 'H4', 'awesome-widgets-elementor' ),
					'h5' => __( 'H5', 'awesome-widgets-elementor' ),
					'h6' => __( 'H6', 'awesome-widgets-elementor' ),
					'p' => __( 'P', 'awesome-widgets-elementor' ),
					'span' => __( 'Span', 'awesome-widgets-elementor' ),
					'div' => __( 'Div', 'awesome-widgets-elementor' ),
				],
				'default' => 'h4',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Designation
		$this->start_controls_section(
			'awea_testimonial_desg_style',
			[
				'label' => esc_html__( 'Desingnation', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Designation Color
		$this->add_control(
			'awea_testimonial_desg_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-author-top .awea-author-name span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testimonial Client Designation Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_testimonial_desg_typography',
				'selector' => '{{WRAPPER}} .awea-author-top .awea-author-name span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Speech Style
		$this->start_controls_section(
			'awea_testimonial_speech_style',
			[
				'label' => esc_html__( 'Speech', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Speech Color
		$this->add_control(
			'awea_testimonial_speech_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-author-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Testimonial Client Speech Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_testimonial_speech_typography',
				'selector' => '{{WRAPPER}} .awea-author-content p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Ratings
		$this->start_controls_section(
			'awea_testimonial_ratings_style',
			[
				'label' => esc_html__( 'Ratings', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Rating Star Color
		$this->add_control(
			'awea_testimonial_rating_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-author-rating p i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Testimonial Client Rating Title Color
		$this->add_control(
			'awea_testimonial_rating_color',
			[
				'label' => esc_html__( 'Rating Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-author-rating span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testimonial Client Rating Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_testimonial_rating_typography',
				'selector' => '{{WRAPPER}} .awea-author-rating span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Testimonial Dots
		$this->start_controls_section(
			'awea_testimonial_dots_style',
			[
				'label' => esc_html__( 'Dots', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Dots Color
		$this->add_control(
			'awea_testimonial_dots_color',
			[
				'label' => esc_html__( 'Inactive Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonials .owl-dots button' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Testimonial Dots Active Color
		$this->add_control(
			'awea_testimonial_dots_active_color',
			[
				'label' => esc_html__( 'Active Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonials .owl-dots button.active' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// Testimonial Arrows
		$this->start_controls_section(
			'awea_testimonial_arrows_style',
			[
				'label' => esc_html__( 'Arrows', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'awea_testimonials_arrows_style_tabs'
		);

		// Testtimonial Button Normal Tab
		$this->start_controls_tab(
			'awea_testimonials_arrows_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Testtimonial Button Normal Icon Color
		$this->add_control(
			'awea_testimonials_arrows_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-arrow svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testtimonial Button Normal Border Color
		$this->add_control(
			'awea_testimonials_arrows_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-arrow' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Testtimonial Button Normal Border Round
		$this->add_control(
			'awea_testimonials_arrows_border_round',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Testtimonial Link Hover Tab
		$this->start_controls_tab(
			'awea_testimonials_arrows_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Testtimonial Button Hover Color
		$this->add_control(
			'awea_testimonials_arrows_hover_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-arrow:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testtimonial Button Hover Border Color
		$this->add_control(
			'awea_testimonials_arrows_hover_icon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-arrow:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testtimonial Button Hover Background
		$this->add_control(
			'awea_testimonials_arrows_hover_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-testimonial-arrow:after' => 'background-color: {{VALUE}}',
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
	
	 protected function render() {
		// Get widget settings
		$settings = $this->get_settings_for_display();        
	
		// Sanitize and escape settings values before using them
		$awea_testimonials = isset($settings['awea_testimonials']) ? $settings['awea_testimonials'] : [];
		$awea_testimonials_dots = isset($settings['awea_testimonials_dots']) ? $settings['awea_testimonials_dots'] : '';
		$awea_testimonials_loops = isset($settings['awea_testimonials_loops']) ? $settings['awea_testimonials_loops'] : '';
		$awea_testimonials_autoplay = isset($settings['awea_testimonials_autoplay']) ? $settings['awea_testimonials_autoplay'] : '';
		$awea_testimonials_pause = isset($settings['awea_testimonials_pause']) ? $settings['awea_testimonials_pause'] : '';
		$awea_testimonials_autoplay_speed = isset($settings['awea_testimonials_autoplay_speed']) ? $settings['awea_testimonials_autoplay_speed'] : '';
		$awea_testimonials_autoplay_animation = isset($settings['awea_testimonials_autoplay_animation']) ? $settings['awea_testimonials_autoplay_animation'] : '';
		$awea_testimonial_name_tag = isset($settings['awea_testimonial_name_tag']) ? $settings['awea_testimonial_name_tag'] : 'h3';
	
		?>
		<!-- Testimonials Start Here -->
		<div class="awea-testimonials owl-carousel" 
			awea-testimonial-dots="<?php echo esc_attr($awea_testimonials_dots); ?>" 
			awea-testimonial-loops="<?php echo esc_attr($awea_testimonials_loops); ?>" 
			awea-testimonial-autoplay="<?php echo esc_attr($awea_testimonials_autoplay); ?>" 
			awea-testimonial-pause="<?php echo esc_attr($awea_testimonials_pause); ?>" 
			awea-testimonial-animation="<?php echo esc_attr($awea_testimonials_autoplay_animation); ?>" 
			awea-testimonial-speed="<?php echo esc_attr($awea_testimonials_autoplay_speed); ?>">
	
			<?php
			// Loop through testimonials if available
			if (!empty($awea_testimonials)) {
				foreach ($awea_testimonials as $testimonial) {
					// Sanitize each testimonial field
					$testimonial_image_url = isset($testimonial['awea_testimonial_image']['url']) ? esc_url($testimonial['awea_testimonial_image']['url']) : '';
					$testimonial_name = isset($testimonial['awea_testimonial_name']) ? esc_html($testimonial['awea_testimonial_name']) : '';
					$testimonial_desg = isset($testimonial['awea_testimonial_desg']) ? esc_html($testimonial['awea_testimonial_desg']) : '';
					$testimonial_speech = isset($testimonial['awea_testimonial_speech']) ? wp_kses_post($testimonial['awea_testimonial_speech']) : '';
					$testimonial_rating = isset($testimonial['awea_testimonial_rating']) ? floatval($testimonial['awea_testimonial_rating']) : 0;
					?>
	
					<div class="awea-single-testimonial">
						<?php if (!empty($testimonial_image_url)) : ?>
							<div class="awea-testimonial-image" style="background-image: url('<?php echo esc_url($testimonial_image_url); ?>');"></div>
						<?php endif; ?>
	
						<div class="awea-author-info">
							<div class="awea-author-top">
								<<?php echo esc_attr($awea_testimonial_name_tag); ?> class="awea-author-name">
									<?php echo esc_html($testimonial_name); ?> 
									<span><?php echo esc_html($testimonial_desg); ?></span>
								</<?php echo esc_attr($awea_testimonial_name_tag); ?>>
	
								<div class="awea-author-rating">
									<p>
										<?php
										// Generate stars based on rating
										$full_stars = floor($testimonial_rating);
										$half_star = $testimonial_rating - $full_stars;
	
										// Display full, half, and empty stars
										for ($i = 1; $i <= 5; $i++) {
											if ($i <= $full_stars) {
												echo '<i aria-hidden="true" class="fas fa-star"></i>';
											} elseif ($i == ceil($testimonial_rating) && $half_star > 0) {
												echo '<i aria-hidden="true" class="fas fa-star-half-alt"></i>';
											} else {
												echo '<i aria-hidden="true" class="far fa-star"></i>';
											}
										}
										?>
										<span><?php echo esc_html($testimonial_rating); ?> / 5</span>
									</p>
								</div>
							</div>
	
							<div class="awea-author-content">
								<p><?php echo esc_html($testimonial_speech); ?></p>
							</div>
						</div>
					</div>
	
					<?php
				}
			}
			?>
		</div>
		<!-- Testimonials End Here -->
		<?php
	}	
}