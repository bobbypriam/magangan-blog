<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Kibar Magangan
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php /*<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'kibar-magangan' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead --> */ ?>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri() . '/img/menu.png'; ?>" height="51" width="51"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#" class="active">Magangan</a></li>
            <li><a href="#about">Program</a></li>
            <li><a href="#contact">Daftar</a></li>
            <li><a href="#contact">Blog</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="social-link"><img src="<?php echo get_template_directory_uri() . '/img/soc-facebook.png'; ?>" height="30" width="30"></a></li>
            <li><a href="#" class="social-link"><img src="<?php echo get_template_directory_uri() . '/img/soc-twitter.png'; ?>" height="30" width="30"></a></li>
            <li><a href="#" class="social-link"><img src="<?php echo get_template_directory_uri() . '/img/soc-gplus.png'; ?>" height="30" width="30"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="masthead" class="site-header" role="banner">
      <div class="site-branding container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" width="500"/>
          </div>
        </div>
      </div>
    </header>

	<div id="content" class="site-content container">
