<div class="content-with-small-img-right">
	<div class="container">
		<div class="row">
			<?php
				$subheader = get_sub_field('subheader');
				$section_content = get_sub_field('section_content');
				$right_image = get_sub_field('right_image');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;
				$button_text = get_sub_field('button_text');
				$button_text_color = get_sub_field('button_text_color');
				$button_background_color = get_sub_field('button_background_color');
				$button_link = get_sub_field('button_link');

				$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);

			?>
			<div class="col-md-6">
				<div class="left-side">
					<div class="content-subheader">
						<?php echo $subheader; ?>
					</div>
					<div class="section-content">
						<?php echo $section_content; ?>
					</div>
					<?php if ($button_link): ?>
						<a class="site-btn" href="<?php echo $button_link; ?>" style="background-color: <?php echo $button_background_color; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<?php if ($right_image): ?>
					<div class="right-side">
						<div class="image-wrapper">
							<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
								url(<?php echo $right_image['sizes']['img-480x420']; ?>)">
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
