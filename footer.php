<?php
/**
 * Site footer and the sticky action bar shown on phones.
 */

defined( 'ABSPATH' ) || exit;

$zak_phone = zak_phone_href();
?>
</main>

<footer class="site-footer">
	<div class="wrap">
		<div class="site-footer__lead">
			<p class="site-footer__line"><?php echo wp_kses( __( 'Let&rsquo;s paint <em>your</em> day.', 'zak' ), array( 'em' => array() ) ); ?></p>
			<?php zak_cta(); ?>
		</div>

		<div class="site-footer__grid">
			<div>
				<?php zak_logo(); ?>
				<p class="site-footer__area">
					<?php
					/* translators: %s: service area. */
					printf( esc_html__( 'Live wedding painting across %s.', 'zak' ), esc_html( zak_option( 'service_area' ) ) );
					?>
				</p>
			</div>

			<nav aria-label="<?php esc_attr_e( 'Footer', 'zak' ); ?>">
				<?php zak_menu( 'footer', 'site-footer__links' ); ?>
			</nav>

			<ul class="site-footer__social">
				<?php if ( zak_option( 'instagram' ) ) : ?>
					<li><a href="<?php echo esc_url( zak_option( 'instagram' ) ); ?>" rel="noopener"><?php echo zak_icon( 'instagram' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php esc_html_e( 'Instagram', 'zak' ); ?></span></a></li>
				<?php endif; ?>
				<?php if ( zak_option( 'facebook' ) ) : ?>
					<li><a href="<?php echo esc_url( zak_option( 'facebook' ) ); ?>" rel="noopener"><?php echo zak_icon( 'facebook' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php esc_html_e( 'Facebook', 'zak' ); ?></span></a></li>
				<?php endif; ?>
			</ul>
		</div>

		<p class="site-footer__legal">
			&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
			<span aria-hidden="true">&middot;</span>
			<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'zak' ); ?></a>
		</p>
	</div>
</footer>

<div class="action-bar" data-action-bar>
	<?php zak_cta( 'btn btn--primary action-bar__main' ); ?>
	<?php if ( $zak_phone ) : ?>
		<a class="btn btn--ghost action-bar__text" href="sms:<?php echo esc_attr( $zak_phone ); ?>">
			<?php echo zak_icon( 'message' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<span><?php esc_html_e( 'Text Ishrat', 'zak' ); ?></span>
		</a>
	<?php endif; ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
