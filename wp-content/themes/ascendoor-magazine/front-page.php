<?php

get_header();

if ( is_front_page() && is_home() ) {

	require get_template_directory() . '/home.php';

} elseif ( is_front_page() && ! is_home() ) {
	?>
	<main id="primary" class="site-main">
		<?php require get_template_directory() . '/sections/sections.php'; ?>
	</main><!-- #main -->
	<?php
}

get_footer();
