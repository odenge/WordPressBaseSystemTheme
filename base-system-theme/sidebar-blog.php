<div class="side-menu">
    <h1>最新の5件</h1>
    <div class="menu-content mb30">
        <ul>
        <?php /* 投稿の最新記事を5件を表示する */
        $args_blog_side = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'post_status' => 'publish'
        );
        $loop_blog_side = new WP_Query( $args_blog_side );
        $post_id = get_the_ID(); /* 現在のページID */
        ?>
        <?php if ( $loop_blog_side->have_posts() ) : ?>
            <?php /* ■【Start the Loop】■ */ ?>
            <?php while ( $loop_blog_side->have_posts() ) : $loop_blog_side->the_post();?>
                <li<?php if ( is_single() && $post_id == get_the_ID() ) : ?> class="current"<?php endif; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
            <?php /* ■【End the Loop】■ */ ?>
        <?php else : ?>
            <li>記事はまだありません。</li>
        <?php endif; ?>
        <?php wp_reset_query(); /* クエリをリセット */ ?>
        </ul>
    </div>

    <h1>月別アーカイブ</h1>
    <div class="menu-content mb30">
        <ul>
        <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
        </ul>
    </div>

    <h1>カテゴリー</h1>
    <div class="menu-content">
        <ul>
        <?php wp_list_categories("title_li=&show_count=1"); ?>
        </ul>
    </div>
</div>
