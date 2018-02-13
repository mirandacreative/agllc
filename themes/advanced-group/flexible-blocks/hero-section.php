<?php
	$hero_img = get_sub_field('hero_img');
?>
<div class="hero-section" <?php  bg($hero_img, 'full_hd'); ?>>
	<div class="container">
		<div class="row">
			<?php
				$logo = get_sub_field('logo');
				$secondary_image = get_sub_field('secondary_image');
				$headline = get_sub_field('headline');
				$overlay_color = get_sub_field('overlay_color');
				$overlay_position = get_sub_field('overlay_position');
				$overlay_size = get_sub_field('overlay_size') ? get_sub_field('overlay_size') : 40;
				$button_text = get_sub_field('button_text');
				$button_text_color = get_sub_field('button_text_color');
				$button_link = get_sub_field('button_link');

				$overlay = str_replace(array('position', 'size'), array($overlay_position, 100 - $overlay_size), $overlay_color);
			?>
			<?php if ($headline): ?>
				<h1 class="hero-section__title"><?php echo $headline; ?></h1>
			<?php endif; ?>
			<?php if ($logo): ?>
				<div class="left-logo-wrapper">
					<div class="custom-logo">
						<img src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php echo $logo['title']; ?>">
					</div>
				</div>
			<?php endif; ?>
			<?php if (!$hide_secondary_image_section = get_sub_field('hide_secondary_image_section')): ?>
				<div class="secondary-image-wrapper">
					<div class="image-wrapper hero-section__secondary-image">
						<div class="image-gradient" style="background-image: linear-gradient(<?php echo $overlay; ?>),
							url(<?php echo $secondary_image['sizes']['img-630x400']; ?>)">
						</div>
					</div>
					<?php if ($button_link): ?>
						<a href="<?php echo $button_link; ?>" class="site-btn site-btn--invert callout-btn" style="color: <?php echo $button_text_color; ?>"><?php echo $button_text; ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
