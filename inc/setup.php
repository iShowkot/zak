<?php
/**
 * Theme supports, menus and front-end cleanup.
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain( 'zak', get_theme_file_path( 'languages' ) );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 96,
				'width'       => 320,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Header menu', 'zak' ),
				'footer'  => __( 'Footer menu', 'zak' ),
			)
		);

		// Sizes tuned for the mostly portrait library.
		add_image_size( 'zak-portrait', 720, 960, true );
		add_image_size( 'zak-portrait-lg', 1080, 1440, true );
		add_image_size( 'zak-wide', 1600, 1000, true );
	}
);

// Front-end weight: drop what this theme never uses.
add_action(
	'init',
	function () {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	}
);

// Load a block's CSS only when that block is on the page.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_dequeue_style( 'global-styles' );
		wp_dequeue_style( 'classic-theme-styles' );
	},
	100
);

// The old site linked to /works, which never existed.
add_action(
	'template_redirect',
	function () {
		if ( ! is_404() ) {
			return;
		}
		$path = trim( (string) wp_parse_url( add_query_arg( array() ), PHP_URL_PATH ), '/' );
		if ( 'works' === $path ) {
			wp_safe_redirect( home_url( '/gallery/' ), 301 );
			exit;
		}
	}
);
