<?php
/**
 * Header Navbar (bootstrap4)
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


	<?php //if ( 'container' === $container ) : ?>
    <!--	<div class="container">-->
	<?php //endif; ?>

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

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="<?php esc_attr_e( 'Toggle navigation', 'miniscart' ); ?>">
        <span class="navbar-toggler-icon"><i class="fa fa-bars"> </i></span>
    </button>

    <div id="form-search" class="form-search">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="<?php _e( 'Search for...', 'miniscart' ); ?>">
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
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => 'navbarNavDropdown',
			'menu_class'      => 'navbar-nav ml-auto',
			'fallback_cb'     => '',
			'menu_id'         => 'menu',
			'depth'           => 2,
			'walker'          => new Miniscart_WP_Bootstrap_Navwalker(),
		)
	);
	?>

	<?php //if ( 'container' === $container ) : ?>
    <!--	</div><-- .container -->
	<?php //endif; ?>

</nav><!-- .site-navigation -->
