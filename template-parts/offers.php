<!--offer section start-->
<section class="space-3 space-adjust">
	<div class="container ">
		<div class="row no-gutters text-center">
            <?php
            $settings = get_theme_mod('offer_repeater_setting');
            $count = 1;

            foreach ($settings as $setting)
            {
               // print_r($setting);
	            $extra_class = "";
                if($count == 2)
                {
                    $extra_class = "border-adjust";
                }
                ?>
                <div class="col-md-4 ">
				<div class="offer-box border p-5 <?php echo $extra_class;?>">
					<i class="<?php echo $setting['offer_icon']; ?>"></i>
					<h5 class="font-weight-bold mt-3 mb-0"><?php echo $setting['offer_title']; ?></h5>
					<p class="mb-0"><?php echo $setting['offer_subtitle']; ?></p>
				</div>
			    </div>
            <?php
                $count ++;
            } ?>

		</div>
	</div>
</section>
<!--offer section end-->