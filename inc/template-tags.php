<?php
/**
 * Small helpers used by templates.
 */

defined( 'ABSPATH' ) || exit;

/** The pages every menu falls back to when no menu is assigned. */
function zak_default_links(): array {
	return array(
		'/packages/' => __( 'Packages', 'zak' ),
		'/gallery/'  => __( 'Gallery', 'zak' ),
		'/faqs/'     => __( 'FAQs', 'zak' ),
		'/about/'    => __( 'About', 'zak' ),
		'/contact/'  => __( 'Contact', 'zak' ),
	);
}

function zak_menu( string $location, string $class ): void {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location' => $location,
				'container'      => false,
				'menu_class'     => $class,
				'depth'          => 1,
				'fallback_cb'    => false,
			)
		);
		return;
	}

	echo '<ul class="' . esc_attr( $class ) . '">';
	foreach ( zak_default_links() as $path => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( $path ) ), esc_html( $label ) );
	}
	echo '</ul>';
}

function zak_logo(): void {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	printf(
		'<a class="wordmark" href="%s" rel="home"><span class="wordmark__name">%s</span><span class="wordmark__tag">%s</span></a>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name' ) ),
		esc_html__( 'Your wedding painter', 'zak' )
	);
}

function zak_cta( string $class = 'btn btn--primary' ): void {
	printf(
		'<a class="%s" href="%s">%s</a>',
		esc_attr( $class ),
		esc_url( home_url( zak_option( 'cta_url' ) ) ),
		esc_html( zak_option( 'cta_label' ) )
	);
}

/** Inline icon. Decorative unless a label is passed. */
function zak_icon( string $name, string $label = '' ): string {
	$paths = array(
		'arrow'     => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'menu'      => '<path d="M4 7h16M4 12h16M4 17h16"/>',
		'close'     => '<path d="M6 6l12 12M18 6L6 18"/>',
		'message'   => '<path d="M21 12a8 8 0 0 1-11.8 7L4 20l1.1-4.6A8 8 0 1 1 21 12z"/>',
		'instagram' => '<rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r=".6" fill="currentColor"/>',
		'facebook'  => '<path d="M14 8.5V7a1.5 1.5 0 0 1 1.5-1.5H17V3h-2.2A3.8 3.8 0 0 0 11 6.8v1.7H8.5V11H11v10h3V11h2.6l.4-2.5z"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}
	$a11y = '' === $label ? 'aria-hidden="true"' : 'role="img" aria-label="' . esc_attr( $label ) . '"';
	return '<svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" ' . $a11y . '>' . $paths[ $name ] . '</svg>';
}
