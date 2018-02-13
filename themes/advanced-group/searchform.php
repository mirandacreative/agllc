<?php
/**
 * Searchform
 *
 * Custom template for search form
 */
?>

<!-- BEGIN of search form -->
<form method="get" class="form-inline" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" xmlns="http://www.w3.org/1999/html">
	<div class="form-group">
		<input type="search" name="s" class="form-control" id="s" placeholder="<?php _e('Search', 'bootstrap'); ?>" value="<?php echo get_search_query(); ?>"/>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" ><?php _e('Search', 'bootstrap'); ?></button>
	</div>
</form>
<!-- END of search form -->