<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>検索</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <div id="page-search-content">
                    <?php if ( isset($_GET['s']) && empty($_GET['s']) ) : /* 検索文字が空（から）の時 */ ?>
                        <h1>検索エラー</h1>
                        <p class="mt15">検索文字が空です。もう一度ご入力ください。</p>

                    <?php else : /* 検索文字を入力し、検索した時 */ ?>
                        <?php /* 検索結果を10件ずつ表示する */
					    $search_per_page_number = 10;
						query_posts($query_string.'&post_status=publish&posts_per_page='.$search_per_page_number.'&paged='.$paged);
		                $search_count = $wp_query->found_posts; /* 表示する全記事数 */
					    ?>

                        <?php if ( have_posts() ) : /* 検索結果　見つかった時 */ ?>
                            <h1>「<?php the_search_query(); ?>」の検索結果</h1>
                            <div class="content">
                                <?php if ( $search_count > $search_per_page_number ) : ?>
        					        <div class="pagenavi pagenavi-top clearfix"><span class="count">全<?php echo $search_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
        					    <?php endif; ?>

                                <ul>
                                <?php while ( have_posts() ) : the_post(); ?>
                                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <?php if ( get_the_excerpt() ) : ?>
                                        <div class="info"><?php the_excerpt(); /* 抜粋を表示 */ ?><span class="detail"><a href="<?php the_permalink(); ?>">続きを見る</a></span></div>
                                    <?php else : ?>
                                    <?php endif; ?>
                                </li>
                                <?php endwhile; ?>
                                </ul>

                                <?php if ( $search_count > $search_per_page_number ) : ?>
        					        <div class="pagenavi pagenavi-bottom clearfix"><span class="count">全<?php echo $search_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
        					    <?php endif; ?>
                            </div>

                        <?php else : /* 検索結果　見つからなかった時 */ ?>
                            <h1>「<?php the_search_query(); ?>」の検索結果</h1>
                            <p class="mt15">該当する内容は見つかりません。</p>

                        <?php endif; ?>

                    <?php endif; ?>
                </div><!-- #page-search-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
