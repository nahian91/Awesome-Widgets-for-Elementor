<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Filter_Gallery extends Widget_Base {

	public function get_name() {
		return 'awesome-filter-gallery';
	}

	public function get_title() {
		return esc_html__('Filter Gallery', 'awesome-widgets');
	}

	public function get_icon() {
		return 'fa fa-th-large';
	}

	public function get_categories() {
		return ['awesome-widgets-elementor'];
	}

	public function get_keywords() {
		return [ 'filter', 'gallery', 'awesome'];
	}

	public function get_grid_classes($settings, $columns_field = 'awea_filter_gallery_column') {        
		$grid_classes = 'wb-grid-desktop-';
		$grid_classes .= $settings[$columns_field];
		// $grid_classes .= ' wb-grid-tablet-';
		// $grid_classes .= $settings[$columns_field . '_tablet'];
	
		// // Check if mobile size is set, otherwise use a default value
		// if (isset($settings[$columns_field . '_mobile'])) {
		// 	$grid_classes .= ' wb-grid-mobile-';
		// 	$grid_classes .= $settings[$columns_field . '_mobile'];
		// } else {
		// 	// Set default size for mobile to 12 columns
		// 	$grid_classes .= ' wb-grid-mobile-12';
		// }
	
		return apply_filters('awea_grid_classes', $grid_classes, $settings, $columns_field);
	}

	protected function register_controls() {

		// start of the Content tab section
		$this->start_controls_section(
			'awea_filter_gallery_cat_contents',
			[
				'label' => esc_html__('Gallery Controls', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Filter Gallery Show Button?
		$this->add_control(
			'awea_filter_gallery_menu_show',
			[
				'label' => esc_html__( 'Show Button', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		 
		// Filter Gallery Category
		$repeater = new Repeater();
 
		$repeater->add_control(
			'awea_filter_gallery_cat_name',
			[
				'label' => esc_html__( 'Category Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Landscape', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$this->add_control(
			'awea_filter_gallery_cats',
			[
				'label' => esc_html__( 'Category Lists', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Landscape', 'webbricks-addons'),
					],					
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Cars', 'webbricks-addons'),
					],					
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Mountain', 'webbricks-addons'),
					],
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Sea Beach', 'webbricks-addons'),
					],
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Parks', 'webbricks-addons'),
					],
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Road Trips', 'webbricks-addons'),
					],
					[
						'awea_filter_gallery_cat_name' => esc_html__( 'Stars', 'webbricks-addons'),
					]
				],
				'title_field' => '{{{ awea_filter_gallery_cat_name }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		
	    // start of the Content tab section
		$this->start_controls_section(
			'services_content',
			[
				'label' => esc_html__('Filter Gallery', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Filter Gallerys
		$repeater = new Repeater();
 
		$repeater->add_control(
			'awea_filter_gallery_image',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-1-web-bricks.webp',
				],
				'separator' => 'before',
			]
		);
 
		$repeater->add_control(
			'awea_filter_gallery_cat',
			[
				'label' => esc_html__( 'Category', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'label_block' => true,
				'description' => __('Use the gallery control name from Gallery Controls. Separate multiple items with comma (e.g. <strong>Gallery Item, Gallery Item 2</strong>)', 'webbricks-addons'),
			]
		);

		$this->add_control(
			'awea_filter_gallerys',
			[
				'label' => esc_html__( 'Filter Gallerys List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-1-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'landscape, stars, parks',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-2-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'cars',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-3-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'mountain, parks',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-4-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'seabeach, landscape, cars',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-5-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'parks',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-6-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'roadtrips, landscape, mountain',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-7-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'stars',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-8-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'stars, cars, parks',
					],
					[
						'awea_filter_gallery_image' => [
							'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Gallery-9-web-bricks.webp',
						],
						'awea_filter_gallery_cat' => 'roadtrips, cars, parks',
					]
				],
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_filter_gallery_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Affiliate Products Column
		$this->add_control( 
            'awea_filter_gallery_column', 
            [
                'label'              => esc_html__( 'Columns', 'webbricks-addons' ),
                'type'               => Controls_Manager::SELECT,
                'default'            => '4',
                'tablet_default'     => '2',
                'mobile_default'     => '1',
                'options'            => [
                    '12' => '1',
                    '6' => '2',
                    '4' => '3',
                    '3' => '4',
                    '2' => '6',
                ],
                'frontend_available' => true,
            ] 
        );
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_filter_gallery_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-elementor-widgets'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_filter_gallery_pro_message_notice', 
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

		// Filter Gallery Controls Style
		$this->start_controls_section(
			'awea_filter_gallery_controls_style',
			[
				'label' => esc_html__( 'Controls', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		// Filter Gallery Title Color
		$this->add_control(
			'awea_filter_gallery_controls_title_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-filter-gallery-menu button' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Active Color
		$this->add_control(
			'awea_filter_gallery_controls_title_active_color',
			[
				'label' => esc_html__( 'Active Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-filter-gallery-menu button.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Active Border Color
		$this->add_control(
			'awea_filter_gallery_controls_title_active_border',
			[
				'label' => esc_html__( 'Active Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-filter-gallery-menu button.active::before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Border Color
		$this->add_control(
			'awea_filter_gallery_controls_title_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-filter-gallery-menu' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_filter_gallery_controls_typography',
				'selector' => '{{WRAPPER}} .awea-filter-gallery-menu button',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Filter Gallery Controls Images
		$this->start_controls_section(
			'awea_filter_gallery_controls_images',
			[
				'label' => esc_html__( 'Images', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		// Filter Gallery Image Width
		$this->add_control(
			'awea_filter_gallery_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-filter-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Filter Gallery Image Height
		$this->add_control(
			'awea_filter_gallery_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-filter-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Filter Gallery Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_filter_gallery_image_border',
				'selector' => '{{WRAPPER}} .awea-filter-img',
			]
		);	

		// Filter Gallery Image Round
		$this->add_control(
			'awea_filter_gallery_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-filter-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
	
		// Get settings with defaults to avoid undefined index issues
		$awea_filter_gallery_cats = $settings['awea_filter_gallery_cats'] ?? [];
		$awea_filter_gallerys = $settings['awea_filter_gallerys'] ?? [];
		$awea_filter_gallery_menu_show = $settings['awea_filter_gallery_menu_show'] ?? 'no';
	
		if ($awea_filter_gallery_menu_show === 'yes') : ?>
			<!-- Filter Gallery Start -->
			<div class="awea-filter-gallery">
				<div class="grid awea-grid-active">
					<div class="col-12">
						<div class="awea-filter-gallery-menu">
							<button class="active" data-filter="*"><?php esc_html_e('ALL', 'webbricks-addons'); ?></button>
							<?php
							$unique_categories = [];
							foreach ($awea_filter_gallery_cats as $cat) {
								$cat_title = $cat['awea_filter_gallery_cat_name'] ?? '';
								$processed_cat = strtolower(str_replace(' ', '', $cat_title));
	
								// Ensure each category is unique in the menu
								if (!in_array($processed_cat, $unique_categories)) {
									$unique_categories[] = $processed_cat;
									?>
									<button data-filter=".<?php echo esc_attr($processed_cat); ?>">
										<?php echo esc_html(ucwords($cat_title)); ?>
									</button>
									<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	
		<div class="wb-grid-row awea-grid-active">
			<?php
			foreach ($awea_filter_gallerys as $image) {
				$filter_image = $image['awea_filter_gallery_image']['url'] ?? '';
				$categories = explode(',', $image['awea_filter_gallery_cat'] ?? '');
	
				// Build CSS classes for categories
				$category_classes = '';
				foreach ($categories as $cat) {
					$processed_cat = strtolower(str_replace([' ', ',', ' '], '', $cat));
					$category_classes .= esc_attr($processed_cat) . ' ';
				}
				?>
				<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> wb-grid-tablet-6 wb-grid-mobile-12 awea-grid-item <?php echo esc_attr(trim($category_classes)); ?>">
					<div class="awea-single-filter-gallery">
						<div class="awea-filter-img" style="background-image:url('<?php echo esc_url($filter_image); ?>')"></div>
						<div class="awea-image-overlay">
							<a href="<?php echo esc_url($filter_image); ?>" class="elementor-lightbox">
								<div class="awea-filter-img-overlay" style="background-image:url('<?php echo esc_url(AWEA_URL . 'img/icon-zoom.svg'); ?>')"></div>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<!-- Filter Gallery End -->
		<?php
	}
	
}