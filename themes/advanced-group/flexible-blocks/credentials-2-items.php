<div class="credentials credentials-2">
	<div class="container">
		<?php if (have_rows('credentials')) : ?>
			<div class="row">
				<?php while (have_rows('credentials')) : the_row(); ?>
					<div class="col-md-6 matchHeight">
						<div class="credential-item credential-item-2">
							<?php
								$icon = get_sub_field('icon');
								$title = get_sub_field('title');
								$link = get_sub_field('link');
							?>
							<a class="credential-item__circle" href="<?php echo $link; ?>">
								<img class="credential-item__img" src="<?php echo $icon['sizes']['medium']; ?>" alt="<?php echo $icon['title']; ?>">
							</a>
							<p class="credential-item__title title-right"><?php echo $title; ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
