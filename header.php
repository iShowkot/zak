<?php
/**
 * Site header.
 */

defined( 'ABSPATH' ) || exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'zak' ); ?></a>

<header class="site-header" data-header>
	<div class="site-header__inner wrap">
		<?php zak_logo(); ?>

		<nav class="site-nav" id="site-nav" aria-label="<?php esc_attr_e( 'Main', 'zak' ); ?>" data-nav>
			<?php zak_menu( 'primary', 'site-nav__list' ); ?>
			<?php zak_cta( 'btn btn--primary site-nav__cta' ); ?>
		</nav>

		<button class="menu-toggle" type="button" aria-controls="site-nav" aria-expanded="false" data-menu-toggle>
			<span class="menu-toggle__open"><?php echo zak_icon( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
			<span class="menu-toggle__close"><?php echo zak_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
			<span class="visually-hidden"><?php esc_html_e( 'Menu', 'zak' ); ?></span>
		</button>
	</div>
</header>

<main id="main" class="site-main">
