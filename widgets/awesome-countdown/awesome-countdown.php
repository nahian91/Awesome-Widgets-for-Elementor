<?php
namespace Elementor;

class Widget_Awesome_Countdown extends Widget_Base {

	public function get_name() {
		return 'awea_countdown';
	}

	public function get_title() {
		return esc_html__('Awesome Countdown', 'awesome-widgets');
	}

	public function get_icon() {
		return 'fa fa-clock-o'; // Font Awesome 4
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	protected function _register_controls() {
		// Countdown Title
		$this->start_controls_section(
			'awea_countdown_content',
			[
				'label' => esc_html__('Countdown Settings', 'awesome-widgets'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'awea_countdown_title',
			[
				'label' => esc_html__('Title', 'awesome-widgets'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Hurry Up! Offer ends in:', 'awesome-widgets'),
			]
		);

		$this->add_control(
			'awea_countdown_datetime',
			[
				'label' => esc_html__('Target Date & Time', 'awesome-widgets'),
				'type' => Controls_Manager::DATE_TIME,
				'default' => date('Y-m-d H:i', strtotime('+1 day')),
			]
		);

		$this->end_controls_section();

		// Style Section
		$this->start_controls_section(
			'awea_countdown_style',
			[
				'label' => esc_html__('Style', 'awesome-widgets'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_title_color',
			[
				'label' => esc_html__('Title Color', 'awesome-widgets'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-countdown-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_timer_color',
			[
				'label' => esc_html__('Timer Color', 'awesome-widgets'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-countdown span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
    $settings = $this->get_settings_for_display();
    $target_time = strtotime($settings['awea_countdown_datetime']);
    $now = time();
    $remaining_seconds = max($target_time - $now, 0);
    $uniq_id = 'awea-timer-' . $this->get_id();
    ?>

    <div class="awea-countdown-widget">
        <?php if (!empty($settings['awea_countdown_title'])) : ?>
            <h4 class="awea-countdown-title"><?php echo esc_html($settings['awea_countdown_title']); ?></h4>
        <?php endif; ?>

        <div class="awea-countdown-wrapper" id="<?php echo esc_attr($uniq_id); ?>" data-time="<?php echo esc_attr($remaining_seconds); ?>">
            <span class="days">00</span> :
            <span class="hours">00</span> :
            <span class="minutes">00</span> :
            <span class="seconds">00</span>
        </div>
    </div>

    <?php
}

}
