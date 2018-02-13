<div class="credentials">
	<div class="container">
		<?php

		?>
		<?php if (have_rows('credentials')) : ?>
			<div class="row">
				<?php while (have_rows('credentials')) : the_row(); ?>
					<div class="col-md-2 matchHeight">
						<div class="credentials__item">
							<?php
								$icon = get_sub_field('icon');
								$title = get_sub_field('title');
								$link = get_sub_field('link');
							?>
							<a href="<?php echo $link; ?>" class="credentials__item-circle">
								<img class="credentials__item-img" src="<?php echo $icon['sizes']['medium']; ?>" alt="<?php echo $icon['title']; ?>">
							</a>
							<p><?php echo $title; ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
