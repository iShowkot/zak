<?php
/**
 * Site-wide values (phone, email, socials). Each value is defined once here
 * and read through zak_option(). Step 1 adds an admin screen that stores
 * them in the database; these defaults remain the fallback.
 */

defined( 'ABSPATH' ) || exit;

function zak_option_defaults(): array {
	return array(
		'phone'        => '',
		'email'        => '',
		'instagram'    => 'https://www.instagram.com/ishrat.zakia/',
		'facebook'     => 'https://www.facebook.com/ishratzakia.tasnim',
		'service_area' => 'New Jersey, the Tri-State Area and New England',
		'cta_label'    => 'Check my date',
		'cta_url'      => '/contact/',
	);
}

function zak_option( string $key ): string {
	$saved    = get_option( 'zak_options', array() );
	$defaults = zak_option_defaults();
	$value    = '';

	if ( is_array( $saved ) && isset( $saved[ $key ] ) && '' !== $saved[ $key ] ) {
		$value = (string) $saved[ $key ];
	} elseif ( isset( $defaults[ $key ] ) ) {
		$value = $defaults[ $key ];
	}

	return (string) apply_filters( 'zak_option', $value, $key );
}

/** Digits only, with a leading +1 for ten-digit US numbers. */
function zak_phone_href(): string {
	$digits = preg_replace( '/\D+/', '', zak_option( 'phone' ) );
	if ( '' === $digits ) {
		return '';
	}
	if ( 10 === strlen( $digits ) ) {
		$digits = '1' . $digits;
	}
	return '+' . $digits;
}
