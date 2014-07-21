<?php
/**
 * @package Kibar Magangan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="timestamp latest">
    <?php kibar_magangan_posted_on(); ?>
  </div>

  <div class="row latest">

    <div class="col-md-12 post-featured-image">
      
      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'featured-latest' ); ?>
      <?php else : ?>
        <img src="//placehold.it/914x300">
      <?php endif; ?>

    </div>

    <div class="col-md-12 post-excerpt">

    	<header class="entry-header">
    		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    		<?php if ( 'post' == get_post_type() ) : ?>
    		<div class="entry-meta">
    			<?php kibar_magangan_byline(); ?>
    		</div><!-- .entry-meta -->
    		<?php endif; ?>
    	</header><!-- .entry-header -->

    	<div class="entry-content">
    		<?php the_excerpt_custom( 400 ); ?>
    		<?php
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . __( 'Pages:', 'kibar-magangan' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->

    	<footer class="entry-footer">
    		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
    			<?php
    				/* translators: used between list items, there is a space after the comma */
    				$categories_list = get_the_category_list( __( ', ', 'kibar-magangan' ) );
    				if ( $categories_list && kibar_magangan_categorized_blog() ) :
    			?>
    			<span class="cat-links">
    				<?php printf( __( 'Posted in %1$s', 'kibar-magangan' ), $categories_list ); ?>
    			</span>
    			<?php endif; // End if categories ?>

    			<?php
    				/* translators: used between list items, there is a space after the comma */
    				$tags_list = get_the_tag_list( '', __( ', ', 'kibar-magangan' ) );
    				if ( $tags_list ) :
    			?>
    			<span class="tags-links">
    				<?php printf( __( 'Tagged %1$s', 'kibar-magangan' ), $tags_list ); ?>
    			</span>
    			<?php endif; // End if $tags_list ?>
    		<?php endif; // End if 'post' == get_post_type() ?>

    		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'kibar-magangan' ), __( '1 Comment', 'kibar-magangan' ), __( '% Comments', 'kibar-magangan' ) ); ?></span>
    		<?php endif; ?>

    		<?php edit_post_link( __( 'Edit', 'kibar-magangan' ), '<span class="edit-link">', '</span>' ); ?>
    	</footer><!-- .entry-footer -->

    </div>
  </div>
</article><!-- #post-## -->