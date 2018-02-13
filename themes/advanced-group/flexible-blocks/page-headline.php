<div class="page-headline">
	<div class="container">
		<div class="row">
			<?php
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 55;
				$right_image = get_sub_field('right_image');

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
				<div class="left-side">
					<?php if ($subheader = get_sub_field('subheader')): ?>
						<div class="content-subheader">
							<?php echo $subheader; ?>
						</div>
					<?php endif; ?>
					<?php if ($section_content = get_sub_field('section_content')): ?>
						<div class="section-content">
							<?php echo $section_content; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-md-6">
				<?php if ($behind_text): ?>
					<div class="right-side">
				<?php else: ?>
					<div class="right-side top-0">
				<?php endif; ?>
					<div class="image-wrapper">
						<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
							url(<?php echo $right_image['sizes']['img-630x550']; ?>)"
							>
						</div>
					</div>
					<?php if ($button_link = get_sub_field('button_link')): ?>
						<?php $button_text = get_sub_field('button_text'); ?>
						<div class="button-wrapper">
							<a href="<?php echo $button_link; ?>" class="site-btn site-btn--invert"><?php echo $button_text; ?></a>
						</div>
					<?php endif; ?>
				</div>
				<!-- end right-side -->
			</div>
			<!-- end col -->
		</div>
	</div>
</div>
