<?php
/**
 * Miniscart Theme Customizer
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'miniscart_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function miniscart_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'miniscart_customize_register' );

if ( ! function_exists( 'miniscart_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function miniscart_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'miniscart_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'miniscart' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'miniscart' ),
				'priority'    => apply_filters( 'miniscart_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function miniscart_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'miniscart_bootstrap_version',
			array(
				'default'           => 'bootstrap4',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'miniscart_bootstrap_version',
				array(
					'label'       => __( 'Bootstrap Version', 'miniscart' ),
					'description' => __( 'Choose between Bootstrap 4 or Bootstrap 5', 'miniscart' ),
					'section'     => 'miniscart_theme_layout_options',
					'settings'    => 'miniscart_bootstrap_version',
					'type'        => 'select',
					'choices'     => array(
						'bootstrap4' => __( 'Bootstrap 4', 'miniscart' ),
						'bootstrap5' => __( 'Bootstrap 5', 'miniscart' ),
					),
					'priority'    => apply_filters( 'miniscart_bootstrap_version_priority', 10 ),
				)
			)
		);

		$wp_customize->add_setting(
			'miniscart_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'miniscart_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'miniscart_container_type',
				array(
					'label'       => __( 'Container Width', 'miniscart' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'miniscart' ),
					'section'     => 'miniscart_theme_layout_options',
					'settings'    => 'miniscart_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'miniscart' ),
						'container-fluid' => __( 'Full width container', 'miniscart' ),
					),
					'priority'    => apply_filters( 'miniscart_container_type_priority', 10 ),
				)
			)
		);

		$wp_customize->add_setting(
			'miniscart_navbar_type',
			array(
				'default'           => 'collapse',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'miniscart_navbar_type',
				array(
					'label'             => __( 'Responsive Navigation Type', 'miniscart' ),
					'description'       => __(
						'Choose between an expanding and collapsing navbar or an offcanvas drawer.',
						'miniscart'
					),
					'section'           => 'miniscart_theme_layout_options',
					'settings'          => 'miniscart_navbar_type',
					'type'              => 'select',
					'sanitize_callback' => 'miniscart_theme_slug_sanitize_select',
					'choices'           => array(
						'collapse'  => __( 'Collapse', 'miniscart' ),
						'offcanvas' => __( 'Offcanvas', 'miniscart' ),
					),
					'priority'          => apply_filters( 'miniscart_navbar_type_priority', 20 ),
				)
			)
		);

		$wp_customize->add_setting(
			'miniscart_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'miniscart_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'miniscart' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'miniscart'
					),
					'section'           => 'miniscart_theme_layout_options',
					'settings'          => 'miniscart_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'miniscart_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'miniscart' ),
						'left'  => __( 'Left sidebar', 'miniscart' ),
						'both'  => __( 'Left & Right sidebars', 'miniscart' ),
						'none'  => __( 'No sidebar', 'miniscart' ),
					),
					'priority'          => apply_filters( 'miniscart_sidebar_position_priority', 20 ),
				)
			)
		);

		$wp_customize->add_setting(
			'miniscart_site_info_override',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'wp_kses_post',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'miniscart_site_info_override',
				array(
					'label'       => __( 'Footer Site Info', 'miniscart' ),
					'description' => __( 'Override Miniscart\'s site info located at the footer of the page.', 'miniscart' ),
					'section'     => 'miniscart_theme_layout_options',
					'settings'    => 'miniscart_site_info_override',
					'type'        => 'textarea',
					'priority'    => 20,
				)
			)
		);

	}
} // End of if function_exists( 'miniscart_theme_customize_register' ).
add_action( 'customize_register', 'miniscart_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'miniscart_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function miniscart_customize_preview_js() {
		wp_enqueue_script(
			'miniscart_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'miniscart_customize_preview_js' );

/**
 * Loads javascript for conditionally showing customizer controls.
 */
if ( ! function_exists( 'miniscart_customize_controls_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function miniscart_customize_controls_js() {
		wp_enqueue_script(
			'miniscart_customizer',
			get_template_directory_uri() . '/js/customizer-controls.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_controls_enqueue_scripts', 'miniscart_customize_controls_js' );



if ( ! function_exists( 'miniscart_default_navbar_type' ) ) {
	/**
	 * Overrides the responsive navbar type for Bootstrap 4
	 *
	 * @param string $current_mod
	 * @return string
	 */
	function miniscart_default_navbar_type( $current_mod ) {

		if ( 'bootstrap5' !== get_theme_mod( 'miniscart_bootstrap_version' ) ) {
			$current_mod = 'collapse';
		}

		return $current_mod;
	}
}
add_filter( 'theme_mod_miniscart_navbar_type', 'miniscart_default_navbar_type', 20 );
