<div class="owner-info">
	<div class="container">
		<div class="row">
			<?php
				$section_header = get_sub_field('section_header');
				$image = get_sub_field('image');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size');
				$subtitle = get_sub_field('subtitle');
				$left_content = get_sub_field('left_content');
				$right_content = get_sub_field('right_content');
				$button_text = get_sub_field('button_text');
				$button_link = get_sub_field('button_link');

				$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);
			?>
			<div class="col-sm-12">
				<h1 class="section-header"><?php echo $section_header; ?></h1>
			</div>
			<div class="col-md-6">
				<div class="left-side">
					<div class="content-subheader">
						<?php echo $subtitle; ?>
					</div>
					<div class="section-content">
						<?php echo $left_content; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="right-side">
					<div class="image-wrapper">
						<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
							url(<?php echo $image['sizes']['img-630x550']; ?>)">
						</div>
						<?php if ( $button_link ): ?>
							<a class="site-btn site-btn--invert" href="<?php echo $button_link; ?>" target="_blank"><?php echo $button_text; ?></a>
						<?php endif; ?>
					</div>
						<div class="section-content-right">
							<?php echo $right_content; ?>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
