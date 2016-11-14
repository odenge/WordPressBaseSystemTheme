<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>制作実績</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

				<div id="work-content">
				    <h1 id="work-title">制作実績</h1>
					<div id="work-result-content">
				        <?php if ( have_posts() ) : ?>
				            <?php /* ■【Start the Loop】■ */ ?>
				            <?php while ( have_posts() ) : the_post();?>
				                <?php get_template_part('work-article'); ?>
				            <?php endwhile; ?>
				            <?php /* ■【End the Loop】■ */ ?>
				        <?php else : ?>
				            <p>制作実績はまだありません。</p>
				        <?php endif; ?>
					</div><!-- end : #work-result-content -->

					<div class="back-btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>work/">一覧へ戻る</a></div>

				</div><!-- end : #work-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
				<?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
