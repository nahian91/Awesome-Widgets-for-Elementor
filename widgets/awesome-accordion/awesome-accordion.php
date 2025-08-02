<?php
namespace Elementor;

class Widget_Awesome_Accordion extends Widget_Base {

	public function get_name() {
		return 'awesome-accordion';
	}

	public function get_title() {
		return esc_html__('Awesome Accordion', 'awesome-widgets-elementor');
	}

	public function get_icon() {
		return 'fa fa-list';
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'awea_accordion_section',
			[
				'label' => esc_html__('Accordion Items', 'awesome-widgets-elementor'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Accordion Title', 'awesome-widgets-elementor'),
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__('Accordion content goes here.', 'awesome-widgets-elementor'),
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-plus',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'icon_active',
			[
				'label' => esc_html__('Active Icon', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-minus',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'accordion_items',
			[
				'label' => esc_html__('Accordion Items', 'awesome-widgets-elementor'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$widget_id = 'awea-accordion-' . $this->get_id();
		?>

		<div class="awea-accordion" id="<?php echo esc_attr($widget_id); ?>">
			<?php foreach ($settings['accordion_items'] as $index => $item) :
				$item_id = $widget_id . '-item-' . $index;
				$is_open = $index === 0 ? 'active' : '';
				$icon_class = $index === 0 ? $item['icon_active']['value'] : $item['icon']['value'];
				?>
				<div class="awea-accordion-item <?php echo esc_attr($is_open); ?>">
					<div class="awea-accordion-header" data-target="<?php echo esc_attr($item_id); ?>">
						<i class="awea-icon <?php echo esc_attr($icon_class); ?>" data-icon-default="<?php echo esc_attr($item['icon']['value']); ?>" data-icon-active="<?php echo esc_attr($item['icon_active']['value']); ?>"></i>
						<span><?php echo esc_html($item['title']); ?></span>
					</div>
					<div id="<?php echo esc_attr($item_id); ?>" class="awea-accordion-content" style="<?php echo $index === 0 ? 'display:block;' : ''; ?>">
						<?php echo wp_kses_post($item['content']); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<style>
			.awea-accordion { border: 1px solid #ddd; border-radius: 4px; }
			.awea-accordion-item + .awea-accordion-item { border-top: 1px solid #ddd; }
			.awea-accordion-header {
				padding: 12px 16px;
				background: #f7f7f7;
				cursor: pointer;
				display: flex;
				align-items: center;
				gap: 10px;
				transition: background 0.3s;
			}
			.awea-accordion-header:hover {
				background: #e0e0e0;
			}
			.awea-accordion-content {
				display: none;
				padding: 15px;
				background: #fff;
			}
			.awea-accordion-item.active .awea-accordion-content {
				display: block;
				animation: slideDown 0.3s ease-out;
			}
			@keyframes slideDown {
				from { opacity: 0; transform: translateY(-10px); }
				to { opacity: 1; transform: translateY(0); }
			}
		</style>

		<script>
			
		</script>
		<?php
	}
}
