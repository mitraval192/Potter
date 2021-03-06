<?php
/**
 * @package Pottery
 */
$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( $format && in_array( $format, $formats[0] ) ): ?>
		<a class="entry-format" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'pottery' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a>
	<?php endif; ?>
	<?php if ( has_post_thumbnail() && ! is_single() ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'pottery-featured' ); ?>
		</figure>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pottery' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pottery' ),
				'after'  => '</div>',
			) );
		?>
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) && ! is_single() ) : ?>
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
