<?php get_header(); ?>
    
	<div id="main">
        
        <div id="contents" class="clearfix">
            
            <div id="page-title"><span><?php the_title(); ?></span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">
            	
                <div class="entry-content clearfix">
					<?php if ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endif; ?>
                </div>
                
            </div><!-- end : #main-content -->
            
            
            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->
        
        </div><!-- end : #contents -->
        
	</div><!-- end : #main -->
    
<?php get_footer(); ?>