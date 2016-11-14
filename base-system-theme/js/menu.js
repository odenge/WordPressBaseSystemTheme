$(document).ready(function(){

	$('#faq-list ul li .title').click(function () {
		$(this).next('.info').slideToggle('fast');
		$(this).toggleClass('clicked');
	});

} );
