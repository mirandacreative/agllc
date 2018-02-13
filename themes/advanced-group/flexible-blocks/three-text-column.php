<div class="three-text-column">
	<div class="container">
		<div class="row">
			<?php
				$column_1 = get_sub_field('column_1');
				$column_2 = get_sub_field('column_2');
				$column_3 = get_sub_field('column_3');
			?>
			<div class="col-md-4">
				<div class="content">
					<?php echo $column_1; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="content">
					<?php echo $column_2; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="content">
					<?php echo $column_3; ?>
				</div>
			</div>
		</div>
	</div>
</div>
