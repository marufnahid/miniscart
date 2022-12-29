<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'miniscart_container_type' );
?>

    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">Error 404</h2>
                    <nav class="woocommerce-breadcrumb">
                        <a href="#">Home</a>
                        <!--<span class="breadcrumb-separator"> / </span>Error-->
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->


<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">
                        <section class="space-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h1 class="display-1 font-weight-bold"><?php echo esc_html__('404','miniscart');?></h1>
                                        <h2>Oops! Page Not Found</h2>
                                        <p>Sorry, but the page you are looking for is not found. Please, make sure you have typed the current URL.</p>
                                        <a href="<?php echo home_url("/");?>" class="btn btn-solid-dark"><?php echo esc_html__('Go Home','miniscart'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </section>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
