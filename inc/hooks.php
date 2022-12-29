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


//remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
//add_action('woocommerce_before_main_content','woocommerce_breadcrumb', 9);

//function woocommerce_breadcrumb()
//{
//
//}
//add_action('woocommerce_before_main_content','woocommerce_breadcrumb');

remove_action('woocommerce_sidebar','woocommerce_get_sidebar' ,10);

remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_add_to_cart',26);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',15);



//add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
//
//function woocommerce_header_add_to_cart_fragment( $fragments ) {
//	global $woocommerce;
//
//	ob_start();
//
//	?>
<!--	<a class="cart-customlocation" href="--><?php //echo esc_url(wc_get_cart_url()); ?><!--" title="--><?php //_e('View your shopping cart', 'woothemes'); ?><!--">--><?php //echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?><!-- – --><?php //echo $woocommerce->cart->get_cart_total(); ?><!--</a>-->
<!--	--><?php
//	$fragments['a.cart-customlocation'] = ob_get_clean();
//	return $fragments;
//}

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
	ob_start();
	$items_count = WC()->cart->get_cart_contents_count();
	?>
    <div id="mini-cart-count"><?php echo $items_count ? $items_count : '&nbsp;'; ?></div>
	<?php
	$fragments['span.cart-quantity-highlighter'] = ob_get_clean();
	return $fragments;
}

//add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

//function woocommerce_header_add_to_cart_fragment( $fragments ) {
//	ob_start();
//	?>
<!--    <a class="cart-contents" href="--><?php //echo wc_get_cart_url(); ?><!--" title="--><?php //_e( 'View your shopping cart' ); ?><!--">--><?php //echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?><!-- - --><?php //echo WC()->cart->get_cart_total(); ?><!--</a>-->
<!--	--><?php
//
//	$fragments['a.cart-contents'] = ob_get_clean();
//
//	return $fragments;
//}

//add_filter( 'woocommerce_add_to_cart_fragments', 'wc_mini_cart_ajax_refresh' );
function wc_mini_cart_ajax_refresh( $fragments ){
	## 1. Refreshing mini cart subtotal amount
	$fragments['#mcart-stotal'] = '<span id="mcart-stotal">'.WC()->cart->get_cart_subtotal().'</span>';

	## 2. Refreshing cart subtotal
	ob_start();
	echo '<span id="mcart-widget">';
	woocommerce_mini_cart();
	echo '</span>';
	$fragments['#mcart-widget'] = ob_get_clean();

	return $fragments;
}

function miniscart_walker_nav_menu_start_el( $args)
{
   $args[] = "<li>";
   return $args;
}

//add_filter('walker_nav_menu_start_el','miniscart_walker_nav_menu_start_el');



//add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
	global $woocommerce;
	$viewing_cart = __('View your shopping cart', 'your-theme-slug');
	$start_shopping = __('Start shopping', 'your-theme-slug');
	$cart_url = $woocommerce->cart->get_cart_url();
	$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
	$cart_contents_count = $woocommerce->cart->cart_contents_count;
	$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
	$cart_total = $woocommerce->cart->get_cart_total();
	// Uncomment the line below to hide nav menu cart item when there are no items in the cart
	// if ( $cart_contents_count > 0 ) {


    
	if ($cart_contents_count == 0) {
        foreach ($woocommerce->cart as $item){
        //$menu_item .= '<li class="aaa">' .$item .' </li>';
		$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'"> '. woocommerce_mini_cart();
        }
	} else {
		$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
	}

	$menu_item .= '<i class="fa fa-shopping-cart"></i> ';
    $menu_item .= '<ul> '.woocommerce_mini_cart() .'</ul>';

	$menu_item .= $cart_contents.' - '. $cart_total .'</a>';

	$menu_item .= '</li>';
	// Uncomment the line below to hide nav menu cart item when there are no items in the cart
	// }
	echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}


function mini_cart_pro()
{
    if ( ! WC()->cart->is_empty() ) : ?>

<!--	<ul class="woocommerce-mini-cart cart_list product_list_widget --><?php ////echo esc_attr( $args['list_class'] ); ?><!--">-->
		<?php

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					  apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_attr__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
					<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php else : ?>
						<a href="<?php echo esc_url( $product_permalink ); ?>">
							<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					<?php endif; ?>
					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</li>
				<?php
			}
		}

		?>
<!--	</ul>-->



<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php
    endif;
}