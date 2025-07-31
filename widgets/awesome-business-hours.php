<?php
/**
 * Awesome Business Hours Widget.
 *
 * Elementor widget that inserts a cta into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Widget_Awesome_Business_Hours extends Widget_Base {

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
		return 'awesome-business-hours';
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
		return esc_html__( 'Business Hours', 'awesome-widgets-elementor' );
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
		return 'eicon-call-to-action';
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
	       'awea_business_hours_content_title',
		    [
		        'label' => esc_html__('Title', 'awesome-widgets-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		// Business Hours Title
		$this->add_control(
			'awea_business_hours_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'We Are Awesome Business Hours!', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_control(
			'awea_business_hours_title_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-title h4' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'awea_business_hours_section_hours',
			[
				'label' => esc_html__('Hours List', 'awesome-widgets-elementor'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'awea_business_hours_day',
			[
				'label' => esc_html__('Day', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Monday', 'awesome-widgets-elementor'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'awea_business_hours_hour',
			[
				'label' => esc_html__('Hours', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('09:00 - 19:00', 'awesome-widgets-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'awea_business_hours_list',
			[
				'label' => esc_html__('Add Hours', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					['day' => 'Sunday', 'hours' => '09:00 - 19:00'],
					['day' => 'Monday', 'hours' => '09:00 - 19:00'],
					['day' => 'Tuesday', 'hours' => '09:00 - 19:00'],
					['day' => 'Wednesday', 'hours' => '09:00 - 19:00'],
					['day' => 'Thursday', 'hours' => '09:00 - 19:00'],
					['day' => 'Friday', 'hours' => '09:00 - 19:00'],
					['day' => 'Satrday', 'hours' => '09:00 - 19:00'],
				],
				'title_field' => '{{{ awea_business_hours_day }}}',
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_business_hours_title_style',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Business Hours Title Color
		$this->add_control(
			'awea_business_hours_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-title h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Business Hours Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_business_hours_title_typography',
				'selector' => '{{WRAPPER}} .awea-business-hours-title h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// Business Hours Background Color
		$this->add_control(
			'awea_business_hours_title_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-title' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Business Hours Border Radius
		$this->add_control(
			'awea_business_hours_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Business Hours Padding
		$this->add_control(
			'awea_business_hours_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_business_hours_items_style',
			[
				'label' => esc_html__( 'Items', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Business Hours Background Color
		$this->add_control(
			'awea_business_hours_background_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Business Hours Border Radius
		$this->add_control(
			'awea_business_hours_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Business Hours Padding
		$this->add_control(
			'awea_business_hours_content_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_business_hours_days_options',
			[
				'label' => esc_html__( 'Days', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Business Hours Title Color
		$this->add_control(
			'awea_business_hours_days_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-content ul li' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Business Hours Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_business_hours_days_typography',
				'selector' => '{{WRAPPER}} .awea-business-hours-content ul li',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_business_hours_hour_options',
			[
				'label' => esc_html__( 'Hours', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Business Hours Title Color
		$this->add_control(
			'awea_business_hours_hour_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-business-hours-content ul li span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Business Hours Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_business_hours_hour_typography',
				'selector' => '{{WRAPPER}} .awea-business-hours-content ul li span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

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
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$awea_business_hours_title = $settings['awea_business_hours_title'];
		$awea_business_hours_list = $settings['awea_business_hours_list'];
       ?>
		<div class="awea-business-hours">
			<div class="awea-business-hours-title">
				<h4><?php echo $awea_business_hours_title;?></h4>
			</div>
			<div class="awea-business-hours-content">
				<ul>
					<?php 
						foreach($awea_business_hours_list as $hour) {
							?>
								<li><?php echo $hour['awea_business_hours_day'];?><span><?php echo $hour['awea_business_hours_hour'];?></span></li>
							<?php 
						}
					?>
				</ul>
			</div>
		</div>
       <?php
	}
}
