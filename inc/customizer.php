<?php
/**
 * Pottery Theme Customizer
 *
 * @package Pottery
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pottery_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_control( 'display_header_text' );

	$wp_customize->get_section( 'title_tagline' )->priority = '9';
	$wp_customize->get_section( 'title_tagline' )->title = __('General', 'pottery');
	$wp_customize->get_section( 'colors' )->title = __('General', 'pottery');
	$wp_customize->get_section( 'colors' )->panel = 'pottery_colors_panel';
	$wp_customize->get_section( 'colors' )->priority = '10';

	//___General___//
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'site_logo',
			array(
				'label'          => __( 'Site logo', 'pottery' ),
				'type'           => 'image',
				'section'        => 'title_tagline',
				'priority'       => 12,
			)
		)
	);

	$wp_customize->add_setting(
		'main_image',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'main_image',
			array(
				'label'          => __( 'Main image', 'pottery' ),
				'type'           => 'image',
				'section'        => 'title_tagline',
				'priority'       => 17,
			)
		)
	);
	/************/

	//___Colors___//
	$wp_customize->add_panel( 'pottery_colors_panel', array(
		'priority'       => 19,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Colors', 'pottery'),
	) );
	$wp_customize->add_section(
		'colors_header',
		array(
			'title'         => __('Header', 'pottery'),
			'priority'      => 11,
			'panel'         => 'pottery_colors_panel',
		)
	);
	$wp_customize->add_section(
		'colors_sidebar',
		array(
			'title'         => __('Sidebar', 'pottery'),
			'priority'      => 12,
			'panel'         => 'pottery_colors_panel',
		)
	);
	$wp_customize->add_section(
		'colors_footer',
		array(
			'title'         => __('Footer', 'pottery'),
			'priority'      => 13,
			'panel'         => 'pottery_colors_panel',
		)
	);
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => '#d65050',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'         => __('Primary color', 'pottery'),
				'section'       => 'colors',
				'settings'      => 'primary_color',
				'priority'      => 11
			)
		)
	);
	//Menu bg
	$wp_customize->add_setting(
		'menu_bg_color',
		array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'menu_bg_color',
			array(
				'label' => __('Menu background', 'pottery'),
				'section' => 'colors_header',
				'priority' => 12
			)
		)
	);
	//Site title
	$wp_customize->add_setting(
		'site_title_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_title_color',
			array(
				'label' => __('Site title', 'pottery'),
				'section' => 'colors_header',
				'settings' => 'site_title_color',
				'priority' => 13
			)
		)
	);
	//Site desc
	$wp_customize->add_setting(
		'site_desc_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_desc_color',
			array(
				'label' => __('Site description', 'pottery'),
				'section' => 'colors_header',
				'priority' => 14
			)
		)
	);
	//Top level menu items
	$wp_customize->add_setting(
		'top_items_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'top_items_color',
			array(
				'label' => __('Top level menu items', 'pottery'),
				'section' => 'colors_header',
				'priority' => 15
			)
		)
	);
	//Menu items hover
	$wp_customize->add_setting(
		'menu_items_hover',
		array(
			'default'           => '#d65050',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'menu_items_hover',
			array(
				'label' => __('Menu items hover', 'pottery'),
				'section' => 'colors_header',
				'priority' => 15
			)
		)
	);

	//Sub menu items color
	$wp_customize->add_setting(
		'submenu_items_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'submenu_items_color',
			array(
				'label' => __('Sub-menu items', 'pottery'),
				'section' => 'colors_header',
				'priority' => 16
			)
		)
	);
	//Sub menu background
	$wp_customize->add_setting(
		'submenu_background',
		array(
			'default'           => '#1c1c1c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'submenu_background',
			array(
				'label' => __('Sub-menu background', 'pottery'),
				'section' => 'colors_header',
				'priority' => 17
			)
		)
	);
	//Mobile menu
	$wp_customize->add_setting(
		'mobile_menu_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'mobile_menu_color',
			array(
				'label' => __('Mobile menu button', 'pottery'),
				'section' => 'colors_header',
				'priority' => 17
			)
		)
	);
	//Slider text
	$wp_customize->add_setting(
		'slider_text',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'slider_text',
			array(
				'label' => __('Header slider text', 'pottery'),
				'section' => 'colors_header',
				'priority' => 18
			)
		)
	);
	//Body
	$wp_customize->add_setting(
		'body_text_color',
		array(
			'default'           => '#767676',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_text_color',
			array(
				'label' => __('Body text', 'pottery'),
				'section' => 'colors',
				'priority' => 19
			)
		)
	);
	//Sidebar backgound
	$wp_customize->add_setting(
		'sidebar_background',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sidebar_background',
			array(
				'label' => __('Sidebar background', 'pottery'),
				'section' => 'colors_sidebar',
				'priority' => 20
			)
		)
	);
	//Sidebar color
	$wp_customize->add_setting(
		'sidebar_color',
		array(
			'default'           => '#767676',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sidebar_color',
			array(
				'label' => __('Sidebar color', 'pottery'),
				'section' => 'colors_sidebar',
				'priority' => 21
			)
		)
	);
	//Footer widget area
	$wp_customize->add_setting(
		'footer_widgets_background',
		array(
			'default'           => '#252525',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_widgets_background',
			array(
				'label' => __('Footer widget area background', 'pottery'),
				'section' => 'colors_footer',
				'priority' => 22
			)
		)
	);
	//Footer widget color
	$wp_customize->add_setting(
		'footer_widgets_color',
		array(
			'default'           => '#767676',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_widgets_color',
			array(
				'label' => __('Footer widget area color', 'pottery'),
				'section' => 'colors_footer',
				'priority' => 23
			)
		)
	);
	//Footer background
	$wp_customize->add_setting(
		'footer_background',
		array(
			'default'           => '#1c1c1c',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background',
			array(
				'label' => __('Footer background', 'pottery'),
				'section' => 'colors_footer',
				'priority' => 24
			)
		)
	);
	//Footer color
	$wp_customize->add_setting(
		'footer_color',
		array(
			'default'           => '#666666',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_color',
			array(
				'label' => __('Footer color', 'pottery'),
				'section' => 'colors_footer',
				'priority' => 25
			)
		)
	);
	//Rows overlay
	$wp_customize->add_setting(
		'rows_overlay',
		array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rows_overlay',
			array(
				'label'         => __('Rows overlay', 'pottery'),
				'section'       => 'colors',
				'description'   => __('[DEPRECATED] Please use the color option from Edit Row > Design > Overlay color', 'pottery'),
				'priority'      => 26
			)
		)
	);

	/**************/
	//social media
	$wp_customize->add_section( 'my_social_settings', array(
		'title'    => __('Social Media Icons', 'staymore'),
		'priority' => 22,
		'description' => __('This is the Social Media Section. Add URL to display Social Icons.','staymore')
	) );


	$wp_customize->add_setting( 'Facebook', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Facebook', array(
		'label'    => __( "Facebook url:", 'staymore' ),
		'section'  => 'my_social_settings',
		'type'     => 'text',
		'priority' => 27,
	) );
	$wp_customize->add_setting( 'Google_plus', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Google_plus', array(
		'label'    => __( "Google plus url:", 'staymore' ),
		'section'  => 'my_social_settings',
		'type'     => 'text',
		'priority' => 28,
	) );
	$wp_customize->add_setting( 'Linkedin', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control('Linkedin', array(
		'label'    => __( "Linkedin url:", 'staymore' ),
		'section'  => 'my_social_settings',
		'type'     => 'text',
		'priority' => 29,
	) );
	$wp_customize->add_setting( 'Twitter', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Twitter', array(
		'label'    => __( "Twitter url:", 'staymore' ),
		'section'  => 'my_social_settings',
		'type'     => 'text',
		'priority' => 30,
	) );


}
add_action( 'customize_register', 'pottery_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pottery_customize_preview_js() {
	wp_enqueue_script( 'pottery_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '786', true );
}
add_action( 'customize_preview_init', 'pottery_customize_preview_js' );
