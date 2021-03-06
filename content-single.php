<?php
/**
 * @package Pottery
 */
$format = get_post_format();
$formats = get_theme_support( 'post-formats' );

if ( 'image' == $format || 'video' == $format ) //If Image or Video, put the_content() in a variable for regex
	$content = apply_filters( 'the_content', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pottery' ) ) );
else
	$content = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && 'image' == $format ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'pottery-featured' ); ?>
		</figure>
	<?php elseif ( 'image' == $format ) : ?>
		<?php
			$image = pottery_get_first_image( $content );

			$content = preg_replace( '!<img.*src=[\'"]([^"]+)[\'"].*/?>!iUs', '', $content ); //Strip out all images from content

			if ( ! empty( $image ) ) : ?>
				<figure class="entry-thumbnail">
					<?php printf( '<img src="%1$s" />', esc_url( $image['src'] ) ); ?>
				</figure>
			<?php endif; ?>
	<?php endif; ?>

	<?php if ( 'video' == $format ) :

		$media = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

		?>
		<?php if ( ! empty( $media ) ) : ?>
		    <?php
		    foreach( $media as $embed_html ) {
		        $content = str_replace( $embed_html, '', $content );
		    } ?>
			<div class="entry-video jetpack-video-wrapper">
		    <?php
		        foreach ( $media as $embed_html ) {
		            printf( '%1$s', $embed_html );
		        } ?>
	    	</div>
		<?php endif; ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php if ( 'video' == $format || 'image' == $format ) : ?>
			<?php echo $content; ?>
		<?php else : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pottery' ) ); ?>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pottery' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php pottery_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_tags( '<span class="tags-links">', '', '</span>' ); ?>

		<?php edit_post_link( __( 'Edit', 'pottery' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
