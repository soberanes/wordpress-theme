<?php
/**
 * @package WordPress
 * @subpackage Almeida-Mireles
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- for Facebook -->
	<meta property="og:site_name" content="<?php echo get_bloginfo('name');?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo the_title();?>" />
	<meta property="og:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" />
	<meta property="og:url" content="<?php echo get_bloginfo('url');?>" />
	<meta property="og:description" content="<?php echo get_bloginfo( 'description');?>" />
    
	<!-- Place favicon.ico and apple-touch-icons in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icon.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad.png"><!--72X72-->
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-iphone4.png"><!--114X114-->
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad3.png">	<!--144X144-->	
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); echo '/reset.css?' . filemtime( get_stylesheet_directory() . '/reset.css'); ?>" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:900' rel='stylesheet' type='text/css' />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/magnific-popup.css">
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="fb-root"></div>

	<!-- Intro -->
	<?php if ( is_home() ) {
	    // This is a homepage
	    query_posts('cat=2&showposts=5&offset=0&orderby=rand');
	    if(have_posts()): 
	    	while(have_posts()): the_post(); 
				if ( has_post_thumbnail() ) {
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$title = get_the_title();
					$author = get_the_author();
				}
			endwhile;
		endif;
	?>
	<?php
	 if( !isset($_GET['ref']) && $_GET['ref'] != 'logo'){ ?>
	<div id="introduction" style="background-image: url('<?= $url; ?>');">
		<div id="redirect">
			<div class="redirect">
				<div class="logo"></div>
			</div>	
			<div id="image_day" class="image_day">New York Photo of the Day</div>
			<div id="image_day_content">
				<div class="image_day_data">
					<p class="img_title"><?= $title; ?></p>
					<p>-</p>
					<p>Published by member <a href="#" class="img_author"><?= $author; ?></a></p>
				</div>
				<a href="#" class="cam_icon"></a>
			</div>
		</div>
	</div>
		<?php }else{ ?>
			<script type="text/javascript">
				$(function(){
					$('#primary').css({'visibility':'visible'});
				});
			</script>
		<?php } ?>
	<?php } ?>
	
	<div id="page" class="hfeed">
		<div id="main">