<?php
/**
 * The template for displaying Homepage.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 ∗
 * Template Name: Homepage
 * @package Carnifex
 * @since Carnifex 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<div class="slideshow">
					<img class="slide" src="<?php bloginfo( 'template_directory' ); ?>/images/slideb.jpg" />
				</div>

				<div class="kiemel clearfix">
					<h1><span><?= __('Készresütött gyroshúsok gyártása és forgalmazása','carnifex'); ?></span></h1>
					<p><?= __('Célunk a gyorséttermek, büfék, pizzériák, vendéglátó helyek részére készresütött (fogyasztásra kész) csirkemell, csirkecomb, pulykacomb gyroshús, illetve fűzött (nyársas) csirkemell,  csirkecomb gyroshús előállítása.','carnifex'); ?></p>
					<a href="?page_id=4" class="btn"><?= __('Termékek megtekintése','carnifex'); ?></a>
				</div>

				<?php
					$args = array (
						'nopaging' => false,
						'post_type' => 'product',

						//'meta_key' => '_cmb_type',
						// 'meta_query' => array(
						// 					array(
						// 						'key' => '_cmb_type',
						// 						'value' => array($packtype),
						// 						'compare' => 'IN',
						// 						)
						// 					)

					);
					$the_products = new WP_Query($args);
				?>

				<div class="homelist clearfix">

					<?php while ( $the_products->have_posts() ) : $the_products->the_post(); ?>
						<div class="proditem">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'carnifex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
							<?php if ( has_post_thumbnail() ) {the_post_thumbnail('product-medium');} else { ?>
								<img src="http://lorempixel.com/270/270">
							<?php } ?>
						</a>
						<h3>
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'carnifex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
						</h3>
					</div>
					<?php endwhile; // end of the loop. ?>
					<?php wp_reset_query();	wp_reset_postdata();?>

				</div>



				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>