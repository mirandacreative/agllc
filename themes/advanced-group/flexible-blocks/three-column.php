<div class="three-column">
	<div class="container">
		<div class="row">
			<?php if (have_rows('column')) : ?>
				<?php while (have_rows('column')) : the_row(); ?>
					<div class="col-md-4">
						<?php
							$image = get_sub_field('image');
							$image_title = get_sub_field('image_title');
							$content = get_sub_field('content');
							$turn_off_overlay = get_sub_field('turn_off_overlay');
							$button_text = get_sub_field('button_text');
							$button_text_color = get_sub_field('button_text_color');
							$button_background_color = get_sub_field('button_background_color');
							$button_link = get_sub_field('button_link');
						?>
						<div class="column">

							<?php if ($image): ?>
								<div class="image-container image-wrapper">
									<div class="image-gradient" style="background-image: <?php echo $turn_off_overlay ? 'linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0))' : 'linear-gradient(to bottom, #0b182e, #1e335a)' ?>,
										url(<?php echo $image['sizes']['img-397x200']; ?>)">
									</div>
									<h3><?php echo $image_title; ?></h3>
								</div>
							<?php endif; ?>

							<div class="content">
								<?php echo $content; ?>
								<?php if ($button_text): ?>
									<a class="site-btn" href="<?php echo $button_link; ?>" style="background:<?php echo $button_background_color; ?>; color:<?php echo $button_text_color; ?>"><?php echo $button_text; ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
