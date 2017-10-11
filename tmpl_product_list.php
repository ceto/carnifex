<?php
/**
 * The template for displaying Product List.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 ∗
 * Template Name: Product List
 * @package Carnifex
 * @since Carnifex 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content product-list clearfix" role="main">
				<h1 class="entry-title">Carnifex gyroshúsok</h1>

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
				

				<?php while ( $the_products->have_posts() ) : $the_products->the_post(); ?>
					<article id="product-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						
						<header class="product-header">
							<h2 class="product-title">
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'carnifex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
							</h2>
						</header><!-- .product-header -->
						<figure class="product-photo thumb">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'carnifex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
								<?php if ( has_post_thumbnail() ) {the_post_thumbnail('product-normal');} else { ?>
								<img src="http://lorempixel.com/470/470">
							<?php } ?>
							</a>
						</figure>
						<footer class="product-meta">
							<?php
								$tags_list = get_the_term_list( $post->ID, 'product-tag', '', __( '<span class="sep"> </span>', 'carnifex' ) ); 
								if ( $tags_list ) :
							?>
							<!-- span class="sep"> | </span -->
							<span class="tags-links clearfix">
								<?php printf( __( '%1$s', 'carnifex' ), $tags_list ); ?>
							</span>
							<?php endif; // End if $tags_list ?>
		
							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="sep"> | </span>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'carnifex' ), __( '1 Comment', 'carnifex' ), __( '% Comments', 'carnifex' ) ); ?></span>
							<?php endif; ?>

							<?php edit_post_link( __( 'Edit', 'carnifex' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
						</footer><!-- .product-meta -->
						<div class="product-anyag">
						<div class="product-excerpt">
							<?php echo get_post_meta($post->ID, '_prod_short_desc', TRUE); ?>
						</div><!-- .product-excerpt -->
						<div class="product-alja">
							<?php /*

							<div class="product-price">
								<?php echo get_post_meta($post->ID, '_prod_price', TRUE); ?>
							</div>
							*/ ?>

							<div class="product-button">
								<a class="btn" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'carnifex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									A termék részletei
								</a>
							</div>
						</div>
						
					</div><!-- .product-anyag -->

					</article><!-- #product-<?php the_ID(); ?> -->
				<?php endwhile; // end of the loop. ?>
				<?php wp_reset_query();	wp_reset_postdata();?>


				<?php// while ( have_posts() ) : the_post(); ?>
					<?php// get_template_part( 'content', 'page' ); ?>
				<?php// endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>