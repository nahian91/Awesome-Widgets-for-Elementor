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
			'awea_myaccount_contents',
			 [
				'label' => esc_html__('Contents', 'awesome-widgets-elementor'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
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
			'awea_myaccount_style',
			[
				'label' => esc_html__( 'Contents', 'awesome-widgets-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

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
        echo '<p>Please <a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '">login</a> to view your account.</p>';
        return;
    }

    $current_user = wp_get_current_user();
    $logout_url   = wc_logout_url();
    $user_id      = $current_user->ID;
    ?>
    <div class="awesome-myaccount-widget">
        <div class="amw-tabs-wrapper">
            <!-- Sidebar Tabs -->
            <ul class="amw-tabs-nav">
                <li class="active" data-tab="dashboard"><i class="fa-regular fa-chart-line"></i> Dashboard</li>
                <li data-tab="orders"><i class="fa-regular fa-bag-shopping"></i> Orders</li>
                <li data-tab="downloads"><i class="fa-regular fa-download"></i> Downloads</li>
                <li data-tab="address"><i class="fa-regular fa-location-dot"></i> Addresses</li>
                <li data-tab="account"><i class="fa-regular fa-user"></i> Account Details</li>
                <li><a href="<?php echo esc_url($logout_url); ?>"><i class="fa-regular fa-right-from-bracket"></i> Logout</a></li>
            </ul>

            <!-- Tab Content -->
            <div class="amw-tabs-content">
                <!-- Dashboard -->
                <div id="dashboard" class="amw-tab-pane active">
                    <h3>Hello, <?php echo esc_html( $current_user->display_name ); ?> 👋</h3>
                    <p>Email: <strong><?php echo esc_html( $current_user->user_email ); ?></strong></p>
                    <p>Member since: <strong><?php echo esc_html( date( 'F j, Y', strtotime( $current_user->user_registered ) ) ); ?></strong></p>
                    <p>From your dashboard you can manage orders, addresses, and account settings.</p>
                </div>

                <!-- Orders -->
                <div id="orders" class="amw-tab-pane">
                    <h3>Your Recent Orders</h3>
                    <?php
                    $orders = wc_get_orders( [ 'customer_id' => $user_id, 'limit' => 5 ] );
                    if ( $orders ) {
                        echo '<table class="amw-orders-table">';
                        echo '<thead><tr><th>Order</th><th>Date</th><th>Status</th><th>Total</th></tr></thead><tbody>';
                        foreach ( $orders as $order ) {
                            echo '<tr>';
                            echo '<td>#' . esc_html( $order->get_id() ) . '</td>';
                            echo '<td>' . esc_html( wc_format_datetime( $order->get_date_created() ) ) . '</td>';
                            echo '<td>' . esc_html( ucfirst( $order->get_status() ) ) . '</td>';
                            echo '<td>' . esc_html( wc_price( $order->get_total() ) ) . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo '<p>No recent orders.</p>';
                    }
                    ?>
                </div>

                <!-- Downloads -->
                <div id="downloads" class="amw-tab-pane">
                    <h3>Available Downloads</h3>
                    <?php
                    $downloads = wc_get_customer_available_downloads( $user_id );
                    if ( $downloads ) {
                        echo '<ul class="amw-downloads-list">';
                        foreach ( $downloads as $download ) {
                            echo '<li><a href="' . esc_url( $download['download_url'] ) . '">' . esc_html( $download['product_name'] ) . '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No downloads available.</p>';
                    }
                    ?>
                </div>

                <!-- Addresses -->
                <div id="address" class="amw-tab-pane">
                    <h3>Billing Address</h3>
                    <p><?php echo wc_get_account_formatted_address( 'billing' ) ?: 'No billing address set.'; ?></p>
                    <h3>Shipping Address</h3>
                    <p><?php echo wc_get_account_formatted_address( 'shipping' ) ?: 'No shipping address set.'; ?></p>
                </div>

                <!-- Account Details -->
                <div id="account" class="amw-tab-pane">
                    <h3>Edit Account Details</h3>
                    <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="amw-account-form">
                        <input type="hidden" name="action" value="update_account">
                        <div class="amw-form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?php echo esc_attr( $current_user->first_name ); ?>">
                        </div>
                        <div class="amw-form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?php echo esc_attr( $current_user->last_name ); ?>">
                        </div>
                        <div class="amw-form-group">
                            <label>Display Name</label>
                            <input type="text" name="display_name" value="<?php echo esc_attr( $current_user->display_name ); ?>" required>
                        </div>
                        <div class="amw-form-group">
                            <label>Email</label>
                            <input type="email" name="user_email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required>
                        </div>
                        <div class="amw-form-group">
                            <label>Current Password</label>
                            <input type="password" name="current_password">
                        </div>
                        <div class="amw-form-group">
                            <label>New Password</label>
                            <input type="password" name="new_password">
                        </div>
                        <div class="amw-form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="confirm_password">
                        </div>
                        <button type="submit" class="amw-btn">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
    .amw-tabs-wrapper { display:flex; flex-wrap:wrap; gap:20px; }
    .amw-tabs-nav { list-style:none; padding:0; margin:0; flex:1; min-width:180px; }
    .amw-tabs-nav li { cursor:pointer; padding:12px 20px; margin-bottom:10px; background:#f4f4f4; border-radius:6px; display:flex; align-items:center; gap:10px; transition:0.3s; }
    .amw-tabs-nav li.active { background:#0073aa; color:#fff; }
    .amw-tabs-nav li a { color: inherit; text-decoration:none; display:flex; align-items:center; gap:10px; }
    .amw-tab-pane { display:none; flex:3; padding:20px; background:#fff; border-radius:6px; box-shadow:0 0 10px rgba(0,0,0,0.05); }
    .amw-tab-pane.active { display:block; }
    .amw-orders-table { width:100%; border-collapse:collapse; margin-top:15px; }
    .amw-orders-table th, .amw-orders-table td { padding:10px; border:1px solid #ddd; text-align:left; }
    .amw-downloads-list { list-style:none; padding:0; margin-top:15px; }
    .amw-downloads-list li { padding:6px 0; border-bottom:1px solid #eee; }
    .amw-account-form .amw-form-group { margin-bottom:15px; }
    .amw-account-form label { display:block; margin-bottom:5px; font-weight:600; }
    .amw-account-form input { width:100%; padding:8px 10px; border:1px solid #ccc; border-radius:4px; }
    .amw-btn { padding:10px 20px; background:#0073aa; color:#fff; border:none; border-radius:5px; cursor:pointer; transition:0.3s; }
    .amw-btn:hover { background:#005177; }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function(){
        const tabs = document.querySelectorAll('.amw-tabs-nav li[data-tab]');
        const panes = document.querySelectorAll('.amw-tab-pane');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(){
                tabs.forEach(t => t.classList.remove('active'));
                panes.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                document.getElementById(this.dataset.tab).classList.add('active');
            });
        });

        // Activate first tab
        if(tabs.length) tabs[0].click();
    });
    </script>
    <?php
}
}