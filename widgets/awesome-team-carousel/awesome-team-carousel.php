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

class Widget_Awesome_Team_Carousel extends Widget_Base {

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
		return 'awesome-team-carousel';
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
		return esc_html__( 'Team Carousel', 'awesome-widgets-elementor' );
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
		return 'awea-icon eicon-carousel';
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
		return [ 'awea', 'team', 'carousel' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Teams Section Heading Layout
		$this->start_controls_section(
			'awea_teams_section_layout_box',
			[
				'label' => esc_html__('Layout', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Teams Section Heading Show
		$this->add_control(
			'awea_teams_section_heading_show',
			[
				'label' => esc_html__( 'Show Section Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'Hide', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'awea_team_carousel_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => __( 'Style 1', 'awesome-widgets-elementor' ),
					'style-2' => __( 'Style 2', 'awesome-widgets-elementor' ),
					'none' => __( 'None', 'awesome-widgets-elementor' ),
				],
				'default' => 'style-1',
			]
		);

		$this->end_controls_section();

		// Teams Section Sub Heading Box
		$this->start_controls_section(
			'awea_teams_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'awea_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Teams Section Sub Heading Show?
		$this->add_control(
			'awea_teams_section_subheading_show',
			[
				'label' => esc_html__( 'Show Sub Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'Hide', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		// Teams Sub Heading
		$this->add_control(
		    'awea_teams_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Teams', 'awesome-widgets-elementor'),
				'separator' => 'before',
				'condition' => [
					'awea_teams_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Teams Section Heading Box
		$this->start_controls_section(
			'awea_teams_section_heading_box',
			[
				'label' => esc_html__('Heading', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'awea_teams_section_heading_show' => 'yes'
				],
			]
		);
		
		// Teams Section Heading
		$this->add_control(
		    'awea_teams_section_heading',
			[
			    'label' => esc_html__('Heading', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Are Your One Door To Solve It All', 'awesome-widgets-elementor'),
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'awea_teams_section_heading_tag',
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
				'default' => 'h2',
			]
		);

		$this->end_controls_section();

		// Teams Section Description
		$this->start_controls_section(
			'awea_teams_section_desc_box',
			[
				'label' => esc_html__('Description', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'awea_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Teams Section Heading Description Show?
		$this->add_control(
			'awea_teams_section_desc_show',
			[
				'label' => esc_html__( 'Show Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'Hide', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Teams Section Heading Description
		$this->add_control(
		    'awea_teams_section_desc',
			[
			    'label' => esc_html__('Description', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor'),
				'separator' => 'before',
				'condition' => [
					'awea_teams_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// start of the Content tab section

		$this->start_controls_section(
			'team_carousel_content',
			[
				'label' => esc_html__('Teams', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Team Carousel List
		$repeater = new Repeater();
 
		$repeater->add_control(
			'awea_team_carousel_image',
			[
				'label' => esc_html__( 'Choose Image', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-1-web-bricks.webp',
				],
				'separator' => 'before',
			]
		);
 
		$repeater->add_control(
			'awea_team_carousel_name',
			[
				'label' => esc_html__( 'Name', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'awesome-widgets-elementor' ),
				'separator' => 'before',
				'label_block' => true
			]
		 );
 
		$repeater->add_control(
			'awea_team_carousel_designation',
			[
				'label' => esc_html__( 'Designtion', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'awesome-widgets-elementor' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$repeater->add_control(
            'awea_team_carousel_fb_url',
            [
                'label' => __( 'Facebook', 'awesome-widgets-elementor' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'awea_team_carousel_tw_url',
            [
                'label' => __( 'Twitter', 'awesome-widgets-elementor' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'awea_team_carousel_ln_url',
            [
                'label' => __( 'Linkedin', 'awesome-widgets-elementor' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'awea_team_carousel_insta_url',
            [
                'label' => __( 'Instagram', 'awesome-widgets-elementor' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );
 
		$this->add_control(
			'awea_team_carousels',
			[
				'label' => esc_html__( 'Teams List', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
				[
					'awea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-1-web-bricks.webp',
					],
					'awea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'awea_team_carousel_name' => esc_html__( 'Novák Réka', 'awesome-widgets-elementor' ),
					'awea_team_carousel_designation' => esc_html__( 'Senior Developer', 'awesome-widgets-elementor'),
					'awea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'awea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'awea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'awea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'awea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-2-web-bricks.webp',
					],
					'awea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'awea_team_carousel_name' => esc_html__( 'Pintér Beatrix', 'awesome-widgets-elementor' ),
					'awea_team_carousel_designation' => esc_html__( 'Senior UX Designer', 'awesome-widgets-elementor'),
					'awea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'awea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'awea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'awea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'awea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-3-web-bricks.webp',
					],
					'awea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'awea_team_carousel_name' => esc_html__( 'Szekeres Dalma', 'awesome-widgets-elementor' ),
					'awea_team_carousel_designation' => esc_html__( 'Admin Manager', 'awesome-widgets-elementor'),
					'awea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'awea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'awea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'awea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'awea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-3-web-bricks.webp',
					],
					'awea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'awea_team_carousel_name' => esc_html__( 'John Doe', 'awesome-widgets-elementor' ),
					'awea_team_carousel_designation' => esc_html__( 'SEO Expert', 'awesome-widgets-elementor'),
					'awea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'awea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'awea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'awea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				],
				'title_field' => '{{{ awea_team_carousel_name }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_team_carousel_settings',
			[
				'label' => esc_html__('Settings', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		 );

		// Teams Carousel Number
		$this->add_control(
			'awea_team_carousel_number',
			[
				'label' 		=> __('Number of Teams', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
			]
		);

		// Teams Carousel Arrows
		$this->add_control(
			'awea_team_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Loops
		$this->add_control(
			'awea_team_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Pause
		$this->add_control(
			'awea_team_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Autoplay
		$this->add_control(
			'awea_team_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Autoplay Speed
		$this->add_control(
			'awea_team_carousel_autoplay_speed',
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

		// Teams Carousel Animation Speed
		$this->add_control(
			'awea_team_carousel_autoplay_animation',
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
			'awea_team_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'awea_team_carousel_pro_message_notice', 
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

		// Service Section Heading Style
		$this->start_controls_section(
			'awea_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_teams_section_heading_show' => 'yes',
					'awea_teams_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'awea_team_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Bullet', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);


		// Teams Section Heading Separator Style
		$this->add_control(
			'awea_section_heading_separator_variation',
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

		// Service Section Bullet Color
		$this->add_control(
			'awea_service_section_sep_bg',
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

		// Service Section Bullet Round
		$this->add_control(
			'awea_service_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'awea_section_heading_separator_variation' => 'custom', 
				],
			]
		);
		

		// Service Section Sub Heading Color
		$this->add_control(
			'awea_service_section_subheading_color',
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

		// Service Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_service_section_subheading_typography',
				'selector' => '{{WRAPPER}} .awea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Heading Options
		$this->start_controls_section(
			'awea_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Service Section Heading Color
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

		// Service Section Heading Typography
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

		// Service Section Description Options
		$this->start_controls_section(
			'awea_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_teams_section_heading_show' => 'yes',
					'awea_teams_section_desc_show' => 'yes'
				],
			]
		);

		// Service Section Description Color
		$this->add_control(
			'awea_section_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title p' => 'color: {{VALUE}}',
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
				'name' => 'awea_section_desc_typography',
				'selector' => '{{WRAPPER}} .awea-section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Teams Layout
		$this->start_controls_section(
			'awea_team_carousel_layout_style',
			[
				'label' => esc_html__( 'Teams Card', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Team Background
		$this->add_control(
			'awea_team_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-bg' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffffff00',
			]
		);

		// Team Border
		$this->add_group_control(
			Group_Control_Border::get_type(), 
			[
				'name' => 'awea_team_border',
				'selector' => '{{WRAPPER}} .awea-team-content',
			]
		);	

		// Team Alignment
		$this->add_control(
			'awea_team_alignment',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .awea-team-content' => 'text-align: {{VALUE}}',
				],
			],
		);

		$this->end_controls_section();

		// Teams Box Style
		$this->start_controls_section(
			'awea_teams_box_style',
			[
				'label' => esc_html__( 'Teams Content', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Teams Box Icon Options
		$this->add_control(
			'awea_teams_box_icon_options',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Image Width
		$this->add_control(
			'awea_team_image_width',
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
					'{{WRAPPER}} .awea-team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Height
		$this->add_control(
			'awea_team_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'awesome-widgets-elementor' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-team-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Border
		$this->add_control(
			'awea_team_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Teams Box Heading Options
		$this->add_control(
			'awea_teams_box_title_options',
			[
				'label' => esc_html__( 'Name', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Name Color
		$this->add_control(
			'awea_team_name_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-name' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Name Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_team_name_typography',
				'selector' => '{{WRAPPER}} .awea-team-name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Teams Box Description Options
		$this->add_control(
			'awea_teams_box_desc_options',
			[
				'label' => esc_html__( 'Designation', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Designation Color
		$this->add_control(
			'awea_team_desg_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-desg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Designation Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_team_desg_typography',
				'selector' => '{{WRAPPER}} .awea-team-desg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Teams Box Social Options
		$this->add_control(
			'awea_teams_box_social_options',
			[
				'label' => esc_html__( 'Socials', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Social Color
		$this->add_control(
			'awea_team_social_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-social a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Social Hover Color
		$this->add_control(
			'awea_team_social_hover_color',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-social a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Teams Arrow Style
		$this->start_controls_section(
			'awea_teams_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_team_carousel_arrows' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wp_teams_arrow_style_tabs'
		);

		// Teams Arrow Normal Tab
		$this->start_controls_tab(
			'wp_teams_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Teams Arrow Color
		$this->add_control(
			'awea_teams_arrow_color',
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

		// Teams Arrow Border Color
		$this->add_control(
			'awea_teams_arrow_border_color',
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

		// Teams Arrow Border Radius
		$this->add_control(
			'awea_teams_arrow_border_round',
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

		// Teams Arrow Hover Tab
		$this->start_controls_tab(
			'wp_teams_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Teams Arrow Hover Icon Color
		$this->add_control(
			'awea_teams_arrow_hover_color',
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

		// Teams Arrow Hover Border Color
		$this->add_control(
			'awea_teams_arrow_hover_border',
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

		// Teams Arrow Round
		$this->add_control(
			'awea_teams_arrow_hover_bg',
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
	protected function render() {
		// Get input from the widget settings.
		$settings = $this->get_settings_for_display();        
	
		// Sanitize and escape settings values before using them.
		$awea_teams_section_heading_show = isset($settings['awea_teams_section_heading_show']) ? $settings['awea_teams_section_heading_show'] : '';
		$awea_team_carousels = isset($settings['awea_team_carousels']) ? $settings['awea_team_carousels'] : [];
		$awea_team_carousels_items = isset($settings['awea_team_carousel_number']) ? $settings['awea_team_carousel_number'] : 3; // Default to 3 items
		$awea_team_carousels_arrows = isset($settings['awea_team_carousel_arrows']) ? $settings['awea_team_carousel_arrows'] : 'no';
		$awea_team_carousels_loops = isset($settings['awea_team_carousel_loop']) ? $settings['awea_team_carousel_loop'] : 'no';
		$awea_team_carousels_pause = isset($settings['awea_team_carousel_pause']) ? $settings['awea_team_carousel_pause'] : 'no';
		$awea_team_carousels_autoplay = isset($settings['awea_team_carousel_autoplay']) ? $settings['awea_team_carousel_autoplay'] : 'no';
		$awea_team_carousels_autoplay_speed = isset($settings['awea_team_carousel_autoplay_speed']) ? $settings['awea_team_carousel_autoplay_speed'] : 5000;
		$awea_team_carousels_autoplay_animation = isset($settings['awea_team_carousel_autoplay_animation']) ? $settings['awea_team_carousel_autoplay_animation'] : '';
		$awea_team_carousel_bg_pattern = isset($settings['awea_team_carousel_bg_pattern']) ? $settings['awea_team_carousel_bg_pattern'] : '';
	
		// Background pattern URLs
		$team_pattern_url = '';
		switch ($awea_team_carousel_bg_pattern) {
			case 'style-1':
				$team_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp';
				break;
			case 'style-2':
				$team_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-2-web-bricks.webp';
				break;
			case 'none':
				$team_pattern_url = '';
				break;
			default:
				$team_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp'; // Default pattern
				break;
		}
	
		// Output the background pattern if applicable.
		if (!empty($team_pattern_url)) {
			?>
			<style>                                
				.awea-team-bg {
					background-image: url('<?php echo esc_url($team_pattern_url); ?>');
				}
			</style>
			<?php
		}
	
		// Render the section heading if needed.
		if ($awea_teams_section_heading_show === 'yes') {
			$awea_teams_section_subheading_show = isset($settings['awea_teams_section_subheading_show']) ? $settings['awea_teams_section_subheading_show'] : '';
			$awea_teams_section_subheading = isset($settings['awea_teams_section_subheading']) ? $settings['awea_teams_section_subheading'] : '';
			$awea_section_heading_separator_variation = isset($settings['awea_section_heading_separator_variation']) ? $settings['awea_section_heading_separator_variation'] : '';
			$awea_teams_section_heading = isset($settings['awea_teams_section_heading']) ? $settings['awea_teams_section_heading'] : '';
			$awea_teams_section_heading_tag = isset($settings['awea_teams_section_heading_tag']) ? $settings['awea_teams_section_heading_tag'] : 'h3';
			$awea_teams_section_desc_show = isset($settings['awea_teams_section_desc_show']) ? $settings['awea_teams_section_desc_show'] : '';
			$awea_teams_section_desc = isset($settings['awea_teams_section_desc']) ? $settings['awea_teams_section_desc'] : '';
			?>            
			<div class="awea-section-title awea-service-title">
				<?php if ($awea_teams_section_subheading_show === 'yes') { ?>
					<span class="<?php echo esc_attr($awea_section_heading_separator_variation); ?> awea-section-subheading"><?php echo esc_html($awea_teams_section_subheading); ?></span>
				<?php } ?>
				<<?php echo esc_attr($awea_teams_section_heading_tag); ?> class="awea-section-heading"><?php echo esc_html($awea_teams_section_heading); ?></<?php echo esc_attr($awea_teams_section_heading_tag); ?>>
				
				<?php if ($awea_teams_section_desc_show === 'yes') { ?>
					<p><?php echo wp_kses_post($awea_teams_section_desc); ?></p>
				<?php } ?>
			</div>
			<?php
		}
	
		// Render the team carousel if there are items.
		if (!empty($awea_team_carousels)) {
			?>
			<div class="awea-team-carousel owl-carousel <?php echo esc_attr($awea_team_carousels_arrows === 'yes' ? 'awea-carousel-top-arrows' : ''); ?> <?php echo esc_attr($awea_teams_section_heading_show === 'yes' ? 'awea-heading-top' : ''); ?>" 
				awea-team-items="<?php echo esc_attr($awea_team_carousels_items); ?>" 
				awea-team-arrows="<?php echo esc_attr($awea_team_carousels_arrows); ?>" 
				awea-team-loops="<?php echo esc_attr($awea_team_carousels_loops); ?>" 
				awea-team-pause="<?php echo esc_attr($awea_team_carousels_pause); ?>" 
				awea-team-autoplay="<?php echo esc_attr($awea_team_carousels_autoplay); ?>" 
				awea-team-autoplay-speed="<?php echo esc_attr($awea_team_carousels_autoplay_speed); ?>" 
				awea-team-autoplay-animation="<?php echo esc_attr($awea_team_carousels_autoplay_animation); ?>">
				
				<?php
				foreach ($awea_team_carousels as $team) {
					$team_image = isset($team['awea_team_carousel_image']['url']) ? esc_url($team['awea_team_carousel_image']['url']) : '';
					$team_name = isset($team['awea_team_carousel_name']) ? esc_html($team['awea_team_carousel_name']) : '';
					$team_designation = isset($team['awea_team_carousel_designation']) ? esc_html($team['awea_team_carousel_designation']) : '';
	
					$social_links = [
						'fb_url' => 'fa-facebook-square',
						'tw_url' => 'fa-twitter-square',
						'ln_url' => 'fa-linkedin-square',
						'insta_url' => 'fa-instagram',
					];
					?>
					<div class="awea-single-team">
						<?php if ($team_image) { ?>
							<div class="awea-team-img" style="background-image:url(<?php echo esc_url($team_image); ?>)"></div>
						<?php } ?>
						<div class="awea-team-bg">
							<div class="awea-team-content">
								<h4 class="awea-team-name"><?php echo esc_html($team_name); ?></h4>
								<p class="awea-team-desg"><?php echo esc_html($team_designation); ?></p>
								<div class="awea-team-social">
									<?php
									foreach ($social_links as $key => $icon) {
										$url = isset($team["awea_team_carousel_{$key}"]['url']) ? esc_url($team["awea_team_carousel_{$key}"]['url']) : '';
										if ($url) {
											echo '<a href="' . esc_url($url) . '"><i class="fa ' . esc_attr($icon) . '"></i></a>';
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}
	}	
}