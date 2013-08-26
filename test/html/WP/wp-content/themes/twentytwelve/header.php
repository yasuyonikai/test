<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' charset='UTF-8' src='http://b.tipszone.jp/jquery.url2link.js'></script>
<script type='text/javascript'>
$(function(){
    $('body').url2link();

    // target="_blank" を指定する場合
    $('body').url2link({attr: {target: '_blank'}});

    // 外部サイトへのリンクのみ target="_blank" を指定する場合
    var origin = location.href.match(/^https?:\/\/[^/]+/i)[0];
    $('body').url2link({callback: function(url){
        if (origin != url.match(/^https?:\/\/[^/]+/i)[0])
            $(this).attr('target', '_blank');
    }});
});
</script>
</head>

<body <?php body_class(); ?>>

	<!-- <header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav> --><!-- #site-navigation -->

		<?php //$header_image = get_header_image();
		//if ( ! empty( $header_image ) ) : ?>
			<!-- <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a> -->
		<?php //endif; ?>
	<!-- </header> -->
	<!--div id="header">
		<ul class="inner clearfix">
			<li><a href="http://www.sptnc.info/" target="_self" title="home">home</a></li>
			<li><a href="http://www.sptnc.info/WP/" target="_self" title="blog">blog</a></li>
			<!--li><a href="#" target="_self" title="trying">trying</a></li>
			<li><a href="#" target="_self" title="hobby">hobby</a></li-->
		<!--/ul>
	</div-->
	<h2 style="padding-top:100px"><img src="http://www.sptnc.info/images/title.png" width="697" alt="" /></h2>
	<div class="menu">
		<a href="http://www.sptnc.info/"><img src="../../../../images/menu01.png" height="61" width="124" alt=""></a>
		<a href="http://www.sptnc.info/WP/"><img src="../../../../images/menu02.png" alt=""></a>
		<!-- <a href="#"><img src="../../../../images/menu03.png" alt=""></a>
		<a href="#"><img src="../../../../images/menu04.png" alt=""></a> -->
	</div>
	<!-- #masthead -->
<div id="page" class="hfeed site clearfix">
	<div id="main" class="wrapper">