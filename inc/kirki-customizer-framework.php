<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( class_exists( 'Kirki' ) ) {

	new \Kirki\Panel(
		'miniscart_settings',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'MinisCart Settings', 'kirki' ),
			'description' => esc_html__( 'My Panel Description.', 'kirki' ),
		]
	);

	new \Kirki\Section(
		'homepage_settings',
		[
			'title'    => esc_html__( 'Homepage Settings', 'kirki' ),
			'panel'    => 'miniscart_settings',
			'priority' => 160,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings' => 'cat_title_switch',
			'label'    => esc_html__( 'Show Category', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => 'on',
			'choices'  => [
				'on'  => esc_html__( 'Show', 'kirki' ),
				'off' => esc_html__( 'Hide', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings'        => 'shop_cat_title',
			'label'           => esc_html__( 'Category Title', 'kirki' ),
			'section'         => 'homepage_settings',
			'default'         => esc_html__( 'Shop By Category', 'kirki' ),
			'active_callback' => [
				[
					'setting'  => 'cat_title_switch',
					'operator' => '==',
					'value'    => true,
				]
			],
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'cat_columns',
			'label'       => esc_html__( 'Category Columns', 'kirki' ),
			'section'     => 'homepage_settings',
			'default'     => '3',
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'2' => esc_html__( '2', 'kirki' ),
				'3' => esc_html__( '3', 'kirki' ),
				'4' => esc_html__( '4', 'kirki' ),
				'5' => esc_html__( '5', 'kirki' ),
				'6' => esc_html__( '6', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings' => 'new_arrival_title_switch',
			'label'    => esc_html__( 'New Arrival Title', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => 'on',
			'choices'  => [
				'on'  => esc_html__( 'Show', 'kirki' ),
				'off' => esc_html__( 'Hide', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings'        => 'new_arrival_title',
			'label'           => esc_html__( 'New Product Title', 'kirki' ),
			'section'         => 'homepage_settings',
			'default'         => esc_html__( 'New Arrival', 'kirki' ),
			'active_callback' => [
				[
					'setting'  => 'new_arrival_title_switch',
					'operator' => '==',
					'value'    => true,
				]
			],
		]
	);

	new \Kirki\Field\Textarea(
		[
			'settings'        => 'new_product_subtitle',
			'label'           => esc_html__( 'New Arrival Subtitle', 'kirki' ),
			'section'         => 'homepage_settings',
			'default'         => esc_html__( 'This is a default value', 'kirki' ),
			'active_callback' => [
				[
					'setting'  => 'new_arrival_title_switch',
					'operator' => '==',
					'value'    => true,
				]
			],
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'new_products_columns',
			'label'       => esc_html__( 'Products Columns', 'kirki' ),
			'section'     => 'homepage_settings',
			'default'     => '3',
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'2' => esc_html__( '2', 'kirki' ),
				'3' => esc_html__( '3', 'kirki' ),
				'4' => esc_html__( '4', 'kirki' ),
				'5' => esc_html__( '5', 'kirki' ),
				'6' => esc_html__( '6', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Background(
		[
			'settings'  => 'promo_background_setting',
			'label'     => esc_html__( 'Promo Background', 'kirki' ),
			'section'   => 'homepage_settings',
			'transport' => 'auto',
			'output'    => [
				[
					'element' => '.promo-img.rounded.bg-overlay',
				],
			],
		]
	);

	new \Kirki\Field\Editor(
		[
			'settings' => 'promo_editor_setting',
			'label'    => esc_html__( 'Promo Text', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => '',
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings' => 'popular_product_switch',
			'label'    => esc_html__( 'Popular Title', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => 'on',
			'choices'  => [
				'on'  => esc_html__( 'Show', 'kirki' ),
				'off' => esc_html__( 'Hide', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings'        => 'popular_product_title',
			'label'           => esc_html__( 'Popular Product Title', 'kirki' ),
			'section'         => 'homepage_settings',
			'default'         => esc_html__( 'Popular product', 'kirki' ),
			'active_callback' => [
				[
					'setting'  => 'popular_product_switch',
					'operator' => '==',
					'value'    => true,
				]
			],
		]
	);

	new \Kirki\Field\Textarea(
		[
			'settings'        => 'popular_product_subtitle',
			'label'           => esc_html__( 'Popular Product SubTitle', 'kirki' ),
			'section'         => 'homepage_settings',
			'active_callback' => [
				[
					'setting'  => 'popular_product_switch',
					'operator' => '==',
					'value'    => true,
				]
			],
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => 'offer_repeater_setting',
			'label'    => esc_html__( 'Offer Repeater', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => [
				[
					'offer_title'   => esc_html__( 'Free Shipping', 'kirki' ),
					'offer_subtitle'    => esc_html__( 'This is free to ship', 'kirki' ),
					'offer_icon'   => '',
				],
				[
					'offer_title'   => esc_html__( 'Free Shipping', 'kirki' ),
					'offer_subtitle'    => esc_html__( 'This is free to ship', 'kirki' ),
					'offer_icon'   => '',
				],
				[
					'offer_title'   => esc_html__( 'Free Shipping', 'kirki' ),
					'offer_subtitle'    => esc_html__( 'This is free to ship', 'kirki' ),
					'offer_icon'   => '',
				],
			],
			'fields'   => [
				'offer_title'   => [
					'type'        => 'text',
					'label'       => esc_html__( 'Offer Title', 'kirki' ),
					'default'     => esc_html__('Free Shipping','kirki'),
				],
				'offer_subtitle'    => [
					'type'        => 'textarea',
					'label'       => esc_html__( 'Offer Subtitle', 'kirki' ),
					'default'       => esc_html__( 'It is easy to ship to your destination.', 'kirki' ),
				],
				'offer_icon' => [
					'type'        => 'text',
					'label'       => esc_html__( 'Icon Name', 'kirki' ),
					'description'       => esc_html__( 'Enter fontawesome or bicon class name.', 'kirki' ),
				],
			],
		]
	);


	new \Kirki\Field\Checkbox_Switch(
		[
			'settings' => 'instagram_title_switch',
			'label'    => esc_html__( 'Instagram Title Switch', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => 'on',
			'choices'  => [
				'on'  => esc_html__( 'Show', 'kirki' ),
				'off' => esc_html__( 'Hide', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings'        => 'instagram_product_title',
			'label'           => esc_html__( 'Instagram Product Title', 'kirki' ),
			'section'         => 'homepage_settings',
			'default'         => esc_html__( 'Shop with instagram', 'kirki' ),
			'active_callback' => [
				[
					'setting'  => 'instagram_title_switch',
					'operator' => '==',
					'value'    => true,
				]
			],
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => 'instagram_repeater_setting',
			'label'    => esc_html__( 'Instagram Repeater', 'kirki' ),
			'section'  => 'homepage_settings',
			'default'  => [
				[
					'instagram_url'   => esc_html__('www.instagram.com','kirki'),
				],
				[
					'instagram_url'   => esc_html__('www.instagram.com','kirki'),
				],
				[
					'instagram_url'   => esc_html__('www.instagram.com','kirki'),
				],
				[
					'instagram_url'   => esc_html__('www.instagram.com','kirki'),
				],
				[
					'instagram_url'   => esc_html__('www.instagram.com','kirki'),
				],
				[
					'instagram_url'   => esc_html__('www.instagram.com','kirki'),
				],
			],
			'fields'   => [
				'instagram_url'   => [
					'type'        => 'url',
					'label'       => esc_html__( 'Instagram URL', 'kirki' ),
					'default'     => esc_html__('www.instagram.com','kirki'),
				],
				'instagram_image' => [
					'type'        => 'image',
					'label'       => esc_html__( 'Image', 'kirki' ),
					'default'     => '',
				],
			],
		]
	);

	new \Kirki\Section(
		'footer_settings',
		[
			'title'    => esc_html__( 'Footer Settings', 'kirki' ),
			'panel'    => 'miniscart_settings',
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'facebook_url',
			'label'    => esc_html__( 'Facebook URL', 'kirki' ),
			'section'  => 'footer_settings',
			'default'  => 'https://yoururl.com/',
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'twitter_url',
			'label'    => esc_html__( 'Twitter URL', 'kirki' ),
			'section'  => 'footer_settings',
			'default'  => 'https://yoururl.com/',
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'youtube_url',
			'label'    => esc_html__( 'Youtube URL', 'kirki' ),
			'section'  => 'footer_settings',
			'default'  => 'https://yoururl.com/',
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'instagram_url',
			'label'    => esc_html__( 'Instagram URL', 'kirki' ),
			'section'  => 'footer_settings',
			'default'  => 'https://yoururl.com/',
		]
	);

	new \Kirki\Field\Editor(
		[
			'settings'        => 'footer_copyright',
			'label'           => esc_html__( 'Footer Copyright', 'kirki' ),
			'section'         => 'footer_settings',
			'default'         => esc_html__( 'All right reserved @miniscart', 'kirki' ),
		]
	);

}