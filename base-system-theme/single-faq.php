<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>よくあるご質問</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

				<div id="faq-content">
		            <h1>よくあるご質問</h1>
		            <div id="faq-list" class="single">
						<h2><?php
							/* よくあるご質問のターム情報を取得する */
		                    $terms_faq = get_the_terms( $post->ID, 'faq_category');
		                    if ( !empty( $terms_faq ) ) {
		                        foreach ( $terms_faq as $term_faq ) {
		                            $term_faq_array[] = $term_faq->name;
		                            $faq_category = join( ', ', $term_faq_array );
		                        }
		                        echo $faq_category;
		                    }
		                    ?>
		                </h2>

		                <ul>
						<?php if ( have_posts() ) : the_post(); ?>
		                    <?php get_template_part('faq-article'); ?>
		                <?php endif; ?>
		                </ul>
		            </div><!-- end : #faq-list -->

					<div class="back-btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>faq/">一覧へ戻る</a></div>

		        </div><!-- end : #faq-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
                <?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
