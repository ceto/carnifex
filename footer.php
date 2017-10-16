<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Carnifex
 * @since Carnifex 1.0
 */
?>
	</div><!-- .right-panel -->
	</div><!-- #main .site-main -->


	<div class="footerwrap">
	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		<div class="bottom1 clearfix">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'sidebar-left' ); ?>
		</div>
		<div class="bottom2 clearfix">
			Készresütöt és nyársas gyroshús gyártása, forgalmazása.
			<nav role="navigation" class="site-navigation footer-navigation clearfix">
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'carnifex' ); ?>"><?php _e( 'Skip to content', 'carnifex' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
		</nav><!-- .site-navigation .footer-navigation -->

		</div>


		<div class="site-info">
			<?php do_action( 'carnifex_credits' ); ?>
			&copy; <?= date(Y.) ?> <?= __('Carnifex Kft. | Minden jog fenntartva. | Készítette <a href="http://hydrogene.hu">Hydrogene</a>','carnifex'); ?>

			<a class="tothetop" href="#pagetop">&#9652;</a>
		</div><!-- .site-info -->



	</footer><!-- #colophon .site-footer -->
	</div>
</div><!-- #page .hfeed .site -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo( 'template_directory' ); ?>/js/vendor/jquery-1.7.2.min.js"><\/script>')</script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/plugins.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>
