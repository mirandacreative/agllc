<div class="content">
	<div class="container">
		<div class="row">
			<?php
				$subheader = get_sub_field('subheader');
				$content = get_sub_field('content');
				$content_width = get_sub_field('content_width');
				$content_position = get_sub_field('content_position');
			?>
			<div class="<?php echo $content_width; ?> <?php echo $content_position; ?> ">
				<div class="section-content">
					<div class="content-subheader">
						<?php echo $subheader; ?>
					</div>
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
</div>
