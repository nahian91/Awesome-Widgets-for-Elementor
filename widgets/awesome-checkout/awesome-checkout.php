<?php
/**
 * Awesome Heading Widget.
 *
 * Elementor widget that inserts a heading into the page
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

class Widget_Awesome_Checkout extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-checkout';
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
		return esc_html__( 'Checkout', 'awesome-widgets-elementor' );
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
		return 'eicon-heading';
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
			'awea_heading_contents',
			 [
				'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);

		// Heading Sub Heading
		$this->add_control(
			'awea_sub_heading',
			[
				'label' => esc_html__( 'Sub Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dummy Text', 'awesome-widgets-elementor' ),
			]
		);

		// Heading
		$this->add_control(
			'awea_heading',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading', 'awesome-widgets-elementor' ),
			]
		);

		// Heading Description
		$this->add_control(
			'awea_heading_desc',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'awesome-widgets-elementor' ),
			]
		);

		// Heading Alignment
		$this->add_control(
			'awea_heading_alignment',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'separator' => 'before',
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
					'{{WRAPPER}} .awea-section-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		// end of the Content tab section

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
			'awea_heading_style',
			[
				'label' => esc_html__( 'Contents', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Sub Heading Options
		$this->add_control(
			'awea_sub_heading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Sub Heading Color
		$this->add_control(
			'awea_sub_heading_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_sub_heading_typography',
				'selector' => '{{WRAPPER}} .awea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Heading Options
		$this->add_control(
			'awea_heading_options',
			[
				'label' => esc_html__( 'Heading', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Heading Color
		$this->add_control(
			'awea_heading_color',
			[
				'label' => esc_html__( 'Text Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_heading_typography',
				'selector' => '{{WRAPPER}} .awea-section-title h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Description Options
		$this->add_control(
			'awea_desc_options',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Description Color
		$this->add_control(
			'awea_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awea_desc_typography',
				'selector' => '{{WRAPPER}} .awea-section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// Separator Options
		$this->add_control(
			'awea_sep_options',
			[
				'label' => esc_html__( 'Separator', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Separator 1 Color
		$this->add_control(
			'awea_sep1_color',
			[
				'label' => esc_html__( 'Separator 1 Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title h4::before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Separator 2 Color
		$this->add_control(
			'awea_sep2_color',
			[
				'label' => esc_html__( 'Separator 2 Color', 'awesome-widgets-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awea-section-title h4::after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section
	}

	protected function render() {
    $settings = $this->get_settings_for_display(); // Widget settings

    // Get cart items
    $cart_items = WC()->cart->get_cart();
    $cart_total = WC()->cart->get_cart_total();
    $cart_subtotal = WC()->cart->get_subtotal();
    $shipping_total = WC()->cart->get_shipping_total();
    ?>
    <div class="checkout-area rts-section-gap">
        <div class="container">
            <div class="row">
                <!-- Billing / Login / Coupon Section -->
                <div class="col-lg-8 pr--40 pr_md--5 pr_sm--5 order-2 order-xl-1 order-lg-2 order-md-2 order-sm-2 mt_md--30 mt_sm--30">
                    
                    <!-- Returning Customer Login -->
                    <div class="coupon-input-area-1 login-form">
                        <div class="coupon-area">
                            <div class="coupon-ask">
                                <span><?php esc_html_e('Returning customers?', 'your-textdomain'); ?></span>
                                <button class="coupon-click"><?php esc_html_e('Click here to login', 'your-textdomain'); ?></button>
                            </div>
                            <div class="coupon-input-area">
                                <div class="inner">
                                    <?php echo wp_kses_post(apply_filters('woocommerce_checkout_login_message', '<p>' . __('If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'your-textdomain') . '</p>')); ?>
                                    <?php woocommerce_login_form(array('redirect' => wc_get_checkout_url(), 'hidden' => false)); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Coupon Code -->
                    <div class="coupon-input-area-1">
                        <div class="coupon-area">
                            <div class="coupon-ask cupon-wrapper-1">
                                <button class="coupon-click"><?php esc_html_e('Have a coupon? Click here to enter your code', 'your-textdomain'); ?></button>
                            </div>
                            <div class="coupon-input-area cupon1">
                                <div class="inner">
                                    <?php if ( wc_coupons_enabled() ) { ?>
                                        <p class="mt--0 mb--20"><?php esc_html_e('If you have a coupon code, please apply it below.', 'your-textdomain'); ?></p>
                                        <form class="checkout_coupon woocommerce-form-coupon" method="post">
                                            <input type="text" name="coupon_code" placeholder="<?php esc_attr_e('Enter Coupon Code...', 'your-textdomain'); ?>" id="coupon_code" value="" />
                                            <button type="submit" class="btn-primary rts-btn" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'your-textdomain'); ?>"><?php esc_html_e('Apply Coupon', 'your-textdomain'); ?></button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Details -->
                    <div class="rts-billing-details-area">
                        <h3 class="title animated fadeIn"><?php esc_html_e('Billing Details', 'your-textdomain'); ?></h3>
                        <?php
                            // Output WooCommerce checkout form fields dynamically
                            $checkout = WC()->checkout();
                            foreach ( $checkout->get_checkout_fields('billing') as $key => $field ) {
                                woocommerce_form_field($key, $field, $checkout->get_value($key));
                            }
                        ?>
                        <button class="rts-btn btn-primary"><?php esc_html_e('Update Cart', 'your-textdomain'); ?></button>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4 order-1 order-xl-2 order-lg-1 order-md-1 order-sm-1">
                    <h3 class="title-checkout animated fadeIn"><?php esc_html_e('Your Order', 'your-textdomain'); ?></h3>
                    <div class="right-card-sidebar-checkout">
                        <div class="top-wrapper">
                            <div class="product"><?php esc_html_e('Products', 'your-textdomain'); ?></div>
                            <div class="price"><?php esc_html_e('Price', 'your-textdomain'); ?></div>
                        </div>

                        <?php if ( !empty($cart_items) ) : ?>
                            <?php foreach ( $cart_items as $cart_item_key => $cart_item ) :
                                $_product = $cart_item['data'];
                                $product_name = $_product->get_name();
                                $product_price = WC()->cart->get_product_price($_product);
                                $product_image = wp_get_attachment_url( $_product->get_image_id() );
                            ?>
                                <div class="single-shop-list">
                                    <div class="left-area">
                                        <a href="<?php echo esc_url(get_permalink($_product->get_id())); ?>" class="thumbnail">
                                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_name); ?>">
                                        </a>
                                        <a href="<?php echo esc_url(get_permalink($_product->get_id())); ?>" class="title"><?php echo esc_html($product_name); ?></a>
                                    </div>
                                    <span class="price"><?php echo wp_kses_post($product_price); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- Subtotal, Shipping, Total -->
                        <div class="single-shop-list">
                            <div class="left-area"><span><?php esc_html_e('Subtotal', 'your-textdomain'); ?></span></div>
                            <span class="price"><?php echo wc_price($cart_subtotal); ?></span>
                        </div>
                        <div class="single-shop-list">
                            <div class="left-area"><span><?php esc_html_e('Shipping', 'your-textdomain'); ?></span></div>
                            <span class="price"><?php echo wc_price($shipping_total); ?></span>
                        </div>
                        <div class="single-shop-list">
                            <div class="left-area"><span style="font-weight: 600; color: #2C3C28;"><?php esc_html_e('Total Price:', 'your-textdomain'); ?></span></div>
                            <span class="price" style="color: #629D23;"><?php echo $cart_total; ?></span>
                        </div>

                        <!-- Payment Methods -->
                        <div class="cottom-cart-right-area">
                            <?php
                                $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
                                if ( ! empty( $available_gateways ) ) {
                                    foreach ( $available_gateways as $gateway ) { ?>
                                        <ul>
                                            <li>
                                                <input type="radio" id="<?php echo esc_attr($gateway->id); ?>" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" />
                                                <label for="<?php echo esc_attr($gateway->id); ?>"><?php echo esc_html($gateway->get_title()); ?></label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                        <p class="disc mb--25"><?php echo wp_kses_post($gateway->get_description()); ?></p>
                                    <?php }
                                }
                            ?>
                            <div class="single-category mb--30">
                                <input id="terms" type="checkbox" required>
                                <label for="terms"><?php esc_html_e('I have read and agree terms and conditions *', 'your-textdomain'); ?></label>
                            </div>
                            <button class="rts-btn btn-primary"><?php esc_html_e('Place Order', 'your-textdomain'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
}