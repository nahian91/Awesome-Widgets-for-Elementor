<?php
/**
 * Awesome Team Widget.
 *
 * Elementor widget that inserts a team into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Widget_Awesome_Team extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve affiliate products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Team', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve affiliate products widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
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
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   	$this->start_controls_section(
	       'awea_team_image_content',
		    [
		        'label' => esc_html__('Image', 'awesome-widgets-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,	   
		    ]
	    );

		$this->add_control(
			'awea_team_image_upload',
			[
				'label' => esc_html__( 'Choose Image', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_team_contents',
			[
				'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,		
			]
		);

		$this->add_control(
			'awea_team_name',
			[
				'label' => esc_html__( 'Name', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'awesome-widgets-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'awesome-widgets-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'awea_team_designation',
			[
				'label' => esc_html__( 'Designation', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'awesome-widgets-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'awesome-widgets-elementor' ),
				'label_block' => true
			]
		);
		
		$this->end_controls_section();

		// Start of the Content tab section
		$this->start_controls_section(
			'awea_team_socials',
			[
				'label' => esc_html__('Socials', 'awesome-widgets-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Repeater Initialization
		$repeater = new \Elementor\Repeater();

		// Social Media Title
		$repeater->add_control(
			'awea_team_socials_title',
			[
				'label' => esc_html__('Title', 'awesome-widgets-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Facebook', 'awesome-widgets-elementor'),
				'label_block' => true,
			]
		);

		// Social Media Icon
		$repeater->add_control(
			'awea_team_socials_icon',
			[
				'label' => esc_html__('Icon', 'awesome-widgets-elementor'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'fa-brands',
				],
				'fa-brands' => [
					'facebook', 'twitter', 'instagram', 'linkedin', 'youtube',
					'pinterest', 'whatsapp', 'telegram', 'tiktok', 'snapchat',
					'reddit', 'tumblr', 'github', 'gitlab', 'slack', 'skype',
					'dribbble', 'behance', 'flickr', 'medium', 'twitch',
					'discord', 'vimeo', 'spotify', 'soundcloud', 'weibo',
					'vk', 'messenger', 'quora', 'foursquare', 'xing', 
					'goodreads', 'rss', 'yelp'
				],
				'show_label' => false,
			]
		);

		// Social Media Link
		$repeater->add_control(
			'awea_team_socials_link',
			[
				'label' => esc_html__('Link', 'awesome-widgets-elementor'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		// Add Repeater to Section
		$this->add_control(
			'awea_team_socials_list',
			[
				'label' => esc_html__('Social Media Links', 'awesome-widgets-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'awea_team_socials_title' => esc_html__('Facebook', 'awesome-widgets-elementor'),
						'awea_team_socials_icon' => ['value' => 'fab fa-facebook', 'library' => 'fa-brands'],
						'awea_team_socials_link' => ['url' => 'https://facebook.com'],
					],
					[
						'awea_team_socials_title' => esc_html__('Twitter', 'awesome-widgets-elementor'),
						'awea_team_socials_icon' => ['value' => 'fab fa-twitter', 'library' => 'fa-brands'],
						'awea_team_socials_link' => ['url' => 'https://twitter.com'],
					],
					[
						'awea_team_socials_title' => esc_html__('Instagram', 'awesome-widgets-elementor'),
						'awea_team_socials_icon' => ['value' => 'fab fa-instagram', 'library' => 'fa-brands'],
						'awea_team_socials_link' => ['url' => 'https://instagram.com'],
					],
					[
						'awea_team_socials_title' => esc_html__('LinkedIn', 'awesome-widgets-elementor'),
						'awea_team_socials_icon' => ['value' => 'fab fa-linkedin', 'library' => 'fa-brands'],
						'awea_team_socials_link' => ['url' => 'https://linkedin.com'],
					],
				],
				'title_field' => '{{{ awea_team_socials_title }}}',
			]
		);

		$this->end_controls_section();
		
		// start of the Style tab section
		$this->start_controls_section(
			'awea_team_layout_style',
			[
				'label' => esc_html__( 'Layouts', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Team Background Color
		$this->add_control(
			'awea_team_background_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Team Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_team_border',
				'selector' => '{{WRAPPER}} .awea-team',
			]
		);	

		// Team Padding
		$this->add_control(
			'awea_team_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_team_align',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} .awea-team' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_team_image_style',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'awea_image_width',
			[
				'label' => esc_html__('Image Width', 'awesome-widgets-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%', 'px', 'vw'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'vw' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-team img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Image Box Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_image_box_border',
				'selector' => '{{WRAPPER}} .awea-team img',
			]
		);	
		
		// Image Box Border Radius
		$this->add_control(
			'awea_image_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-team img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_team_contents_style',
			[
				'label' => esc_html__( 'Contents', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_team_contents_name_options',
			[
				'label' => esc_html__( 'Name', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Team Title Color
		$this->add_control(
			'awea_team_contents_name_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-content h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Team Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_team_contents_name_typography',
				'selector' => '{{WRAPPER}} .awea-team-content h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_team_contents_desg_options',
			[
				'label' => esc_html__( 'Designation', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Team Title Color
		$this->add_control(
			'awea_team_contents_desg_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-content h4 span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Team Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_team_contents_desg_typography',
				'selector' => '{{WRAPPER}} .awea-team-content h4 span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_team_social_style',
			[
				'label' => esc_html__( 'Socials', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Start of Tabs
		$this->start_controls_tabs('awea_team_social_tabs');

		// Normal Tab
		$this->start_controls_tab(
			'awea_team_social_tabs_normal',
			[
				'label' => esc_html__('Normal', 'awesome-widgets-elementor'),
			]
		);

		$this->add_control(
			'awea_team_social_size',
			[
				'label' => esc_html__( 'Size', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-team-social a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_team_social_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-social a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'awea_team_social_tabs_hover',
			[
				'label' => esc_html__('Hover', 'awesome-widgets-elementor'),
			]
		);

		$this->add_control(
			'awea_team_social_color_hover',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-team-social a:hover' => 'color: {{VALUE}}',
				],
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
		$awea_team_image_upload = $settings['awea_team_image_upload'];
		$awea_team_image_upload_url = $awea_team_image_upload['url'];
		$awea_team_name = $settings['awea_team_name'];
		$awea_team_designation = $settings['awea_team_designation'];
		$awea_team_socials_list = $settings['awea_team_socials_list'];
        ?>
			<div class="awea-team">
				<img src="<?php echo $awea_team_image_upload_url;?>" alt="<?php echo $awea_team_name;?>">
				<div class="awea-team-content">
					<h4><?php echo $awea_team_name;?> <span><?php echo $awea_team_designation;?></span></h4>
					<div class="awea-team-social">
						<?php foreach($awea_team_socials_list as $social) {
							$link = $social['awea_team_socials_link']['url'];
							$icon = $social['awea_team_socials_icon']['value'];
						?>
							<a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
								<i class="<?php echo esc_attr($icon); ?>"></i>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
       <?php
	}
}
