<div class="advanced-group-branches">
	<div class="container">
		<div class="row">
			<?php
				$behind_text = get_sub_field('behind_text');
				$subheader = get_sub_field('subheader');
				$image = get_sub_field('image');
				$branch_logo = get_sub_field('branch_logo');
				$content = get_sub_field('paragraph');
				$button_text = get_sub_field('button_text');
				$button_background_color = get_sub_field('button_background_color');
				$button_link = get_sub_field('button_link');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size');

				$overlay_color = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);

			?>
			<?php if ($behind_text): ?>
				<div class="col-sm-12">
					<h2 class="behind-text">
						<?php echo $behind_text; ?>
					</h2>
				</div>
			<?php endif; ?>
			<div class="col-md-6">
				<div class="left-side">
					<?php if ($branch_logo): ?>
						<div class="left-logo-wrapper">
							<div class="custom-logo">
								<img src="<?php echo $branch_logo['sizes']['medium']; ?>" alt="<?php echo $branch_logo['title']; ?>">
							</div>
						</div>
					<?php endif; ?>
					<p class="content-subheader"><?php echo $subheader; ?></p>
					<div class="content-text"><p><?php echo $content; ?></p></div>
					<?php if ($button_link && $button_text): ?>
						<a href="<?php echo $button_link; ?>" class="site-btn" style="background-color: <?php echo $button_background_color; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="right-side">
					<div class="image-wrapper">
						<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay_color; ?>),
									url(<?php echo $image['sizes']['img-630']; ?>)">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
