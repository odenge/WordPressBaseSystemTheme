<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head>
<meta charset="UTF-8" />
<?php if ( is_front_page() ) : /* トップページ */ ?>
<title><?php bloginfo('name'); ?></title>
<?php else : /* 下階層ページ */ ?>
<title><?php
wp_title( '|', true, 'right' );
bloginfo('name');
?></title>
<?php endif; ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="keywords" content="" />
<link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<meta name="viewport" content="width=device-width" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.12.4.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/pagetop.js"></script>
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv-printshiv.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div id="wrapper">
	<header>
		<h1><span><?php bloginfo('description'); ?></span></h1>
        <div id="head">
            <div class="content clearfix">
                <div class="logo img-rollover"><a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/common/logo.png" alt="<?php bloginfo('name'); ?>" /></a></div>
            </div><!-- end : .content -->
        </div><!-- end : #head -->

        <nav class="clearfix">
			<?php wp_nav_menu( array( 'menu' => 'global-navi', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
        </nav>
	</header><!-- end : header -->
