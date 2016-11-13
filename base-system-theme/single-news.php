<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>新着情報</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <div class="entry-content clearfix">
                    <h1><?php the_time('Y/m/d'); ?></h1>
                	<h2><?php the_title(); ?></h2>
					<?php if ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endif; ?>
                </div>

				<div class="back-btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">一覧へ戻る</a></div>

            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
