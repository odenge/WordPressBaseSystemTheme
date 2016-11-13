<?php
/* daysの値により何日以内の投稿にnewマークをつけるか決める */
$days = 7;
$today_time = time();
$entry_time = get_the_time('U');
$entry_days = ($today_time - $entry_time) / 86400; /* 86400は24時間の秒数 */
?>

<dt<?php if ( $days > $entry_days ) : ?> class="new"<?php endif; ?>><?php the_time('Y/m/d'); ?></dt>
<dd><?php if ( get_field('link_url') ) : /* カスタムフィールドの項目「リンクURL」等の内容によって、リンク先ページの表示を分ける */ ?>
        <a href="<?php the_field('link_url'); ?>"<?php if ( get_field('link_check') ) : ?> target="_blank"<?php endif; ?>><?php the_title(); ?></a>
    <?php else : ?>
		<?php if ( $content = $post->post_content ) : ?>
        <a href="<?php the_permalink(); ?>"<?php if ( get_field('link_check') ) : ?> target="_blank"<?php endif; ?>><?php the_title(); ?></a>
        <?php else : ?>
        <?php the_title(); ?>
        <?php endif; ?>
    <?php endif; ?>
</dd>
