<?php get_header(); ?>
    
	<div id="main">
        
        <div id="contents" class="clearfix">
            
            <div id="page-title"><span>ページエラー</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">
            	
                <div class="entry-content clearfix">
					<h1>ページエラー</h1>
                    <p>ページが見つかりません。もう一度URLをご確認ください。</p>
                </div>
                                
            </div><!-- end : #main-content -->
            
            
            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->
        
        </div><!-- end : #contents -->
        
	</div><!-- end : #main -->
    
<?php get_footer(); ?>