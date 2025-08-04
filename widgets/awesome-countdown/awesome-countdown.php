<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Countdown extends Widget_Base {

	public function get_name() {
		return 'awea_countdown';
	}

	public function get_title() {
		return esc_html__('Countdown', 'awesome-widgets');
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	public function get_keywords() {
		return [ 'countdown', 'timer', 'awesome'];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'wbea_countdown_section',
			[
				'label' => __( 'Countdown', 'webbricks-addons' ),
			]
		);

		// Countdown Due Date
		$this->add_control(
			'wbea_countdown_due_date',
			[
				'label' => __( 'Due Date', 'webbricks-addons' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => gmdate('Y-m-d H:i', strtotime('+1 month')),
				'description' => sprintf(esc_html('Date set according to your timezone: %s.', 'webbricks-addons'), date_default_timezone_get()),
			]
		);

		// Countdown Show Days
		$this->add_control(
			'wbea_countdown_show_days',
			[
				'label' => __( 'Days', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Countdown Show Hours
		$this->add_control(
			'wbea_countdown_show_hours',
			[
				'label' => __( 'Hours', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Countdown Show Minutes
		$this->add_control(
			'wbea_countdown_show_minutes',
			[
				'label' => __( 'Minutes', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Countdown Show Seconds
		$this->add_control(
			'wbea_countdown_show_seconds',
			[
				'label' => __( 'Seconds', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section(); 
		
		// Countdown Expire Action
		$this->start_controls_section(
			'wbea_countdown_expire_section',
			[
				'label' => __( 'Countdown Expire' , 'webbricks-addons' )
			]
		);

		// Countdown Expire Type
		$this->add_control(
			'wbea_countdown_expire_show_type',
			[
				'label'			=> __('Expire Type', 'webbricks-addons'),
				'label_block'	=> false,
				'type'			=> Controls_Manager::SELECT,
                'description'   => __('Select whether you want to set a message or a redirect link after expire countdown', 'webbricks-addons'),
				'options'		=> [
					'message'		=> __('Message', 'webbricks-addons'),
					'redirect_link'		=> __('Redirect to Link', 'webbricks-addons')
				],
				'default' => 'message'
			]
		);

		// Countdown Expire Message
		$this->add_control(
			'wbea_countdown_expire_message',
			[
				'label'			=> __('Expire Message', 'webbricks-addons'),
				'type'			=> Controls_Manager::TEXTAREA,
				'default'		=> __('Sorry you are late!', 'webbricks-addons'),
				'condition'		=> [
					'wbea_countdown_expire_show_type' => 'message'
				]
			]
		);

		// Countdown Redirect Link
		$this->add_control(
			'wbea_countdown_expire_redirect_link',
			[
				'label'			=> __('Redirect On', 'webbricks-addons'),
				'type'			=> Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition'		=> [
					'wbea_countdown_expire_show_type' => 'redirect_link'
				],
			]
		);
		
		$this->end_controls_section();
		
		// Countdown Label Text
		$this->start_controls_section(
			'wbea_countdown_label_text_section',
			[
				'label' => __( 'Change Labels Text' , 'webbricks-addons' )
			]
		);

		// Countdowon Change Label Text
        $this->add_control(
			'wbea_countdown_change_labels',
			[
				'label' => __( 'Change Labels', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'webbricks-addons' ),
				'label_off' => __( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		// Countdowon Change Label Days
		$this->add_control(
			'wbea_countdown_label_days',
			[
				'label' => __( 'Days', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Days', 'webbricks-addons' ),
				'placeholder' => __( 'Days', 'webbricks-addons' ),
				'condition' => [
					'wbea_countdown_change_labels' => 'yes',
					'wbea_countdown_show_days' => 'yes',
				],
			]
		);

		// Countdowon Change Label Hours
		$this->add_control(
			'wbea_countdown_label_hours',
			[
				'label' => __( 'Hours', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Hours', 'webbricks-addons' ),
				'placeholder' => __( 'Hours', 'webbricks-addons' ),
				'condition' => [
					'wbea_countdown_change_labels' => 'yes',
					'wbea_countdown_show_hours' => 'yes',
				],
			]
		);

		// Countdowon Change Label Minutes
		$this->add_control(
			'wbea_countdown_label_minuts',
			[
				'label' => __( 'Minutes', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Minutes', 'webbricks-addons' ),
				'placeholder' => __( 'Minutes', 'webbricks-addons' ),
				'condition' => [
					'wbea_countdown_change_labels' => 'yes',
					'wbea_countdown_show_minutes' => 'yes',
				],
			]
		);

		// Countdowon Change Label Seconds
		$this->add_control(
			'wbea_countdown_label_seconds',
			[
				'label' => __( 'Seconds', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Seconds', 'webbricks-addons' ),
				'placeholder' => __( 'Seconds', 'webbricks-addons' ),
				'condition' => [
					'wbea_countdown_change_labels' => 'yes',
					'wbea_countdown_show_seconds' => 'yes',
				],
			]
		);
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_countdown_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wbea_countdown_pro_message_notice', 
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
		
		// Countdowon Layout Style
		$this->start_controls_section(   
			'wbea_countdown_style_section',
			[
				'label' => __( 'Layout', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Box Spacing
		$this->add_responsive_control(
			'wbea_countdown_box_spacing',
			[
				'label' => __( 'Box Gap', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .awea-single-countdown:not(:first-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
					'body:not(.rtl) {{WRAPPER}} .awea-single-countdown:not(:last-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
					'body.rtl {{WRAPPER}} .awea-single-countdown:not(:first-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
					'body.rtl {{WRAPPER}} .awea-single-countdown:not(:last-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
				],
			]
		);

		// Countdown Box Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_countdown_box_border',
	            'selector' => '{{WRAPPER}} .awea-single-countdown',
			]
		);

		// Countdown Box Radius
		$this->add_control(
			'wbea_countdown_box_border_radius',
			[
				'label' => __( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .awea-single-countdown' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
		// Countdown Digit
		$this->start_controls_section(
			'wbea_countdown_digits_style_section',
			[
				'label' => __( 'Digits', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Digit Color
		$this->add_control(
			'wbea_countdown_digits_color',
			[
				'label' => __( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-countdown-digits' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Countdown Digit Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_countdown_digits_typography',
				'selector' => '{{WRAPPER}} .awea-single-countdown-digits',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);
		$this->end_controls_section();   
		
		// Countdown Label
		$this->start_controls_section(
			'wbea_countdown_label_style_section',
			[
				'label' => __( 'Labels', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Label Color
		$this->add_control(
			'wbea_countdown_label_color',
			[
				'label' => __( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-countdown-label' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Countdown Label Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_countdown_label_typography',
				'selector' => '{{WRAPPER}} .awea-single-countdown-label',				
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]		
			]
		);

		// Countdown Label Border
		$this->add_control(
			'wbea_countdown_label_border_color',
			[
				'label' => __( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-single-countdown-label' => 'border-color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();   
		
		// Countdown Message
		$this->start_controls_section(
			'wbea_countdown_finish_message_style_section',
			[
				'label' => __( 'Message', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Message Color
		$this->add_control(
			'wbea_countdown_message_color',
			[
				'label' => __( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-finished-message' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Countdown Message Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_countdown_message_typography',
				'selector' => '{{WRAPPER}} .awea-finished-message',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);
		$this->end_controls_section();  
	}

	protected function render() {
    $settings = $this->get_settings();
    $day = $settings['wbea_countdown_show_days'];
    $hours = $settings['wbea_countdown_show_hours'];
    $minute = $settings['wbea_countdown_show_minutes'];
    $seconds = $settings['wbea_countdown_show_seconds'];
    $show_type = $settings['wbea_countdown_expire_show_type'];
    ?>
    <div class="awea-countdown-timer-widget">
        <div id="awea-countdown-timer-<?php echo esc_attr($this->get_id()); ?>" class="awea-countdown-timer-init"></div>
        <div id="awea-finished-message-<?php echo esc_attr($this->get_id()); ?>" class="awea-finished-message"></div>
    </div>
    <script>
        jQuery(function ($) {
            $('#awea-countdown-timer-<?php echo esc_attr($this->get_id()); ?>').countdowntimer({
                dateAndTime: "<?php echo esc_js(preg_replace('/-/', '/', $settings['wbea_countdown_due_date'])); ?>",
                regexpMatchFormat: "([0-9]{1,3}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
                regexpReplaceWith: "<?php
                if ($day == 'yes') {
                    echo '<div class=\'awea-single-countdown\'><span class=\'awea-single-countdown-digits\'>$1</span><span class=\'awea-single-countdown-label\'>'. esc_html($settings['wbea_countdown_label_days']) .'</span></div>';
                }
                if ($hours == 'yes') {
                    echo '<div class=\'awea-single-countdown\'><span class=\'awea-single-countdown-digits\'>$2</span><span class=\'awea-single-countdown-label\'>'. esc_html($settings['wbea_countdown_label_hours']) .'</span></div>';
                }
                if ($minute == 'yes') {
                    echo '<div class=\'awea-single-countdown\'><span class=\'awea-single-countdown-digits\'>$3</span><span class=\'awea-single-countdown-label\'>'. esc_html($settings['wbea_countdown_label_minuts']) .'</span></div>';
                }
                if ($seconds == 'yes') {
                    echo '<div class=\'awea-single-countdown\'><span class=\'awea-single-countdown-digits\'>$4</span><span class=\'awea-single-countdown-label\'>'. esc_html($settings['wbea_countdown_label_seconds']) .'</span></div>';
                }
                ?>",
                <?php if ($show_type === 'redirect_link'): ?>
                timeUp: function () {
                    <?php
                    $target = $settings['wbea_countdown_expire_redirect_link']['is_external'] ? '_blank' : '_self';
                    if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Plugin') && Plugin::$instance->editor->is_edit_mode()): ?>
                    $("#awea-finished-message-<?php echo esc_attr($this->get_id()); ?>").html("<?php echo esc_js(__('You cannot redirect URLs from Elementor Editor.', 'webbricks-addons')); ?>");
                    <?php else: ?>
                    window.open("<?php echo esc_url($settings['wbea_countdown_expire_redirect_link']['url']); ?>", "<?php echo esc_js($target); ?>");
                    <?php endif; ?>
                },
                <?php endif; ?>
                <?php if ($show_type === 'message'): ?>
                timeUp: function () {
                    $("#awea-finished-message-<?php echo esc_attr($this->get_id()); ?>").html("<span><?php echo esc_html($settings['wbea_countdown_expire_message']); ?></span>");
                },
                <?php endif; ?>
            });
        });
    </script>
    <?php
}

}