<?php
/*
Template Name: 制作実績
*/
?>
<?php get_header(); ?>

	<div id="main">

        <div id="contents" class="clearfix">

            <div id="page-title"><span>制作実績</span></div>
            <?php get_template_part( 'topicpath' ); ?>
            <div id="main-content">

                <?php if ( $content = $post->post_content ) : ?>
                    <div class="page-entry-content">
						<div class="entry-content clearfix">
	                        <?php echo $content; ?>
	                    </div>
					</div><!-- end : .page-entry-content -->
				<?php endif; ?>


				<div id="work-content">
				    <h1 id="work-title">制作実績</h1>

					<div id="work-form-content">
						<form role="search" method="get" id="work-form" action="<?php echo esc_url( home_url('/') ); ?>work/">

							<div class="type">
								<div class="title">タイプ</div>
								<select name="type">
								<option value="">すべて</option>
								<?php
								// カスタム分類名
								$taxonomy_select = 'work_type';

								// パラメータ
								$args_select = array(
									'hide_empty' => false, /* 投稿記事がないタームも取得 */
								);

								// カスタム分類のタームのリストを取得
								$terms_select = get_terms( $taxonomy_select , $args_select );
								if ( !empty( $terms_select ) ) {
									// 親タームのリスト $terms を $term に格納してループ
									foreach ( $terms_select as $term_select ) {
										if( $_GET['type'] == $term_select->slug ) {
											echo '<option value="'.$term_select->slug.'" selected>'.$term_select->name.'</option>';
										}
										else {
											echo '<option value="'.$term_select->slug.'">'.$term_select->name.'</option>';
										}
									}
								}
								?>
								</select>
							</div>
							<!-- end : .type -->


							<div class="category">
								<div class="text">カテゴリー選択（1つでも該当すれば表示）</div>
								<ul class="clearfix">
								<?php
								// カスタム分類名
								$taxonomy_select = 'work_category';

								// パラメータ
								$args_select = array(
								// 投稿記事がないタームも取得
								'hide_empty' => false
								);

								// カスタム分類のタームのリストを取得
								$terms_select = get_terms( $taxonomy_select , $args_select );
								if ( !empty( $terms_select ) ) {
									// 親タームのリスト $terms を $term に格納してループ
									foreach ( $terms_select as $term_select ) {
										/* 検索をかけた時 */
										if( $_GET['category'] ) {
										/* 選択されたカテゴリーの配列にチェックボックスの値があるか判定 */
											if( in_array( $term_select->slug, $_GET['category'] ) ) {
												echo '<li><label class="label"><input type="checkbox" name="category[]" value="'.$term_select->slug.'" checked="checked">'.$term_select->name.'</label></li>';
											}
											else {
												echo '<li><label class="label"><input type="checkbox" name="category[]" value="'.$term_select->slug.'">'.$term_select->name.'</label></li>';
											}
										}
										else {
											echo '<li><label class="label"><input type="checkbox" name="category[]" value="'.$term_select->slug.'">'.$term_select->name.'</label></li>';
										}
									}
								}
								?>
								</ul>
							</div>
							<!-- end : .category -->


							<div class="search-btn">
								<input class="btn" type="submit" name="searchsubmit" value="検索" />
							</div>

						</form>
					</div><!-- end : #work-form-content -->




					<div id="work-result-content">
						<?php
						/* 配列で送られるデータをサニタイズする */
						function myhtmlspecialchars($string) {
							if (is_array($string)) {
								return array_map("myhtmlspecialchars", $string);
							} else {
								return htmlspecialchars($string, ENT_QUOTES);
							}
						}

						/* WP_Queryを設定する為の配列の初期化 */
						$array_WP_Query = array();
						$array_tax_query = array();
						$array_tax_query_temp = array();

						$wp_query_posts_per_page = 10; /* ページ送り */

						/* ソート */
						$wp_query_orderby = 'date';
						$wp_query_order = 'DESC';
						$wp_query_meta_key = '';
						$wp_query_meta_value = '';

						/* 検索: タイプ（セレクトボックス） */
						if ( $_GET['type'] ) {
							$array_tax_query_temp = array();
							$array_tax_query_temp += array('taxonomy' => 'work_type');
							$array_tax_query_temp += array('field' => 'slug');
							$array_tax_query_temp += array('terms' => myhtmlspecialchars( $_GET['type'] ));
							$array_tax_query_temp += array('operator' => 'IN');
							$array_tax_query[] = $array_tax_query_temp;
						}

						/* 検索: カテゴリー（チェックボックス） */
						if ( $_GET['category'] ) {
							$array_tax_query_temp = array();
							$array_tax_query_temp += array('taxonomy' => 'work_category');
							$array_tax_query_temp += array('field' => 'slug');
							$array_tax_query_temp += array('terms' => myhtmlspecialchars($_GET['category']));
							$array_tax_query_temp += array('operator' => 'IN');
							$array_tax_query[] = $array_tax_query_temp;
						}

						/* タクソノミー検索が複数条件の場合 */
						if ( count($array_tax_query) > 1 ) {
							$array_tax_query += array('relation' => 'AND');
						}

						/* WP_Query処理 */
						$array_WP_Query += array('post_type' => 'work');
						$array_WP_Query += array('post_status' => 'publish');
						$array_WP_Query += array('posts_per_page' => $wp_query_posts_per_page);
						$array_WP_Query += array('orderby' => $wp_query_orderby);
						$array_WP_Query += array('meta_key' => $wp_query_meta_key);
						$array_WP_Query += array('meta_value' => $wp_query_meta_value);
						$array_WP_Query += array('order' => $wp_query_order);
						$array_WP_Query += array('paged' => $paged);
						if ( count($array_tax_query) > 0 ) {
							$array_WP_Query += array('tax_query' => $array_tax_query);
						}//if

						$loop = new WP_Query( $array_WP_Query ); /* 検索結果　一覧表示用 */
						$loop_count = $loop->found_posts; /* 検索結果　件数を取得 */
						?>


				        <?php if ( $loop_count > $wp_query_posts_per_page ) : /* ページ送り　上部 */ ?>
				            <div class="pagenavi pagenavi-top clearfix"><span class="count">全<?php echo $loop_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $loop) ); } ?></div>
				        <?php endif; ?>

				        <?php if ( $loop->have_posts() ) : ?>
				            <?php /* ■【Start the Loop】■ */ ?>
				            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
				                <?php get_template_part('work-article'); ?>
				            <?php endwhile; ?>
				            <?php /* ■【End the Loop】■ */ ?>
				        <?php else : ?>
				            <p>制作実績はまだありません。</p>
				        <?php endif; ?>
				        <?php wp_reset_postdata(); /* クエリをリセット */ ?>

				        <?php if ( $loop_count > $wp_query_posts_per_page ) : /* ページ送り　下部 */ ?>
				            <div class="pagenavi pagenavi-bottom clearfix"><span class="count">全<?php echo $loop_count; ?>件</span ><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $loop) ); } ?></div>
				        <?php endif; ?>
					</div><!-- end : #work-result-content -->




				</div><!-- end : #work-content -->

            </div><!-- end : #main-content -->


            <div id="side-content">
				<?php get_sidebar(); ?>
            </div><!-- end : #side-content -->

        </div><!-- end : #contents -->

	</div><!-- end : #main -->

<?php get_footer(); ?>
