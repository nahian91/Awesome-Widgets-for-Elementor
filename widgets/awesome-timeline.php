<?php
/**
 * Awesome Timeline Widget.
 *
 * Elementor widget that inserts a cta into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Widget_Awesome_Timeline extends Widget_Base {

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
		return 'awesome-timeline';
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
		return esc_html__( 'Timeline', 'awesome-widgets-elementor' );
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
	       'awea_timeline_contents',
		    [
		        'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		$repeater = new Repeater();

		$repeater->add_control(
			'awea_timeline_year',
			[
				'label' => esc_html__( 'Year/Range', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => '2020',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'awea_timeline_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Developer',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'awea_timeline_desc',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Describe your role or event here.',
			]
		);

		$this->add_control(
			'awea_timeline_items',
			[
				'label' => esc_html__( 'Timeline Items', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'awea_timeline_year' => '2008',
						'awea_timeline_title' => 'Intern Developer',
						'awea_timeline_desc' => 'Worked on basic frontend tasks and learned company workflow.',
					],
					[
						'awea_timeline_year' => '2009 - 2012',
						'awea_timeline_title' => 'Junior Developer',
						'awea_timeline_desc' => 'Handled minor feature updates and fixed bugs.',
					],
				],
				'title_field' => '{{{ awea_timeline_year }}} - {{{ awea_timeline_title }}}',
			]
		);

		$this->end_controls_section();
		
		// start of the Style tab section
		$this->start_controls_section(
			'awea_timeline_layout_style',
			[
				'label' => esc_html__( 'Layouts', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Timeline Background Color
		$this->add_control(
			'awea_timeline_background_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-list li .timeline-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Timeline Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_timeline_border',
				'selector' => '{{WRAPPER}} .timeline-list li .timeline-content',
			]
		);	

		// Timeline Border Radius
		$this->add_control(
			'awea_timeline_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .timeline-list li .timeline-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Timeline Padding
		$this->add_control(
			'awea_timeline_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .timeline-list li .timeline-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_timeline_content_style',
			[
				'label' => esc_html__( 'Content', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Timeline Year Heading
		$this->add_control(
			'awea_timeline_year_heading',
			[
				'label' => esc_html__( 'Year', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Timeline Year Color
		$this->add_control(
			'awea_timeline_year_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-list li .timeline-content span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// Timeline Year Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_timeline_year_typography',
				'selector' => '{{WRAPPER}} .timeline-list li .timeline-content span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_timeline_title_heading',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Sub Heading Color
		$this->add_control(
			'awea_timeline_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-list li .timeline-content h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// CTA Sub Heading Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_timeline_title_typography',
				'selector' => '{{WRAPPER}} .timeline-list li .timeline-content h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_timeline_desc_heading',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Sub Heading Color
		$this->add_control(
			'awea_timeline_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-list li .timeline-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// CTA Sub Heading Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_timeline_desc_typography',
				'selector' => '{{WRAPPER}} .timeline-list li .timeline-content p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_timeline_sep_style',
			[
				'label' => esc_html__( 'Separator', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_timeline_sep1_heading',
			[
				'label' => esc_html__( 'Separator 1', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Title Color
		$this->add_control(
			'awea_timeline_sep1_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-list::after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_timeline_sep1_width',
			[
				'label' => esc_html__( 'Width', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'{{WRAPPER}} .timeline-list::after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_timeline_sep2_heading',
			[
				'label' => esc_html__( 'Separator 2', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_timeline_sep2_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-list li::after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_control(
			'awea_timeline_sep2_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .timeline-list li::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_timeline_desc_style',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// CTA Title Color
		$this->add_control(
			'awea_timeline_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-box p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// CTA Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_timeline_desc_typography',
				'selector' => '{{WRAPPER}} .cta-box p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
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
		$awea_timeline_items = $settings['awea_timeline_items'];
       ?>
			<ul class="timeline-list">
				<?php 
					foreach($awea_timeline_items as $item) {
						?>
						<li>
                            <div class="timeline-content">
                                <span><?php echo $item['awea_timeline_year'];?></span>
                                <h4><?php echo $item['awea_timeline_title'];?></h4>
                                <p><?php echo $item['awea_timeline_desc'];?></p>
                            </div>
                        </li>
						<?php
					}
 				?>                      
            </ul>
       <?php
	}
}
