<div class="advanced-group-branches advanced-group-branches-2-img">
	<div class="container">
		<div class="row">
			<?php
				$behind_text = get_sub_field('behind_text');
				$subheader = get_sub_field('subheader');
				$image_1 = get_sub_field('image_1');
				$image_2 = get_sub_field('image_2');
				$branch_logo = get_sub_field('branch_logo');
				$content = get_sub_field('content');
				$button_text = get_sub_field('button_text');
				$button_text_color = get_sub_field('button_text_color') ? get_sub_field('button_text_color') : '#ffffff';
				$button_background_color = get_sub_field('button_background_color') ? get_sub_field('button_background_color') : '#444444';
				$button_link = get_sub_field('button_link');
				$overlay_color = get_sub_field('overlay_color');
				$image_1_overlay_position = get_sub_field('image_1_overlay_position');
				$image_2_overlay_position = get_sub_field('image_2_overlay_position');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;

				$image_1_overlay = str_replace(array('position', 'size'), array($image_1_overlay_position, 100 - $overlay_size), $overlay_color);
				$image_2_overlay = str_replace(array('position', 'size'), array($image_2_overlay_position, 100 - $overlay_size), $overlay_color);

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
					<div class="images-container clearfix">
						<?php if ($image_1): ?>
							<div class="image-wrapper image-wrapper-1">
								<div class="image-gradient" style="background-image: linear-gradient(<?php echo $image_1_overlay; ?>),
									url(<?php echo $image_1['sizes']['img-350']; ?>)">
								</div>
							</div>
						<?php endif; ?>
						<?php if ($image_2): ?>
							<div class="image-wrapper image-wrapper-2" >
								<div class="image-gradient" style="background-image: linear-gradient(<?php echo $image_2_overlay; ?>),
									url(<?php echo $image_2['sizes']['img-350']; ?>)">
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="right-side">
					<?php if ($branch_logo): ?>
						<div class="right-logo-wrapper">
							<div class="logo-after-hide-left-shadow"></div>
							<div class="custom-logo">
								<img src="<?php echo $branch_logo['sizes']['medium']; ?>" alt="<?php echo $branch_logo['title']; ?>">
							</div>
						</div>
					<?php endif; ?>
					<p class="content-subheader"><?php echo $subheader; ?></p>
					<div class="content-text"><p><?php echo $content; ?></p></div>
					<?php if ($button_link && $button_text): ?>
						<a href="<?php echo $button_link; ?>" class="site-btn" style="background-color: <?php echo $button_background_color; ?>; color: <?php echo $button_text_color; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
