<?php
/*
Template Name: 新着情報
*/
?>
<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>新着情報</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <?php if ( $content = $post->post_content ) : ?>
                    <div class="page-entry-content">
						<div class="entry-content clearfix">
	                        <?php echo $content; ?>
	                    </div>
					</div><!-- end : .page-entry-content -->
				<?php endif; ?>


                <div id="news-content">
                    <h1><span class="title">新着情報</span></h1>
                    <div class="content">
                        <?php /* カスタム投稿「新着情報」を10件ずつ表示する */
                        $news_per_page_number = 10;
                        $args_news = array(
                            'post_type' => 'news',
                            'paged' => $paged,
                            'posts_per_page' => $news_per_page_number,
                            'post_status' => 'publish'
                        );
                        $loop_news = new WP_Query( $args_news );
                        $news_count = $loop_news->found_posts; /* 表示する全記事数 */
                        ?>

                        <?php if ( $news_count > $news_per_page_number ) : ?>
                            <div class="pagenavi pagenavi-top clearfix"><span class="count">全<?php echo $news_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $loop_news) ); } ?></div>
                        <?php endif; ?>

                        <dl>
                        <?php if ( $loop_news->have_posts() ) : ?>
                            <?php /* ■【Start the Loop】■ */ ?>
                            <?php while ( $loop_news->have_posts() ) : $loop_news->the_post();?>
                                <?php get_template_part('news-article'); ?>
                            <?php endwhile; ?>
                            <?php /* ■【End the Loop】■ */ ?>
                        <?php else : ?>
                            <dt><?php echo date('Y/m/d'); ?></dt>
                            <dd>新着情報はまだありません。</dd>
                        <?php endif; ?>
                        <?php wp_reset_query(); /* クエリをリセット */ ?>
                        </dl>

                        <?php if ( $news_count > $news_per_page_number ) : ?>
                            <div class="pagenavi pagenavi-bottom clearfix"><span class="count">全<?php echo $news_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $loop_news) ); } ?></div>
                        <?php endif; ?>
                    </div>
                </div><!-- end : #news-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
