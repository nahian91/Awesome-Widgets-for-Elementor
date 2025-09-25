<?php
/**
 * Awesome MyAccount Widget.
 *
 * Elementor widget that inserts a myaccount into the page
 *
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Widget_Awesome_MyAccount extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve myaccount widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-myaccount';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve about widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'My Account', 'awesome-widgets-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle';
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

	public function get_keywords() {
		return [ 'heading', 'title', 'awesome'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		// start of the Content tab section
		$this->start_controls_section(
			'awea_heading_pro_message',
			[
				'label' => esc_html__('Premium', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'awea_heading_pro_message_notice', 
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

		// start of the Heading Style
		$this->start_controls_section(
			'awea_myaccount_tabs_style',
			[
				'label' => esc_html__( 'Tabs', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs(
            'awea_myaccount_tabs_normal_tabs'
        );

        $this->start_controls_tab(
            'awea_myaccount_tabs_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'awesome-widgets-elementor' ),
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_tabs_normal_typography',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_tabs_normal_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_normal_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_myaccount_tabs_normal_border',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li',
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_normal_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_normal_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'awea_myaccount_tabs_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'awesome-widgets-elementor' ),
            ]
        );

		$this->add_control(
			'awea_myaccount_tabs_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li:hover' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_hover_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li:hover' => 'background-color: {{VALUE}} important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_myaccount_tabs_hover_border',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li:hover',
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'awea_myaccount_tabs_active_tab',
            [
                'label' => esc_html__( 'Active', 'awesome-widgets-elementor' ),
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_tabs_active_typography',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li.active',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_tabs_active_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_active_background',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'awea_myaccount_tabs_active_border',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li.active',
			]
		);

        $this->add_control(
			'awea_myaccount_tabs_active_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();


		$this->end_controls_section();
		// end of the Style tab section

        // start of the Heading Style
		$this->start_controls_section(
			'awea_myaccount_content_style',
			[
				'label' => esc_html__( 'Contents', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'awea_myaccount_content_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_content_title_typography',
				'selector' => '{{WRAPPER}} .awea-tab-pane h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tab-pane h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_text',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_content_text_typography',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li.active',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_text_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_input_heading',
			[
				'label' => esc_html__( 'Input Label', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_content_input_heading_typography',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li.active',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_input_heading_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_input_border',
			[
				'label' => esc_html__( 'Input Border', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'awea_myaccount_content_input_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_input_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_myaccount_content_input_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn',
			[
				'label' => esc_html__( 'Button', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs(
			'awea_myaccount_content_btn_style_tabs'
		);

		$this->start_controls_tab(
			'awea_myaccount_content_btn_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_content_btn_normal_typography',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li.active',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_normal_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_normal_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_normal_radius',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_normal_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'awea_myaccount_content_btn_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_myaccount_content_btn_hover_typography',
				'selector' => '{{WRAPPER}} .awea-tabs-nav li.active',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_hover_bgcolor',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li.active' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'awea_myaccount_content_btn_hover_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .awea-tabs-nav li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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

    if ( ! is_user_logged_in() ) {
        ?>
        <div class="awesome-myaccount-widget">
            <h4>Please log in to access your account</h4>
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        </div>
        <?php 
        return;
    }

    $current_user = wp_get_current_user();
    $logout_url   = wc_logout_url();
    $user_id      = $current_user->ID;
    ?>
    <div class="awesome-myaccount-widget">
        <div class="awea-tabs-wrapper">
            <div class="awea-grid-row">
                <div class="awea-grid-desktop-3">
                    <ul class="awea-tabs-nav">
                        <li class="active" data-tab="dashboard"><i class="far fa-chart-bar"></i> <?php echo esc_html__( 'Dashboard', 'awesome-widgets-elementor' ); ?></li>
                        <li data-tab="orders"><i class="fas fa-shopping-bag"></i> <?php echo esc_html__( 'Orders', 'awesome-widgets-elementor' ); ?></li>
                        <li data-tab="downloads"><i class="fas fa-cloud-download-alt"></i> <?php echo esc_html__( 'Downloads', 'awesome-widgets-elementor' ); ?></li>
                        <li data-tab="address"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html__( 'Addresses', 'awesome-widgets-elementor' ); ?></li>
                        <li data-tab="account"><i class="far fa-user"></i> <?php echo esc_html__( 'Account Details', 'awesome-widgets-elementor' ); ?></li>
                        <li><a href="<?php echo esc_url($logout_url); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo esc_html__( 'Logout', 'awesome-widgets-elementor' ); ?></a></li>
                    </ul>
                </div>
                <div class="awea-grid-desktop-9">
                    <!-- Tab Content -->
            <div class="awea-tabs-content">
                <!-- Dashboard -->
                <div id="dashboard" class="awea-tab-pane active">
                <h4><?php
                    /* translators: %s: User display name */
                    echo sprintf( esc_html__( 'Hello, %s 👋', 'awesome-widgets-elementor' ), esc_html( $current_user->display_name ) );
                    ?></h4>
                <p><?php esc_html_e( 'Email:', 'awesome-widgets-elementor' ); ?> 
                    <strong><?php echo esc_html( $current_user->user_email ); ?></strong></p>
                <p><?php esc_html_e( 'From your dashboard you can manage orders, addresses, and account settings.', 'awesome-widgets-elementor' ); ?></p>
            </div>

            <!-- Orders -->
<div id="orders" class="awea-tab-pane">
    <h4><?php echo esc_html__( 'Your Recent Orders', 'awesome-widgets-elementor' ); ?></h4>
    <?php
    $orders = wc_get_orders( [ 'customer_id' => $user_id, 'limit' => 5 ] );
    if ( $orders ) {
        ?>
        <table class="awea-orders-table">
            <thead>
                <tr>
                    <th><?php echo esc_html__( 'Order', 'awesome-widgets-elementor' ); ?></th>
                    <th><?php echo esc_html__( 'Date', 'awesome-widgets-elementor' ); ?></th>
                    <th><?php echo esc_html__( 'Status', 'awesome-widgets-elementor' ); ?></th>
                    <th><?php echo esc_html__( 'Total', 'awesome-widgets-elementor' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $orders as $order ) : ?>
                    <tr>
                        <td><?php echo esc_html( $order->get_id() ); ?></td>
                        <td><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></td>
                        <td><?php echo esc_html( ucfirst( $order->get_status() ) ); ?></td>
                        <td><?php echo wp_kses_post( wc_price( $order->get_total() ) ); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    } else {
        echo '<p>' . esc_html__( 'No recent orders.', 'awesome-widgets-elementor' ) . '</p>';
    }
    ?>
</div>


                <!-- Downloads -->
                <div id="downloads" class="awea-tab-pane">
                    <h4><?php echo esc_html__( 'Available Downloads', 'awesome-widgets-elementor' ); ?></h4>
                    <?php
                    $downloads = wc_get_customer_available_downloads( $user_id );
                    if ( $downloads ) {
                        ?>
                            <ul class="awea-downloads-list">
                                <?php 
                                    foreach ( $downloads as $download ) {
                                        ?>
                                            <li><a href="<?php echo esc_url( $download['download_url'] );?>"><?php echo esc_html( $download['product_name'] );?></a></li>
                                        <?php 
                                    }
                                ?>
                            </ul>
                        <?php
                    } else {
                        echo '<p>' . esc_html__( 'No downloads available.', 'awesome-widgets-elementor' ) . '</p>';
                    }
                    ?>
                </div>

                <!-- Addresses -->
                <div id="address" class="awea-tab-pane">
					<div class="awea-address-box">
						<div class="awea-single-address">
							<h4><?php echo esc_html__( 'Billing Address', 'awesome-widgets-elementor' ); ?></h4>
                    		<p><?php echo wc_get_account_formatted_address( 'billing' ) ?: 'No billing address set.'; ?></p>
						</div>
						<div class="awea-single-address">
							<h4>Shipping Address</h4>
                    <p><?php echo wc_get_account_formatted_address( 'shipping' ) ?: 'No shipping address set.'; ?></p>
						</div>
					</div>
                </div>

                <!-- Account Details -->
                <div id="account" class="awea-tab-pane">
                    <h4><?php echo esc_html__( 'Edit Account Details', 'awesome-widgets-elementor' ); ?></h4>
                        <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="awea-account-form">
                            <input type="hidden" name="action" value="update_account">

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'First Name', 'awesome-widgets-elementor' ); ?></label>
                                <input type="text" name="first_name" value="<?php echo esc_attr( $current_user->first_name ); ?>">
                            </div>

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'Last Name', 'awesome-widgets-elementor' ); ?></label>
                                <input type="text" name="last_name" value="<?php echo esc_attr( $current_user->last_name ); ?>">
                            </div>

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'Display Name', 'awesome-widgets-elementor' ); ?></label>
                                <input type="text" name="display_name" value="<?php echo esc_attr( $current_user->display_name ); ?>" required>
                            </div>

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'Email', 'awesome-widgets-elementor' ); ?></label>
                                <input type="email" name="user_email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required>
                            </div>

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'Current Password', 'awesome-widgets-elementor' ); ?></label>
                                <input type="password" name="current_password">
                            </div>

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'New Password', 'awesome-widgets-elementor' ); ?></label>
                                <input type="password" name="new_password">
                            </div>

                            <div class="awea-form-group">
                                <label><?php echo esc_html__( 'Confirm New Password', 'awesome-widgets-elementor' ); ?></label>
                                <input type="password" name="confirm_password">
                            </div>

                            <button type="submit" class="awea-btn"><?php echo esc_html__( 'Save Changes', 'awesome-widgets-elementor' ); ?></button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
}