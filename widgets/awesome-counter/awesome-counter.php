<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Counter extends Widget_Base {

	public function get_name() {
		return 'awesome-counter';
	}

	public function get_title() {
		return esc_html__('Counter', 'awesome-widgets-elementor');
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	public function get_keywords() {
		return [ 'counter', 'number', 'awesome'];
	}

	protected function register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'awea_counter_contents',
		    [
		        'label' => esc_html__('Content', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );

		$this->add_control(
			'awea_custom_panel_notice',
			[
				'type' => Controls_Manager::NOTICE,
				'notice_type' => 'warning',
				'dismissible' => true,
				'heading' => esc_html__( 'Notice', 'awesome-widgets-elementor' ),
				'content' => esc_html__( 'Please enable the AwesomeFont option from Elementor settings. Learn more.', 'awesome-widgets-elementor' ),
			]
		);

		// Counter Icon
		$this->add_control(
			'awea_counter_icon',
			[
				'label' => esc_html__( 'Icon', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-globe-africa',
					'library' => 'fa-solid',
				]
			]
		);

		// Counter Number
		$this->add_control(
			'awea_counter_number',
			[
				'label' => esc_html__( 'Number', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 100
			]
		);

		// Counter Number Suffix
		$this->add_control(
			'awea_counter_number_suffix',
			[
				'label' => esc_html__( 'Number Suffix', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => ' +',
				'placeholder' => esc_html__( 'Plus', 'awesome-widgets-elementor' ),
			]
		);
		
		// Counter Tite
		$this->add_control(
		    'awea_counter_title',
			[
			    'label' => esc_html__('Title', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Visiting Country', 'awesome-widgets-elementor'),
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_counter_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'awea_counter_pro_message_notice', 
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
			'awea_counter_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Background
		$this->add_control(
			'awea_counter_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Counter Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_counter_border',
				'selector' => '{{WRAPPER}} .awea-counter-box',
			]
		);

		// Counter Border Radius
		$this->add_control(
			'awea_counter_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-counter-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Counter Padding
		$this->add_control(
			'awea_counter_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-counter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_counter_icon_style',
			[
				'label' => esc_html__( 'Icon', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Icon Color
		$this->add_control(
			'awea_counter_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-number i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Counter Icon Size
		$this->add_control(
			'awea_counter_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 55,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-counter-number i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_counter_number_style',
			[
				'label' => esc_html__( 'Number', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Number Color
		$this->add_control(
			'awea_counter_number_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-content p span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Counter Number Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_counter_number_typography',
				'selector' => '{{WRAPPER}} .awea-counter-content p span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Counter Number Suffix Color
		$this->add_control(
			'awea_counter_number_suffix_color',
			[
				'label' => esc_html__( 'Suffix Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_counter_title_style',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Title Color
		$this->add_control(
			'awea_counter_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-content .awea-counter-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Counter Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_counter_title_typography',
				'selector' => '{{WRAPPER}} .awea-counter-content .awea-counter-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'awea_counter_title_tag',
			[
				'label' => __( 'Html Tag', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT,
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
				'default' => 'p',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

	}

	protected function render() {
		// Get our input from the widget settings.
		$settings = $this->get_settings_for_display();		
		$awea_counter_icon = isset($settings['awea_counter_icon']['value']) ? $settings['awea_counter_icon'] : '';
		$awea_counter_number = isset($settings['awea_counter_number']) ? intval($settings['awea_counter_number']) : 0;
		$awea_counter_number_suffix = isset($settings['awea_counter_number_suffix']) ? $settings['awea_counter_number_suffix'] : '';
		$awea_counter_title = isset($settings['awea_counter_title']) ? $settings['awea_counter_title'] : '';
		$awea_counter_title_tag = isset($settings['awea_counter_title_tag']) ? $settings['awea_counter_title_tag'] : 'h2';
	
		// Sanitize the counter number to ensure it's a valid number
		$awea_counter_number = intval($awea_counter_number);
		
		// Valid HTML tags for the counter title
		$valid_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span'];
		if (!in_array($awea_counter_title_tag, $valid_tags)) {
			$awea_counter_title_tag = 'h2'; // Default to h2 if invalid tag
		}
		?>
		<!-- Counter Start Here -->			
		<div class="awea-counter-box">
			<div class="awea-counter-number">				
				<?php if (!empty($awea_counter_icon)): ?>
					<i class="<?php echo esc_attr($awea_counter_icon['value']); ?>"></i>
				<?php endif; ?>
			</div>
			<div class="awea-counter-content">
				<p>
					<span class="awea-counter" aria-live="polite"><?php echo esc_html($awea_counter_number); ?></span>
					<?php echo esc_html($awea_counter_number_suffix); ?>
				</p>
				<<?php echo esc_attr($awea_counter_title_tag); ?> class="awea-counter-title">
					<?php echo esc_html($awea_counter_title); ?>
				</<?php echo esc_attr($awea_counter_title_tag); ?>>
			</div>
		</div>			
		<!-- Counter End Here -->
		<?php
	}	
}