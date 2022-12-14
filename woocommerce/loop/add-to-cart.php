<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $product;




echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	sprintf(
		'<div class="product-wrap"><a href="%s" data-quantity="%s" class="%s product_type_%s button single_add_to_cart_button  %s" %s> <span type="button" data-toggle="tooltip" data-placement="top" title="%s"><i class="fa fa-shopping-basket"></i></span> </a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		$product->get_type() === 'simple' ? 'ajax_add_to_cart' : '',
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() ),
	),
	$product,
	$args
);
