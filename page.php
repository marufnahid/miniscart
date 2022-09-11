<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'miniscart_container_type' );

?>

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php the_title( '<h2 class="font-weight-bold">', '</h2>' ); ?>
					<?php do_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);?>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper" id="page-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">

                <!-- Do the left sidebar check -->

				<?php
				if ( ! is_checkout() || ! is_cart() || ! is_account_page() || ! is_checkout_pay_page() ) {
					get_template_part( 'global-templates/left-sidebar-check' );
				}
				?>

                <main class="site-main" id="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

                </main><!-- #main -->

                <!-- Do the right sidebar check -->
				<?php
				if ( ! is_checkout() || ! is_cart() || ! is_account_page() || ! is_checkout_pay_page() ) {
					get_template_part( 'global-templates/right-sidebar-check' );
				}
				?>

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->

<?php
get_footer();
