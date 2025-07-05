<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="single-widget">
    <div class="content">
        <ul>
            <?php
            // Loop through cart items
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = $cart_item['data'];
                $product_name = $_product->get_name();
                $quantity = $cart_item['quantity'];
                $product_subtnotal = WC()->cart->get_product_subtnotal( $_product, $quantity );

                echo '<li>' . esc_html( $product_name ) . ' <strong class="product-quantity">× ' . intval( $quantity ) . '</strong><span>' . wp_kses_post( $product_subtnotal ) . '</span></li>';
            }
            ?>
            <li>Sub Total<span><?php wc_cart_totals_subtnotal_html(); ?></span></li>
            <li class="last">Total<span><?php wc_cart_totals_order_total_html(); ?></span></li>
        </ul>
    </div>
</div>
