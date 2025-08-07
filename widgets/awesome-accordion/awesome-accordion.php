<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Accordion extends Widget_Base {

	public function get_name() {
		return 'awesome-accordion';
	}

	public function get_title() {
		return esc_html__('Accordion', 'awesome-widgets-elementor');
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	public function get_keywords() {
		return [ 'accordion', 'Accordion', 'awesome'];
	}


	protected function register_controls() {		
		// start of the Content tab section
	   	$this->start_controls_section(
	       'accordion_content',
		    [
		        'label' => esc_html__('Content', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );
		
		// Accordion
		$repeater = new Repeater();

		// Accordion Title
		$repeater->add_control(
			'awea_accordion_title',
			[
				'label' => esc_html__( 'Accordion Question', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Where can I find your warranty policy?', 'awesome-widgets-elementor' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Accordion Content
		$repeater->add_control(
			'awea_accordion_content',
			[
				'label' => esc_html__( 'Accordion Answer', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' ),
			]
		);

		// Accordion Lists
		$this->add_control(
			'awea_accordion_list',
			[
				'label' => esc_html__( 'Accordion Lists', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ awea_accordion_title }}}',
				'separator' => 'before',
				'default' => [
					[
						'awea_accordion_title' => esc_html__( 'Do you offer gift wrapping or special packaging?', 'awesome-widgets-elementor' ),
						'awea_accordion_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' )
					],
					[
						'awea_accordion_title' => esc_html__( 'Can I track my order in real-time?', 'awesome-widgets-elementor'),
						'awea_accordion_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' )
					],
					[
						'awea_accordion_title' => esc_html__( 'Do you ship internationally?', 'awesome-widgets-elementor'),
						'awea_accordion_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' )
					],
					[
						'awea_accordion_title' => esc_html__( 'How do I apply a discount code?', 'awesome-widgets-elementor'),
						'awea_accordion_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' )
					],
					[
						'awea_accordion_title' => esc_html__( 'Can I request a custom or personalized product?', 'awesome-widgets-elementor'),
						'awea_accordion_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' )
					],
					[
						'awea_accordion_title' => esc_html__( 'What should I do if I receive a damaged item?', 'awesome-widgets-elementor'),
						'awea_accordion_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-widgets-elementor' )
					]
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_accordion_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_accordion_pro_message_notice', 
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
			'awea_accordion_options',
			[
				'label' => esc_html__( 'Layouts', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Accordion Border Color
		$this->add_control(
			'awea_accordion_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'awea_accordion_title_options',
			[
				'label' => esc_html__( 'Accordion Question', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Accordion Title Color
		$this->add_control(
			'awea_accordion_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion li span' => 'color: {{VALUE}}',
				],
			]
		);

		// Accordion Title Border Color
		$this->add_control(
			'awea_accordion_title_border',
			[
				'label' => esc_html__( 'Border Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion li' => 'border-color: {{VALUE}}',
				],
			]
		);

		// Accordion Title Border Active Color
		$this->add_control(
			'awea_accordion_title_border_active_color',
			[
				'label' => esc_html__( 'Border Active', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion li span.active' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		// Accordion Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_accordion_title_typography',
				'selector' => '{{WRAPPER}} .awea-accordion li span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_accordion_desc_options',
			[
				'label' => esc_html__( 'Accordion Answer', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Accordion Description Color
		$this->add_control(
			'awea_accordion_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion li, {{WRAPPER}} .awea-accordion li p, {{WRAPPER}} .awea-accordion li ul, {{WRAPPER}} .awea-accordion li ol' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Accordion Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_accordion_desc_typography',
				'selector' => '{{WRAPPER}} .awea-accordion li, {{WRAPPER}} .awea-accordion li p, {{WRAPPER}} .awea-accordion li ul, {{WRAPPER}} .awea-accordion li ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_accordion_icon_options',
			[
				'label' => esc_html__( 'Icon', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Accordion Icon Active Color
		$this->add_control(
			'awea_accordion_icon_active_color',
			[
				'label' => esc_html__( 'Open State', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion span.active::after' => 'color: {{VALUE}}',
				],
			]
		);

		// Accordion Icon Color
		$this->add_control(
			'awea_accordion_icon_color',
			[
				'label' => esc_html__( 'Close State', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-accordion span:after' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

	}

	protected function render() {
		// Get our input from the widget settings.
		$settings = $this->get_settings_for_display();        
		$awea_accordion_list = isset($settings['awea_accordion_list']) ? $settings['awea_accordion_list'] : [];       
	
		if (!empty($awea_accordion_list)) {
			?>
			<ul class="awea-accordion">
				<?php
				foreach ($awea_accordion_list as $list) {
					// Sanitize and escape data at the point of output
					$accordion_title = isset($list['awea_accordion_title']) ? esc_html($list['awea_accordion_title']) : '';
					$accordion_content = isset($list['awea_accordion_content']) ? wp_kses_post($list['awea_accordion_content']) : ''; // Allow certain HTML in content
					?>
					<li>
						<h4><span><?php echo esc_html($accordion_title); ?></span></h4>
						<p><?php echo wp_kses_post($accordion_content); ?></p>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
		}
	}	
}