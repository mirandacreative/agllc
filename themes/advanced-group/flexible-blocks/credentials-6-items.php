<div class="credentials credentials-6">
	<div class="container">
		<?php if ($credentials_title = get_sub_field('credentials_title')): ?>
			<div class="col-sm-12">
				<p class="credentials__title"><?php echo $credentials_title; ?></p>
			</div>
		<?php endif; ?>
		<?php if (have_rows('credentials')) : ?>
			<div class="row">
				<?php while (have_rows('credentials')) : the_row(); ?>
					<div class="col-sm-4 col-md-2 matchHeight">
						<div class="credential-item">
							<?php
								$icon = get_sub_field('icon');
								$title = get_sub_field('title');
								$link = get_sub_field('link');
							?>
							<?php if ($icon): ?>
								<a class="credential-item__circle" href="<?php echo $link; ?>" >
									<img class="credential-item__img" src="<?php echo $icon['sizes']['medium']; ?>" alt="<?php echo $icon['title']; ?>">
								</a>

								<p class="credential-item__title"><?php echo $title; ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
