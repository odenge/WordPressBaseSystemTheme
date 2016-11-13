$(document).ready(function() {
	var flag = false;
	var pagetop = $('.pagetop a');
	var pagetopcontent = $('#pagetop-content a');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			if (flag == false) {
				flag = true;
				pagetopcontent.stop().animate({
					'bottom': '120px'
				}, 200);
			}

		} else {
			if (flag) {
				flag = false;
				pagetopcontent.stop().animate({
					'bottom': '-56px'
				}, 200);
			}
		}

        scrollHeight = $(document).height(); // ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); // ウィンドウの高さ+スクロールした高さ→　現在のトップからの位置
        footHeight = $("footer").innerHeight(); // フッターの高さ

		/* フッターに入ったらページトップを非表示
		if ( scrollHeight - scrollPosition  <= footHeight ) {

            $("#pagetop-content").fadeOut("fast");
        } else {
            $("#pagetop-content").fadeIn("fast");
        }
		*/

	});


	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});


});
