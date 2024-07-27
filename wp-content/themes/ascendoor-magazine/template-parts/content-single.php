<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ascendoor_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php ascendoor_magazine_categories_list(); ?>
			</div>
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="mag-post-meta">
						<?php
						if ( is_singular( 'post' ) && get_theme_mod( 'ascendoor_magazine_post_hide_author_info', false ) == true ) :
							ascendoor_magazine_posted_by();
						endif;
						ascendoor_magazine_posted_on();
						?>
					</div>
				<?php endif; ?>
			</header><!-- .entry-header -->
		</div>
	</div>
	<?php ascendoor_magazine_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ascendoor-magazine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ascendoor-magazine' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ascendoor_magazine_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
	if ( get_theme_mod( 'ascendoor_magazine_post_hide_author_info', false ) == false ) {
		if ( get_theme_mod( 'ascendoor_magazine_post_hide_author', false ) == false ) {
			$get_author_id       = get_the_author_meta( 'ID' );
			$get_author_gravatar = get_avatar_url( $get_author_id, array( 'size' => 120 ) );
			?>
			<div class="ascendoor-author-box">
				<div class="author-img">
					<img src="<?php echo esc_url( $get_author_gravatar ); ?>" alt="<?php echo esc_attr( get_the_author() ); ?>">
				</div>
				<div class="author-details">
					<h3 class="author-name"><?php echo esc_html( get_the_author() ); ?></h3>
					<p class="author-description">
						<?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?>
					</p>
				</div>
			</div>
			<?php
		}
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->
