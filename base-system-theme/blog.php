<?php
/*
Template Name: ブログ
*/
?>
<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>ブログ</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <?php if ( $content = $post->post_content ) : ?>
                    <div class="page-entry-content">
						<div class="entry-content clearfix">
	                        <?php echo $content; ?>
	                    </div>
					</div><!-- end : .page-entry-content -->
				<?php endif; ?>


                <div id="blog-content">
					<h1 id="blog-title">最新記事</h1>
					<div class="content">
					    <?php /* 投稿の記事を10件ずつ表示する */
					    $blog_per_page_number = 10;
					    $args_blog = array(
					        'post_type' => 'post',
					        'paged' => $paged,
					        'posts_per_page' => $blog_per_page_number,
					        'post_status' => 'publish'
					    );
					    $loop_blog = new WP_Query( $args_blog );
					    $blog_count = $loop_blog->found_posts; /* 表示する全記事数 */
					    ?>

					    <?php if ( $blog_count > $blog_per_page_number ) : ?>
					        <div class="pagenavi pagenavi-top clearfix"><span class="count">全<?php echo $blog_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $loop_blog) ); } ?></div>
					    <?php endif; ?>

					    <?php if ( $loop_blog->have_posts() ) : ?>
					        <?php /* ■【Start the Loop】■ */ ?>
					        <?php while ( $loop_blog->have_posts() ) : $loop_blog->the_post();?>
					            <?php get_template_part('blog-article'); ?>
					        <?php endwhile; ?>
					        <?php /* ■【End the Loop】■ */ ?>
					    <?php else : ?>
					        <p>記事はまだありません。</p>
					    <?php endif; ?>
					    <?php wp_reset_postdata(); /* クエリをリセット */ ?>

					    <?php if ( $blog_count > $blog_per_page_number ) : ?>
					        <div class="pagenavi pagenavi-bottom clearfix"><span class="count">全<?php echo $blog_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $loop_blog) ); } ?></div>
					    <?php endif; ?>
					</div>
                </div><!-- end : #blog-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
				<?php get_sidebar('blog'); ?>
				<?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
