<div class="contacts-with-map">
	<div class="container">
		<div class="row">
			<?php
				$map_button_link = get_sub_field('map_button_link');
				$map_button_text = get_sub_field('map_button_text');
				$call_button_text = get_sub_field('call_button_text');
				$call_button_number = get_sub_field('call_button_number');
				$location= get_sub_field('location');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;
				$overlay_position = get_sub_field('overlay_position');

				$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);
			?>
			<?php if ($behind_text = get_sub_field('behind_text')): ?>
				<div class="col-sm-12">
					<h2 class="behind-text">
						<?php echo $behind_text; ?>
					</h2>
				</div>
			<?php endif; ?>
			<div class="col-md-6">
				<div class="content-wrapper">
					<?php if ( $subheader = get_sub_field('subheader') ): ?>
						<div class="content-subheader">
							<?php echo $subheader; ?>
						</div>
					<?php endif; ?>
					<?php if ($content = get_sub_field('content')): ?>
						<div class="content">
							<?php echo $content; ?>
						</div>
					<?php endif; ?>
					<?php if ($call_button_number): ?>
						<a class="site-btn site-btn--red" href="<?php echo 'tel:' . $call_button_number; ?>"><?php echo $call_button_text; ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="right-side">
					<div class="map-wrapper image-wrapper">
						<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>)">
						</div>
						<?php
							if( !empty($location) ): ?>
							<div class="map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
						<?php endif; ?>
					</div>
					<?php if ( $map_button_link ): ?>
						<div class="button-wrapper">
							<a class="site-btn site-btn--invert" href="<?php echo $map_button_link; ?>" target="_blank"><?php echo $map_button_text; ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>
