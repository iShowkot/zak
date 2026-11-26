<?php
/**
 * Not found.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="wrap wrap--narrow section not-found">
	<p class="eyebrow"><?php esc_html_e( 'Page not found', 'zak' ); ?></p>
	<h1 class="page-title"><?php echo wp_kses( __( 'This canvas is <em>still blank</em>.', 'zak' ), array( 'em' => array() ) ); ?></h1>
	<p class="lede"><?php esc_html_e( 'The page you were looking for has moved or never existed. The paintings are this way.', 'zak' ); ?></p>
	<p class="btn-row">
		<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php esc_html_e( 'See the gallery', 'zak' ); ?></a>
		<a class="btn btn--ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in touch', 'zak' ); ?></a>
	</p>
</div>
<?php
get_footer();
