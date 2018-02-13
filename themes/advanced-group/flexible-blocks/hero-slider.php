<div class="hero-slider">
	<?php if (have_rows('slide')) : ?>
		<div id="hero-slider" class="slick-slider">
	 		<?php
	 			$i = 0;
	 		?>
		 	<?php while (have_rows('slide')) : the_row(); ?>
		 		<?php
		 			$slide_image = get_sub_field('slide_image');
		 			$testimonial_text = get_sub_field('testimonial_text');
		 			$testimonial_author_photo = get_sub_field('testimonial_author_photo');
		 			$testimonial_author_name = get_sub_field('testimonial_author_name');
		 		?>
		 		<!-- begin slide -->
		 		<div class="slick-slide" <?php bg( $slide_image, 'full_hd' ); ?>>
					<!-- begin testimonial-block -->
					<div class="testimonial-block clearfix">
						<!-- begin testimonial-block__inner -->
						<div class="testimonial-block__inner">
							<div class="testimonial-block__text">
								<?php echo $testimonial_text; ?>
							</div>
							<div class="testimonial-block__author">

								<img src="<?php echo $testimonial_author_photo['sizes']['thumbnail']; ?>" alt="<?php echo $testimonial_author_photo['title']; ?>">

								<h5 class="testimonial-block__author-name" id="<?php echo "slick-slide0" . $i; ?>">
									<?php echo $testimonial_author_name; ?>
								</h5>
							</div>
						</div>
						<!-- end testimonial-block__inner -->
					</div>
					<!-- end testimonial-block -->
				</div>
				<!-- end slide -->
				<?php $i++; ?>
		 	<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>
