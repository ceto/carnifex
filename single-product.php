<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Carnifex
 * @since Carnifex 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content single-product" role="main">
												<?php carnifex_content_nav( 'nav-above' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>


				<article id="product-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						<div class="product-fej clearfix">
							<header class="product-header">


								<h1 class="product-title"><?php the_title(); ?></h1>
							</header><!-- .product-header -->
							<footer class="product-meta clearfix">
									<?php
										$tags_list = get_the_term_list( $post->ID, 'product-tag', '', __( '<span class="sep"> </span>', 'carnifex' ) );
										if ( $tags_list ) :
									?>
									<!-- span class="sep"> | </span -->
									<span class="tags-links">
										<?php
										$pattern = "/(?<=href=(\"|'))[^\"']+(?=(\"|'))/";
										printf( __( '%1$s', 'carnifex' ), preg_replace($pattern,'#', $tags_list) ) ;
										?>
									</span>
									<?php endif; // End if $tags_list ?>

									<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
									<span class="sep"> | </span>
									<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'carnifex' ), __( '1 Comment', 'carnifex' ), __( '% Comments', 'carnifex' ) ); ?></span>
									<?php endif; ?>

									<?php edit_post_link( __( 'Edit', 'carnifex' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
							</footer><!-- .product-meta -->
						</div>
						<figure class="product-photo thumb">


							<a href="#" rel="blightbox['<?php echo $id; ?>']">

								<?php if ( has_post_thumbnail() ) {the_post_thumbnail('product-normal'); } ?>

							</a>

							<div class="more-pics clearfix">
									<?php the_content(); ?>
							</div>
						</figure>
						<div class="product-excerpt">
							<?php echo get_post_meta($post->ID, '_prod_short_desc', TRUE); ?>
						</div>

						<div class="product-alja">

							<?php /*
							<div class="product-price">
								<?php echo get_post_meta($post->ID, '_prod_price', TRUE); ?>
							</div>

							*/ ?>
							<div class="product-button">
								<a class="btn" href="?page_id=5" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'carnifex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<?= __('Árainkról érdeklődjön<br />telefonon: +36/20 515-5257<br>vagy űrlapunkon keresztül','carnifex'); ?>
								</a>
							</div>
						</div>

						<div class="product-snippets clearfix">

							<div class="snip clearfix">
								<h3><?= __('Összetevők','carnifex'); ?></h3>
								<?php echo get_post_meta($post->ID, '_prod_ingredients', TRUE); ?>
							</div>

							<div class="snip clearfix">
								<h3><?= __('Kiszerelés, csomagolás','carnifex'); ?></h3>
								<?php echo get_post_meta($post->ID, '_prod_pack', TRUE); ?>
							</div>
							<div class="snip clearfix">
								<h3><?= __('Felhasználás, tárolás','carnifex'); ?></h3>
								<?php echo get_post_meta($post->ID, '_prod_variants', TRUE); ?>
							</div>
						</div> <!-- .product-snippets-->
						<div class="product-content clearfix">
							<?php echo get_post_meta($post->ID , '_prod_short_price', TRUE); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'carnifex' ), 'after' => '</div>' ) ); ?>
						</div><!-- .product-content -->

					</article><!-- #product-<?php the_ID(); ?> -->

				<?php carnifex_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>