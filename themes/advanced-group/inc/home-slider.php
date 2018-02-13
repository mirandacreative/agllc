<?php
// Create HOME Slider
function home_slider_template() { ?>

	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('#home-slider').slick({
				cssEase: 'ease',
				fade: true,  // Cause trouble if used slidesToShow: more than one
				arrows: false,
				dots: true,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 5000,
				slidesToShow: 1,
				slidesToScroll: 1,
				slide: '.slick-slide', // Cause trouble with responsive settings
			});
		});
	</script>

	<?php $arg = array(
		'post_type'      => 'slider',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'posts_per_page' => - 1
	);
	$slider    = new WP_Query( $arg );
	if ( $slider->have_posts() ) : ?>

		<div id="hero-slider" class="slick-slider">
			<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
				<div class="slick-slide" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
					<div class="slider-caption">
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div><!-- END of  #home-slider-->
	<?php endif;
	wp_reset_query(); ?>
<?php }

// HOME Slider Shortcode

function home_slider_shortcode() {
	ob_start();
	home_slider_template();
	$slider = ob_get_clean();

	return $slider;
}

add_shortcode( 'slider', 'home_slider_shortcode' );
