<?php

// Posts Grid Widget.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widget.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Posts Tile Widget.
require get_template_directory() . '/inc/widgets/posts-tile-widget.php';

// Posts Slider Widget.
require get_template_directory() . '/inc/widgets/posts-slider-widget.php';

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function ascendoor_magazine_register_widgets() {

	register_widget( 'Ascendoor_Magazine_Posts_Grid_Widget' );

	register_widget( 'Ascendoor_Magazine_Posts_List_Widget' );

	register_widget( 'Ascendoor_Magazine_Posts_Tile_Widget' );

	register_widget( 'Ascendoor_Magazine_Posts_Slider_Widget' );

	register_widget( 'Ascendoor_Magazine_Author_Info_Widget' );

	register_widget( 'Ascendoor_Magazine_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'ascendoor_magazine_register_widgets' );
