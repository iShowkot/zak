<?php
/**
 * Styles, scripts and font preloads.
 */

defined( 'ABSPATH' ) || exit;

function zak_asset_version( string $relative ): string {
	$path = get_theme_file_path( $relative );
	return file_exists( $path ) ? (string) filemtime( $path ) : ZAK_VERSION;
}

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style( 'zak-base', get_theme_file_uri( 'assets/css/base.css' ), array(), zak_asset_version( 'assets/css/base.css' ) );

		wp_enqueue_script(
			'zak-site',
			get_theme_file_uri( 'assets/js/site.js' ),
			array(),
			zak_asset_version( 'assets/js/site.js' ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}
);

// Preload the two fonts used above the fold.
add_action(
	'wp_head',
	function () {
		foreach ( array( 'fraunces-var.woff2', 'figtree-var.woff2' ) as $font ) {
			printf(
				'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
				esc_url( get_theme_file_uri( 'assets/fonts/' . $font ) )
			);
		}
	},
	1
);
