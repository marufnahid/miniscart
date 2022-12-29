<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'miniscart_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-lg mainmenu" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'miniscart' ); ?>
    </h2>


<!--    <div class="--><?php ////echo esc_attr( $container ); ?><!--">-->

        <!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

			<?php if ( is_front_page() && is_home() ) : ?>

                <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

			<?php else : ?>

                <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

			<?php endif; ?>

			<?php
		} else {
			the_custom_logo();
		}
		?>
        <!-- end custom logo -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="<?php esc_attr_e( 'Toggle navigation', 'miniscart' ); ?>">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"> </i></span>
        </button>


        <div id="form-search" class="form-search">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="<?php _e('Search for...','miniscart');?>">
                <span class="input-group-btn">
                                <button id="form-search-close-btn" class="btn" type="button">
                                    <span class="svg svg--cross">
                                        <svg class="svg__icon" width="32px" height="32px" viewBox="0 0 32 32">
                                            <path d="M16.7,16L31.9,0.9c0.2-0.2,0.2-0.5,0-0.7s-0.5-0.2-0.7,0L16,15.3L0.9,0.1C0.7,0,0.3,0,0.1,0.1S0,0.7,0.1,0.9L15.3,16
                                            L0.1,31.1c-0.2,0.2-0.2,0.5,0,0.7C0.2,32,0.4,32,0.5,32s0.3,0,0.4-0.1L16,16.7l15.1,15.1c0.1,0.1,0.2,0.1,0.4,0.1s0.3,0,0.4-0.1
                                            c0.2-0.2,0.2-0.5,0-0.7L16.7,16z"/>
                                        </svg>
                                    </span>
                                </button>
                            </span>
            </div>
        </div>

        <!-- The WordPress Menu goes here -->
		<?php

		$cart_url = wc_get_cart_url();
        $items_count = WC()->cart->get_cart_contents_count();
        $total = WC()->cart->get_cart_total();

        if (WC()->cart->is_empty()){
            $miniscart_output = '<a class="dropdown-toggle" href="'.$cart_url.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-basket"></i><span 
          class="cart-quantity-highlighter">0</span></a>';
        }else{
	        $miniscart_output = '<a class="dropdown-toggle" href="'.$cart_url.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-basket"></i><span 
          class="cart-quantity-highlighter">'.$items_count.'</span></a>';
            $miniscart_output .= '<ul class="dropdown-menu dropdown-menu-right widget_shopping_cart_content woocommerce-mini-cart cart_list product_list_widget ">';
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item){
                $_product = $cart_item['data'];
                $product_id = $cart_item['product_id'];
                

                

	            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
		            $product_name      =  $_product->get_name();
		            $thumbnail         =  $_product->get_image();
                    $cat_id            = $cart_item['data']->category_ids[0];
                    $quantity = $cart_item['quantity'];

                    //$currency_symbol = $cart_item['data']->get_currency();
                    print_r(WC()->cart->get_cart_total());
		            $product_price     =   WC()->cart->get_product_price( $_product );
		            $product_permalink =  $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';

                   $miniscart_output .= '<li class="woocommerce-mini-cart-item mini_cart_item">';
                   $miniscart_output .= '<a href="'.esc_url( wc_get_cart_remove_url( $cart_item_key ) ).'" class="remove remove_from_cart_button" aria-label="'.esc_attr__( 'Remove this item', 'woocommerce' ).'" data-product_id="'.esc_attr( $product_id ).'" data-cart_item_key="'.esc_attr( $cart_item_key ).'" data-product_sku="'.esc_attr( $_product->get_sku() ).'">'.esc_html__('x','miniscart').'</a>';
                    $miniscart_output .= '<a class="mini_cart_item-image" href="'.esc_url( $product_permalink ).'"> '. $thumbnail .'</a>';
                    $miniscart_output .= '<div class="mini_cart_item-desc">';
                     $miniscart_output .= '<a class="font-titles" href="'.esc_url( $product_permalink ).'">'.$product_name.'</a>';
                     $miniscart_output .=  '<span class="woo-c_product_category">
                                                    <a href="'.esc_url(get_category_link($cat_id)).'" rel="tag">'.esc_html(get_cat_name($cat_id)).'</a>
                                                </span>';

									$miniscart_output .=		'<span class="quantity"> '.$quantity.' × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount">'.$product_price.'<span class="woocommerce-Price-currencySymbol">$</span></span></span></span> ';
                                                                                                                                                                                                                                        $miniscart_output .= '</div>';




                    $miniscart_output .= '</li>';
	            }

            }
            $miniscart_output .= '</ul>';
        }

        $mini_cart_output = <<<MINI
             <a class="dropdown-toggle" href="$cart_url" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-basket"></i><span 
          class="cart-quantity-highlighter">$items_count</span></a>
          
          <ul class="dropdown-menu dropdown-menu-right widget_shopping_cart_content woocommerce-mini-cart cart_list product_list_widget ">
									<li class="woocommerce-mini-cart-item mini_cart_item">
										<a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="180" data-cart_item_key="045117b0e0a11a242b9765e79cbf113f" data-product_sku="9015-DF-1">×</a>													<a class="mini_cart_item-image" href="https://stockie.colabr.io/demo1/shop/gosta-leather-chair/">
											<img src="<?php echo get_template_directory_uri();?>/assets/img/p1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">							</a>
										<div class="mini_cart_item-desc">
											<a class="font-titles" href="#">Trendy Cloth</a>
											<span class="woo-c_product_category">
                                                    <a href="<?php echo get_template_directory_uri();?>/assets/img/p1.jpg" rel="tag">Cloth</a>
                                                </span>

											<span class="quantity">1 × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount">56.00<span class="woocommerce-Price-currencySymbol">$</span></span></span></span>
										</div>
									</li>
									<li class="woocommerce-mini-cart-item mini_cart_item">
										<a href="#" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="18907" data-cart_item_key="91726a6e8c9faa2bb5f26d442a59c203" data-product_sku="9015-DF-2">×</a>													<a class="mini_cart_item-image" href="https://stockie.colabr.io/demo1/shop/stoppade-plastic-chair/">
											<img src="<?php echo get_template_directory_uri();?>/assets/img/p2.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
										</a>
										<div class="mini_cart_item-desc">
											<a class="font-titles" href="#">Warm Sweater</a>
											<span class="woo-c_product_category">
                                                    <a href="#" rel="tag">Stools</a></span>
											<span class="quantity">1 × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount">97.00<span class="woocommerce-Price-currencySymbol">$</span></span></span></span>
										</div>
									</li>
									<li class="woocommerce-mini-cart-item mini_cart_item">
										<div class="woocomerce-mini-cart__container">
											<p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount">153.00<span class="woocommerce-Price-currencySymbol">$</span></span></span></p>
											<p class="woocommerce-mini-cart__buttons buttons">
												<a href="#" class="button wc-forward">View cart</a>
												<a href="#" class="button checkout wc-forward">Checkout</a>
											</p>
										</div>
									</li>
								</ul>

           
MINI;

		$search_form = get_search_form( false ); // Return not echo

		$items_wrap = '<ul id="%1$s" class="%2$s">%3$s';
		$items_wrap .= '<li><a href="#" class="" id="search-icon"><i class="fa fa-search"></i></a></li>';
		$items_wrap .= '<li><a href="#" class="" ><i class="fa fa-user"></i></a></li>';
		$items_wrap .= '<li class="dropdown mini-cart">'.$miniscart_output .'</li>';
        $items_wrap .= '</ul>';





		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ml-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'menu',
				'depth'           => 2,
				'items_wrap' =>   $items_wrap,
				'walker'          => new Miniscart_WP_Bootstrap_Navwalker(),
			)
		);
		?>


<!--    </div> .container(-fluid) -->

</nav><!-- .site-navigation -->
