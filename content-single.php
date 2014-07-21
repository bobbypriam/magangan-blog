<?php
/**
 * @package Kibar Magangan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="timestamp">
    <?php kibar_magangan_posted_on(); ?>
  </div>

  <div class="row">
  	
  	<?php if ( has_post_thumbnail() ) : ?>
  		<div class="col-md-12 post-featured-image">
	        <?php the_post_thumbnail( 'featured-latest' ); ?>
	    </div>
	<?php endif; ?>

	<div class="col-md-12 post-full">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php kibar_magangan_byline(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'kibar-magangan' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	  </div>
	</div>

	<footer class="entry-footer post-full-footer">
		<?php 
			/* translators: used between list items, there is a space after the comma 
			$category_list = get_the_category_list( __( ', ', 'kibar-magangan' ) );

			/* translators: used between list items, there is a space after the comma 
			$tag_list = get_the_tag_list( '', __( ', ', 'kibar-magangan' ) );

			if ( ! kibar_magangan_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'kibar-magangan' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'kibar-magangan' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'kibar-magangan' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'kibar-magangan' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			); */
		?>
		<span class="social-link">
			Share via
			<ul>
				<li><a href="#" class="social-link"><img src="<?php echo get_template_directory_uri() . '/img/soc-facebook.png'; ?>" height="30" width="30"></a></li>
	            <li><a href="#" class="social-link"><img src="<?php echo get_template_directory_uri() . '/img/soc-twitter.png'; ?>" height="30" width="30"></a></li>
	            <li><a href="#" class="social-link"><img src="<?php echo get_template_directory_uri() . '/img/soc-gplus.png'; ?>" height="30" width="30"></a></li>
	        </ul>
		</span>

		<?php edit_post_link( __( 'Edit', 'kibar-magangan' ), ' | <span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
