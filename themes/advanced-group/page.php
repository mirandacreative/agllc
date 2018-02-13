<?php
/**
 * Page
 */
get_header(); ?>
	<div class="container">
		<div class="row">
			<!-- BEGIN of page content -->
			<div class="col-md-12">
				<!-- <main class="main-content"> -->
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<h2><?php //the_title(); ?></h2>
							<?php the_content('',true); ?>

						<?php endwhile; ?>
					<?php endif; ?>
				<!-- </main> -->
			</div>
			<!-- END of page content -->
		</div>
	</div>
<?php get_footer(); ?>
