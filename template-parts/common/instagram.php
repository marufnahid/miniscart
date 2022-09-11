<!--instagram section start-->
<section class="">
	<?php if (get_theme_mod('instagram_title_switch', true)):?>
    <div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="section-title text-center">
					<h2 class="title "><?php echo esc_html(get_theme_mod('instagram_product_title'))?></h2>
				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>
	<div class="flickr-list">
        <?php
        $settings = get_theme_mod('instagram_repeater_setting');
        foreach ($settings as $setting) { ?>
            <a href="<?php echo esc_url($setting['instagram_url']);?>" style="background-image: url('<?php echo esc_url($setting['instagram_image']);?>')"></a>
        <?php } ?>
	</div>
</section>
<!-- instagram section end-->