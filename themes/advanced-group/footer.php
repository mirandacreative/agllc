<?php
/**
 * Footer
 */
?>


<!-- BEGIN of footer -->
<footer class="footer">
	<div class="container">
		<!-- BEGIN widgets  -->
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<div class="footer__sidebar-1">
					<?php dynamic_sidebar( 'footer_sidebar_01' ); ?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-2">
				<div class="footer__sidebar-2">
					<?php dynamic_sidebar( 'footer_sidebar_02' ); ?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-2">
				<div class="footer__sidebar-3">
					<?php dynamic_sidebar( 'footer_sidebar_03' ); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4">
				<div class="footer__sidebar-4">
					<?php dynamic_sidebar( 'footer_sidebar_04' ); ?>
				</div>
			</div>
		</div>
		<!-- END widgets -->

		<!-- BEGIN copyright block -->
		<div class="row footer__copyright-block">
			<div class="col-sm-6">
				<div class="footer__bottom-left">
					<?php if ($copyright = get_field('copyright', 'options')): ?>
						<p class="copyright"><?php echo $copyright; ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-3 col-sm-offset-3">
				<div class="footer__bottom-right">
					<?php if ($site_developer_logo = get_field('site_developer_logo', 'options')): ?>
						<img class="dev-logo" src="<?php echo $site_developer_logo['sizes']['medium']; ?>" alt="<?php echo $site_developer_logo['title']; ?>">
					<?php endif; ?>
					<?php if ($site_developer_name = get_field('site_developer_name', 'options')): ?>
						<a href="<?php the_field('site_developer_link'); ?>"><?php echo $site_developer_name; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- END copyright block -->
	</div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
