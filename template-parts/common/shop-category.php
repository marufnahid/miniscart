<!--shop category start-->
<section class="space-3">
	<div class="container sm-center">
		<div class="row">
            <?php if(get_theme_mod( 'cat_title_switch' , true) ): ?>
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2 class="title"> <?php echo esc_html(get_theme_mod( 'shop_cat_title' )); ?></h2>
				</div>
			</div>
            <?php endif; ?>

			<div class="col-md-12">

				<ul class="products columns-3">

					<?php woocommerce_output_product_categories();  ?>

				</ul>
			</div>
		</div>
	</div>
</section>
<!--shop category end-->