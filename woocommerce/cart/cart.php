<?php
/**
 * Template for WooCommerce Cart Page (Customized)
 *
 * Copy this file to yourtheme/woocommerce/cart/cart.php
 * to override WooCommerce's default cart layout.
 *
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' );
?>

<!-- Start Main Banner -->
<section class="main-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 text-center">
				<h2>Cart</h2>
			</div>
		</div>				
	</div>		
</section>
<!-- End Main Banner -->

<!-- Start Shopping Cart -->
<div class="shopping-cart section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xl-9 wow fadeIn">
				<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
					<table class="table shopping-summery responsive-table woocommerce-cart-form__contents">
						<thead>
							<tr class="main-hading">
								<th>Products</th>
								<th>Price</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product   = $cart_item['data'];
								$product_id = $cart_item['product_id'];

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
									$product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
							?>
							<tr>
								<td>
									<a href="<?php echo esc_url( $product_permalink ); ?>" class="pthumb">
										<?php echo $_product->get_image( 'full' ); ?>
									</a>
									<div class="product-name">		
										<a href="<?php echo esc_url( $product_permalink ); ?>">
											<?php echo $_product->get_name(); ?>
										</a>
										<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
									</div>
								</td>

								<td class="price"><?php echo WC()->cart->get_product_price( $_product ); ?></td>

								<td class="action">
									<a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" aria-label="<?php esc_attr_e( 'Remove this item', 'woocommerce' ); ?>" onclick="return confirm('<?php esc_attr_e( 'Are you sure you want to remove this item?', 'woocommerce' ); ?>');">
										<i class="fas fa-trash"></i>
									</a>
								</td>

							</tr>
							<?php endif; endforeach; ?>
						</tbody>
					</table>
				</form>
			</div>

			<!-- Cart Totals Sidebar -->
			<div class="col-xl-3 wow fadeIn">
				<div class="cart-collaterals">
					<h2>Cart totals</h2>
					
					<div class="shop_table shop-table-responsive">
						<div class="cart-subtnotal">
							<div class="title">Subtnotal</div>
							<div><?php wc_cart_totals_subtnotal_html(); ?></div>
						</div>

						<div class="order-total">
							<div class="title">Total</div>
							<div><?php wc_cart_totals_order_total_html(); ?></div>
						</div>

						<div class="wc-proceed-to-checkout">		
							<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
						</div>									
					</div>
				</div>
			</div>
			<!-- End Cart Totals Sidebar -->

		</div>
	</div>
</div>
<!-- End Shopping Cart -->

<?php do_action( 'woocommerce_after_cart' ); ?>
