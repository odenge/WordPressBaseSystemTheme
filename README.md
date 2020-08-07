# WordPressBaseSystemTheme
よく使われる機能を組み込んだ、Webサイトのベースに使えるWordPressテーマ！

* 新着情報
* 制作実績　※ 文言を「商品」等に変更すれば店舗サイトも対応可能
* よくあるご質問
* ブログ

## ■1.【プラグインインストール・設定】
WordPress管理画面　左メニュー「プラグイン」　「新規追加」  
下記のプラグインをインストールし有効化  
それぞれの設定を行う

### □1-1.「Custom Post Type UI」
WordPress管理画面　左メニュー「設定」　「CPT UI」  
下記のカスタム投稿とタクソノミーを作成する

**※ 【重要】**  
カスタム投稿とタクソノミーのスラッグは半角英数

#### 新着情報
* 【カスタム投稿】
    * 「news」新着情報

#### 制作実績
* 【カスタム投稿】
    * 「work」制作実績
* 【タクソノミー】  
    * 「work_type」タイプ
    * 「work_category」カテゴリー

#### よくあるご質問
* 【カスタム投稿】
    * 「faq」よくあるご質問
* 【タクソノミー】  
    * 「faq_category」カテゴリー

### □1-2.「Advanced Custom Fields」

#### ■【新着情報　カスタムフィールド設定】

**「項目」**

項目1

> 「フィールドラベル」  
リンクURL

> 「フィールド名」  
link_url

> 「フィールドタイプ」  
テキスト

> 「フィールド記入のヒント」  
記載したURLへリンクを張ります。　※ この設定は詳細ページへのリンクよりも優先されます。

項目2

>「フィールドラベル」  
 リンクページ表示

>「フィールド名」  
link_check

>「フィールドタイプ」  
チェックボックス

>「選択し」  
リンク先のページを別タブで開く : リンク先のページを別タブで開く

>「レイアウト」  
水平  

**「位置」**

「投稿タイプ」「等しい」「news」  

#### ■【制作実績　カスタムフィールド設定】

**「項目」**

項目1

> 「フィールドラベル」  
メイン画像

> 「フィールド名」  
main_image

> 「フィールドタイプ」  
画像

> 「返り値」  
画像ID

項目2

> 「フィールドラベル」  
リンクURL

> 「フィールド名」  
link_url

> 「フィールドタイプ」  
テキスト

> 「フィールド記入のヒント」  
記載したURLへリンクを張ります。　※ 別タブで開きます。

**「位置」**

「投稿タイプ」「等しい」「work」

### □1-3.「WP-PageNavi」
WordPress管理画面　左メニュー「設定」　 「PageNavi」  
「pagenavi-css.cssを使用」の「いいえ」を選択し「変更を保存」をクリック




## ■2.【構築準備】

### □2-1.「パーマリンク変更」

WordPress管理画面　左メニュー「設定」　「パーマリンク設定」  
「カスタム構造」を選択し、下記を記入し「変更を保存」をクリック

/%category%/%postname%/

### □2-2.「固定ページ作成」

WordPress管理画面　左メニュー「固定ページ」  
下記の固定ページを作成、半角英数のパーマリンクも設定

* 「HOME」　パーマリンク「home」

* 「新着情報」　パーマリンク「news」  
※ テンプレート「新着情報」選択
　　
* 「制作実績」　パーマリンク「work」  
※ テンプレート「制作実績」選択

* 「よくあるご質問」　パーマリンク「faq」  
※ テンプレート「よくあるご質問」選択

* 「ブログ」　パーマリンク「blog」  
※ テンプレート「ブログ」選択

### □2-3.「フロントページ設定」

WordPress管理画面　左メニュー「設定」　「表示設定」  
固定ページ「フロントページ」でトップページ「HOME」を選択し「変更を保存」をクリック

### □2-4.「メニュー作成」

WordPress管理画面　左メニュー「外観」　「メニュー」  
下記のメニューをそれぞれ作成

* 「global-navi」　表示位置「ページ上部」
* 「side-navi」　表示位置「ページ左側」
* 「footer-navi」　表示位置「ページ下部」

**※ 【重要】**  
作成した各メニュー内の下記メニューに  
WordPress管理画面のメニュー編集画面からclass名をつける

* 「新着情報」　class「news」
* 「制作実績」　class「work」
* 「よくあるご質問」　class「faq」
* 「ブログ」　class「blog」
