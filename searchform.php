<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="form">
	<div class="input-group">
		<input class="form-control" type="text" value="<?php the_search_query(); ?>" name="s" id="s"  placeholder="Search for..."/>
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit">Search</button>
		</span>
	</div>
</form>