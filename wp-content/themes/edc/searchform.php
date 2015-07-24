<form role="search" method="get" id="search-form" action="<?php echo home_url( '/' ); ?>" >
	<input type="text" value="<?php echo get_search_query()?>" name="s" id="query-input" />
	<input type="submit" id="submit-input" value="Search" />
</form>