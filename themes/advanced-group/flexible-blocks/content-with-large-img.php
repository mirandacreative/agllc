<div class="content-with-large-img">

	<div class="container">
		<div class="row">
			<?php
				$content_position = get_sub_field('content_position');
				$content_vertical_aligment = get_sub_field('content_vertical_aligment');
				$subheader = get_sub_field('subheader');
				$section_content = get_sub_field('section_content');
				$image = get_sub_field('image');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;
				$button_text = get_sub_field('button_text');
				$button_text_color = get_sub_field('button_text_color') ? get_sub_field('button_text_color') : '#ffffff';
				$button_background_color = get_sub_field('button_background_color') ? get_sub_field('button_background_color') : '#444444';
				$button_link = get_sub_field('button_link');

				$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);

			?>
			<?php if ($behind_text = get_sub_field('behind_text')): ?>
				<div class="col-sm-12">
					<h1 class="behind-text"><?php echo $behind_text; ?></h1>
				</div>
			<?php endif; ?>
			<?php if ($content_position == 'right'): ?>
				<!-- if content right checkbox checked -->
				<div class="col-md-6 matchHeight">
					<?php if ($image): ?>
						<?php if ($behind_text): ?>
							<div class="image-wrapper top-minus-75" >
						<?php else: ?>
							<div class="image-wrapper" >
						<?php endif; ?>
							<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
								url(<?php echo $image['sizes']['img-630x550']; ?>)"
								>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-6 matchHeight">
					<div class="section-content-wrapper pl-25 pr-75" style="align-content: <?php echo $content_vertical_aligment; ?>;">
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
			<?php else: ?>
				<!-- if content right checkbox unchecked -->
				<div class="col-md-6 matchHeight">
					<div class="section-content-wrapper" style="align-content: <?php echo $content_vertical_aligment; ?>;">
						<div class="content-subheader">
							<?php echo $subheader; ?>
						</div>
						<div class="section-content pr-40">
							<?php echo $section_content; ?>
						</div>
						<?php if ($button_link): ?>
							<a class="site-btn" href="<?php echo $button_link; ?>" style="background-color: <?php echo $button_background_color; ?>"><?php echo $button_text; ?></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-6 matchHeight">
					<?php if ($image): ?>
						<?php if ($behind_text): ?>
							<div class="image-wrapper top-minus-75" >
						<?php else: ?>
							<div class="image-wrapper" >
						<?php endif; ?>
						<div class="image-wrapper" >
							<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
								url(<?php echo $image['sizes']['img-630x550']; ?>)">
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

	</div>

</div>
