<?php 
/**
 * Awesome Icon Box Widget.
 *
 * Elementor widget that inserts a icon box into the page
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

class Widget_Awesome_Icon_Box extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Icon Box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-icon-box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Icon Box', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-icon-box';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Icon Box widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'awesome-widgets-elementor' ];
	}

	public function get_keywords() {
		return [ 'icon', 'box', 'awesome'];
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
	       'awea_icon_box_contents',
		    [
		        'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
		    ]
	    );

		// Icon Box Icon
		$this->add_control(
			'awea_icon_box_icon',
			[
				'label' => esc_html__( 'Choose Icon', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'label_block' => true,
			]
		);

		// Icon Box Title
		$this->add_control(
			'awea_icon_box_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading', 'awesome-widgets-elementor' ),
			]
		);

		// Icon Box Description
		$this->add_control(
			'awea_icon_box_des',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'awesome-widgets-elementor' ),
			]
		);

		// Icon Box Show Button?
		$this->add_control(
			'awea_icon_box_show_btn',
			[
				'label' => esc_html__( 'Show Button?', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'Hide', 'awesome-widgets-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Icon Box Button Title
		$this->add_control(
		    'awea_icon_box_btn_title',
			[
			    'label' => esc_html__('Button Text', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Read More', 'awesome-widgets-elementor'),
				'separator' => 'before',
				'condition' => [
					'awea_icon_box_show_btn' => 'yes'
				],
			]
		);

		// Icon Box Button Link
		$this->add_control(
		    'awea_icon_box_btn_link',
			[
			    'label' => esc_html__( 'Button Link', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://devnahian.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
				'condition' => [
					'awea_icon_box_show_btn' => 'yes'
				]
			]
		);

		// Icon Box Alignment
		$this->add_control(
			'awea_icon_box_alignment',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'separator' => 'before',
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
					'{{WRAPPER}} .awea-single-icon-box' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_icon_box_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-elementor-widgets'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_icon_box_pro_message_notice', 
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
			'awea_icon_box_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Icon Box Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_icon_box_border',
				'selector' => '{{WRAPPER}} .awea-single-icon-box',
			]
		);	

		// Icon Box Border Radius
		$this->add_control(
			'awea_icon_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_icon_box_icon_style',
			[
				'label' => esc_html__( 'Icon', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->add_control(
			'awea_icon_box_icon_size',
			[
				'label' => esc_html__( 'Size', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Box Color
		$this->add_control(
			'awea_icon_box_icon_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Icon Box Color
		$this->add_control(
			'awea_icon_box_icon_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Icon Box Padding
		$this->add_control(
			'awea_icon_box_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box-content-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_icon_box_contents_style',
			[
				'label' => esc_html__( 'Contents', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Icon Box Padding
		$this->add_control(
			'awea_icon_box_content_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title Color
		$this->add_control(
			'awea_icon_box_content_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->add_control(
			'awea_icon_box_title_options',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Title Color
		$this->add_control(
			'awea_icon_box_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box h4' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_icon_box_title_typography',
				'selector' => '{{WRAPPER}} .awea-single-icon-box h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_icon_box_title_margin',
			[
				'label' => esc_html__( 'Spacing', 'textdomain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_icon_box_desc_options',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Description Color
		$this->add_control(
			'awea_icon_box_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box p' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_icon_box_desc_typography',
				'selector' => '{{WRAPPER}} .awea-single-icon-box p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_image_box_desc_margin',
			[
				'label' => esc_html__( 'Spacing', 'textdomain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_icon_box_btn_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_icon_box_show_btn' => 'yes'
				],
			]
		);	

		$this->start_controls_tabs(
			'awea_icon_box_btn_style_tabs'
		);

		// Icon Box Button Normal Tab
		$this->start_controls_tab(
			'awea_icon_box_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Icon Box Button Color
		$this->add_control(
			'awea_icon_box_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Icon Box Button Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_icon_box_btn_typography',
				'selector' => '{{WRAPPER}} .awea-single-icon-box a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Icon Box Button Hover Tab
		$this->start_controls_tab(
			'awea_icon_box_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Icon Box Button Color
		$this->add_control(
			'awea_icon_box_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-icon-box a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
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
		$awea_icon_box_icon = $settings['awea_icon_box_icon']['value'];
		$awea_icon_box_title = $settings['awea_icon_box_title'];
		$awea_icon_box_des = $settings['awea_icon_box_des'];
		$awea_icon_box_btn_title = $settings['awea_icon_box_btn_title'];
		$awea_icon_box_btn_link = $settings['awea_icon_box_btn_link']['url'];
       ?>
			<div class="awea-single-icon-box">
				<div class="awea-single-icon-box-content-icon">
					<i class="<?php echo $awea_icon_box_icon;?>"></i>
				</div>
				<div class="awea-single-icon-box-content">
					<h4><?php echo esc_html($awea_icon_box_title);?></h4>
					<p><?php echo esc_html($awea_icon_box_des);?></p>
					<?php 
						if($awea_icon_box_btn_link) {
							?>
								<a href="<?php echo esc_url($awea_icon_box_btn_link);?>"><?php echo esc_html($awea_icon_box_btn_title);?></a>
							<?php
						}
					?>
				</div>
			</div>
       <?php
	}
}