<div class="section-b">
	<div class="container">
		<div class="row">
			<?php
				$behind_text = get_sub_field('behind_text');
				$subheader = get_sub_field('subheader');
				$image_1 = get_sub_field('image_1');
				$image_1_overlay_position = get_sub_field('image_1_overlay_position');
				$image_2 = get_sub_field('image_2');
				$image_2_overlay_position = get_sub_field('image_2_overlay_position');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;
				$branch_logo = get_sub_field('branch_logo');
				$content = get_sub_field('content');
				$button_text = get_sub_field('button_text');
				$button_text_color = get_sub_field('button_text_color');
				$button_link = get_sub_field('button_link');
				$button_background_color = get_sub_field('button_background_color');

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
						<div class="image-wrapper image-wrapper-1">
							<div class="image-gradient" style="background-image: linear-gradient(<?php echo $image_1_overlay; ?>),
								url(<?php echo $image_1['sizes']['img-320x280']; ?>)">
							</div>
						</div>
						<div class="image-wrapper image-wrapper-2" >
							<div class="image-gradient" style="background-image: linear-gradient(<?php echo $image_2_overlay; ?>),
								url(<?php echo $image_2['sizes']['img-397x350']; ?>)">
							</div>
						</div>
					</div>
				</div>
				<!-- end lwft side -->
			</div>
			<!-- end row -->
			<div class="col-md-6">

				<div class="right-side">

					<?php if ($branch_logo): ?>
						<div class="branch-logo-wrapper">
							<div class="branch-logo-after-hide-left-shadow"></div>
							<div class="branch-logo">
								<img src="<?php echo $branch_logo['sizes']['medium']; ?>" alt="<?php echo $branch_logo['title']; ?>">
							</div>
						</div>
					<?php endif; ?>

					<p class="content-subheader"><?php echo $subheader; ?></p>
					<div class="content-text"><p><?php echo $content; ?></p></div>

					<?php if ($button_link && $button_text): ?>
						<a href="<?php echo $button_link; ?>" class="site-btn" style="background-color: <?php echo $button_background_color; ?>; color: <?php echo $button_text_color; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>

					<?php if (!$hide_additional_block = get_sub_field('hide_additional_block')): ?>
						<?php if (have_rows('additional_info')) : ?>
							<ul class="additional-info">
							<?php while (have_rows('additional_info')) : the_row(); ?>
								<?php
									$info_icon = get_sub_field('info_icon');
									$info_text = get_sub_field('info_text');
									$icon_link = get_sub_field('icon_link');
									$valid_email = filter_var($icon_link, FILTER_VALIDATE_EMAIL);
									$valid_phone = filter_var($icon_link, FILTER_VALIDATE_INT);
								?>
								<li>
									<img class="additional-info__img" src="<?php echo $info_icon['sizes']['medium']; ?>" alt="<?php $info_icon['title']; ?>">
									<?php if($valid_phone): ?>
										<p class="additional-info__text">
											<a href="tel:<?php echo $valid_phone; ?>"><?php echo $info_text; ?></a>
										</p>
									<?php elseif($valid_email): ?>
										<p class="additional-info__text">
											<a href="mailto:<?php echo $valid_email; ?>"><?php echo $info_text; ?></a>
										</p>
									<?php else: ?>
										<p class="additional-info__text">
											<a href="<?php echo $icon_link; ?>"><?php echo $info_text; ?></a>
										</p>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<!-- end right side -->
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
