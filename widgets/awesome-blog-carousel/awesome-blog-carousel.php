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
		return esc_html__( 'Blog Carousel', 'webbricks-addons' );
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
		
		// Blog Carousel Heading Layout
		$this->start_controls_section(
			'wbea_blog_carousel_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Blog Carousel Heading Show
		$this->add_control(
			'wbea_blog_carousel_heading_show',
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

		// Blog Carousel Sub Heading Box
		$this->start_controls_section(
			'wbea_blog_carousel_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_blog_carousel_heading_show' => 'yes'
				],
			]
		);

		// Blog Carousel Sub Heading Show?
		$this->add_control(
			'wbea_blog_carousel_subheading_show',
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
		
		// Blog Carousel Sub Heading
		$this->add_control(
		    'wbea_blog_carousel_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('New Blogs', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_blog_carousel_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Blog Carousel Heading Box
		$this->start_controls_section(
			'wbea_blog_carousel_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_blog_carousel_heading_show' => 'yes'
				],
			]
		);
		
		// Blog Carousel Heading
		$this->add_control(
		    'wbea_blog_carousel_heading',
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
			'wbea_blog_carousel_heading_tag',
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

		// Blog Carousel Description
		$this->start_controls_section(
			'wbea_blog_carousel_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_blog_carousel_heading_show' => 'yes'
				],
			]
		);

		// Blog Carousel Heading Description Show?
		$this->add_control(
			'wbea_blog_carousel_desc_show',
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

		// Blog Carousel Heading Description
		$this->add_control(
		    'wbea_blog_carousel_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_blog_carousel_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
	    $this->start_controls_section(
			'wbea_blog_carousel_contents',
			[
				'label' => esc_html__('Query', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// Blogs Number
		$this->add_control(
			'wbea_blog_carousel_number',
			[
				'label' 		=> __('Number of Blogs', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);
 
		// Blog Order
		$this->add_control(
			'wbea_blog_carousel_order',
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
 
		// Blog Orderby
		$this->add_control(
			'wbea_blog_carousel_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'webbricks-addons'),
					'date' 			=> __('Date', 'webbricks-addons'),
					'title' 		=> __('Title', 'webbricks-addons'),
					'name' 			=> __('Name', 'webbricks-addons'),
					'modified' 		=> __('Modified', 'webbricks-addons'),
					'author' 		=> __('Author', 'webbricks-addons'),
					'rand' 			=> __('Random', 'webbricks-addons'),
					'ID' 			=> __('ID', 'webbricks-addons'),
					'comment_count' => __('Comment Count', 'webbricks-addons'),
					'menu_order' 	=> __('Menu Order', 'webbricks-addons'),
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
			'wbea_blog_carousel_include_categories',
			[
				'label' => __( 'Post Filter', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'wbea_blog_carousel_option_section',
			[
				'label' => esc_html__('Meta Info', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Blog Category Show
		$this->add_control(
			'wbea_blog_carousel_cat_visibility',
			[
				'label' 		=> __('Show Category', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Date Show
		$this->add_control(
			'wbea_blog_carousel_date_visibility',
			[
				'label' 		=> __('Show Date', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Excerpt Show
		$this->add_control(
			'wbea_blog_carousel_excerpt_visibility',
			[
				'label' 		=> __('Show Excerpt', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
		'wbea_blog_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Number
		$this->add_control(
			'wbea_blog_carousel_slide_number',
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

		// Blogs Carousel Arrows
		$this->add_control(
			'wbea_blog_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Loops
		$this->add_control(
			'wbea_blog_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Pause
		$this->add_control(
			'wbea_blog_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay
		$this->add_control(
			'wbea_blog_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay Speed
		$this->add_control(
			'wbea_blog_carousel_autoplay_speed',
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

		// Blogs Carousel Animation Speed
		$this->add_control(
			'wbea_blog_carousel_autoplay_animation',
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
			'wbea_blog_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wbea_blog_carousel_pro_message_notice', 
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

		// Blog Carousel Heading Style
		$this->start_controls_section(
			'wbea_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_blog_carousel_heading_show' => 'yes',
					'wbea_blog_carousel_subheading_show' => 'yes'
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wbea_section_heading_separator_variation_style',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// Blog Carousel Section Heading Separator Style
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

		// Blog Carousel Bullet Color
		$this->add_control(
			'wbea_service_section_sep_bg',
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

		// Blog Carousel Bullet Round
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
					'wbea_section_heading_separator_variation' => 'custom', 
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wbea_service_section_subheading_title_style',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Blog Carousel Sub Heading Color
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

		// Blog Carousel Sub Heading Typography
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

		// Blog Carousel Heading Options
		$this->start_controls_section(
			'wbea_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_blog_carousel_heading_show' => 'yes'
				],
			]
		);

		// Blog Carousel Heading Color
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

		// Blog Carousel Heading Typography
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

		// Blog Carousel Description Options
		$this->start_controls_section(
			'wbea_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_blog_carousel_heading_show' => 'yes',
					'wbea_blog_carousel_desc_show' => 'yes'
				],
			]
		);

		// Blog Carousel Description Color
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

		// Blog Carousel Description Typography
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

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Blog Background
		$this->add_control(
			'wbea_blog_carousel_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'wbea_blog_carousel_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'wbea_blog_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Meta Color
		$this->add_control(
			'wbea_blog_carousel_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-carousel-meta, .wbea-blog-carousel-meta a' => 'color: {{VALUE}} !important',
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
				'name' => 'wbea_blog_carousel_meta_typography',
				'selector' => '{{WRAPPER}} .wbea-blog-carousel-meta, .wbea-blog-carousel-meta a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_carousel_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'wbea_blog_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-title .wbea-blog-post-title a' => 'color: {{VALUE}}',
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
				'name' => 'wbea_blog_carousel_title_typography',
				'selector' => '{{WRAPPER}} .wbea-blog-title .wbea-blog-post-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_blog_carousel_title_tag',
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_carousel_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_blog_carousel_excerpt_visibility' => 'yes', 
				],
			]
		);	

		// Excerpt Color
		$this->add_control(
			'wbea_blog_carousel_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-excerpt' => 'color: {{VALUE}}',
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
				'name' => 'wbea_blog_carousel_excerpt_typography',
				'selector' => '{{WRAPPER}} .wbea-blog-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_carousel_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Width
		$this->add_control(
			'wbea_blog_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Height
		$this->add_control(
			'wbea_blog_image_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Display Size
		$this->add_control(
			'wbea_blog_image_display',
			[
				'label' 		=> __('Display Size', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'default' 		=> 'cover',
				'options' 		=> [
					'auto' 			=> __('Auto', 'webbricks-addons'),
					'contain' 		=> __('Contain', 'webbricks-addons'),
					'cover' 		=> __('Cover', 'webbricks-addons'),
				],
			]
		);

		// Blog Image Radius
		$this->add_control(
			'wbea_blog_carousel_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_carousel_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wbea_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'wbea_blog_carousel_btn_color',
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

		// Blog Button Background
		$this->add_control(
			'wbea_blog_carousel_btn_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wbea_blog_carousel_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'wbea_blog_carousel_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wbea_blog_carousel_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wbea_blog_carousel_btn_border_hover_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Button Hover Background Color
		$this->add_control(
			'wbea_blog_carousel_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover:after' => 'background-color: {{VALUE}}',
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
			'wbea_blog_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wbea_blog_carousel_arrow_style_tabs'
		);

		// Blog Arrow Normal Tab
		$this->start_controls_tab(
			'wbea_blog_carousel_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Blog Arrow Color
		$this->add_control(
			'wbea_blog_carousel_arrow_color',
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

		// Blog Arrow Border Color
		$this->add_control(
			'wbea_blog_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Background Color
		$this->add_control(
			'wbea_blog_carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Padding
		$this->add_control(
			'wbea_blog_carousel_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Round
		$this->add_control(
			'wbea_blog_carousel_arrow_round',
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

		// Blog Arrow Hover Tab
		$this->start_controls_tab(
			'wbea_blog_carousel_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Blog Arrow Hover Icon Color
		$this->add_control(
			'wbea_blog_carousel_arrow_hover_color',
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

		// Blog Arrow Border Color
		$this->add_control(
			'wbea_blog_carousel_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Arrow Round
		$this->add_control(
			'wbea_blog_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:hover:after' => 'background-color: {{VALUE}}',
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
		$wbea_blog_carousel_heading_show = $settings['wbea_blog_carousel_heading_show'] ?? 'no';
		$wbea_blog_carousel_heading_tag = $settings['wbea_blog_carousel_heading_tag'] ?? 'h2';
		$wbea_blog_carousel_title_tag = $settings['wbea_blog_carousel_title_tag'] ?? 'h3';
		$wbea_blog_carousel_number = $settings['wbea_blog_carousel_number'] ?? 5;
		$wbea_blog_carousel_order = $settings['wbea_blog_carousel_order'] ?? 'DESC';
		$wbea_blog_carousel_orderby = $settings['wbea_blog_carousel_orderby'] ?? 'date';
		$wbea_blog_carousel_include_categories = $settings['wbea_blog_carousel_include_categories'] ?? '';
		$wbea_blog_carousel_cat_visibility = $settings['wbea_blog_carousel_cat_visibility'] ?? 'no';
		$wbea_blog_carousel_date_visibility = $settings['wbea_blog_carousel_date_visibility'] ?? 'no';
		$wbea_blog_carousel_excerpt_visibility = $settings['wbea_blog_carousel_excerpt_visibility'] ?? 'no';
		$wbea_blog_carousel_slide_number = $settings['wbea_blog_carousel_slide_number'] ?? 3;
		$wbea_blog_carousel_arrows = $settings['wbea_blog_carousel_arrows'] ?? 'no';
		$wbea_blog_carousel_loop = $settings['wbea_blog_carousel_loop'] ?? 'no';
		$wbea_blog_carousel_pause = $settings['wbea_blog_carousel_pause'] ?? 'no';
		$wbea_blog_carousel_autoplay = $settings['wbea_blog_carousel_autoplay'] ?? 'no';
		$wbea_blog_carousel_autoplay_speed = $settings['wbea_blog_carousel_autoplay_speed'] ?? 5000;
		$wbea_blog_carousel_autoplay_animation = $settings['wbea_blog_carousel_autoplay_animation'] ?? 'linear';
		$wbea_blog_image_display = $settings['wbea_blog_image_display'] ?? 'cover';
	
		// Inline styles for background image display
		echo '<style>
			.wbea-blog-img {
				background-size: ' . esc_attr($wbea_blog_image_display) . ';
			}
		</style>';
	
		// WP_Query Arguments
		$args = [
			'posts_per_page' => $wbea_blog_carousel_number,
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => $wbea_blog_carousel_order,
			'orderby' => $wbea_blog_carousel_orderby,
			'cat' => $wbea_blog_carousel_include_categories,
			'ignore_sticky_posts' => 1,
		];
	
		$query = new \WP_Query($args);
	
		// Section heading
		if ($wbea_blog_carousel_heading_show === 'yes') {
			$wbea_blog_carousel_subheading_show = $settings['wbea_blog_carousel_subheading_show'] ?? 'no';
			$wbea_blog_carousel_subheading = $settings['wbea_blog_carousel_subheading'] ?? '';
			$wbea_section_heading_separator_variation = $settings['wbea_section_heading_separator_variation'] ?? '';
			$wbea_blog_carousel_heading = $settings['wbea_blog_carousel_heading'] ?? '';
			$wbea_blog_carousel_desc_show = $settings['wbea_blog_carousel_desc_show'] ?? 'no';
			$wbea_blog_carousel_desc = $settings['wbea_blog_carousel_desc'] ?? '';
			?>
			<div class="wbea-section-title wbea-service-title">
				<?php if ($wbea_blog_carousel_subheading_show === 'yes') { ?>
					<span class="<?php echo esc_attr($wbea_section_heading_separator_variation); ?> wbea-section-subheading">
						<?php echo esc_html($wbea_blog_carousel_subheading); ?>
					</span>
				<?php } ?>
				<<?php echo esc_attr($wbea_blog_carousel_heading_tag); ?> class="wbea-section-heading">
					<?php echo esc_html($wbea_blog_carousel_heading); ?>
				</<?php echo esc_attr($wbea_blog_carousel_heading_tag); ?>>
				<?php if ($wbea_blog_carousel_desc_show === 'yes') { ?>
					<p><?php echo wp_kses_post($wbea_blog_carousel_desc); ?></p>
				<?php } ?>
			</div>
			<?php
		}
	
		// Blog carousel container
		$carousel_classes = [
			$wbea_blog_carousel_arrows === 'yes' ? 'carousel-top-arrows' : '',
			$wbea_blog_carousel_heading_show === 'yes' ? 'heading-top' : '',
		];
		?>
		<div class="wbea-blog-carousel wbea-carousel-top-arrows owl-carousel <?php echo esc_attr(implode(' ', $carousel_classes)); ?>"
			wbea-blog-items="<?php echo esc_attr($wbea_blog_carousel_slide_number); ?>" 
			wbea-blog-arrows="<?php echo esc_attr($wbea_blog_carousel_arrows); ?>" 
			wbea-blog-loops="<?php echo esc_attr($wbea_blog_carousel_loop); ?>" 
			wbea-blog-pause="<?php echo esc_attr($wbea_blog_carousel_pause); ?>" 
			wbea-blog-autoplay="<?php echo esc_attr($wbea_blog_carousel_autoplay); ?>" 
			wbea-blog-autoplay-speed="<?php echo esc_attr($wbea_blog_carousel_autoplay_speed); ?>" 
			wbea-blog-autoplay-animation="<?php echo esc_attr($wbea_blog_carousel_autoplay_animation); ?>">
			<?php 
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post(); ?>
					<div class="wbea-single-blog">
						<div class="wbea-blog-content">
							<div class="wbea-blog-carousel-meta">
								<?php if ($wbea_blog_carousel_cat_visibility === 'yes') {
									the_category(', ');
								}
								if ($wbea_blog_carousel_date_visibility === 'yes') { ?>
									<a class="wbea-blog-date" href="<?php echo esc_url(get_the_permalink()); ?>">
										<?php echo esc_html(get_the_date('j M, y')); ?>
									</a>
								<?php } ?>
							</div>
							<div class="wbea-blog-title">
								<<?php echo esc_attr($wbea_blog_carousel_title_tag); ?> class="wbea-blog-post-title">
									<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
								</<?php echo esc_attr($wbea_blog_carousel_title_tag); ?>>
							</div>
							<?php if ($wbea_blog_carousel_excerpt_visibility === 'yes') { ?>
								<div class="wbea-blog-excerpt">
									<?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
								</div>
							<?php } ?>
						</div>
						<div class="wbea-blog-img" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
							<a href="<?php echo esc_url(get_the_permalink()); ?>" class="wbea-icon-border">
							<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="#004851"/>
							</svg>

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