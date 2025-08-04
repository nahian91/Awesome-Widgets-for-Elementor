<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Blog_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-blog-carousel';
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
		return esc_html__( 'Blog Carousel', 'awesome-widgets-elementor' );
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
		return 'wb-icon eicon-posts-carousel';
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
		return [ 'blog', 'carousel', 'wb', 'post' ];
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
			'awea_blog_carousel_contents',
			[
				'label' => esc_html__('Query', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// Blogs Number
		$this->add_control(
			'awea_blog_carousel_number',
			[
				'label' 		=> __('Number of Blogs', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);
 
		// Blog Order
		$this->add_control(
			'awea_blog_carousel_order',
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
 
		// Blog Orderby
		$this->add_control(
			'awea_blog_carousel_orderby',
			[
				'label' 		=> __('Order By', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'awesome-widgets-elementor'),
					'date' 			=> __('Date', 'awesome-widgets-elementor'),
					'title' 		=> __('Title', 'awesome-widgets-elementor'),
					'name' 			=> __('Name', 'awesome-widgets-elementor'),
					'modified' 		=> __('Modified', 'awesome-widgets-elementor'),
					'author' 		=> __('Author', 'awesome-widgets-elementor'),
					'rand' 			=> __('Random', 'awesome-widgets-elementor'),
					'ID' 			=> __('ID', 'awesome-widgets-elementor'),
					'comment_count' => __('Comment Count', 'awesome-widgets-elementor'),
					'menu_order' 	=> __('Menu Order', 'awesome-widgets-elementor'),
				],
			]
		);
 
		$args = array(
			'hide_empty' => false,
		);
		
		$categories = get_categories($args);

		if($categories) {
			foreach ( $categories as $key => $category ) {
				$options[$category->term_id] = $category->name;
			}
		}
 
		// Blog Categories
		$this->add_control(
			'awea_blog_carousel_include_categories',
			[
				'label' => __( 'Post Filter', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'awea_blog_carousel_option_section',
			[
				'label' => esc_html__('Meta Info', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Blog Category Show
		$this->add_control(
			'awea_blog_carousel_cat_visibility',
			[
				'label' 		=> __('Show Category', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		// Blog Date Show
		$this->add_control(
			'awea_blog_carousel_date_visibility',
			[
				'label' 		=> __('Show Date', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		// Blog Excerpt Show
		$this->add_control(
			'awea_blog_carousel_excerpt_visibility',
			[
				'label' 		=> __('Show Excerpt', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
		'awea_blog_carousel_settings',
			[
				'label' => esc_html__('Settings', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Number
		$this->add_control(
			'awea_blog_carousel_slide_number',
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

		// Blogs Carousel Arrows
		$this->add_control(
			'awea_blog_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Loops
		$this->add_control(
			'awea_blog_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Pause
		$this->add_control(
			'awea_blog_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay
		$this->add_control(
			'awea_blog_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay Speed
		$this->add_control(
			'awea_blog_carousel_autoplay_speed',
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

		// Blogs Carousel Animation Speed
		$this->add_control(
			'awea_blog_carousel_autoplay_animation',
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
			'awea_blog_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_blog_carousel_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Web Bricks Premium is coming soon with more widgets, features, and customization options.', 'awesome-widgets-elementor')
				)
			]  
		);
		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Blog Background
		$this->add_control(
			'awea_blog_carousel_bg_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-blog-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'awea_blog_carousel_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'awea_blog_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Meta Color
		$this->add_control(
			'awea_blog_carousel_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-blog-carousel-meta, .awea-blog-carousel-meta a' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Meta Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_blog_carousel_meta_typography',
				'selector' => '{{WRAPPER}} .awea-blog-carousel-meta, .awea-blog-carousel-meta a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_carousel_title_style',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'awea_blog_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-blog-title .awea-blog-post-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);
		
		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_blog_carousel_title_typography',
				'selector' => '{{WRAPPER}} .awea-blog-title .awea-blog-post-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'awea_blog_carousel_title_tag',
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_carousel_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_blog_carousel_excerpt_visibility' => 'yes', 
				],
			]
		);	

		// Excerpt Color
		$this->add_control(
			'awea_blog_carousel_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-blog-excerpt' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_blog_carousel_excerpt_typography',
				'selector' => '{{WRAPPER}} .awea-blog-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_carousel_image_style',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Width
		$this->add_control(
			'awea_blog_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'awesome-widgets-elementor' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-blog-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Height
		$this->add_control(
			'awea_blog_image_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'awesome-widgets-elementor' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-blog-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Display Size
		$this->add_control(
			'awea_blog_image_display',
			[
				'label' 		=> __('Display Size', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'default' 		=> 'cover',
				'options' 		=> [
					'auto' 			=> __('Auto', 'awesome-widgets-elementor'),
					'contain' 		=> __('Contain', 'awesome-widgets-elementor'),
					'cover' 		=> __('Cover', 'awesome-widgets-elementor'),
				],
			]
		);

		// Blog Image Radius
		$this->add_control(
			'awea_blog_carousel_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_carousel_button_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'awea_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'awea_blog_carousel_btn_color',
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

		// Blog Button Background
		$this->add_control(
			'awea_blog_carousel_btn_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'awea_blog_carousel_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'awea_blog_carousel_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'awea_blog_carousel_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'awea_blog_carousel_btn_border_hover_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Button Hover Background Color
		$this->add_control(
			'awea_blog_carousel_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-icon-border:hover:after' => 'background-color: {{VALUE}}',
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

		// Blog Arrow Style
		$this->start_controls_section(
			'awea_blog_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'awea_blog_carousel_arrow_style_tabs'
		);

		// Blog Arrow Normal Tab
		$this->start_controls_tab(
			'awea_blog_carousel_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Blog Arrow Color
		$this->add_control(
			'awea_blog_carousel_arrow_color',
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

		// Blog Arrow Border Color
		$this->add_control(
			'awea_blog_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Background Color
		$this->add_control(
			'awea_blog_carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Padding
		$this->add_control(
			'awea_blog_carousel_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Round
		$this->add_control(
			'awea_blog_carousel_arrow_round',
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

		// Blog Arrow Hover Tab
		$this->start_controls_tab(
			'awea_blog_carousel_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Blog Arrow Hover Icon Color
		$this->add_control(
			'awea_blog_carousel_arrow_hover_color',
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

		// Blog Arrow Border Color
		$this->add_control(
			'awea_blog_carousel_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Arrow Round
		$this->add_control(
			'awea_blog_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-carousel-arrow-border:hover:after' => 'background-color: {{VALUE}}',
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
		// Get the widget settings
		$settings = $this->get_settings_for_display();
		$awea_blog_carousel_number = $settings['awea_blog_carousel_number'] ?? 5;
		$awea_blog_carousel_order = $settings['awea_blog_carousel_order'] ?? 'DESC';
		$awea_blog_carousel_orderby = $settings['awea_blog_carousel_orderby'] ?? 'date';
		$awea_blog_carousel_include_categories = $settings['awea_blog_carousel_include_categories'] ?? '';
		$awea_blog_carousel_cat_visibility = $settings['awea_blog_carousel_cat_visibility'] ?? 'no';
		$awea_blog_carousel_date_visibility = $settings['awea_blog_carousel_date_visibility'] ?? 'no';
		$awea_blog_carousel_excerpt_visibility = $settings['awea_blog_carousel_excerpt_visibility'] ?? 'no';
		$awea_blog_carousel_slide_number = $settings['awea_blog_carousel_slide_number'] ?? 3;
		$awea_blog_carousel_arrows = $settings['awea_blog_carousel_arrows'] ?? 'no';
		$awea_blog_carousel_loop = $settings['awea_blog_carousel_loop'] ?? 'no';
		$awea_blog_carousel_pause = $settings['awea_blog_carousel_pause'] ?? 'no';
		$awea_blog_carousel_autoplay = $settings['awea_blog_carousel_autoplay'] ?? 'no';
		$awea_blog_carousel_autoplay_speed = $settings['awea_blog_carousel_autoplay_speed'] ?? 5000;
		$awea_blog_carousel_autoplay_animation = $settings['awea_blog_carousel_autoplay_animation'] ?? 'linear';
		$awea_blog_image_display = $settings['awea_blog_image_display'] ?? 'cover';
	
		// Inline styles for background image display
		echo '<style>
			.awea-blog-img {
				background-size: ' . esc_attr($awea_blog_image_display) . ';
			}
		</style>';
	
		// WP_Query Arguments
		$args = [
			'posts_per_page' => $awea_blog_carousel_number,
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => $awea_blog_carousel_order,
			'orderby' => $awea_blog_carousel_orderby,
			'cat' => $awea_blog_carousel_include_categories,
			'ignore_sticky_posts' => 1,
		];
	
		$query = new \WP_Query($args);
	
		// Blog carousel container
		$carousel_classes = [
			$awea_blog_carousel_arrows === 'yes' ? 'carousel-top-arrows' : '',
		];
		?>
		<div class="awea-blog-carousel awea-carousel-top-arrows owl-carousel <?php echo esc_attr(implode(' ', $carousel_classes)); ?>"
			awea-blog-items="<?php echo esc_attr($awea_blog_carousel_slide_number); ?>" 
			awea-blog-arrows="<?php echo esc_attr($awea_blog_carousel_arrows); ?>" 
			awea-blog-loops="<?php echo esc_attr($awea_blog_carousel_loop); ?>" 
			awea-blog-pause="<?php echo esc_attr($awea_blog_carousel_pause); ?>" 
			awea-blog-autoplay="<?php echo esc_attr($awea_blog_carousel_autoplay); ?>" 
			awea-blog-autoplay-speed="<?php echo esc_attr($awea_blog_carousel_autoplay_speed); ?>" 
			awea-blog-autoplay-animation="<?php echo esc_attr($awea_blog_carousel_autoplay_animation); ?>">
			<?php 
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post(); ?>
					<div class="awea-single-blog">
						<div class="awea-blog-content">
							<div class="awea-blog-carousel-meta">
								<?php if ($awea_blog_carousel_cat_visibility === 'yes') {
									the_category(', ');
								}
								if ($awea_blog_carousel_date_visibility === 'yes') { ?>
									<a class="awea-blog-date" href="<?php echo esc_url(get_the_permalink()); ?>">
										<?php echo esc_html(get_the_date('j M, y')); ?>
									</a>
								<?php } ?>
							</div>
							<div class="awea-blog-title">
								<h4 class="awea-blog-post-title">
									<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
								</h4>
							</div>
							<?php if ($awea_blog_carousel_excerpt_visibility === 'yes') { ?>
								<div class="awea-blog-excerpt">
									<?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
								</div>
							<?php } ?>
						</div>
						<div class="awea-blog-img" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
							<a href="<?php echo esc_url(get_the_permalink()); ?>" class="awea-icon-border">

							</a>
						</div>
					</div>
				<?php endwhile;
			endif;
			wp_reset_postdata(); ?>
		</div>
		<?php
	}	
}