<?php
/*
Template Name: よくあるご質問
*/
?>
<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>よくあるご質問</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <?php if ( $content = $post->post_content ) : ?>
                    <div class="page-entry-content">
						<div class="entry-content clearfix">
	                        <?php echo $content; ?>
	                    </div>
					</div><!-- end : .page-entry-content -->
				<?php endif; ?>


<p>よくあるご質問の一覧表示</p>




            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
