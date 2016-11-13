	<footer>
        <div id="pagetop-content" class="pagetop img-rollover"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/common/pagetop.gif" alt="↑" /></a></div>

        <div id="foot">
			<div class="content">
				<div class="navi clearfix"><?php wp_nav_menu( array( 'menu' => 'footer-navi', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?></div>
			</div>
        </div><!-- end : #foot -->

		<div class="copyright">&copy; 2016 Odenge.</div>
	</footer><!--end : footer-->
</div><!-- end : #wrapper -->
<?php wp_footer(); ?>
</body>
</html>
