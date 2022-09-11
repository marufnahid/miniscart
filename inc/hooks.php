<?php
/**
 * Custom hooks
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'miniscart_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function miniscart_site_info() {
		do_action( 'miniscart_site_info' );
	}
}

add_action( 'miniscart_site_info', 'miniscart_add_site_info' );
if ( ! function_exists( 'miniscart_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function miniscart_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'https://wordpress.org/', 'miniscart' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'miniscart' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'miniscart' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://miniscart.com', 'miniscart' ) ) . '">miniscart.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'miniscart' ),
				$the_theme->get( 'Version' )
			)
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'miniscart_site_info_override' ) ) {
			$site_info = get_theme_mod( 'miniscart_site_info_override' );
		}

		echo apply_filters( 'miniscart_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

function miniscart_woocommerce_shop_loop_subcategory_title($btn_text)
{

	//$new_btn_text = '<i class="fa fa-shopping-basket"></i>' . $btn_text;
	print_r($btn_text);
	return $btn_text;
	//return $pr;
	//return ';
}
//add_action('woocommerce_shop_loop_subcategory_title', 'miniscart_woocommerce_shop_loop_subcategory_title');
//add_action('woocommerce_product_add_to_cart_text', 'miniscart_woocommerce_shop_loop_subcategory_title');
//remove_action('woocommerce_template_loop_add_to_cart', 'miniscart_woocommerce_shop_loop_subcategory_title', 10);
remove_action('woocommerce_before_shop_loop_item', 'miniscart_woocommerce_shop_loop_subcategory_title', 10);
//remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
//add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 4);

function ms_woocommerce_product_add_to_cart_text($h){

}
//add_action('woocommerce_product_add_to_cart_text', 'ms_woocommerce_product_add_to_cart_text');

function ms_woocommerce_before_shop_loop_item()
{
	echo "Hello World";
}

//function woocommerce_output_all_notices()
//{
//	//echo "BH";
//}
//add_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices',10);

function ms_woocommerce_catalog_ordering($s)
{
	print_r($s);
}
//remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering', 20);
function ms_woocommerce_breadcrumb_defaults($s)
{
	print_r($s);
}
//add_filter('woocommerce_breadcrumb_defaults','ms_woocommerce_breadcrumb_defaults');

/**
 * For removing 'form-control' class from button.
 * @param $p
 *
 * @return mixed
 */
function miniscart_woocommerce_widget_price_filter_start($class)
{
	unset($class['classes'][3]);
	return $class;
}
add_filter('woocommerce_quantity_input_args', 'miniscart_woocommerce_widget_price_filter_start');

function miniscart_woocommerce_dropdown_variations_args($args)
{
	$args['class'] = 'form-control';
	return $args;
}
add_filter('woocommerce_dropdown_variation_attribute_options_args', 'miniscart_woocommerce_dropdown_variations_args');

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
add_action('woocommerce_before_main_content','woocommerce_breadcrumb',9);

function miniscart_woocommerce_before_cart()
{
	echo "<div class='container sm-center'> <div class='row'><div class='col-lg-8'>";
}

add_action('woocommerce_before_cart','miniscart_woocommerce_before_cart');

function miniscart_woocommerce_before_cart_collaterals()
{
	echo "</div> <div class='col-lg-4'>";
}
add_action('woocommerce_before_cart_collaterals', 'miniscart_woocommerce_before_cart_collaterals');
function miniscart_woocommerce_after_cart()
{
	echo "</div></div></div>";
}
add_action('woocommerce_after_cart','miniscart_woocommerce_after_cart');







