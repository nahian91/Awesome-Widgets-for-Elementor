<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Post_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve post widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-post-grid';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve post widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Post Grid', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve post widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'awea-icon eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the post widget belongs to.
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
		return [ 'awea', 'post', 'post' ];
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
		// start of the Content tab section
	    $this->start_controls_section(
	       'awea_blog_contents',
		    [
		        'label' => esc_html__('Query', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Blog Number
		$this->add_control(
			'awea_blog_number',
			[
				'label' 		=> __('Number of Posts', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
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

		// Blog Order
		$this->add_control(
			'awea_blog_order',
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

		// Blog Orderby
		$this->add_control(
			'awea_blog_orderby',
			[
				'label' 		=> __('Order By', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'awesome-widgets-elementor'),
					'date' 			=> __('Date', 'awesome-widgets-elementor'),
					'title' 		=> __('Title', 'awesome-widgets-elementor'),
					'name' 			=> __('Name', 'awesome-widgets-elementor'),
					'modified' 		=> __('Modified', 'awesome-widgets-elementor'),
					'author' 		=> __('Author', 'awesome-widgets-elementor'),
					'rand' 			=> __('Random', 'awesome-widgets-elementor'),
					'ID' 			=> __('ID', 'awesome-widgets-elementor'),
					'comment_count' => __('Comment Count', 'awesome-widgets-elementor'),
					'menu_order' 	=> __('Menu Order', 'awesome-widgets-elementor'),
				],
			]
		);

		$args = array(
			'hide_empty' => false,
		);
		
		$categories = get_categories($args);

		if($categories) {
			foreach ( $categories as $key => $category ) {
				$options[$category->term_id] = $category->name;
			}
		}

		// Blog Categories
		$this->add_control(
			'awea_blog_include_categories',
			[
				'label' => __( 'Category', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'awea_blog_option_section',
			 [
				'label' => esc_html__('Meta Info', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Blog Category Show
		$this->add_control(
			'awea_blog_cat_visibility',
			[
				'label' 		=> __('Show Category', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		// Blog Date Show
		$this->add_control(
			'awea_blog_date_visibility',
			[
				'label' 		=> __('Show Date', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		// Blog Excerpt Show
		$this->add_control(
			'awea_blog_excerpt_visibility',
			[
				'label' 		=> __('Show Excerpt', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		// Blog Button Show
		$this->add_control(
			'awea_blog_btn_visibility',
			[
				'label' 		=> __('Show Button', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'awesome-widgets-elementor'),
				'label_off' 	=> __('Hide', 'awesome-widgets-elementor'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		$this->start_controls_section(
			'awea_blog_btn_option_section',
			 [
				'label' => esc_html__('Button', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'awea_blog_btn_visibility' => 'yes'
				],		
			]
		);

		$this->add_control(
			'awea_blog_btn_text',
			[
				'label' => esc_html__( 'Text', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Read More', 'awesome-widgets-elementor' ),
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_blog_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'awea_blog_pro_message_notice', 
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
			'awea_blog_layout_style',
			[
				'label' => esc_html__( 'Layout', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Blog Background
		$this->add_control(
			'awea_blog_bg_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-post-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'awea_blog_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'awea_blog_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-post-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_meta_style',
			[
				'label' => esc_html__( 'Meta', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Meta Color
		$this->add_control(
			'awea_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-post-meta, .awea-post-meta a' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Meta Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_blogmeta_typography',
				'selector' => '{{WRAPPER}} .awea-post-meta, .awea-post-meta a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_title_style',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'awea_title_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-post-title .awea-post-post-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_blog_title_typography',
				'selector' => '{{WRAPPER}} .awea-post-title .awea-post-post-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'awea_blog_title_tag',
			[
				'label' => __( 'Html Tag', 'awesome-widgets-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_blog_excerpt_visibility' => 'yes', 
				],
			]
		);	

		// Excerpt Color
		$this->add_control(
			'awea_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-post-excerpt' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .awea-post-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_image_style',
			[
				'label' => esc_html__( 'Image', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Width
		$this->add_control(
			'awea_blog_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'awesome-widgets-elementor' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-post-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Height
		$this->add_control(
			'awea_blog_image_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'awesome-widgets-elementor' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .awea-post-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Display Size
		$this->add_control(
			'awea_blog_image_display',
			[
				'label' 		=> __('Display Size', 'awesome-widgets-elementor'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'cover',
				'options' 		=> [
					'auto' 			=> __('Auto', 'awesome-widgets-elementor'),
					'contain' 		=> __('Contain', 'awesome-widgets-elementor'),
					'cover' 		=> __('Cover', 'awesome-widgets-elementor'),
				],
			]
		);

		// Blog Image Radius
		$this->add_control(
			'awea_blog_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .awea-post-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_blog_button_style',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'awea_blog_btn_visibility' => 'yes'
				],	
			]
		);	

		$this->start_controls_tabs(
			'awea_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'awea_blog_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-post-content .awea-btn-line' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_blog_btn_typography',
				'selector' => '{{WRAPPER}} .awea-post-content .awea-btn-line',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'awea_blog_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
			]
		);

		// Blog Button Hover Color
		$this->add_control(
			'awea_blog_btn_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-post-content .awea-btn-line:hover' => 'color: {{VALUE}}',
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
		// Get input from widget settings
		$settings = $this->get_settings_for_display();
		$awea_blog_title_tag = $settings['awea_blog_title_tag'];
		$awea_blog_number = isset($settings['awea_blog_number']) ? $settings['awea_blog_number'] : 5;
		$awea_blog_order = isset($settings['awea_blog_order']) ? $settings['awea_blog_order'] : 'DESC';
		$awea_blog_orderby = $settings['awea_blog_orderby'];
		$awea_blog_include_categories = $settings['awea_blog_include_categories'];
		$awea_blog_cat_visibility = isset($settings['awea_blog_cat_visibility']) && $settings['awea_blog_cat_visibility'] === 'yes';
		$awea_blog_date_visibility = isset($settings['awea_blog_date_visibility']) && $settings['awea_blog_date_visibility'] === 'yes';
		$awea_blog_excerpt_visibility = isset($settings['awea_blog_excerpt_visibility']) && $settings['awea_blog_excerpt_visibility'] === 'yes';
		$awea_blog_btn_visibility = isset($settings['awea_blog_btn_visibility']) && $settings['awea_blog_btn_visibility'] === 'yes';
		$awea_blog_btn_text = $settings['awea_blog_btn_text'];
		$awea_blog_image_display = $settings['awea_blog_image_display'];
	
		// Validate post title tag
		$valid_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span'];
		if (!in_array($awea_blog_title_tag, $valid_tags)) {
			$awea_blog_title_tag = 'h2'; // Default to h2 if invalid tag
		}
	
		// Query the posts
		$args = [
			'posts_per_page' => $awea_blog_number,
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => $awea_blog_order,
			'orderby' => $awea_blog_orderby,
			'ignore_sticky_posts' => 1,
		];
	
		if (!empty($awea_blog_include_categories)) {
			$args['cat'] = $awea_blog_include_categories;
		}
	
		$query = new \WP_Query($args);
		?>
		<!-- Blog Start Here -->
		<section class="awea-post">
			<div class="awea-grid-row">
				<?php if ($query->have_posts()) : ?>
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> awea-grid-tablet-6 awea-grid-mobile-12">
							<div class="awea-single-post">
								<?php
								$thumbnail_url = get_the_post_thumbnail_url() ?: 'default-image.jpg';
								?>
								<div class="awea-post-img" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');"></div>
								<div class="awea-post-content">
									<div class="awea-post-meta">
										<?php
										if ($awea_blog_cat_visibility) {
											the_category(', ');
										}
										if ($awea_blog_date_visibility) {
											?>
											<a class="awea-post-date" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_date('j M, y')); ?></a>
											<?php
										}
										?>
									</div>
									<div class="awea-post-title">
										<<?php echo esc_attr($awea_blog_title_tag); ?> class="awea-post-post-title">
											<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
										</<?php echo esc_attr($awea_blog_title_tag); ?>>
									</div>
									<?php if (!empty	($awea_blog_excerpt_visibility)) : ?>
										<div class="awea-post-excerpt">
											<?php 
											echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); 
											?>
										</div>
									<?php endif; ?>

									<?php if($awea_blog_btn_visibility) {
										?>
											<a href="<?php echo esc_url(get_the_permalink()); ?>" class="awea-btn-line" aria-label="<?php the_title_attribute(); ?>"><?php echo esc_html($awea_blog_btn_text);?></a>
										<?php
									} ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
		<!-- Blog End Here -->
		<?php
	}	
}