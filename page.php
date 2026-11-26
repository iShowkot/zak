<?php
/**
 * Default page template.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="wrap wrap--narrow section prose">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			the_title( '<h1 class="page-title">', '</h1>' );
			the_content();
		endwhile;
	else :
		echo '<p>' . esc_html__( 'Nothing here yet.', 'zak' ) . '</p>';
	endif;
	?>
</div>
<?php
get_footer();
