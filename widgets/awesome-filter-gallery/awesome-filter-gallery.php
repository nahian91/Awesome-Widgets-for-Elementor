<?php
namespace Elementor;

class Widget_Awesome_Filter_Gallery extends Widget_Base {

	public function get_name() {
		return 'awesome-filter-gallery';
	}

	public function get_title() {
		return esc_html__('Advanced Filter Gallery with Lightbox', 'awesome-widgets');
	}

	public function get_icon() {
		return 'fa fa-th-large';
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	// Enqueue GLightbox CSS & JS
	public function get_script_depends() {
		return ['glightbox-js'];
	}

	public function get_style_depends() {
		return ['glightbox-css'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_gallery',
			[
				'label' => esc_html__('Gallery Items', 'awesome-widgets'),
			]
		);

		$this->add_control(
			'gallery_items',
			[
				'label' => esc_html__('Gallery Items', 'awesome-widgets'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'awesome-widgets'),
						'type' => Controls_Manager::TEXT,
						'default' => 'Gallery Item',
					],
					[
						'name' => 'image',
						'label' => esc_html__('Image', 'awesome-widgets'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src()],
					],
					[
						'name' => 'category',
						'label' => esc_html__('Category (comma separated)', 'awesome-widgets'),
						'type' => Controls_Manager::TEXT,
						'default' => 'design',
					],
					[
						'name' => 'link',
						'label' => esc_html__('Lightbox URL (Optional)', 'awesome-widgets'),
						'type' => Controls_Manager::URL,
						'placeholder' => 'https://example.com/image.jpg',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	// Enqueue GLightbox assets properly
	public function enqueue_assets() {
		wp_register_style('glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', [], '3.2.0');
		wp_register_script('glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', ['jquery'], '3.2.0', true);
	}

	protected function render() {
		$this->enqueue_assets();

		$settings = $this->get_settings_for_display();
		$items = $settings['gallery_items'];
		$uniq_id = 'awea-filter-gallery-' . $this->get_id();

		// Extract unique categories
		$cat_list = [];
		foreach ($items as $item) {
			$cats = array_map('trim', explode(',', $item['category']));
			$cat_list = array_merge($cat_list, $cats);
		}
		$categories = array_unique($cat_list);
		?>

		<div id="<?php echo esc_attr($uniq_id); ?>" class="awea-advanced-gallery">
			<div class="awea-gallery-filters">
				<button class="active" data-filter="*">All</button>
				<?php foreach ($categories as $cat): ?>
					<button data-filter=".<?php echo esc_attr(sanitize_title($cat)); ?>"><?php echo esc_html(ucfirst($cat)); ?></button>
				<?php endforeach; ?>
			</div>

			<div class="awea-gallery-grid">
				<?php foreach ($items as $item): 
					$item_cats = array_map('trim', explode(',', $item['category']));
					$class_list = implode(' ', array_map('sanitize_title', $item_cats));
					$link = !empty($item['link']['url']) ? $item['link']['url'] : $item['image']['url'];
				?>
					<div class="awea-gallery-item <?php echo esc_attr($class_list); ?>">
						<a href="<?php echo esc_url($link); ?>" class="awea-gallery-link glightbox" data-gallery="<?php echo esc_attr($uniq_id); ?>" data-title="<?php echo esc_attr($item['title']); ?>">
							<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>" />
							<div class="awea-overlay">
								<h4><?php echo esc_html($item['title']); ?></h4>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<style>
			.awea-advanced-gallery {
				text-align: center;
			}
			.awea-gallery-filters {
				margin-bottom: 20px;
			}
			.awea-gallery-filters button {
				margin: 0 7px;
				padding: 8px 18px;
				border: none;
				background: #eee;
				cursor: pointer;
				transition: 0.3s;
			}
			.awea-gallery-filters button.active,
			.awea-gallery-filters button:hover {
				background: #333;
				color: #fff;
			}
			.awea-gallery-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
				gap: 20px;
			}
			.awea-gallery-item {
				position: relative;
				overflow: hidden;
				transition: 0.3s;
			}
			.awea-gallery-item img {
				width: 100%;
				display: block;
				transition: transform 0.4s ease;
			}
			.awea-gallery-item:hover img {
				transform: scale(1.1);
			}
			.awea-overlay {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: rgba(0,0,0,0.6);
				color: #fff;
				display: flex;
				align-items: center;
				justify-content: center;
				opacity: 0;
				transition: 0.4s;
			}
			.awea-gallery-item:hover .awea-overlay {
				opacity: 1;
			}
		</style>

		<script>
			(function($){
				// Filter Buttons
				const $container = $('#<?php echo esc_js($uniq_id); ?>');
				const $filters = $container.find('.awea-gallery-filters button');
				const $items = $container.find('.awea-gallery-item');

				$filters.on('click', function(){
					const filter = $(this).data('filter');
					$filters.removeClass('active');
					$(this).addClass('active');

					if(filter === '*') {
						$items.fadeIn();
					} else {
						$items.hide();
						$items.filter(filter).fadeIn();
					}
				});

				// Initialize GLightbox
				if (typeof GLightbox === 'function') {
					const lightbox = GLightbox({
						selector: '#<?php echo esc_js($uniq_id); ?> .glightbox'
					});
				}
			})(jQuery);
		</script>

		<?php
	}
}
