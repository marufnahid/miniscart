<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Miniscart
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'miniscart_container_type' );
?>

<?php  if (! is_shop()){  get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); } ?>

<div class="wrapper space-2 " id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row justify-content-center">

            <div class="col-md-4 mb-md-0 mb-4">
                <img class="footer-logo" src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" srcset="<?php echo get_template_directory_uri();?>/assets/img/logo@2x.png 2x" alt="">
            </div>
            <div class="col-md-4  mb-md-0 mb-4">
                <div class="social-links text-center">
                    <a href="<?php echo esc_html(get_theme_mod('facebook_url'));?>"><i class="fab fa-facebook"></i></a>
                    <a href="<?php echo esc_html(get_theme_mod('twitter_url'));?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo esc_html(get_theme_mod('instagram_url'));?>"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo esc_html(get_theme_mod('youtube_url'));?>"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <p class="mb-0 text-right"><?php echo esc_html(get_theme_mod('footer_copyright',__('@Copyright MinisCart', 'miniscart')));?></p>
            </div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

