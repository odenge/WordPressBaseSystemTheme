<div id="topicpath">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a><?php echo ' &gt; '; ?>


<?php if( is_page_template('news.php') ) : /* 新着情報　一覧ページ */ ?>
新着情報
<?php elseif( is_singular('news') ) : /* 新着情報　詳細ページ */ ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">新着情報</a> &gt; <?php the_time('Y/m/d'); ?>


<?php elseif( is_page_template('work.php') ) : /* 制作実績　一覧ページ */ ?>
制作実績
<?php elseif( is_singular('work') ) : /* 制作実績　詳細ページ */ ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>work/">制作実績</a> &gt; <?php the_title(); ?>


<?php elseif( is_page_template('faq.php') ) : /* よくあるご質問　一覧ページ */ ?>
よくあるご質問
<?php elseif( is_singular('faq') ) : /* よくあるご質問　詳細ページ */ ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq/">よくあるご質問</a> &gt; <?php the_title(); ?>


<?php elseif( is_page_template('blog.php') ) : /* ブログ　一覧ページ */ ?>
ブログ
<?php elseif( is_single() ) : /* ブログ　詳細ページ */ ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/">ブログ</a> &gt; <?php the_time('Y/m/d'); ?>
<?php elseif( is_category() ) : /* ブログ　カテゴリー一覧ページ */ ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/">ブログ</a> &gt; <?php print( single_cat_title( '', false ) ); ?>
<?php elseif( is_archive() ) : /* ブログ　月別アーカイブ一覧ページ */ ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/">ブログ</a> &gt; <?php print( get_the_date( 'Y年n月' ) ); ?>


<?php elseif( is_page() ): /* 固定ページ */ ?>
	<?php if( $post->post_parent != 0 ) : /* 親ページの有無判別 */ ?>
    	<?php $ancestors = array_reverse( $post->ancestors ); /* 祖先ページのIDを格納した配列（格納順は逆に変更） */ ?>

        <?php foreach( $ancestors as $ancestor ): /* 祖先ページの数だけ繰り返し */ ?>
        	<a title="<?php echo get_the_title($ancestor); ?>" href="<?php echo get_permalink($ancestor); ?>"><?php echo get_the_title($ancestor); ?></a><?php echo ' &gt; '; ?>
        <?php endforeach ?>
    <?php endif; ?>

<?php the_title(); ?>


<?php elseif( is_404() ) : /* 404エラーページ */ ?>
ページエラー


<?php else : /* 上記以外のページ */ ?>
<?php the_title(); ?>
<?php endif; ?>
</div>
