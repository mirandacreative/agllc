<?php
/**
 * Template Name: Subpage With Sidebar
 */

get_header(); ?>
	<div class="page-with-sidebar">
		<?php
			$overlay_color = get_field('overlay_color');
			$overlay_position = get_field('overlay_position');
			$overlay_size = get_field('overlay_size') ? get_field('overlay_size') : 60;
			$call_button_link = get_field('call_button_link');
			$call_button_text = get_field('call_button_text');

			$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);
		?>
	    <div class="container">
	        <div class="row">
	        	<?php if ($behind_text = get_field('behind_text')): ?>
					<div class="col-sm-12">
						<h2 class="behind-text">
							<?php echo $behind_text; ?>
						</h2>
					</div>
				<?php endif; ?>

				<!-- BEGIN of post content -->
	            <div class="col-md-8">
		            <div class="page-content">
		            	<?php if ($image = get_field('image')): ?>
		            		<div class="row">
		            			<div class="col-lg-6 col-lg-offset-6">
									<div class="image-wrapper">
										<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
											url(<?php echo $image['sizes']['img-397x350']; ?>)">
										</div>
										<?php if ( $call_button_link ): ?>
											<a class="site-btn site-btn--invert" href="<?php echo $call_button_link; ?>" target="_blank"><?php echo $call_button_text; ?></a>
										<?php endif; ?>
									</div>
		            			</div>
		            		</div>
		            		<div class="row">
		            			<div class="col-lg-7">
									<div class="content">
										<?php if ($subtitle = get_field('subtitle')): ?>
											<div class="content-subheader">
												<?php echo $subtitle; ?>
											</div>
										<?php endif; ?>
										<?php if ($content = get_field('content')): ?>
											<?php echo $content; ?>
										<?php endif; ?>
									</div>
		            			</div>
		            		</div>
		            	<?php endif; ?>
		            </div>
	            </div>
	        	<!-- END of post content -->
	            <!-- BEGIN of sidebar -->
				<div class="col-md-4 sidebar">
					<?php get_sidebar('right'); ?>
				</div>
				<!-- END of sidebar -->
	        </div>
	    </div>
    </div>

<?php get_footer(); ?>
