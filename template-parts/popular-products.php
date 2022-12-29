<!--product section start-->
<section class="space-3">
	<div class="container">
		<div class="row justify-content-md-center">
            <?php if (get_theme_mod('popular_product_switch',true)): ?>

			<div class="col-md-8">
				<div class="section-title text-center">
					<h2 class="title "> <?php echo esc_html(get_theme_mod('popular_product_title'));?></h2>
					<div class="sub-title"><?php echo esc_html(get_theme_mod('popular_product_subtitle')); ?></div>
				</div>
			</div>
            <?php endif; ?>

			<div class="col-md-12">
				<ul class="products columns-3">
					<?php echo do_shortcode('[products columns="3" per_page="3" orderby="popularity" order="ASC"]' )?>
				</ul>
			</div>

		</div>
	</div>
</section>
<!-- product section end-->