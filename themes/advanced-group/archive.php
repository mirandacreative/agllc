<?php
/**
 * Archive
 *
 * Standard loop for the archive page
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="archive-title">Archives for: <?php the_time('F jS, Y'); ?></h2>
			</div>
			<!-- BEGIN of Archive Content -->
			<div class="col-md-8 columns">
				<main class="main-content">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<!-- BEGIN of Post -->
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="row">
									<?php if (has_post_thumbnail()) : ?>
										<div class="col-md-4">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('medium'); ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="<?php echo has_post_thumbnail() ? 'col-md-4' : 'col-md-12'; ?>">
										<h3>
											<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'bootstrap'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php if (is_sticky()) : ?>
											<span class="secondary label"><?php _e('Sticky', 'bootstrap'); ?></span>
										<?php endif; ?>
										<?php the_excerpt(); // Use wp_trim_words() instead if you need specific number of words ?>

										<p class="entry-meta">Written by <?php the_author_posts_link(); ?> on <?php the_time(get_option('date_format')); ?></p>
									</div>
								</div>
							</article>
							<!-- END of Post -->
						<?php endwhile; ?>
					<?php endif; ?>
					<!-- BEGIN of pagination -->
					<div class="pagination">
						<?php bootstrap_pagination(); ?>
					</div>
					<!-- END of pagination -->
				</main>
			</div>
			<!-- END of Archive Content -->
			<!-- BEGIN of Sidebar -->
			<div class="col-md-4 sidebar">
				<?php get_sidebar('right'); ?>
			</div>
			<!-- END of Sidebar -->
		</div>
	</div>

<?php get_footer(); ?>