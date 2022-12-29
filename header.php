<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'miniscart_bootstrap_version', 'bootstrap5' );
$navbar_type       = get_theme_mod( 'miniscart_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php miniscart_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar" class="app-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'miniscart' ); ?></a>

	                <?php get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version ); ?>
                </div>
            </div>
        </div>
	</header><!-- #wrapper-navbar end -->
