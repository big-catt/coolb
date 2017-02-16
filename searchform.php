<form id="quick-search" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
 <fieldset class="search">
       <label for="qsearch">Search:</label>
		<input  id="qsearch" type="text" class="tbox" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        <button  type="submit" class="btn" title="Submit Search" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" >Search</button>
 </fieldset>
</form>