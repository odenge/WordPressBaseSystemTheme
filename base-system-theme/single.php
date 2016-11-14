<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>ブログ</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <div id="blog-content">
					<h1 id="blog-title">個別記事　<?php the_time('Y/m/d'); ?></h1>
					<div class="content">
						<?php if ( have_posts() ) : the_post(); ?>
		                    <?php get_template_part( 'blog-article' ); ?>
		                <?php endif; ?>

						<?php
		                $prevpost = get_adjacent_post(false, '', true);
		                $nextpost = get_adjacent_post(false, '', false);
		                ?>
		                <div class="prev-next-content clearfix">
		                    <?php if ( $prevpost ) : ?>
		                    <div class="prev btn"><a href="<?php echo get_permalink($prevpost->ID); ?>">前の記事を読む</a></div>
		                    <?php endif; ?>

		                    <?php if ( $nextpost ) : ?>
		                    <div class="next btn"><a href="<?php echo get_permalink($nextpost->ID); ?>">次の記事を読む</a></div>
		                    <?php endif; ?>
		                </div>
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
