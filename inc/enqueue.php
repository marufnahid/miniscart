<?php
/**
 * Miniscart enqueue scripts
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'miniscart_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function miniscart_scripts() {
		// Get the theme data.
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$bootstrap_version = get_theme_mod( 'miniscart_bootstrap_version', 'bootstrap4' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Grab asset urls.
		$theme_styles  = "/css/theme{$suffix}.css";
		$theme_scripts = "/js/theme{$suffix}.js";
		if ( 'bootstrap4' === $bootstrap_version ) {
			$theme_styles  = "/css/theme-bootstrap4{$suffix}.css";
			$theme_scripts = "/js/theme-bootstrap4{$suffix}.js";
		}

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . $theme_styles );
		wp_enqueue_style( 'miniscart-styles', get_template_directory_uri() . $theme_styles, array(), $css_version );
		wp_enqueue_style('bootstrap', get_template_directory_uri(). "/assets/vendor/bootstrap/css/bootstrap.min.css", array(), $css_version );
		wp_enqueue_style('font-awesome', get_template_directory_uri(). "/assets/vendor/font-awesome/css/fontawesome.css", array(), $css_version );
		wp_enqueue_style('bicon', get_template_directory_uri(). "/assets/vendor/bicon/css/bicon.css", array(), $css_version );
		wp_enqueue_style('woocommerce-main', get_template_directory_uri(). "/assets/css/woocommerce.css", array(), $css_version );
		wp_enqueue_style('woocommerce-layouts', get_template_directory_uri(). "/assets/css/woocommerce-layouts.css", array(), $css_version );
//		wp_enqueue_style('woocommerce-small-screen', get_template_directory_uri(). "/assets/css/woocommerce-small-screen.css", array(), $css_version );
		wp_enqueue_style('main-css', get_template_directory_uri(). "/assets/css/main.css", array(), $css_version );
		wp_enqueue_style( 'miniscart-style', get_stylesheet_uri(), array(), time() );



		//wp_enqueue_script( 'jquery' );
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $theme_scripts );
		wp_enqueue_script( 'miniscart-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true );
		wp_enqueue_script('jquery-js', get_template_directory_uri()."/assets/vendor/jquery.min.js", array(),"3.3.1", true);
		wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.min.js", array('jquery-js'),$js_version, true);
	//	wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.min.js", array('jquery-js'),$js_version, true);
		wp_enqueue_script('popper-js', get_template_directory_uri()."/assets/vendor/popper.min.js", array('jquery-js'),$js_version, true);
		wp_enqueue_script('main-js', get_template_directory_uri()."/assets/js/scripts.js", array('jquery-js'),$js_version, true);
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'miniscart_scripts' ).

add_action( 'wp_enqueue_scripts', 'miniscart_scripts' );
