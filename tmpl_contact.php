<?php
/**
 * The template for displaying Contact pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 ∗
 * Template Name: Contact
 * @package Carnifex
 * @since Carnifex 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content clearfix" role="main">
				<div class="mapwrap">
					<img class="slide" src="http://carnifex.hu/wp-content/themes/carnifex/images/slideb.jpg">
					<div id="map_canvas" class="gmap"></div>
				</div>
				<div class="contactdata clearfix">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
				<div class="sendmessage">
					<?php echo do_shortcode('[contact-form-7 id="73" title="Contact Form - HU"]'); ?>
				</div>
				
				

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>