<div class="article">
	<div class="article-title"><?php the_title(); ?></div>

    <div class="article-info">
		<?php if ( get_field('main_image') ) : /* 画像が挿入されている時 */ ?>
		    <div class="article-image">
				<?php
		        /* カスタムフィールド「メイン画像」の情報を取得 */
		        $work_main_image_id = get_field('main_image');
		        /* サムネイル画像 */
		        $work_main_image = wp_get_attachment_image_src( $work_main_image_id, 'medium' );
		        $work_main_image_url = $work_main_image[0];
		        $work_main_image_width = $work_main_image[1];
		        $work_main_image_height = $work_main_image[2];
		        /* 元画像 */
		        $work_main_image_original = wp_get_attachment_image_src( $work_main_image_id, 'full' );
		        $work_main_image_original_url = $work_main_image_original[0];
		        ?>

		        <div class="article-photo img-rollover">
					<?php if ( get_field('link_url') ) : /* カスタムフィールド「リンクURL」がある時 */ ?>
						<a href="<?php the_field('link_url'); ?>" target="_blank"><img src="<?php echo $work_main_image_url; ?>" alt="<?php the_title(); ?>" /></a>
					<?php else : /* 画像が挿入されていない時 */ ?>
						<img src="<?php echo $work_main_image_url; ?>" alt="<?php the_title(); ?>" />
					<?php endif; ?>
				</div>
				<div class="article-photo-content entry-content clearfix">
		            <?php the_content(); ?>
		        </div>
		    </div><!-- end : .article-image -->
		<?php else : /* 画像が挿入されていない時 */ ?>
			<div class="article-content entry-content clearfix">
	            <?php the_content(); ?>
	        </div>
	    <?php endif; ?>

		<div class="article-sub-info">
            <div class="article-date">
                <dl>
                <dt>公開日</dt>
                <dd><?php the_time('Y/m/d'); ?></dd>
                </dl>
            </div>

			<?php /* タイプ */
            $terms_work_type = get_the_terms( $post->ID, 'work_type');
            if ( !empty( $terms_work_type ) ) {
                foreach ( $terms_work_type as $term_work_type ) {
                    $term_work_type_array[] = $term_work_type->name;
                    $work_type = join( ', ', $term_work_type_array );
                }
            }
            ?>
            <?php if ( $work_type ) : ?>
            <div class="article-type">
                <dl>
                <dt>タイプ</dt>
                <dd><?php echo $work_type; ?></dd>
                </dl>
            </div>
            <?php endif; ?>

			<?php /* カテゴリー */
			$terms_work_category = get_the_terms( $post->ID, 'work_category');
			if ( !empty( $terms_work_category ) ) {
			    foreach ( $terms_work_category as $term_work_category ) {
			        $term_work_category_array[] = $term_work_category->name;
			        $work_category = join( ', ', $term_work_category_array );
			    }
			}
			?>
			<?php if ( $work_category ) : ?>
			<div class="article-category">
			    <dl>
			    <dt>カテゴリー</dt>
			    <dd><?php echo $work_category; ?></dd>
			    </dl>
			</div>
			<?php endif; ?>
        </div><!-- end : .article-sub-info -->
    </div><!-- end : .article-info -->
</div><!-- end : .article -->
