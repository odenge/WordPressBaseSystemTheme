<?php
/*
Template Name: よくあるご質問
*/
?>
<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>よくあるご質問</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <?php if ( $content = $post->post_content ) : ?>
                    <div class="page-entry-content">
						<div class="entry-content clearfix">
	                        <?php echo $content; ?>
	                    </div>
					</div><!-- end : .page-entry-content -->
				<?php endif; ?>


				<div id="faq-content">
		            <h1>よくあるご質問</h1>
		            <div id="faq-menu" class="clearfix">
		                <?php /* ページ内リンク作成 */
		                $taxonomy = 'faq_category'; /* カスタム分類 */
		                $args = array(
		                    'hide_empty' => true  /* 投稿記事がないタームは取得しない */
		                );
		                $terms = get_terms( $taxonomy, $args ); /* カスタム分類のタームのリストを取得 */
		                ?>

		                <?php if ( count( $terms ) != 0 ) : ?>
		                <ul>
		                    <?php foreach ( $terms as $term ) : ?>
		                    <li><a href="#faq-<?php echo esc_attr($term->slug); ?>"><span><?php echo esc_html($term->name); ?></span></a></li>
		                    <?php endforeach; ?>
		                </ul>
		                <?php endif; ?>
		            </div><!-- end : #faq-menu -->


		            <div id="faq-list">
		            <?php if ( count( $terms ) != 0 ) : ?>
		                <?php foreach ( $terms as $term ) : ?>
		                    <h2 id="faq-<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></h2>
		                    <ul>
		                    <?php
		                    $args_faq = array(
		                        'post_type' => 'faq',
		                        'posts_per_page' => 1000,
								'post_status' => 'publish',
		                        'tax_query' => array(
		                            array(
		                                'taxonomy' => $taxonomy,
		                                'field' => 'slug',
		                                'terms' => $term->slug
		                            )
		                        )
		                    );
		                    $loop_faq = new WP_Query( $args_faq );
		                    ?>
		                    <?php if ( $loop_faq->have_posts() ) : ?>
		                        <?php /* ■【Start the Loop】■ */ ?>
		                        <?php while ( $loop_faq->have_posts() ) : $loop_faq->the_post(); ?>
		                            <?php get_template_part('faq-article'); ?>
		                        <?php endwhile; ?>
		                        <?php /* ■【End the Loop】■ */ ?>
		                    <?php endif; ?>
		                    <?php wp_reset_query(); /* クエリをリセット */ ?>
		                    </ul>
		                <?php endforeach; ?>
		            <?php endif; ?>
		            </div><!-- end : #faq-list -->
		        </div><!-- end : #faq-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
