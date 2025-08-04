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
		return [ 'accordion', 'faq', 'awesome'];
	}


	protected function register_controls() {		
		// start of the Content tab section
	   	$this->start_controls_section(
	       'faq_content',
		    [
		        'label' => esc_html__('Content', 'awesome-elementor-widgets'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );
		
		// FAQ
		$repeater = new Repeater();

		// FAQ Title
		$repeater->add_control(
			'awea_faq_title',
			[
				'label' => esc_html__( 'FAQ Question', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Where can I find your warranty policy?', 'awesome-elementor-widgets' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// FAQ Content
		$repeater->add_control(
			'awea_faq_content',
			[
				'label' => esc_html__( 'FAQ Answer', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' ),
			]
		);

		// FAQ Lists
		$this->add_control(
			'awea_faq_list',
			[
				'label' => esc_html__( 'FAQ Lists', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ awea_faq_title }}}',
				'separator' => 'before',
				'default' => [
					[
						'awea_faq_title' => esc_html__( 'Do you offer gift wrapping or special packaging?', 'awesome-elementor-widgets' ),
						'awea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' )
					],
					[
						'awea_faq_title' => esc_html__( 'Can I track my order in real-time?', 'awesome-elementor-widgets'),
						'awea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' )
					],
					[
						'awea_faq_title' => esc_html__( 'Do you ship internationally?', 'awesome-elementor-widgets'),
						'awea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' )
					],
					[
						'awea_faq_title' => esc_html__( 'How do I apply a discount code?', 'awesome-elementor-widgets'),
						'awea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' )
					],
					[
						'awea_faq_title' => esc_html__( 'Can I request a custom or personalized product?', 'awesome-elementor-widgets'),
						'awea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' )
					],
					[
						'awea_faq_title' => esc_html__( 'What should I do if I receive a damaged item?', 'awesome-elementor-widgets'),
						'awea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'awesome-elementor-widgets' )
					]
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_faq_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-elementor-widgets'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_faq_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Awesome Widgets for Elementor Premium is coming soon with more widgets, features, and customization options.', 'awesome-elementor-widgets')
				)
			]  
		);
		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_faq_options',
			[
				'label' => esc_html__( 'Layouts', 'awesome-elementor-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Border Color
		$this->add_control(
			'awea_faq_border_color',
			[
				'label' => esc_html__( 'Border Color', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'awea_faq_title_options',
			[
				'label' => esc_html__( 'FAQ Question', 'awesome-elementor-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Title Color
		$this->add_control(
			'awea_faq_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq li span' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Color
		$this->add_control(
			'awea_faq_title_border',
			[
				'label' => esc_html__( 'Border Color', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq li' => 'border-color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Active Color
		$this->add_control(
			'awea_faq_title_border_active_color',
			[
				'label' => esc_html__( 'Border Active', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq li span.active' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_faq_title_typography',
				'selector' => '{{WRAPPER}} .awea-faq li span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_faq_desc_options',
			[
				'label' => esc_html__( 'FAQ Answer', 'awesome-elementor-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Description Color
		$this->add_control(
			'awea_faq_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq li, {{WRAPPER}} .awea-faq li p, {{WRAPPER}} .awea-faq li ul, {{WRAPPER}} .awea-faq li ol' => 'color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_faq_desc_typography',
				'selector' => '{{WRAPPER}} .awea-faq li, {{WRAPPER}} .awea-faq li p, {{WRAPPER}} .awea-faq li ul, {{WRAPPER}} .awea-faq li ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_faq_icon_options',
			[
				'label' => esc_html__( 'Icon', 'awesome-elementor-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Icon Active Color
		$this->add_control(
			'awea_faq_icon_active_color',
			[
				'label' => esc_html__( 'Open State', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq span.active::after' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Icon Color
		$this->add_control(
			'awea_faq_icon_color',
			[
				'label' => esc_html__( 'Close State', 'awesome-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-faq span:after' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

	}

	protected function render() {
		// Get our input from the widget settings.
		$settings = $this->get_settings_for_display();        
		$awea_faq_list = isset($settings['awea_faq_list']) ? $settings['awea_faq_list'] : [];       
	
		if (!empty($awea_faq_list)) {
			?>
			<ul class="awea-faq">
				<?php
				foreach ($awea_faq_list as $list) {
					// Sanitize and escape data at the point of output
					$faq_title = isset($list['awea_faq_title']) ? esc_html($list['awea_faq_title']) : '';
					$faq_content = isset($list['awea_faq_content']) ? wp_kses_post($list['awea_faq_content']) : ''; // Allow certain HTML in content
					?>
					<li>
						<h4><span><?php echo esc_html($faq_title); ?></span></h4>
						<p><?php echo wp_kses_post($faq_content); ?></p>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
		}
	}	
}