<div class="container">
	<?php
		$divider_line_height = get_sub_field('divider_line_height') ? get_sub_field('divider_line_height') : 0;
		$divider_line_color = get_sub_field('divider_line_color');
		$padding_before_line = get_sub_field('padding_before_line') ? get_sub_field('padding_before_line') : 0;
		$padding_after_line = get_sub_field('padding_after_line') ? get_sub_field('padding_after_line') : 0;
	?>
	<div class="row">
		<div class="section-devider" style="padding-top: <?php echo $padding_before_line . 'px'; ?>;
											padding-bottom: <?php echo $padding_after_line. 'px'; ?>;">
			<div class="section-line-divider" style="height: <?php echo $divider_line_height . 'px'; ?>;
													background-color: <?php echo $divider_line_color; ?>;"></div>
		</div>
	</div>
</div>

