<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pottery
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pottery' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-inner">
			<div class="site-branding">
				<button id="menu-toggle" class="toggle">
                    <div class="menu-btn">
                        <span></span>
                    </div>
					<span class="screen-reader-text"><?php _e( 'Primary Menu', 'pottery' ); ?></span>
				</button>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<div id="site-search" class="header-search">
				<div class="header-search-form">
					<?php get_search_form(); ?>
				</div><!-- .header-search-form -->
			</div><!-- #site-navigation -->
		</div><!-- .site-header-inner -->
	</header><!-- #masthead -->

	<div id="toggle-sidebar">
		<button id="menu-close">
            <span class="x-icon"></span>
			<span class="screen-reader-text"><?php _e( 'Close Menu', 'pottery' ); ?></span>
		</button>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="menu-wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
	</div>

	<?php if ( get_header_image() ) : ?>
		<div class="site-header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div style="background-image: url('<?php header_image(); ?>')"></div>
			</a>
		</div>
	<?php endif; // End header image check. ?>

	<div id="content" class="site-content">
