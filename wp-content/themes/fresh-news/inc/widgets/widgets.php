<?php

// Posts Grid Widget.
require get_theme_file_path() . '/inc/widgets/posts-grid-widget.php';

// Posts Tile Widget.
require get_theme_file_path() . '/inc/widgets/posts-tile-widget.php';

// Two Column Posts Widget.
require get_theme_file_path() . '/inc/widgets/two-column-posts-widget.php';

/**
 * Register Widgets
 */
function fresh_news_register_widgets() {

	register_widget( 'Ascendoor_Magazine_Posts_Grid_Widget' );

	register_widget( 'Ascendoor_Magazine_Posts_Tile_Widget' );

	register_widget( 'Fresh_News_Two_Column_Posts_Widget' );

}
add_action( 'widgets_init', 'fresh_news_register_widgets' );
