<?php
/**
 * Kibar Magangan functions and definitions
 *
 * @package Kibar Magangan
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

show_admin_bar ( false );

if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kibar_magangan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kibar_magangan_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kibar Magangan, use a find and replace
	 * to change 'kibar-magangan' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kibar-magangan', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 300, true );
	add_image_size( 'featured-latest', 9999, 300, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kibar-magangan' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kibar_magangan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kibar_magangan_setup
add_action( 'after_setup_theme', 'kibar_magangan_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kibar_magangan_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kibar-magangan' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kibar_magangan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kibar_magangan_scripts() {
	wp_enqueue_style( 'kibar-magangan-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');

	wp_enqueue_style( 'kibar-magangan-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kibar-magangan-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true );

	wp_enqueue_script( 'kibar-magangan-bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '', true );

	wp_enqueue_script( 'kibar-magangan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kibar_magangan_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function kibar_magangan_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s"><span class="date">%2$s</span><span class="month">%3$s</span><span class="year">%4$s</span></time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'd' ) ),
		esc_html( get_the_date( 'M' ) ),
		esc_html( get_the_date( 'Y' ) )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'kibar-magangan' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>';



}

function kibar_magangan_byline() {

	$avatar = get_avatar( get_the_author_meta( 'ID' ), 56 );

	$byline = sprintf(
		_x( 'by %s', 'post author', 'kibar-magangan' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"><span class="avatar">' . $avatar . '</span> '  . $byline . '</span>';
}

function kibar_magangan_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'kibar-magangan' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'kibar-magangan' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

function kibar_magangan_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div> ', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'kibar-magangan' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'kibar-magangan' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

function the_excerpt_custom( $letters ) {
	global $page, $pages;

	$post = get_post();

	$output = '';

	if ( $page > count( $pages ) ) // if the requested page doesn't exist
		$page = count( $pages ); // give them the highest numbered page that DOES exist

	$content = $pages[$page - 1];

	$excerpt = substr( strip_tags( $content ), 0, $letters );
	$more_link_text = 'read more';

	$readmore = apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">$more_link_text</a>", $more_link_text );

	echo '<p>' . $excerpt . '... ' . $readmore . '</p>';
}