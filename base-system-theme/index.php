<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="top-main-image"><img src="<?php bloginfo('template_directory'); ?>/images/common/main.jpg" alt="<?php bloginfo('name'); ?>" /></div>

            <div id="main-content">

                <?php if ( $content = $post->post_content ) : ?>
					<div class="page-entry-content">
						<div class="entry-content clearfix">
	                        <?php echo $content; ?>
	                    </div>
					</div><!-- end : .page-entry-content -->
				<?php endif; ?>


                <div id="news-content">
                    <h1><span class="title">新着情報</span><span class="link"><a href="<?php echo esc_url( home_url('/') ); ?>news/">一覧はこちら</a></span></h1>
                    <div class="content">
	                    <?php /* カスタム投稿「新着情報」の最新5件を表示する */
	                    $args_news = array(
	                        'post_type' => 'news',
	                        'posts_per_page' => 5,
	                        'post_status' => 'publish'
	                    );
	                    $loop_news = new WP_Query( $args_news );
	                    ?>

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
	                    <?php wp_reset_postdata(); /* クエリをリセット */ ?>
	                    </dl>
                    </div>
                </div><!-- end : #news-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
