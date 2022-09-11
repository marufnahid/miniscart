<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package Miniscart
 */

if(is_shop()){
    $miniscart_sidebar = 'shop-sidebar';
}else{
    $miniscart_sidebar = 'right-sidebar';
}
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( $miniscart_sidebar ) || is_cart() || is_checkout() ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'miniscart_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar">
<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar">
<?php endif; ?>
<?php dynamic_sidebar( $miniscart_sidebar ); ?>

</div><!-- #right-sidebar -->
