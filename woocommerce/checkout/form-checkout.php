<?php
defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_checkout_form', $checkout );
?>

<!-- Start Main Banner -->
<section class="main-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/banner.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 text-center">
				<h2>Checkout</h2>
			</div>
		</div>				
	</div>		
</section>
<!-- End Main Banner -->

<section class="shop checkout section-padding">
	<div class="container">
		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

			<div class="row"> 
				<!-- Billing Details -->
				<div class="col-lg-8 col-12 wow fadeIn">
					<div class="checkout-form">
						
						<?php if ( $checkout->get_checkout_fields() ) : ?>
							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

							<div id="customer_details">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>

							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
						<?php endif; ?>
					</div>
				</div>

				<!-- Order Summary -->
				<div class="col-lg-4 col-12 wow fadeIn">
					<div class="order-details">
						<div class="single-widget">
							<h2><?php esc_html_e( 'Your Order', 'woocommerce' ); ?></h2>
							<div id="order_review" class="woocommerce-checkout-review-order">
								<?php do_action( 'woocommerce_checkout_order_review' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</form>
	</div>
</section>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
