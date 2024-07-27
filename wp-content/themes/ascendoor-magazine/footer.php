<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ascendoor_Magazine
 */

?>
	<?php if ( ! is_front_page() || is_home() ) { ?>
				</div>
			</div>
		</div><!-- #content -->
	<?php } ?>
	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
			<div class="site-footer-top">
				<div class="ascendoor-wrapper">
					<div class="footer-widgets-wrapper"> 
					<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-' . $i ); ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div><!-- .footer-top -->
		<?php endif; ?>
		<div class="site-footer-bottom">
			<div class="ascendoor-wrapper">
				<div class="site-footer-bottom-wrapper">
					<div class="site-info">
						<?php
						/**
						 * Hook: ascendoor_magazine_footer_copyright.
						 *
						 * @hooked - ascendoor_magazine_output_footer_copyright_content - 10
						 */
						do_action( 'ascendoor_magazine_footer_copyright' );
						?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<?php
	$is_scroll_top_active = get_theme_mod( 'ascendoor_magazine_scroll_top', true );
	if ( $is_scroll_top_active ) :
		?>
		<a href="#" id="scroll-to-top" class="magazine-scroll-to-top"><i class="fas fa-chevron-up"></i></a>
		<?php
	endif;
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
