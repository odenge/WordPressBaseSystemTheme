<div class="article">
	<div class="article-title"><?php the_title(); ?></div>

    <div class="article-info">
        <div class="article-content entry-content clearfix">
            <?php the_content(); ?>
        </div>

		<div class="article-sub-info">
            <div class="article-date">
                <dl>
                <dt>作成日</dt>
                <dd><?php the_time('Y/m/d'); ?></dd>
                </dl>
            </div>

			<div class="article-category">
                <dl>
                <dt>カテゴリー</dt>
                <dd><?php echo get_the_category_list(', '); ?></dd>
                </dl>
            </div>
        </div><!-- end : .article-sub-info -->
    </div><!-- end : .article-info -->
</div><!-- end : .article -->
