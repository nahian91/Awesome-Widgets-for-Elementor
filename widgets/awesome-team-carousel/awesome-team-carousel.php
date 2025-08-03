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
		return esc_html__( 'Team Carousel', 'webbricks-addons' );
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
		return 'wb-icon eicon-carousel';
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
		return [ 'wb', 'team', 'carousel' ];
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
			'wbea_teams_section_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Teams Section Heading Show
		$this->add_control(
			'wbea_teams_section_heading_show',
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

		// Section Heading Separator Style
		$this->add_control(
			'wbea_team_carousel_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => __( 'Style 1', 'webbricks-addons' ),
					'style-2' => __( 'Style 2', 'webbricks-addons' ),
					'none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'style-1',
			]
		);

		$this->end_controls_section();

		// Teams Section Sub Heading Box
		$this->start_controls_section(
			'wbea_teams_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Teams Section Sub Heading Show?
		$this->add_control(
			'wbea_teams_section_subheading_show',
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
		// Teams Sub Heading
		$this->add_control(
		    'wbea_teams_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Teams', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_teams_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Teams Section Heading Box
		$this->start_controls_section(
			'wbea_teams_section_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_teams_section_heading_show' => 'yes'
				],
			]
		);
		
		// Teams Section Heading
		$this->add_control(
		    'wbea_teams_section_heading',
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
			'wbea_teams_section_heading_tag',
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

		// Teams Section Description
		$this->start_controls_section(
			'wbea_teams_section_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Teams Section Heading Description Show?
		$this->add_control(
			'wbea_teams_section_desc_show',
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

		// Teams Section Heading Description
		$this->add_control(
		    'wbea_teams_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_teams_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// start of the Content tab section

		$this->start_controls_section(
			'team_carousel_content',
			[
				'label' => esc_html__('Teams', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Team Carousel List
		$repeater = new Repeater();
 
		$repeater->add_control(
			'wbea_team_carousel_image',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-1-web-bricks.webp',
				],
				'separator' => 'before',
			]
		);
 
		$repeater->add_control(
			'wbea_team_carousel_name',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		 );
 
		$repeater->add_control(
			'wbea_team_carousel_designation',
			[
				'label' => esc_html__( 'Designtion', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$repeater->add_control(
            'wbea_team_carousel_fb_url',
            [
                'label' => __( 'Facebook', 'webbricks-addons' ),
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
            'wbea_team_carousel_tw_url',
            [
                'label' => __( 'Twitter', 'webbricks-addons' ),
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
            'wbea_team_carousel_ln_url',
            [
                'label' => __( 'Linkedin', 'webbricks-addons' ),
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
            'wbea_team_carousel_insta_url',
            [
                'label' => __( 'Instagram', 'webbricks-addons' ),
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
			'wbea_team_carousels',
			[
				'label' => esc_html__( 'Teams List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
				[
					'wbea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-1-web-bricks.webp',
					],
					'wbea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'wbea_team_carousel_name' => esc_html__( 'Novák Réka', 'webbricks-addons' ),
					'wbea_team_carousel_designation' => esc_html__( 'Senior Developer', 'webbricks-addons'),
					'wbea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wbea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wbea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wbea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wbea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-2-web-bricks.webp',
					],
					'wbea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'wbea_team_carousel_name' => esc_html__( 'Pintér Beatrix', 'webbricks-addons' ),
					'wbea_team_carousel_designation' => esc_html__( 'Senior UX Designer', 'webbricks-addons'),
					'wbea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wbea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wbea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wbea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wbea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-3-web-bricks.webp',
					],
					'wbea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'wbea_team_carousel_name' => esc_html__( 'Szekeres Dalma', 'webbricks-addons' ),
					'wbea_team_carousel_designation' => esc_html__( 'Admin Manager', 'webbricks-addons'),
					'wbea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wbea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wbea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wbea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wbea_team_carousel_image' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-3-web-bricks.webp',
					],
					'wbea_team_carousel_bg' => [
						'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp',
					],
					'wbea_team_carousel_name' => esc_html__( 'John Doe', 'webbricks-addons' ),
					'wbea_team_carousel_designation' => esc_html__( 'SEO Expert', 'webbricks-addons'),
					'wbea_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wbea_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wbea_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wbea_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				],
				'title_field' => '{{{ wbea_team_carousel_name }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_team_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		 );

		// Teams Carousel Number
		$this->add_control(
			'wbea_team_carousel_number',
			[
				'label' 		=> __('Number of Teams', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
			]
		);

		// Teams Carousel Arrows
		$this->add_control(
			'wbea_team_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Loops
		$this->add_control(
			'wbea_team_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Pause
		$this->add_control(
			'wbea_team_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Autoplay
		$this->add_control(
			'wbea_team_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Autoplay Speed
		$this->add_control(
			'wbea_team_carousel_autoplay_speed',
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

		// Teams Carousel Animation Speed
		$this->add_control(
			'wbea_team_carousel_autoplay_animation',
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
			'wbea_team_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_team_carousel_pro_message_notice', 
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
					'wbea_teams_section_heading_show' => 'yes',
					'wbea_teams_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'wbea_team_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);


		// Teams Section Heading Separator Style
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
					'wbea_section_heading_separator_variation' => 'custom', 
				],
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
					'wbea_teams_section_heading_show' => 'yes'
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
					'wbea_teams_section_heading_show' => 'yes',
					'wbea_teams_section_desc_show' => 'yes'
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

		// Teams Layout
		$this->start_controls_section(
			'wbea_team_carousel_layout_style',
			[
				'label' => esc_html__( 'Teams Card', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Team Background
		$this->add_control(
			'wbea_team_background',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-bg' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffffff00',
			]
		);

		// Team Border
		$this->add_group_control(
			Group_Control_Border::get_type(), 
			[
				'name' => 'wbea_team_border',
				'selector' => '{{WRAPPER}} .wbea-team-content',
			]
		);	

		// Team Alignment
		$this->add_control(
			'wbea_team_alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'webbricks-addons' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wbea-team-content' => 'text-align: {{VALUE}}',
				],
			],
		);

		$this->end_controls_section();

		// Teams Box Style
		$this->start_controls_section(
			'wbea_teams_box_style',
			[
				'label' => esc_html__( 'Teams Content', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Teams Box Icon Options
		$this->add_control(
			'wbea_teams_box_icon_options',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Image Width
		$this->add_control(
			'wbea_team_image_width',
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
					'{{WRAPPER}} .wbea-team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Height
		$this->add_control(
			'wbea_team_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-team-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Border
		$this->add_control(
			'wbea_team_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Teams Box Heading Options
		$this->add_control(
			'wbea_teams_box_title_options',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Name Color
		$this->add_control(
			'wbea_team_name_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-name' => 'color: {{VALUE}}',
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
				'name' => 'wbea_team_name_typography',
				'selector' => '{{WRAPPER}} .wbea-team-name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Teams Box Description Options
		$this->add_control(
			'wbea_teams_box_desc_options',
			[
				'label' => esc_html__( 'Designation', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Designation Color
		$this->add_control(
			'wbea_team_desg_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-desg' => 'color: {{VALUE}}',
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
				'name' => 'wbea_team_desg_typography',
				'selector' => '{{WRAPPER}} .wbea-team-desg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Teams Box Social Options
		$this->add_control(
			'wbea_teams_box_social_options',
			[
				'label' => esc_html__( 'Socials', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Social Color
		$this->add_control(
			'wbea_team_social_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-social a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Social Hover Color
		$this->add_control(
			'wbea_team_social_hover_color',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-social a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Teams Arrow Style
		$this->start_controls_section(
			'wbea_teams_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_team_carousel_arrows' => 'yes'
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
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Teams Arrow Color
		$this->add_control(
			'wbea_teams_arrow_color',
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

		// Teams Arrow Border Color
		$this->add_control(
			'wbea_teams_arrow_border_color',
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

		// Teams Arrow Border Radius
		$this->add_control(
			'wbea_teams_arrow_border_round',
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

		// Teams Arrow Hover Tab
		$this->start_controls_tab(
			'wp_teams_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Teams Arrow Hover Icon Color
		$this->add_control(
			'wbea_teams_arrow_hover_color',
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

		// Teams Arrow Hover Border Color
		$this->add_control(
			'wbea_teams_arrow_hover_border',
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

		// Teams Arrow Round
		$this->add_control(
			'wbea_teams_arrow_hover_bg',
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
	protected function render() {
		// Get input from the widget settings.
		$settings = $this->get_settings_for_display();        
	
		// Sanitize and escape settings values before using them.
		$wbea_teams_section_heading_show = isset($settings['wbea_teams_section_heading_show']) ? $settings['wbea_teams_section_heading_show'] : '';
		$wbea_team_carousels = isset($settings['wbea_team_carousels']) ? $settings['wbea_team_carousels'] : [];
		$wbea_team_carousels_items = isset($settings['wbea_team_carousel_number']) ? $settings['wbea_team_carousel_number'] : 3; // Default to 3 items
		$wbea_team_carousels_arrows = isset($settings['wbea_team_carousel_arrows']) ? $settings['wbea_team_carousel_arrows'] : 'no';
		$wbea_team_carousels_loops = isset($settings['wbea_team_carousel_loop']) ? $settings['wbea_team_carousel_loop'] : 'no';
		$wbea_team_carousels_pause = isset($settings['wbea_team_carousel_pause']) ? $settings['wbea_team_carousel_pause'] : 'no';
		$wbea_team_carousels_autoplay = isset($settings['wbea_team_carousel_autoplay']) ? $settings['wbea_team_carousel_autoplay'] : 'no';
		$wbea_team_carousels_autoplay_speed = isset($settings['wbea_team_carousel_autoplay_speed']) ? $settings['wbea_team_carousel_autoplay_speed'] : 5000;
		$wbea_team_carousels_autoplay_animation = isset($settings['wbea_team_carousel_autoplay_animation']) ? $settings['wbea_team_carousel_autoplay_animation'] : '';
		$wbea_team_carousel_bg_pattern = isset($settings['wbea_team_carousel_bg_pattern']) ? $settings['wbea_team_carousel_bg_pattern'] : '';
	
		// Background pattern URLs
		$team_pattern_url = '';
		switch ($wbea_team_carousel_bg_pattern) {
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
				.wbea-team-bg {
					background-image: url('<?php echo esc_url($team_pattern_url); ?>');
				}
			</style>
			<?php
		}
	
		// Render the section heading if needed.
		if ($wbea_teams_section_heading_show === 'yes') {
			$wbea_teams_section_subheading_show = isset($settings['wbea_teams_section_subheading_show']) ? $settings['wbea_teams_section_subheading_show'] : '';
			$wbea_teams_section_subheading = isset($settings['wbea_teams_section_subheading']) ? $settings['wbea_teams_section_subheading'] : '';
			$wbea_section_heading_separator_variation = isset($settings['wbea_section_heading_separator_variation']) ? $settings['wbea_section_heading_separator_variation'] : '';
			$wbea_teams_section_heading = isset($settings['wbea_teams_section_heading']) ? $settings['wbea_teams_section_heading'] : '';
			$wbea_teams_section_heading_tag = isset($settings['wbea_teams_section_heading_tag']) ? $settings['wbea_teams_section_heading_tag'] : 'h3';
			$wbea_teams_section_desc_show = isset($settings['wbea_teams_section_desc_show']) ? $settings['wbea_teams_section_desc_show'] : '';
			$wbea_teams_section_desc = isset($settings['wbea_teams_section_desc']) ? $settings['wbea_teams_section_desc'] : '';
			?>            
			<div class="wbea-section-title wbea-service-title">
				<?php if ($wbea_teams_section_subheading_show === 'yes') { ?>
					<span class="<?php echo esc_attr($wbea_section_heading_separator_variation); ?> wbea-section-subheading"><?php echo esc_html($wbea_teams_section_subheading); ?></span>
				<?php } ?>
				<<?php echo esc_attr($wbea_teams_section_heading_tag); ?> class="wbea-section-heading"><?php echo esc_html($wbea_teams_section_heading); ?></<?php echo esc_attr($wbea_teams_section_heading_tag); ?>>
				
				<?php if ($wbea_teams_section_desc_show === 'yes') { ?>
					<p><?php echo wp_kses_post($wbea_teams_section_desc); ?></p>
				<?php } ?>
			</div>
			<?php
		}
	
		// Render the team carousel if there are items.
		if (!empty($wbea_team_carousels)) {
			?>
			<div class="wbea-team-carousel owl-carousel <?php echo esc_attr($wbea_team_carousels_arrows === 'yes' ? 'wbea-carousel-top-arrows' : ''); ?> <?php echo esc_attr($wbea_teams_section_heading_show === 'yes' ? 'wbea-heading-top' : ''); ?>" 
				wbea-team-items="<?php echo esc_attr($wbea_team_carousels_items); ?>" 
				wbea-team-arrows="<?php echo esc_attr($wbea_team_carousels_arrows); ?>" 
				wbea-team-loops="<?php echo esc_attr($wbea_team_carousels_loops); ?>" 
				wbea-team-pause="<?php echo esc_attr($wbea_team_carousels_pause); ?>" 
				wbea-team-autoplay="<?php echo esc_attr($wbea_team_carousels_autoplay); ?>" 
				wbea-team-autoplay-speed="<?php echo esc_attr($wbea_team_carousels_autoplay_speed); ?>" 
				wbea-team-autoplay-animation="<?php echo esc_attr($wbea_team_carousels_autoplay_animation); ?>">
				
				<?php
				foreach ($wbea_team_carousels as $team) {
					$team_image = isset($team['wbea_team_carousel_image']['url']) ? esc_url($team['wbea_team_carousel_image']['url']) : '';
					$team_name = isset($team['wbea_team_carousel_name']) ? esc_html($team['wbea_team_carousel_name']) : '';
					$team_designation = isset($team['wbea_team_carousel_designation']) ? esc_html($team['wbea_team_carousel_designation']) : '';
	
					$social_links = [
						'fb_url' => 'fa-facebook-square',
						'tw_url' => 'fa-twitter-square',
						'ln_url' => 'fa-linkedin-square',
						'insta_url' => 'fa-instagram',
					];
					?>
					<div class="wbea-single-team">
						<?php if ($team_image) { ?>
							<div class="wbea-team-img" style="background-image:url(<?php echo esc_url($team_image); ?>)"></div>
						<?php } ?>
						<div class="wbea-team-bg">
							<div class="wbea-team-content">
								<h4 class="wbea-team-name"><?php echo esc_html($team_name); ?></h4>
								<p class="wbea-team-desg"><?php echo esc_html($team_designation); ?></p>
								<div class="wbea-team-social">
									<?php
									foreach ($social_links as $key => $icon) {
										$url = isset($team["wbea_team_carousel_{$key}"]['url']) ? esc_url($team["wbea_team_carousel_{$key}"]['url']) : '';
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