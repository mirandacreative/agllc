<div class="case-study">
	<div class="container">
		<div class="row">
			<?php
				$header = get_sub_field('header');
				$header_color = get_sub_field('header_color');
				$subheader = get_sub_field('subheader');
				$content = get_sub_field('content');
				$images = get_sub_field('images');
				$view_more_button = get_sub_field('view_more_button');
			?>
			<div class="col-sm-12">
				<p class="content-subheader"><?php echo $subheader; ?></p>
				<p class="content-header" style="color:<?php echo $header_color; ?>"><?php echo $header; ?></p>
				<div class="content"><?php echo $content; ?></div>
				<div class="gallery">
					<div class="row">
						<?php foreach ($images as $image): ?>
							<div class="col-md-4">
								<div class="gallery__item gallery-item">
									<a href="<?php echo $image['sizes']['large']; ?>">
										<img src="<?php echo $image['sizes']['img-420']; ?>" alt="<?php echo $image['title']; ?>">
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php if( $view_more_button ): ?>
					<div class="section-btn-wrapper">
						<a href="<?php echo $view_more_button; ?>" class="site-btn"><?php _e('View More'); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
