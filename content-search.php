<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pottery
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'pottery-featured' ); ?></a>
		</figure>
	<?php endif; ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Comment', 'pottery' ), __( '1 Comment', 'pottery' ), __( '% Comments', 'pottery' ) ); ?></span>
			<?php endif; ?>

			<div class="entry-meta">
				<?php pottery_posted_on(); ?>
			</div>

			<?php the_tags( '<span class="tags-links">', '', '</span>' ); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'pottery' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
