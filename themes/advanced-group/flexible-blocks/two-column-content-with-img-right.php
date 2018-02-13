<div class="two-column-content-with-img-right">
	<div class="container">
		<div class="row">
			<?php

				$header_text = get_sub_field('header_text');
				$header_color = get_sub_field('header_color');
				$content = get_sub_field('content');
				$image = get_sub_field('image');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;

				$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);

			?>
			<div class="col-sm-12">
				<h1 class="section-header" style="color: <?php echo $header_color; ?>"><?php echo $header_text; ?></h1>
			</div>
			<div class="col-md-7">
				<div class="left-side">
					<div class="section-content">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<?php if ($image): ?>
					<div class="right-side">
						<div class="image-wrapper">
							<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
								url(<?php echo $image['sizes']['img-420']; ?>)">
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
