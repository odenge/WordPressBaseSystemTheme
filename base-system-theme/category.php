<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>ブログ</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <div id="blog-content">
					<h1 id="blog-title">カテゴリー　<?php print( single_cat_title( '', false ) ); ?></h1>
					<div class="content">
					    <?php /* 投稿の記事を10件ずつ表示する */
					    $blog_per_page_number = 10;
						query_posts($query_string.'&post_status=publish&posts_per_page='.$blog_per_page_number.'&paged='.$paged);
		                $blog_count = $wp_query->found_posts; /* 表示する全記事数 */
					    ?>

					    <?php if ( $blog_count > $blog_per_page_number ) : ?>
					        <div class="pagenavi pagenavi-top clearfix"><span class="count">全<?php echo $blog_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
					    <?php endif; ?>

					    <?php if ( have_posts() ) : ?>
					        <?php /* ■【Start the Loop】■ */ ?>
					        <?php while ( have_posts() ) : the_post();?>
					            <?php get_template_part('blog-article'); ?>
					        <?php endwhile; ?>
					        <?php /* ■【End the Loop】■ */ ?>
					    <?php else : ?>
					        <p>記事はまだありません。</p>
					    <?php endif; ?>
					    <?php wp_reset_query(); /* クエリをリセット */ ?>

					    <?php if ( $blog_count > $blog_per_page_number ) : ?>
					        <div class="pagenavi pagenavi-bottom clearfix"><span class="count">全<?php echo $blog_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
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
