<div class="search">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<div class="row collapse">
			<div class="small-12 columns">
				<label class="screen-reader-text" for="s"><h3><small>Search for:</small></h3></label>
				<input type="search" placeholder="Press enter to search." value="<?php the_search_query(); ?>" name="s" id="s" />
			</div>
			<!--div class="three mobile-one columns has-button">
				<label for="searchsubmit"><h3><small>&nbsp;</small></label>
				<input class="button expand postfix" type="submit" id="searchsubmit" value="Search" />
			</div-->
		</div>
	</form>
</div>