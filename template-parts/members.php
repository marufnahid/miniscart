<section class="section-gray space-3 mb-5">
	<div class="container">
        <?php
        if ('yes' == get_theme_mod('team_title_switch', true)):
        ?>
		<div class="row justify-content-center mb-4 mb-lg-5">
			<div class="col-md-8 text-center mb">
				<h2 class="font-weight-bold"><?php echo esc_html(get_theme_mod('team_title'));?></h2>
				<p><?php echo esc_html(get_theme_mod('team_subtitle'));?></p>
			</div>
		</div>
        <?php
        endif;
        ?>
		<div class="row justify-content-center">
            <?php
            $settings = get_theme_mod('team_repeater_setting');
            foreach ($settings as $setting):
            ?>
			<div class="col-md-4 text-center">
				<img class="mb-3" src="<?php echo esc_url($setting['team_image']); ?>" alt="">
				<h5 class="mb-0 font-weight-bold"><?php echo esc_html($setting['members_name']); ?></h5>
				<p><?php echo esc_html($setting['members_designation']); ?></p>
			</div>
            <?php
            endforeach;
            ?>

		</div>
	</div>
</section>