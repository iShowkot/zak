<?php
/**
 * Style preview content: every token and component in one place.
 * Sample images are passed in so the page works before content is entered.
 */

defined( 'ABSPATH' ) || exit;

$zak_img_a = apply_filters( 'zak_preview_image', '', 'hero' );
$zak_img_b = apply_filters( 'zak_preview_image', '', 'about' );

$zak_swatches = array(
	'ivory'     => array( 'Ivory', '#FBF6EF', 'Page background' ),
	'blush'     => array( 'Blush', '#F7E3E0', 'Soft surfaces' ),
	'petal'     => array( 'Petal', '#EDC9CC', 'Accents and frames' ),
	'berry'     => array( 'Berry rose', '#A8235A', 'Buttons and links' ),
	'ink'       => array( 'Plum ink', '#2A1A22', 'Text' ),
	'gold'      => array( 'Gilt', '#B4874A', 'Fine lines only' ),
);
?>
<section class="hero section">
	<div class="wrap hero__grid">
		<div class="hero__copy">
			<p class="eyebrow"><?php esc_html_e( 'Live wedding painter · New Jersey', 'zak' ); ?></p>
			<h1 class="display"><?php echo wp_kses( __( 'Keep the magic <em>forever</em> on canvas.', 'zak' ), array( 'em' => array() ) ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Your wedding day will fly by in moments. I paint it live, in front of your guests, so one of them stays with you for a lifetime.', 'zak' ); ?></p>
			<p class="btn-row">
				<?php zak_cta(); ?>
				<a class="link-arrow" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php esc_html_e( 'See the paintings', 'zak' ); ?> <?php echo zak_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
			</p>
		</div>
		<figure class="hero__art">
			<div class="arch">
				<?php if ( $zak_img_a ) : ?>
					<img src="<?php echo esc_url( $zak_img_a ); ?>" alt="" width="768" height="1024" fetchpriority="high">
				<?php endif; ?>
			</div>
			<figcaption class="chip"><?php esc_html_e( 'Painted live in 4 to 7 hours', 'zak' ); ?></figcaption>
		</figure>
	</div>
</section>

<section class="section section--blush">
	<div class="wrap">
		<p class="eyebrow"><?php esc_html_e( 'Colour', 'zak' ); ?></p>
		<h2 class="h2"><?php echo wp_kses( __( 'Sampled from <em>her paintings</em>', 'zak' ), array( 'em' => array() ) ); ?></h2>
		<ul class="swatches">
			<?php foreach ( $zak_swatches as $zak_key => $zak_s ) : ?>
				<li class="swatch">
					<span class="swatch__chip swatch__chip--<?php echo esc_attr( $zak_key ); ?>"></span>
					<strong><?php echo esc_html( $zak_s[0] ); ?></strong>
					<span><?php echo esc_html( $zak_s[1] ); ?></span>
					<span><?php echo esc_html( $zak_s[2] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section">
	<div class="wrap type-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Type', 'zak' ); ?></p>
			<p class="display"><?php echo wp_kses( __( 'First dance, <em>first brushstroke</em>', 'zak' ), array( 'em' => array() ) ); ?></p>
			<p class="type-note"><?php esc_html_e( 'Fraunces · headings · italic for the word that matters', 'zak' ); ?></p>
		</div>
		<div class="prose">
			<h2 class="h2"><?php esc_html_e( 'A heading for a section', 'zak' ); ?></h2>
			<h3 class="h3"><?php esc_html_e( 'A smaller heading inside it', 'zak' ); ?></h3>
			<p><?php esc_html_e( 'I arrive two to three hours before your guests to paint the room: the architecture, the light, the flowers. When the celebration begins, your moment is painted in as it happens.', 'zak' ); ?></p>
			<p class="small"><?php esc_html_e( 'Figtree · body text · sentence case, never smaller than 16px', 'zak' ); ?></p>
		</div>
	</div>
</section>

<section class="section section--cream">
	<div class="wrap">
		<p class="eyebrow"><?php esc_html_e( 'Components', 'zak' ); ?></p>
		<h2 class="h2"><?php esc_html_e( 'The pieces pages are built from', 'zak' ); ?></h2>

		<div class="component-grid">
			<article class="card">
				<p class="card__kicker"><?php esc_html_e( 'Wedding couple', 'zak' ); ?></p>
				<h3 class="h3"><?php esc_html_e( 'Acrylic painting', 'zak' ); ?></h3>
				<p class="price"><span><?php esc_html_e( 'Starts from', 'zak' ); ?></span> $1,450</p>
				<ul class="ticks">
					<li><?php esc_html_e( '16×20, 18×24 or 24×30 inch canvas', 'zak' ); ?></li>
					<li><?php esc_html_e( '4 to 7 hours of live painting', 'zak' ); ?></li>
					<li><?php esc_html_e( 'Liability insurance included', 'zak' ); ?></li>
				</ul>
				<a class="btn btn--primary btn--block" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Inquire about acrylic', 'zak' ); ?></a>
			</article>

			<figure class="quote">
				<div class="quote__art arch arch--small">
					<?php if ( $zak_img_b ) : ?>
						<img src="<?php echo esc_url( $zak_img_b ); ?>" alt="" width="819" height="1024" loading="lazy">
					<?php endif; ?>
				</div>
				<blockquote>
					<p><?php esc_html_e( 'The painting turned out stunning and is something we’ll cherish forever!', 'zak' ); ?></p>
				</blockquote>
				<figcaption><?php esc_html_e( 'Tanikcha Naomi', 'zak' ); ?></figcaption>
			</figure>

			<form class="card form-sample" action="#" onsubmit="return false">
				<p class="card__kicker"><?php esc_html_e( 'Step 1 of 3', 'zak' ); ?></p>
				<h3 class="h3"><?php esc_html_e( 'When is the day?', 'zak' ); ?></h3>
				<div class="progress" role="presentation"><span></span></div>
				<label class="field">
					<span><?php esc_html_e( 'Wedding date', 'zak' ); ?></span>
					<input type="date">
				</label>
				<label class="field">
					<span><?php esc_html_e( 'Venue or town', 'zak' ); ?></span>
					<input type="text" placeholder="<?php esc_attr_e( 'The Ashford Estate, NJ', 'zak' ); ?>">
				</label>
				<button class="btn btn--primary btn--block" type="submit"><?php esc_html_e( 'Next', 'zak' ); ?></button>
			</form>
		</div>

		<div class="btn-row btn-row--spaced">
			<a class="btn btn--primary" href="#"><?php esc_html_e( 'Primary button', 'zak' ); ?></a>
			<a class="btn btn--ghost" href="#"><?php esc_html_e( 'Secondary button', 'zak' ); ?></a>
			<a class="link-arrow" href="#"><?php esc_html_e( 'Text link', 'zak' ); ?> <?php echo zak_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		</div>
	</div>
</section>
