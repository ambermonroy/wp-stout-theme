<?php

/**
 * Display primary navigation menu after the header.
 *
 * @action after_setup_theme
 * @since  1.0.0
 */
function stout_move_primary_navigation() {

	remove_action( 'primer_after_header', 'primer_add_primary_navigation', 20 );
	add_action( 'primer_header', 'primer_add_primary_navigation', 20 );

}
add_action( 'after_setup_theme', 'stout_move_primary_navigation', 20 );

/**
 * Display the hero before the header.
 *
 * @action after_setup_theme
 * @since 1.0.0
 */
function stout_add_site_header() {

	remove_action( 'primer_header', 'primer_add_site_header', 10 );
	add_action( 'primer_after_header', 'primer_add_site_header', 10 );

}
add_action( 'after_setup_theme', 'stout_add_site_header' );


/**
 * Add additional sidebars
 *
 * @action primer_register_sidebars
 * @since 1.0.0
 * @param $sidebars
 * @return array
 */
function stout_add_sidebars( $sidebars ) {

	$new_sidebars = array(
		array(
			'name'          => esc_html__( 'Hero', 'stout' ),
			'id'            => 'hero',
			'description'   => esc_html__( 'This sidebar is for the hero area.', 'stout' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		),
	);

	return array_merge( $sidebars, $new_sidebars );

}

add_filter( 'primer_register_sidebars', 'stout_add_sidebars' );


/**
 * Add a footer menu.
 *
 * @action primer_nav_menus
 * @since 1.0.0
 * @param $nav_menus
 * @return array
 */
function stout_add_nav_menus( $nav_menus ) {

	$new_nav_menus = array(
		'footer' => esc_html__( 'Footer Menu', 'stout' ),
	);

	return array_merge( $nav_menus, $new_nav_menus );

}
add_filter( 'primer_nav_menus', 'stout_add_nav_menus' );

/**
 * Change Stout font types.
 *
 * @action primer_font_types
 * @since 1.0.0
 * @return array
 */
function stout_font_types() {
	return array(
		array(
			'name'    => 'primary_font',
			'label'   => esc_html__( 'Primary Font', 'primer' ),
			'default' => 'Lato',
			'css'     => array(
				'body, h4, h5, h6, input, select, textarea, .footer-widget-area a' => array(
					'font-family' => '"%s", sans-serif',
				),
			),
		),
		array(
			'name'    => 'secondary_font',
			'label'   => esc_html__( 'Secondary Font', 'primer' ),
			'default' => 'Oswald',
			'css'     => array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], .button, .comments-area .comment .comment-meta, .comments-area .comment .reply, label, h1, h2, h3, .footer-widget-area,  .footer-widget-area .widget-title, .main-navigation a, .entry-meta, .entry-footer, .nav-links, .widget-area .widget' => array(
					'font-family' => '"%s", sans-serif',
				),
			),
		),
	);
}
add_action( 'primer_font_types', 'stout_font_types' );

/**
 * Change Stout colors
 *
 * @action primer_colors
 * @since 1.0.0
 * @return array
 */
function stout_colors() {
	return array(
		array(
			'name'    => 'header_textcolor',
			'default' => '#e3ae30',
			'css'     => array(
				'.site-title a, .site-title a:visited' => array(
					'color' => '%1$s',
				),
			),
			'rgba_css' => array(
				'.site-title a:hover, .site-title a:visited:hover' => array(
					'color' => 'rgba(%1$s, 0.8)',
				),
			),
		),
		array(
			'name'    => 'background_color',
			'default' => '#fff',
			'css'     => array(
				'body' => array(
					'background' => '%1$s',
				),
			),
		),
		array(
			'name'    => 'header_background_color',
			'label'   => esc_html__( 'Header Background Color', 'primer' ),
			'default' => '#fff',
			'css'     => array(
				'.site-header-wrapper' => array(
					'background-color' => '%1$s',
				),
			),
		),
		array(
			'name'    => 'hero_background_color',
			'label'   => esc_html__( 'Hero Background Color', 'primer' ),
			'default' => '#404c4e',
			'css'     => array(
				'.hero' => array(
					'background-color' => '%1$s',
				),
			),
		),
		array(
			'name'    => 'footer_background_color',
			'label'   => esc_html__( 'Footer Background Color', 'primer' ),
			'default' => '#404c4e',
			'css'     => array(
				'.site-footer' => array(
					'background-color' => '%1$s',
				),
			),
		),
		array(
			'name'    => 'site_info_background_color',
			'label'   => esc_html__( 'Site Info Background Color', 'primer' ),
			'default' => '#fff',
			'css'     => array(
				'.site-info-wrapper' => array(
					'background-color' => '%1$s',
				),
			),
		),
		array(
			'name'    => 'link_color',
			'label'   => esc_html__( 'Link Color', 'primer' ),
			'default' => '#e3ae30',
			'css'     => array(
				'a,
				.main-navigation .current-menu-item > a,
                .main-navigation a:hover,
                .screen-reader-text:focus' => array(
					'color' => '%1$s',
				),
				'.button,
				input[type="button"],
				input[type="reset"],
				input[type="submit"]' => array(
					'background-color' => '%1$s',
				),
				'.comments-area .comment' => array(
					'border-color' => '%1$s',
				),
			),
			'rgba_css' => array(
				'a:hover' => array(
					'color' => 'rgba(%1$s, 0.8)',
				),
				'.button:hover,
				input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover,
				button:focus,
				input[type="button"]:focus,
				input[type="reset"]:focus,
				input[type="submit"]:focus' => array(
					'background-color' => 'rgba(%1$s, 0.8)',
				),
			),
		),
		array(
			'name'    => 'main_text_color',
			'label'   => esc_html__( 'Main Text Color', 'primer' ),
			'default' => '#252f31',
			'css'     => array(
				'body' => array(
					'color' => '%1$s',
				),
			),
		),
		array(
			'name'    => 'secondary_text_color',
			'label'   => esc_html__( 'Secondary Text Color', 'primer' ),
			'default' => '#404c4e',
			'css'     => array(
				'.main-navigation a,
				.footer-menu,
				.footer-menu ul li a,
				.site-footer' => array(
					'color' => '%1$s',
				),
				'.menu-toggle div' => array(
					'background-color' => '%1$s',
				),
				'th, td, hr, code, pre, .wp-caption' => array(
					'border-color' => '%1$s',
				),
			),
			'rgba_css' => array(
				'.footer-menu ul li a:active, .footer-menu ul li a:focus, .footer-menu ul li a:hover' => array(
					'color' => 'rgba(%1$s, 0.8)',
				),
			),
		),
		array(
			'name'    => 'light_text_color',
			'label'   => esc_html__( 'Light Text Color', 'primer' ),
			'default' => '#fff',
			'css'     => array(
				'.hero,
				.footer-widget-area,
				.footer-widget-area .widget-title' => array(
					'color' => '%1$s',
				),
			),
		),
	);
}
add_action( 'primer_colors', 'stout_colors' );


/**
 * Return the custom header
 *
 * @since 1.0.0
 * @return false|string
 */
function stout_get_custom_header() {
	$image_size = (int) get_theme_mod( 'full_width' ) === 1 ? 'hero-2x' : 'hero';
	$custom_header = get_custom_header();

	if ( ! empty( $custom_header->attachment_id ) ) {

		$image = wp_get_attachment_image_url( $custom_header->attachment_id, $image_size );

		if ( getimagesize( $image ) ) {
			return $image;
		}
	}

	$header_image = get_header_image();
	return $header_image;
}

/**
 * Add additional image sizes
 *
 * @action after_setup_theme
 * @since 1.0.0
 */
function stout_add_image_sizes() {
	add_image_size( 'hero', 1060, 550, array( 'center', 'center' ) );
	add_image_size( 'hero-2x', 2120, 1100, array( 'center', 'center' ) );
}
add_action( 'after_setup_theme', 'stout_add_image_sizes' );

