<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]><!-->

<head>
	<!-- Set up Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<!-- Add Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?> >

<!-- BEGIN of header -->
<header class="header">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="col-sm-3">
				<div class="navbar__left">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="custom-logo-wrapper">
							<?php show_custom_logo(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="navbar__right clearfix">
					<?php
					if (has_nav_menu('header-menu')) {
						wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => 'header-menu',
								'depth'             => 2,
								'container'         => 'div',
								'container_class'   => 'collapse navbar-collapse',
								'container_id'      => 'bs-example-navbar-collapse-1',
								'menu_class'        => 'nav navbar-nav navbar-right',
								'fallback_cb'       => 'Bootstrap_Navigation::fallback',
								'walker'            => new Bootstrap_Navigation())
						);
					}
					?>
					<!-- sidebar for icons or something else -->
					<?php dynamic_sidebar('header_sidebar_01' ); ?>
				</div>
			</div>
		</div>
	</nav>
</header>


<div class="container-fluid  body-bg">
	<div class="row ">
		<div class="col-sm-12">

			<?php
			// BEGIN flexible content
			if( have_rows('flexible_content') ):
			    while ( have_rows('flexible_content') ) : the_row(); ?>
					 <?php if (get_row_layout() == 'hero_slider'): ?>
						<?php get_template_part('flexible-blocks/hero-slider'); ?>
			        <?php endif; ?>
			         <?php if (get_row_layout() == 'hero_section'): ?>
						<?php get_template_part('flexible-blocks/hero-section'); ?>
			        <?php endif; ?>
			    <?php endwhile;
			endif;

			if( have_rows('flexible_content') ):

				$layout_counter = 0; ?> <!-- sections counter -->

				<div class="flexible-content-wrapper">

				    <?php while ( have_rows('flexible_content') ) : the_row(); ?>

				        <?php if (get_row_layout() == 'advanced_group_branches'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
				        		<?php get_template_part('flexible-blocks/brances'); ?>
				        	</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'advanced_group_branches_2_img'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/brances-2-img'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'credentials-6-items'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/credentials-6-items'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'credentials-2-items'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/credentials-2-items'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'page_headline'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/page-headline'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'content'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/content'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'section-b'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/section-b'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'content_with_small_image_right'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/content-with-small-img-right'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'two_column_content_with_img_right'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/two-column-content-with-img-right'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'content_with_large_image'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/content-with-large-img'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'case_study'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/case-study'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'three_column'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/three-column'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'three_text_column'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/three-text-column'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'contacts_with_map'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/contacts-with-map'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'contact_form'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/contact-us-form'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'owner_info'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/owner-info'); ?>
							</section>
				        <?php endif; ?>

				        <?php if (get_row_layout() == 'two_images_left_with_content_right'): ?>
							<section id="layout_<?php echo $layout_counter++; ?>">
								<?php get_template_part('flexible-blocks/two-images-left-with-content-right'); ?>
							</section>
				        <?php endif; ?>


				        <?php if (get_row_layout() == 'section_devider'): ?>
							<?php get_template_part('flexible-blocks/section-devider'); ?>
				        <?php endif; ?>


				    <?php endwhile;?>
				    <!-- Layouts auto counter/left nav dots menu -->
					<ul class="navigation-dots pos-absolute">
						<?php
							for ($i = 0; $i < $layout_counter; $i++) {
								echo '<li> <a href="#layout_'. $i .'">0</a></li>';
							}
						?>
					</ul>
			    </div>

			<?php endif; ?>
			<!-- END flexible content -->

		</div>
	</div>
</div>
