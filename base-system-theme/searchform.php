<form role="search" method="get" class="header-search-form" action="<?php echo home_url( '/' ); ?>">
<div class="keyword"><label><input type="search" placeholder="" value="<?php if( is_search() ) { the_search_query(); } ?>" name="s" /></label></div>
<div class="btn"><input type="submit" value="検索" /></div>
</form>
