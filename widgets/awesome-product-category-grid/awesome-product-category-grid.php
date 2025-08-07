<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Product_Category_Grid extends Widget_Base {

	public function get_name() {
		return 'awesome-product-category-grid';
	}

	public function get_title() {
		return esc_html__( 'Product Category Grid', 'awesome-widgets-elementor' );
	}

	public function get_icon() {
		return 'eicon-product-categories';
	}

	public function get_categories() {
		return [ 'awesome-widgets-elementor' ];
	}

	public function get_keywords() {
		return [ 'product', 'category', 'awesome'];
	}

	public function get_grid_classes( $settings, $columns_field = 'awea_column_per_row' ) {        
        $grid_classes = 'awea-grid-desktop-';
        $grid_classes .= $settings[$columns_field];
        // $grid_classes .= ' awea-grid-tablet-';
        // $grid_classes .= $settings[$columns_field . '_tablet'];
        // $grid_classes .= ' awea-grid-mobile-';
        // $grid_classes .= $settings[$columns_field . '_mobile'];

        return apply_filters( 'awea_grid_classes', $grid_classes, $settings, $columns_field );
    }

	protected function _register_controls() {
		$this->start_controls_section(
			'awea_product_category_section_categories',
			[
				'label' => esc_html__( 'Category Settings', 'awesome-widgets-elementor' ),
			]
		);

		$this->add_control(
			'awea_product_category_show_count',
			[
				'label' => esc_html__( 'Show Product Count?', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'awea_product_category_show_thumbnail',
			[
				'label' => esc_html__( 'Show Category Thumbnail?', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'awesome-widgets-elementor' ),
				'label_off' => esc_html__( 'No', 'awesome-widgets-elementor' ),
				'default' => 'yes',
			]
		);

		// Blog Column
		$this->add_control( 
            'awea_column_per_row', 
            [
                'label'              => esc_html__( 'Columns', 'awesome-widgets-elementor' ),
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

		$this->add_control(
			'awea_product_category_orderby',
			[
				'label' => esc_html__( 'Order By', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'name',
				'options' => [
					'name' => esc_html__('Name', 'awesome-widgets-elementor'),
					'slug' => esc_html__('Slug', 'awesome-widgets-elementor'),
					'count' => esc_html__('Count', 'awesome-widgets-elementor'),
					'term_group' => esc_html__('Term Group', 'awesome-widgets-elementor'),
				],
			]
		);

		$this->add_control(
			'awea_product_category_order',
			[
				'label' => esc_html__( 'Order', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__('Ascending', 'awesome-widgets-elementor'),
					'DESC' => esc_html__('Descending', 'awesome-widgets-elementor'),
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_product_category_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_product_category_pro_message_notice', 
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
			'awea_product_category_content_style',
			[
				'label' => esc_html__( 'Content', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// CTA Title Color
		$this->add_control(
			'awea_product_category_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-content a, .awea-product-category-content span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// CTA Title Color
		$this->add_control(
			'awea_product_category_bg_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-category-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// CTA Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_category_typography',
				'selector' => '{{WRAPPER}} .awea-product-category-content a, .awea-product-category-content span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$args = [
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
			'orderby' => $settings['awea_product_category_orderby'],
			'order' => $settings['awea_product_category_order'],
		];

		$product_categories = get_terms( $args );

		if ( empty( $product_categories ) || is_wp_error( $product_categories ) ) {
			echo '<p>' . esc_html__( 'No product categories found.', 'awesome-widgets-elementor' ) . '</p>';
			return;
		}

		?>

		<div class="awesa-product-categories-grid <?php echo esc_attr( $column_class ); ?>">
			<div class="awea-grid-row">
			<?php foreach ( $product_categories as $category ) : ?>
				<?php
					$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
					$image_url = '';
					if ( $settings['awea_product_category_show_thumbnail'] === 'yes' && $thumbnail_id ) {
						$image_url = wp_get_attachment_url( $thumbnail_id );
					}
					$category_link = get_term_link( $category );
				?>
				<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> awea-grid-tablet-6 awea-grid-mobile-12">
				<div class="awesa-product-category">
					<?php if ( $image_url ) : ?>
						<a href="<?php echo esc_url( $category_link ); ?>" class="awea-product-category-img-link">
							<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>">
						</a>
						<div class="awea-product-category-content">
							<a href="<?php echo esc_url( $category_link ); ?>" class="awea-product-category-link"><?php echo esc_html( $category->name ); ?></a>

							<?php if ( $settings['awea_product_category_show_count'] === 'yes' ) : ?>
								<span class="count">(<?php echo intval( $category->count ); ?>)</span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				</div>

			<?php endforeach; ?>
			</div>

		</div>

		<?php
	}
}
