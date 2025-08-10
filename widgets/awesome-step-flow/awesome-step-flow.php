<?php
/**
 * Awesome Timeline Widget.
 *
 * Elementor widget that inserts a cta into the page
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

class Widget_Awesome_Step_Flow extends Widget_Base {

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
		return 'awesome-step-flow';
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
		return esc_html__( 'Step Flow', 'awesome-widgets-elementor' );
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
		return 'eicon-time-line';
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
		return [ 'step', 'awesome'];
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
	       'awea_step_flow_contents',
		    [
		        'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		$repeater = new Repeater();

		$repeater->add_control(
			'awea_step_flow_year',
			[
				'label' => esc_html__( 'Year/Range', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => '2020',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'awea_step_flow_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Developer',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'awea_step_flow_desc',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Describe your role or event here.',
			]
		);

		$this->add_control(
			'awea_step_flow_items',
			[
				'label' => esc_html__( 'Timeline Items', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
			[
				'awea_step_flow_year'  => '2008',
				'awea_step_flow_title' => 'Intern Developer',
				'awea_step_flow_desc'  => 'Worked on basic frontend tasks and learned company workflow. Gained hands-on experience with HTML, CSS, and JavaScript, and participated in team meetings to understand project lifecycles and client requirements.',
			],
			[
				'awea_step_flow_year'  => '2009 - 2012',
				'awea_step_flow_title' => 'Junior Developer',
				'awea_step_flow_desc'  => 'Handled minor feature updates and fixed bugs in the existing codebase. Assisted senior developers in troubleshooting issues and improving code quality, while steadily building knowledge of backend development and database management.',
			],
			[
				'awea_step_flow_year'  => '2012 - 2015',
				'awea_step_flow_title' => 'Mid-Level Developer',
				'awea_step_flow_desc'  => 'Developed new features and optimized the existing codebase for better performance and scalability. Collaborated closely with designers and product managers to ensure timely delivery of user-friendly applications, and started mentoring junior developers.',
			],
			[
				'awea_step_flow_year'  => '2015 - 2018',
				'awea_step_flow_title' => 'Senior Developer',
				'awea_step_flow_desc'  => 'Led a small development team, coordinating project deliverables and reviewing code to maintain standards. Played a key role in architecture planning, implementing automated testing, and improving deployment workflows for smoother releases.',
			],
			[
				'awea_step_flow_year'  => '2018 - Present',
				'awea_step_flow_title' => 'Lead Developer',
				'awea_step_flow_desc'  => 'Overseeing the entire development process, mentoring junior and mid-level developers, and managing deployments. Responsible for technical strategy, adopting new technologies, and ensuring the team delivers high-quality software aligned with business goals.',
			],
		],
				'title_field' => '{{{ awea_step_flow_year }}} - {{{ awea_step_flow_title }}}',
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_step_flow_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_step_flow_pro_message_notice', 
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
		
		// start of the Style tab section
		$this->start_controls_section(
			'awea_step_flow_layout_style',
			[
				'label' => esc_html__( 'Layouts', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Timeline Background Color
		$this->add_control(
			'awea_step_flow_background_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li .awea-timeline-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Timeline Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_step_flow_border',
				'selector' => '{{WRAPPER}} .awea-timeline-list li .awea-timeline-content',
			]
		);	

		// Timeline Border Radius
		$this->add_control(
			'awea_step_flow_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li .awea-timeline-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Timeline Padding
		$this->add_control(
			'awea_step_flow_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li .awea-timeline-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_step_flow_content_style',
			[
				'label' => esc_html__( 'Content', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Timeline Year Heading
		$this->add_control(
			'awea_step_flow_year_heading',
			[
				'label' => esc_html__( 'Year', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Timeline Year Color
		$this->add_control(
			'awea_step_flow_year_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li .awea-timeline-content span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// Timeline Year Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_step_flow_year_typography',
				'selector' => '{{WRAPPER}} .awea-timeline-list li .awea-timeline-content span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_step_flow_title_heading',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Sub Heading Color
		$this->add_control(
			'awea_step_flow_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li .awea-timeline-content h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// CTA Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_step_flow_title_typography',
				'selector' => '{{WRAPPER}} .awea-timeline-list li .awea-timeline-content h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_step_flow_desc_heading',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Sub Heading Color
		$this->add_control(
			'awea_step_flow_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li .awea-timeline-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// CTA Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_step_flow_desc_typography',
				'selector' => '{{WRAPPER}} .awea-timeline-list li .awea-timeline-content p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_step_flow_sep_style',
			[
				'label' => esc_html__( 'Separator', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_step_flow_sep1_heading',
			[
				'label' => esc_html__( 'Separator 1', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Title Color
		$this->add_control(
			'awea_step_flow_sep1_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list::after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_step_flow_sep1_width',
			[
				'label' => esc_html__( 'Width', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list::after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_step_flow_sep2_heading',
			[
				'label' => esc_html__( 'Separator 2', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_step_flow_sep2_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li::after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_step_flow_sep2_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .awea-timeline-list li::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		$awea_step_flow_items = $settings['awea_step_flow_items'];
       ?>
			<div class="process__list">
                                            <div class="process__single">
                                <span class="process__number">01</span>
                                <img decoding="async" src="https://infinityflamesoft.com/wp-content/uploads/2023/07/ifs-steps-1-1.png" class="process__img" alt="">
                                <h4 class="process__title">Discuss Ideas</h4>
                                <p class="process__desc">We discuss for better understandings of the client’s vision</p>
                            </div>
                                                        <div class="process__single">
                                <span class="process__number">02</span>
                                <img decoding="async" src="https://infinityflamesoft.com/wp-content/uploads/2023/07/ifs-steps-2-1.png" class="process__img" alt="">
                                <h4 class="process__title">Data Collection</h4>
                                <p class="process__desc">As per design brief we collect data and organize the server</p>
                            </div>
                                                        <div class="process__single">
                                <span class="process__number">03</span>
                                <img decoding="async" src="https://infinityflamesoft.com/wp-content/uploads/2023/07/ifs-steps-3-1.png" class="process__img" alt="">
                                <h4 class="process__title">Research</h4>
                                <p class="process__desc">Conduct intensive research to make perfect system for clients</p>
                            </div>
                                                        <div class="process__single">
                                <span class="process__number">04</span>
                                <img decoding="async" src="https://infinityflamesoft.com/wp-content/uploads/2023/07/ifs-steps-4-1.png" class="process__img" alt="">
                                <h4 class="process__title">Develop</h4>
                                <p class="process__desc">We use latest and up-to-date technology to build the systems</p>
                            </div>
                                                        <div class="process__single">
                                <span class="process__number"></span>
                                <img decoding="async" src="https://infinityflamesoft.com/wp-content/uploads/2023/07/ifs-steps-5-1.png" class="process__img" alt="">
                                <h4 class="process__title">Help to Grow</h4>
                                <p class="process__desc">We help to understand the proper use of the system and grow</p>
                            </div>
                                        </div>
       <?php
	}
}
