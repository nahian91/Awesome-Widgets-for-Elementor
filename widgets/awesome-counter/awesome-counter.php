<?php
namespace Elementor;

class Widget_Awesome_Counter extends Widget_Base {

	public function get_name() {
		return 'awea_counter';
	}

	public function get_title() {
		return esc_html__('Awesome Counter', 'awesome-widgets');
	}

	public function get_icon() {
		return 'fa fa-sort-numeric-asc'; // Font Awesome 4
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'awea_counter_content',
			[
				'label' => esc_html__('Counter Settings', 'awesome-widgets'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'awea_counter_title',
			[
				'label' => esc_html__('Title', 'awesome-widgets'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Projects Completed', 'awesome-widgets'),
			]
		);

		$this->add_control(
			'awea_counter_start',
			[
				'label' => esc_html__('Starting Number', 'awesome-widgets'),
				'type' => Controls_Manager::NUMBER,
				'default' => 0,
			]
		);

		$this->add_control(
			'awea_counter_end',
			[
				'label' => esc_html__('Ending Number', 'awesome-widgets'),
				'type' => Controls_Manager::NUMBER,
				'default' => 100,
			]
		);

		$this->add_control(
			'awea_counter_suffix',
			[
				'label' => esc_html__('Suffix (e.g. +, %)', 'awesome-widgets'),
				'type' => Controls_Manager::TEXT,
				'default' => '+',
			]
		);

		$this->add_control(
			'awea_counter_icon',
			[
				'label' => esc_html__('Icon', 'awesome-widgets'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-trophy',
					'library' => 'fa-solid',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'awea_counter_style',
			[
				'label' => esc_html__('Style', 'awesome-widgets'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_number_color',
			[
				'label' => esc_html__('Number Color', 'awesome-widgets'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-number' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'awea_title_color',
			[
				'label' => esc_html__('Title Color', 'awesome-widgets'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-counter-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$unique_id = 'awea-counter-' . $this->get_id();

		$this->add_render_attribute('wrapper', 'id', $unique_id);
		?>

		<div class="awea-counter-widget" <?php echo $this->get_render_attribute_string('wrapper'); ?>>
			<?php if (!empty($settings['awea_counter_icon']['value'])) : ?>
				<div class="awea-counter-icon">
					<i class="<?php echo esc_attr($settings['awea_counter_icon']['value']); ?>"></i>
				</div>
			<?php endif; ?>

			<div class="awea-counter-number" data-start="<?php echo esc_attr($settings['awea_counter_start']); ?>"
				data-end="<?php echo esc_attr($settings['awea_counter_end']); ?>">
				<?php echo esc_html($settings['awea_counter_start']); ?>
			</div>

			<?php if (!empty($settings['awea_counter_suffix'])) : ?>
				<span class="awea-counter-suffix"><?php echo esc_html($settings['awea_counter_suffix']); ?></span>
			<?php endif; ?>

			<?php if (!empty($settings['awea_counter_title'])) : ?>
				<div class="awea-counter-title"><?php echo esc_html($settings['awea_counter_title']); ?></div>
			<?php endif; ?>
		</div>

		<script>
			
		</script>

		<style>
			.awea-counter-widget {
				text-align: center;
			}
			.awea-counter-number {
				font-size: 42px;
				font-weight: 700;
			}
			.awea-counter-suffix {
				font-size: 24px;
				margin-left: 5px;
			}
			.awea-counter-icon {
				font-size: 36px;
				margin-bottom: 10px;
			}
			.awea-counter-title {
				font-size: 18px;
				margin-top: 5px;
			}
		</style>

		<?php
	}
}
