<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_Post_Grid extends Widget_Base {

	public function get_name() {
		return 'awesome-post-grid';
	}

	public function get_title() {
		return esc_html__( 'Post Grid', 'awesome-widgets-elementor' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'awesome-widgets-elementor' ];
	}

	public function get_keywords() {
		return [ 'post', 'grid', 'awesome'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'awea_post_grid_content',
			[
				'label' => esc_html__( 'Post Settings', 'awesome-widgets-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'awea_post_count',
			[
				'label'   => esc_html__( 'Number of Posts', 'awesome-widgets-elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 20,
			]
		);

		$this->add_control(
			'awea_post_category',
			[
				'label'       => esc_html__( 'Filter by Categories', 'awesome-widgets-elementor' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_all_categories(),
				'multiple'    => true,
				'label_block' => true,
			]
		);

		$this->add_control(
			'awea_read_more_text',
			[
				'label'   => esc_html__( 'Read More Text', 'awesome-widgets-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'awesome-widgets-elementor' ),
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'awea_post_grid_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-elementor-widgets'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_post_grid_pro_message_notice', 
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
	}

	private function get_all_categories() {
		$cats = get_categories();
		$options = [];

		foreach ( $cats as $cat ) {
			$options[ $cat->term_id ] = $cat->name;
		}

		return $options;
	}

	protected function render() {
		$settings   = $this->get_settings_for_display();
		$post_count = ! empty( $settings['awea_post_count'] ) ? $settings['awea_post_count'] : 6;
		$cat_ids    = ! empty( $settings['awea_post_category'] ) ? $settings['awea_post_category'] : [];
		$read_more  = ! empty( $settings['awea_read_more_text'] ) ? $settings['awea_read_more_text'] : 'Read More';

		$args = [
			'post_type'      => 'post',
			'posts_per_page' => $post_count,
		];

		if ( ! empty( $cat_ids ) && is_array( $cat_ids ) ) {
			$args['category__in'] = $cat_ids;
		}

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) :
			echo '<div class="awea-post-grid-wrapper">';

			while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="awea-post-grid">
					<div class="awea-post-grid-img">
						<a href="<?php the_permalink(); ?>">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'medium' );
							}
							?>
						</a>
					</div>
					<div class="awea-post-grid-meta">
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
						}
						?>
						<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
					</div>
					<div class="awea-post-grid-content">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
						<a class="awea-post-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html( $read_more ); ?></a>
					</div>
				</div>
			<?php endwhile;

			echo '</div>';
			wp_reset_postdata();
		else :
			echo '<p>' . esc_html__( 'No posts found.', 'awesome-widgets-elementor' ) . '</p>';
		endif;
	}
}
