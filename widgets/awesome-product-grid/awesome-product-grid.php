<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Product_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve products widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-product-grid';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Products Grid', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'awea-icon eicon-product-related';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'awesome-widgets-elementor' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'products', 'shop', 'awea'];
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

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Start of the Products Content Tab Section
	   	$this->start_controls_section(
	       'awea_products_content',
		    [
		        'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Products Number
		$this->add_control(
			'awea_products_number',
			[
				'label' 	    => __('Number of Products', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
			]
		);

		// Products Column
		$this->add_control( 
			'awea_column_per_row', 
			[
				'label'              => esc_html__( 'Columns', 'awesome-widgets-elementor' ),
				'type'               => Controls_Manager::SELECT,
				'default'            => '4',
				'tablet_default'     => '2', // Default value for tablet
				'mobile_default'     => '1', // Default value for mobile
				'options'            => [
					'12' => '1',
					'6'  => '2',
					'4'  => '3',
					'3'  => '4',
					'2'  => '6',
				],
				'frontend_available' => true,
			] 
		);

		// Products Category
		// $this->add_control(
		// 	'awea_products_category',
		// 	[
		// 		'label' => __('Product Category', 'awesome-widgets-elementor'),
		// 		'type' => Controls_Manager::SELECT2,
		// 		'options' => $this->get_product_categories(),
		// 		'multiple' => true,
		// 	]
		// );

		// Products Order
		$this->add_control(
			'awea_products_order',
			[
				'label' 		=> __('Order', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'awesome-widgets-elementor'),
					'DESC' 		=> __('DESCENDING', 'awesome-widgets-elementor'),
					'ASC' 		=> __('ASCENDING', 'awesome-widgets-elementor'),
				],
			]
		);

		// Products Orderby
		$this->add_control(
			'awea_products_orderby',
			[
				'label' 		=> __('Order By', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					''               => __('Default', 'awesome-widgets-elementor'),
					'date'           => __('Date', 'awesome-widgets-elementor'),
					'title'          => __('Title', 'awesome-widgets-elementor'),
					'name'           => __('Name', 'awesome-widgets-elementor'),
					'rand'           => __('Random', 'awesome-widgets-elementor'),
					'comment_count'  => __('Comment Count', 'awesome-widgets-elementor'),
					'menu_order'     => __('Menu Order', 'awesome-widgets-elementor'),
					'best_selling'   => __('Best Selling', 'awesome-widgets-elementor'),
					'on_sale'        => __('On Sale', 'awesome-widgets-elementor'),
					'latest_products' => __('Latest Products', 'awesome-widgets-elementor'),
				],
			]
		);
		
		$this->end_controls_section();
		// End of the Products Content Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'awea_products_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		$this->add_control( 
			'awea_products_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Web Bricks Premium is coming soon with more widgets, features, and customization options.', 'awesome-widgets-elementor')
				)
			]  
		);
		$this->end_controls_section();
		
		// Products Layout
		$this->start_controls_section(
			'awea_products_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Background
		$this->add_control(
			'awea_product_layout_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Product Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_product_layout_border',
				'selector' => '{{WRAPPER}} .awea-product-grid',
			]
		);	

		// Products Padding
		$this->add_control(
			'awea_product_layout_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Border Radius
		$this->add_control(
			'awea_product_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_product_layout_align',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} .awea-product-grid' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Start of the Products Content Tab Section
		$this->start_controls_section(
			'awea_products_image',
			[
				'label' => esc_html__('Images', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_STYLE		   
			]
		);

		// Products Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_product_border',
				'selector' => '{{WRAPPER}} .awea-product-grid-img',
			]
		);	

		// Products Image Border
		$this->add_control(
			'awea_product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Image Width
		$this->add_control(
			'awea_products_image_width',
			[
				'label' => esc_html__( 'Width', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Products Image Width
		$this->add_control(
			'awea_products_image_height',
			[
				'label' => esc_html__( 'Height', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-img' => 'padding-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

		// Products Title
		$this->start_controls_section(
			'awea_products_title_style',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Title Color
		$this->add_control(
			'awea_product_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_title_typography',
				'selector' => '{{WRAPPER}} .awea-product-grid-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_products_title_spacing',
			[
				'label' => esc_html__( 'Spacing', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Meta
		$this->start_controls_section(
			'awea_products_meta_style',
			[
				'label' => esc_html__( 'Meta', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Meta Price
		$this->add_control(
			'awea_products_meta_price_style',
			[
				'label' => esc_html__( 'Price', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Meta Price Color
		$this->add_control(
			'awea_product_meta_price_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-price' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Meta Price Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_meta_typography',
				'selector' => '{{WRAPPER}} .awea-product-price',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_products_price_spacing',
			[
				'label' => esc_html__( 'Spacing', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-product-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Products Meta Price
		$this->add_control(
			'awea_products_meta_sale_text_style',
			[
				'label' => esc_html__( 'Sale', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Sale Price Color
		$this->add_control(
			'awea_product_meta_sale_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-sale-price span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Products Sale Price Typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_meta_sale_typography',
				'selector' => '{{WRAPPER}} .awea-sale-price span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Products Meta Price
		$this->add_control(
			'awea_products_meta_sale_style',
			[
				'label' => esc_html__( 'Sale Badge', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Sale Price Color
		$this->add_control(
			'awea_product_meta_sale_badge_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-sale' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Products Sale Price Color
		$this->add_control(
			'awea_product_meta_sale_badge_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-sale' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Sale Price Typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
			[
				'name' => 'awea_product_meta_sale_badge_typography',
				'selector' => '{{WRAPPER}} .awea-product-grid-sale',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->add_control(
			'awea_product_price_sale_badge_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-sale' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Button
		$this->start_controls_section(
			'awea_products_button_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'awea_product_btn_style_tab'
		);

		// Products Button Normal Tab
		$this->start_controls_tab(
			'awea_product_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'awea_product_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-btn' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Button Background
		$this->add_control(
			'awea_product_btn_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-btn' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		// Products Sale Price Typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'awea_product_btn_typography',
					'selector' => '{{WRAPPER}} .awea-product-grid-btn',
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					]
				]
			);

		$this->add_control(
			'awea_product_price_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Products Button Hover Tab
		$this->start_controls_tab(
			'awea_product_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'awea_product_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-btn:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);


		// Products Button Hover Background
		$this->add_control(
			'awea_product_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-product-grid-btn:hover' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

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
		// Get widget settings.
		$settings = $this->get_settings_for_display();
		$awea_products_number = $settings['awea_products_number'];
		$awea_products_order = $settings['awea_products_order'];
		$awea_products_orderby = $settings['awea_products_orderby'];
	
		if (!class_exists('woocommerce')) {
			echo '<p>' . esc_html__('WooCommerce is not active.', 'awesome-widgets-elementor') . '</p>';
			return;
		}
	
		$args = [
			'posts_per_page' => intval($awea_products_number),
			'post_type'      => 'product',
			'order'          => sanitize_text_field($awea_products_order),
			'orderby'        => sanitize_text_field($awea_products_orderby),
			'fields'         => 'ids',
		];
	
		$query = new \WP_Query($args);
	
		if ($query->have_posts()) : ?>
			<div class="awea-grid-row">
				<?php while ($query->have_posts()) : $query->the_post();
					$product = wc_get_product(get_the_ID());
					$sale = $product->is_on_sale();
					$thumbnail_url = get_the_post_thumbnail_url() ?: 'path-to-default-image.jpg';
				?>
					<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> awea-grid-tablet-6 awea-grid-mobile-12">
						<div class="awea-product-grid">
							<?php if ($sale) : ?>
								<span class="awea-product-grid-sale"><?php echo esc_html__('Sale', 'awesome-widgets-elementor'); ?></span>
							<?php endif; ?>
							<div class="awea-product-grid-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')"></div>
							<div class="awea-product-grid-content">
								<h4 class="awea-product-grid-title">
								<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
							</h4>
							<div class="awea-product-grid-price-bottom">
								<p class="awea-product-price">
								<?php if ( $product->is_on_sale() ) : ?>
									<span class="awea-sale-price"><?php echo wp_kses_post( wc_price( $product->get_sale_price() ) ); ?></span>
									<span class="awea-regular-price"><?php echo wp_kses_post( wc_price( $product->get_regular_price() ) ); ?></span>
								<?php else : ?>
									<span class="awea-normal-price"><?php echo wp_kses_post( wc_price( $product->get_regular_price() ) ); ?></span>
								<?php endif; ?>
							</p>

							<?php if ( WC()->cart && WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) ) ) : ?>
									<!-- Product already in cart -->
									<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="awea-product-grid-btn">
										<?php esc_html_e( 'View Cart', 'awesome-widgets-elementor' ); ?>
									</a>
								<?php else : ?>
									<!-- Product not yet in cart -->
									<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" 
									class="awea-product-grid-btn" 
									data-quantity="1" 
									data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" 
									rel="nofollow">
										<?php echo esc_html( $product->add_to_cart_text() ); ?>
									</a>
								<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p><?php echo esc_html__('No products found.', 'awesome-widgets-elementor'); ?></p>
		<?php endif;	
		wp_reset_postdata();
	}
	
}