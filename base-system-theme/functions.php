<?php

/*********************************/
/***** ログイン画面カスタマイズ *****/
/*********************************/

/* css, js 追加 */
function custom_login() { ?>
	<style>
		.login {
			background-color: #e2f6ff;
		}
		.login #login h1 {
			width 100%;
		}
		.login #login h1 a {
			display: block;
			width: 100%;
			height: 0;
			padding-top: 20%; /* 表示画像の高さ ÷ 表示画像の幅 × 100 */
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/common/logo.png) no-repeat center center;

			/* 画像サイズが小さい時にはコメントアウト
			background-size: cover;
			*/
		}
		.login #nav,
		.login #backtoblog {
			display: none;
		}
	</style>
	<script>
		/* ここにスクリプトを記述 */
	</script>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login' );

/* ログのリンク変更 */
function custom_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

/* ログのタイトル変更 */
function custom_login_logo_title() {
	return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'custom_login_logo_title' );

/* エラーメッセージ変更 */
add_filter( 'login_errors', create_function('$a', "return '<strong>エラー:</strong> ログインできませんでした';") );




/*********************************/
/***** 詳細設定 *****/
/*********************************/

/* 外観　メニュー表示 */
add_theme_support('menus');


/* お客様の管理画面不必要項目を非表示 */
function remove_menus () {
  global $menu;
  global $current_user;
  get_currentuserinfo();

  $user_login_name = $current_user->user_login;
  $editor_users = array('staff', 'staff2'); /* お客様のアカウント名を指定 */

  if( array_search($user_login_name, $editor_users) !== FALSE ) {
    $restricted = array( __('投稿'), __('コメント'), __('プロフィール'), __('ツール') );
    end ($menu);
    while (prev($menu)){
      $value = explode(' ',$menu[key($menu)][0]);
      if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
        unset($menu[key($menu)]);
      }
    }
  }
}
add_action('admin_menu', 'remove_menus');


/* 表示確認アカウントの場合、管理画面からメニュー等を削除 */
function disable_test_users_menu() {
	echo '<style type="text/css">#wpbody-content .wrap, #screen-meta-links, #wp-admin-bar-edit-profile, #adminmenu {display: none !important;}</style>';
}
global $current_user;
get_currentuserinfo();
$user_login_name = $current_user->user_login;
$test_users = array('test');
if( array_search($user_login_name, $test_users) !== FALSE ){
	add_action('admin_head', 'disable_test_users_menu');
}


/* 概要（抜粋）の文字数調整 */
function my_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_mblength', 'my_excerpt_length');


/* カテゴリ一覧のリストで件数を<a>タグ内に記載 */
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}


/* アーカイブ一覧のリストで件数を<a>タグ内に記載し、表示している<li>にclassを付ける */
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $link_html ) {

  if( in_array(get_query_var('monthnum'), array(10, 11, 12)) ) {
    $my_month = '/' . get_query_var('year') . '/' . get_query_var('monthnum');
  }
  else {
    $my_month = '/' . get_query_var('year') . '/0' . get_query_var('monthnum');
  }

  /* 表示している<li>にcurrentというclassを付ける */
  if (strstr($link_html, $my_month)) {
    $link_html = preg_replace('@<li>@i', '<li class="current">', $link_html);
  }

  /* 件数を<a>タグ内に記載 */
  $link_html = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$link_html);

  return $link_html;
}


?>
