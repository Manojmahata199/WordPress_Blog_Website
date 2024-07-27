<?php
$sidebar_position = get_theme_mod( 'ascendoor_magazine_frontpage_sidebar_position', 'frontpage-right-sidebar' );
$no_sidebar       = is_active_sidebar( 'secondary-widgets-section' ) ? '' : 'no-frontpage-sidebar';
?>
<div class="main-widget-section">
	<div class="ascendoor-wrapper">
		<div class="main-widget-section-wrap <?php echo esc_attr( $sidebar_position ); ?> <?php echo esc_attr( $no_sidebar ); ?>">
			<div class="primary-widgets-section">
				<?php
				if ( is_active_sidebar( 'primary-widgets-section' ) ) :
					dynamic_sidebar( 'primary-widgets-section' );
				endif;
				?>
			</div>
			<div class="secondary-widgets-section">
				<?php
				if ( is_active_sidebar( 'secondary-widgets-section' ) ) :
					dynamic_sidebar( 'secondary-widgets-section' );
				endif;
				?>
			</div>
		</div>
	</div>
</div>
